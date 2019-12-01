<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 12.03.19
 * Time: 20:44
 */

namespace App\Controller;

use Cake\Datasource\ConnectionManager;


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
        if (empty($session_id)) {
            $this->Flash->error(__('The session has no set'));
            return $this->redirect(['controller' => 'Sessions', 'action' => 'index']);
        }
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute(
            'SELECT p.*
FROM places p 
INNER JOIN halls_places hp ON p.id = hp.place_id
INNER JOIN sessions s ON hp.hall_id = s.hall_id
WHERE s.id = ? AND p.id NOT IN (SELECT place_id
                                 FROM tickets t INNER JOIN sessions s ON t.session_id = s.id
                                 WHERE s.id = ? );',
            [$session_id, $session_id],
            ['integer', 'integer']
        );
        $rows = $stmt->fetchAll('assoc');
        $places = [];
        foreach ($rows as $row){
            $places[$row['id']]=$row['number'];
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
        $this->set('places', $places);

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

    public function sqlLog($sql)
    {

    }

}
