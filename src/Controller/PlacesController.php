<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 10.03.19
 * Time: 0:49
 */

namespace App\Controller;


class PlacesController extends AppController
{
    public function index()
    {
        $keyword = $this->request->query('keyword');

        if(!empty($keyword)){
            $this->paginate = [
                'conditions'=>['number LIKE '=>'%'.$keyword.'%']
            ];
        }

        $places = $this->paginate($this->Places);
        $this->set(compact('places'));
    }

    public function view($id = null)
    {
        $place = $this->Places->get($id);
        $this->set('place', $place);
    }

    public function add()
    {
        $place = $this->Places->newEntity();
        if ($this->request->is('post')) {
            $place = $this->Places->patchEntity($place, $this->request->getData());
            if ($this->Places->save($place)) {
                $this->Flash->success(__('The place has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The place could not be saved. Please, try again.'));
        }
        $this->set('place', $place);
        //$users = $this->Actors->Users->find('list', ['limit' => 200]);
        //$tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        //$this->set(compact('actor', 'users', 'tags'));
    }

    public function edit($id = null)
    {
        $place = $this->Places->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $place = $this->Places->patchEntity($place, $this->request->getData());
            if ($this->Places->save($place)) {
                $this->Flash->success(__('The place has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The place could not be saved. Please, try again.'));
        }
        $this->set('place', $place);

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $place = $this->Places->get($id);
        if ($this->Places->delete($place)) {
            $this->Flash->success(__('The place has been deleted.'));
        } else {
            $this->Flash->error(__('The place could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);

        if (isset($user['role']) && $user['role'] === 'cashier') {
            return false;
        }

    }

    public function isAuthorized($user)
    {

        if (in_array($this->request->getParam('action'), ['edit', 'delete', 'add'])) {
            $film = (int)$this->request->getParam('pass.0');
            if (isset($user['role']) && $user['role'] === 'moderator') {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}