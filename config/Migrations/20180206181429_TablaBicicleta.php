<?php
use Migrations\AbstractMigration;

class TablaBicicleta extends AbstractMigration
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
        $table = $this->table('Bicicleta');
        $table->addColumn('tamano','string', [
            'default' => null ,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('color','string', [
            'default' => null ,
            'limit' => 150,
            'null' => false,
        ])
        ->addColumn('descripcion','text', [
            'default' => null ,
            'null' => false,
        ])        
        ->create();

        $refTable = $this->table('Bicicleta');
        $refTable->addColumn('cliente_id','integer',array('signed' => 'disable'))
                 ->addForeignKey('cliente_id', 'Cliente','id',array('delete' => 'CASCADE','update' => 'NO_ACTION'))

                 ->addColumn('marca_id', 'integer',array('signed' => 'disable'))
                 ->addForeignKey('marca_id','Marca','id',array('delete' => 'CASCADE','update' =>'NO_ACTION'))
                 
                 ->update();
    }
}
