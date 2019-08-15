<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 12.03.19
 * Time: 20:44
 */

namespace App\Controller;


class SessionsController extends AppController
{
    public function index()
    {
   $keyword = $this->request->query('keyword');

        if(!empty($keyword)){
            $this->paginate = [
                'conditions'=>['first_name LIKE '=>'%'.$keyword.'%']
            ];
        }

        $sessions = $this->paginate($this->Sessions);
        $this->set(compact('sessions'));
    }

    public function view($id = null)
    {
        $session = $this->Sessions->get($id);
        $this->set('session', $session);
    }

    public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The actor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        $this->set('session', $session);

    }

    public function edit($id = null)
    {
        $session = $this->Sessions->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The actor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        $this->set('session', $session);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The actor has been deleted.'));
        } else {
            $this->Flash->error(__('The actor could not be deleted. Please, try again.'));
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