<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 24.02.19
 * Time: 22:47
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasOne('Films');
        $this->hasOne('Halls');

    }


}
