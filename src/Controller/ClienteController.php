<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cliente Controller
 *
 */
class ClienteController extends AppController
{
	public $helpers = array('Html', 'Form' );  

	public function index()
	{
		$this->set('cliente',$this->Cliente->find('all'));
	}

	/**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

	public function view($id = null){
        $cliente = $this->Cliente->get($id, [
            'contain' => []
        ]);

        $this->set('cliente', $cliente);
        $this->set('_serialize', ['cliente']);
    }
}
