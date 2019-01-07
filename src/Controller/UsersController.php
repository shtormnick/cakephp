<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController{
    public function add(){
        if($this->request->is('post')){
            $username = $this->request->data('username');
            $hashPswdObj = new DefaultPasswordHasher;
            $password = $hashPswdObj->hash($this->request->data('password'));
            $users_table = TableRegistry::get('users');
            $users = $users_table->newEntity();
            $users->username = $username;
            $users->password = $password;

            if($users_table->save($users))
                echo "User is added.";
        }
    }
}
?>