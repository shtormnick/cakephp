<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 24.02.19
 * Time: 22:45
 */

namespace App\Controller;


class FilmsController extends AppController
{
    public function index()
    {

        $films = $this->paginate($this->Films);
        $this->set(compact('films'));
    }

    public function view($id = null)
    {
        $film = $this->Films->get($id);
        $this->set('film', $film);
    }

    public function add()
    {
        $film = $this->Films->newEntity();
        if ($this->request->is('post')) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set('film', $film);

    }

    public function edit($id = null)
    {
        $film = $this->Films->get($id,['contain' => ['Actors']]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set('film', $film);
        $actors = $this->Films->Actors->find('list', ['limit' => 200]);
        $this->set('actors', $actors);

    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $film = $this->Films->get($id);
        if ($this->Films->delete($film)) {
            $this->Flash->success(__('The film has been deleted.'));
        } else {
            $this->Flash->error(__('The film could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


}