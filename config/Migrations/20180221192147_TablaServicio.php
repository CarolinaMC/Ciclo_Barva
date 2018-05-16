<?php
use Migrations\AbstractMigration;

class TablaServicio extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('Servicio');
        $table->addColumn('descripcion','string', [
            'default' => null ,
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('precio','integer', [
            'default' => 0,
            'limit' => 20,
            'null' => false,
        ])
        ->create();
    }
}
