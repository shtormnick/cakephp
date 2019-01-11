<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController{
    public function index(){
        $users = TableRegistry::get('users');
        $query = $users->find();
        $this->set('results',$query);
    }
}
?>