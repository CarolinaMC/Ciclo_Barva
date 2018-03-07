<?php
use Migrations\AbstractMigration;

class TablaBoleta extends AbstractMigration
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
        $table = $this->table('Boleta');
    $table->addColumn('fecha_entrada','datetime', [
             'default' => null ,
             'null' => false,
            ])
    
          ->addColumn('fecha_salida','datetime', [
            'default' => null ,
            'null' => false,
            ])
    
    ->create();

    $refTable = $this->table('Boleta');
    $refTable->addColumn('cliente_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('cliente_id','Cliente','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))  
            ->addColumn('usuario_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('usuario_id','Usuario','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
    ->update();
    }
}
