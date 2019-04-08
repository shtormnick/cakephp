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
        $keyword = $this->request->query('keyword');

        if(!empty($keyword)){
            $this->paginate = [
                'conditions'=>['first_name LIKE '=>'%'.$keyword.'%']
            ];
        }

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
        $this->set('producer', $producer);

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
        $this->set('producer', $producer);

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