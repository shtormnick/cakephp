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

    }

    public function view($id = null)
    {

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

    public function edit($id = null)
    {

    }

    public function delete($id = null)
    {


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
