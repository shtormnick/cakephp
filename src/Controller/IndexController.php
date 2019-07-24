<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 13:40
 */

namespace App\Controller;


class IndexController extends AppController
{
    public function index ()
    {

    }

    public function view($id = null)
    {
        $film = $this->Films->get($id);
        $this->set('film', $film);
    }

}