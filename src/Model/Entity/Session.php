<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 24.02.19
 * Time: 22:46
 */

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Session extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,

    ];

}
