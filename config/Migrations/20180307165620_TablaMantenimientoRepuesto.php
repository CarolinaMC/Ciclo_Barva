<?php
use Migrations\AbstractMigration;

class TablaMantenimientoRepuesto extends AbstractMigration
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
        $table = $this->table('MantRepuesto');
    $table->addColumn('fecha','datetime', [
             'default' => null ,
             'null' => false,
            ])
    ->create();

    $refTable = $this->table('MantRepuesto');
    $refTable->addColumn('repuesto_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('repuesto_id','Repuesto','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))  
            ->addColumn('mantenimiento_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('mantenimiento_id','Mantenimiento','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
    ->update();
    }
}
