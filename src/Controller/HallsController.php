<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 05.03.19
 * Time: 17:04
 */

namespace App\Controller;

class HallsController extends AppController
{
    public function index()
    {
        $keyword = $this->request->query('keyword');

        if(!empty($keyword)){
            $this->paginate = [
                'conditions'=>['name LIKE '=>'%'.$keyword.'%']
            ];
        }

        $halls = $this->paginate($this->Halls);
        $this->set(compact('halls'));
    }

    public function view($id = null)
    {
        $hall = $this->Halls->get($id);
        $this->set('hall', $hall);
    }

    public function add()
    {
        $hall = $this->Halls->newEntity();
        if ($this->request->is('post')) {
            $hall = $this->Halls->patchEntity($hall, $this->request->getData());
            if ($this->Halls->save($hall)) {
                $this->Flash->success(__('The hall has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall could not be saved. Please, try again.'));
        }
        $this->set('hall', $hall);
    }

    public function edit($id = null)
    {
        $hall = $this->Halls->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hall = $this->Halls->patchEntity($hall, $this->request->getData());
            if ($this->Halls->save($hall)) {
                $this->Flash->success(__('The hall has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hall could not be saved. Please, try again.'));
        }
        $this->set('hall', $hall);

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hall = $this->Halls->get($id);
        if ($this->Halls->delete($hall)) {
            $this->Flash->success(__('The hall has been deleted.'));
        } else {
            $this->Flash->error(__('The hall could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}