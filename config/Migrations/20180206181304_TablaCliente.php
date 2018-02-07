<?php
use Migrations\AbstractMigration;

class TablaCliente extends AbstractMigration
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
        $table = $this->table('Cliente');
        $table->addColumn('cedula','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('nombre','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('primer_ape','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('segundo_ape','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('alias','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('direccion','text', [
            'default' => null ,
            'null' => false,
        ])
        ->addColumn('telefono','string', [
            'default' => null ,
            'limit' => 10,
            'null' => false,
        ])
        ->addColumn('email','string', [
            'default' => null ,
            'limit' => 50,
            'null' => false,
        ])
        ->create();
    }
}
