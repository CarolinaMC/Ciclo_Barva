<?php
use Migrations\AbstractMigration;

class TablaRepuesto extends AbstractMigration
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
        $table = $this->table('Repuesto');
        $table->addColumn('descripcion','string', [
            'default' => null ,
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('categoria','string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('estado','enum',[
            'values'=>'Disponible, Agotado'
        ])
        ->addColumn('precio','float', [
            'default' => null,
            'limit' => 30,
            'null' => false,
        ])

        ->create();

        $refTable = $this->table('Repuesto');
        $refTable->addColumn('marca_id', 'integer')
                 ->addForeignKey('marca_id','Marca','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))

                  ->addColumn('marca_nombre', 'string',array('signed' => 'disable'))
                 // ->addForeignKey('marca_nombre','Marca','nombre',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
                 
        ->update();
    }
}
