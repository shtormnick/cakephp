<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 22.02.19
 * Time: 13:48
 */

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}