<?php
namespace App\Controller;
use App\Controller\AppController;

class TestsController extends AppController{
    public function index(){

        $event=$this->getEventManager();
        $event->on(
            'Controller.beforeRender',
            function ($event){
                var_dump($event->subject()->viewVars);
                die();
            }
        );
        var_dump($event);
        $this->set('argument1','ddddd');
    }
    public function args($arg1,$arg2){
        $this->set('argument1',$arg1);
        $this->set('argument2',$arg2);
    }
}
?>