<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 14:46
 */

namespace App\Controller;


class CategoriesController extends AppController
{
    public function index()
    {

        $categories = $this->paginate($this->Categories);
        $this->set(compact('categories'));
    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id);
        $this->set('category', $category);
    }

    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set('category', $category);
        //$users = $this->Actors->Users->find('list', ['limit' => 200]);
        //$tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        //$this->set(compact('actor', 'users', 'tags'));
    }

    public function edit($id = null)
    {
        $category = $this->Categories->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set('category', $category);
        // $users = $this->Actors->Users->find('list', ['limit' => 200]);
        // $tags = $this->Actors->Tags->find('list', ['limit' => 200]);
        // $this->set(compact('actor', 'users', 'tags'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}