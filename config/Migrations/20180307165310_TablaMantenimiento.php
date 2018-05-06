<?php
use Migrations\AbstractMigration;

class TablaMantenimiento extends AbstractMigration
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
    $table = $this->table('Mantenimiento');
    $table->addColumn('garantia','enum',[
            'values'=>'Aplica, No aplica'
            ])
            ->addColumn('prioridad','enum',[
            'values'=>'1,2,3,4'
            ])
            ->addColumn('estado','enum',[
            'values'=>'espera, reparando, reparada, entregada'
            ])
            ->addColumn('descripcion','text', [
            'default' => null ,
            'null' => false,
            ])
            ->addColumn('manoObra','float', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ])

    ->create();

    $refTable = $this->table('Mantenimiento');
    $refTable->addColumn('bicicleta_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('bicicleta_id','Bicicleta','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))  
            ->addColumn('boleta_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('boleta_id','Boleta','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
    ->update();
    }
}
