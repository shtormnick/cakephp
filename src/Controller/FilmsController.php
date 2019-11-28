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
       $conditions = [];
//        $day = $this->request->query('day');
//        $month = $this->request->query('month');
//        $year = $this->request->query('year');
        $keyword = $this->request->query('keyword');
        if (!empty($keyword)) {
            $conditions['title LIKE '] = '%' . $keyword . '%';
        }
//        if (!empty($year)) {
//            $conditions['to_char(release_year,\'YYYY\') ='] = $year;
//        }
//        if (!empty($month)) {
//            $conditions['to_char(release_year,\'MM\') ='] = $month;
//        }
//        if (!empty($day)) {
//            $conditions['to_char(release_year,\'DD\') ='] = $day;
//        }
        $this->paginate = ['conditions' => $conditions];
        $films = $this->paginate($this->Films);
        $this->set(compact('films'));
    }

    public function view($id = null)
    {

        $film = $this->Films->get($id, ['contain' => ['Actors','Categories','Producers']]);
        $this->set('film', $film);
    }

    public function add()
    {
        $producers=$this->Films->Producers->find('list', ['limit' => 200]);
        $categories = $this->Films->Categories->find('list', ['limit' => 200]);
        $actors = $this->Films->Actors->find('list', ['limit' => 200]);
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
        $this->set('actors', $actors);
        $this->set('producers', $producers);
        $this->set('categories', $categories);
    }

    public function edit($id = null)
    {
        $producers=$this->Films->Producers->find('list', ['limit' => 200]);
        $categories = $this->Films->Categories->find('list', ['limit' => 200]);
        $actors = $this->Films->Actors->find('list', ['limit' => 200]);
        $film = $this->Films->get($id, ['contain' => ['Actors','Categories','Producers']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $this->set('film', $film);
        $this->set('actors', $actors);
        $this->set('producers', $producers);
        $this->set('categories', $categories);

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
