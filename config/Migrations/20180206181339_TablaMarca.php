<?php
use Migrations\AbstractMigration;

class TablaMarca extends AbstractMigration
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
        $table = $this->table('Marca');
        $table->addColumn('nombre','string', [
            'default' => null ,
            'limit' => 150,
            'null' => false,
        ])
        ->addColumn('tipo','enum',[
            'values'=>'ambos, marco, repuesto'
        ])
        ->create();
    }
}
