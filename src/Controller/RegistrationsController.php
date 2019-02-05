<?php
namespace App\Controller;
use App\Controller\AppController;

class RegistrationsController extends AppController{
    public function index(){
        $country = array('India','United State of America','United Kingdom');
        $this->set('country',$country);
        $gender = array('Male','Female');
        $this->set('gender',$gender);
        if (array_key_exists('ssss',$_POST)){
            $this->set('ssss',$_POST['ssss']);
        } else {
            $this->set('ssss','');
        }
        var_dump($_POST);
        //die;
        $ssw= "Hallo world ";
        $ddd= "sssd";
        echo 'Hallo "world" '.'sssd';

    }
}
?>