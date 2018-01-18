<?php
use Migrations\AbstractMigration;

class TablaUsuario extends AbstractMigration
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
        $table = $this->table('Usuario');
        $table->addColumn('cedula','string',array('limit'=>20))
              ->addColumn('nombre','string',array('limit'=>20))
              ->addColumn('primer_ape','string',array('limit'=>20))
              ->addColumn('segundo_ape','string',array('limit'=>20))
              ->addColumn('puesto','enum',array('values'=>'administrador, dependiente, mecanico'))
              ->addColumn('password','string',array('limit'=>20))
              ->addColumn('activo','boolean')
              ->create();
    }
}
