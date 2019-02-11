<?php
namespace App\Controller;
use App\Controller\AppController;

class RegistrationsController extends AppController{
    public function index(){
        $country = array('India','United State of America','United Kingdom');
        $this->set('country',$country);
        $gender = array('Male','Female');
        $this->set('gender',$gender);

        var_dump($this->request->data('ssss'));
        $this->set('ssss',$this->request->data('ssss'));
        //die;
        $ssw= "Hallo world ";
        $ddd= "sssd";
        echo 'Hallo "world" '.'sssd';

    }
}
?>