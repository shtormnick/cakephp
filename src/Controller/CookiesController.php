<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Controller\Component\CookieComponent;

class CookiesController extends AppController{
    public $components = array('Cookie');

    public function writeCookie(){
        $this->Cookie->write('name', 'Virat');
    }
    public function readCookie(){
        $cookie_val = $this->Cookie->read('name');
        $this->set('cookie_val',$cookie_val);
    }
    public function checkCookie(){
        $isPresent = $this->Cookie->check('name');
        $this->set('isPresent',$isPresent);
    }
    public function deleteCookie(){
        $this->Cookie->delete('name');
    }
}
?>