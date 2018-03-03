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
            'values'=>'entrante, espera, reparando, reparada,entregada'
            ])
            ->addColumn('faltante_rep','enum',[
            'values'=>'Si, No'
            ])
            ->addColumn('descripcion','text', [
            'default' => null ,
            'null' => false,
            ])

    ->create();

    $refTable = $this->table('Mantenimiento');
    $refTable->addColumn('bicicleta_id', 'integer',array('signed' => 'disable'))
            ->addForeignKey('bicicleta_id','Bicicleta','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))  

            /*->addColumn('servicio_id', 'array',array('signed' => 'disable'))
            ->addForeignKey('servicio_id','Servicio','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))

            ->addColumn('repuesto_id', 'array',array('signed' => 'disable'))
            ->addForeignKey('repuesto_id','Repuesto','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
            */
    ->update();
    }
}
