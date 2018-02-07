<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bicicleta Controller
 *
 * @property \App\Model\Table\BicicletaTable $Bicicleta
 */
class BicicletaController extends AppController
{
	public $helpers = array('Html', 'Form' );  

	var $paginate = array('limit'=>15,'order'=>array('nombre'));

	public function index()
	{

		$bicicleta = $this->paginate($this->Bicicleta);
		$this->set('bicicleta',$this->Bicicleta->find('all'));
	}
}
