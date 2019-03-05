<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 05.03.19
 * Time: 17:10
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class HallsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}