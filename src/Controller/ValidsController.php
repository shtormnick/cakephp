<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Validation\Validator;

class ValidsController extends AppController{
    public function index(){
        $validator = new Validator();
        $validator->notEmpty('username', 'We need username.')
            ->add('username', 'validFormat', ['rule' => 'email','message'
            => 'E-mail must be valid']);

        $validator->notEmpty('password', 'We need password.');
        $errors = $validator->errors($this->request->data());
        $this->set('errors',$errors);
    }
}
?>