<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 13:55
 */

namespace App\Controller;


class ActorsController extends AppController
{
    public function index()
    {

        $actors = $this->paginate($this->Actors);
        $this->set(compact('actors'));
    }

    public function view($id = null)
    {
        $actor = $this->Actors->get($id);
        $this->set('actor', $actor);
    }

    public function add()
    {
        $actor = $this->Actors->newEntity();
        if ($this->request->is('post')) {
            $actor = $this->Actors->patchEntity($actor, $this->request->getData());
            if ($this->Actors->save($actor)) {
                $this->Flash->success(__('The actor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        //$users = $this->Actors->Users->find('list', ['limit' => 200]);
        //$tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        //$this->set(compact('actor', 'users', 'tags'));
    }

    public function edit($id = null)
    {
        $actor = $this->Actors->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actor = $this->Actors->patchEntity($actor, $this->request->getData());
            if ($this->Actors->save($actor)) {
                $this->Flash->success(__('The actor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
       // $users = $this->Actors->Users->find('list', ['limit' => 200]);
       // $tags = $this->Actors->Tags->find('list', ['limit' => 200]);
       // $this->set(compact('actor', 'users', 'tags'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actor = $this->Actors->get($id);
        if ($this->Actors->delete($actor)) {
            $this->Flash->success(__('The actor has been deleted.'));
        } else {
            $this->Flash->error(__('The actor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}