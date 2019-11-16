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
        $conditions = [];
        $day = $this->request->query('day');
        $month = $this->request->query('month');
        $year = $this->request->query('year');
        $keyword = $this->request->query('keyword');
        if (!empty($keyword)) {
            $conditions['title LIKE '] = '%' . $keyword . '%';
        }
        if (!empty($year)) {
            $conditions['to_char(start,\'YYYY\') ='] = $year;
        }
        if (!empty($month)) {
            $conditions['to_char(start,\'MM\') ='] = $month;
        }
        if (!empty($day)) {
            $conditions['to_char(start,\'DD\') ='] = $day;
        }
        if (!empty($year)) {
            $conditions['to_char(finish,\'YYYY\') ='] = $year;
        }
        if (!empty($month)) {
            $conditions['to_char(finish,\'MM\') ='] = $month;
        }
        if (!empty($day)) {
            $conditions['to_char(finish,\'DD\') ='] = $day;
        }
        $this->paginate = ['conditions' => $conditions];
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
        $halls = $this->Sessions->Halls->find('list', ['limit' => 200]);
        $films = $this->Sessions->Films->find('list', ['limit' => 200]);
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->getData());
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The sessions has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sessions could not be saved. Please, try again.'));
        }
        $this->set('session', $session);
        $this->set('halls', $halls);
        $this->set('films', $films);
    }

    public function edit($id = null)
    {
        $halls = $this->Sessions->Halls->find('list', ['limit' => 200]);
        $films = $this->Sessions->Films->find('list', ['limit' => 200]);
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
        $this->set('halls', $halls);
        $this->set('film', $films);
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
