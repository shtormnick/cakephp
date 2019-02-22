<?php
use Migrations\AbstractMigration;

class Actors extends AbstractMigration
{
    public function up()
    {

        $this->table('actors')
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('birthday', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->table('actors')->drop()->save();
    }
}
