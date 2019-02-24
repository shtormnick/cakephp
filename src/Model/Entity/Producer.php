<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 16:44
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Producer extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,

    ];
}