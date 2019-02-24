<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 16:43
 */

namespace App\Controller;


class ProducersController extends AppController
{
    public function index()
    {

        $producers = $this->paginate($this->Producers);
        $this->set(compact('producers'));
    }

    public function view($id = null)
    {
        $producer = $this->Producers->get($id);
        $this->set('producer', $producer);
    }

    public function add()
    {
        $producer = $this->Producers->newEntity();
        if ($this->request->is('post')) {
            $producer = $this->Producers->patchEntity($producer, $this->request->getData());
            if ($this->Producers->save($producer)) {
                $this->Flash->success(__('The producer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producer could not be saved. Please, try again.'));
        }
        //$users = $this->Actors->Users->find('list', ['limit' => 200]);
        //$tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        //$this->set(compact('actor', 'users', 'tags'));
    }

    public function edit($id = null)
    {
        $producer = $this->Producers->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producer = $this->Producers->patchEntity($producer, $this->request->getData());
            if ($this->Producers->save($producer)) {
                $this->Flash->success(__('The producer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producer could not be saved. Please, try again.'));
        }
        // $users = $this->Actors->Users->find('list', ['limit' => 200]);
        // $tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        // $this->set(compact('actor', 'users', 'tags'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producer = $this->Producers->get($id);
        if ($this->Producers->delete($producer)) {
            $this->Flash->success(__('The producer has been deleted.'));
        } else {
            $this->Flash->error(__('The producer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}