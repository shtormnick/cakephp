<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 12.03.19
 * Time: 20:44
 */

namespace App\Controller;


class TicketsController extends AppController
{
    public function index()
    {
        $tickets = $this->paginate($this->Tickets);
        $this->set(compact('tickets'));
    }

    public function view($ticket_id = null)
    {
        $ticket = $this->Tickets->get($ticket_id);
        $this->set('ticket', $ticket);
    }

    public function add()
    {

        $session_id = $this->request->query('session');
        if (empty($session_id)){
            $this->Flash->error(__('The session has no set'));
            return $this->redirect(['controller'=>'Sessions','action' => 'index']);
        }
        $session = $this->Tickets->Sessions->get($session_id);

        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set('ticket', $ticket);
        $this->set('session', $session);

    }

    public function edit($ticket_id = null)
    {
        $hall = $this->Tickets->Halls->find('list', ['limit' => 200]);
        $session = $this->Tickets->Sessions->find('list', ['limit' => 200]);
        $ticket = $this->Tickets->get($ticket_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Sessions->save($ticket)) {
                $this->Flash->success(__('Ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ticket could not be saved. Please, try again.'));
        }
        $this->set('session', $session);
        $this->set('hall', $hall);
        $this->set('ticket', $ticket);
    }

    public function delete($ticket_id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($ticket_id);
        if ($this->Sessions->delete($ticket)) {
            $this->Flash->success(__('Ticket has been deleted.'));
        } else {
            $this->Flash->error(__('Ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);

    }

    public function isAuthorized($user)
    {

        if (in_array($this->request->getParam('action'), ['edit', 'delete', 'add'])) {
            if (isset($user['role']) && $user['role'] === 'moderator') {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
