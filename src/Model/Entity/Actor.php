<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 13:50
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Actor extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,

    ];
}