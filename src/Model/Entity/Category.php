<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 16:13
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Category extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,

    ];
}