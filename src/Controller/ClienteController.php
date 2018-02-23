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

    var $paginate = array('limit'=>5,'order'=>array('nombre'));

    public function index()
    {
        $cliente = $this->paginate($this->Cliente);
        $clientes = $this->Cliente->find('all');
        $this->set('cliente',$clientes);
         $this->set('clientes', json_encode($clientes));
    }

    public function view($id = null){
    
        $cliente = $this->Cliente->get($id, [
            'contain' => []
        ]);

        $this->set('cliente', $cliente);
        $this->set('_serialize', ['cliente']);
    }

    public function add()
    {
        $cliente = $this->Cliente->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
    
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('El cliente se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                if(sizeof($cliente)>0)
                    $this->Flash->error(__('El cliente ya existe .'));
                else{
                    $this->Flash->error(__('El cliente no pudo ser guardado. Intente de nuevo.'));
                    }
            }
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    public function edit($id = null)
    {
        $cliente = $this->Cliente->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Cliente->patchEntity($cliente, $this->request->getData());
            if ($this->Cliente->save($cliente)) {
                $this->Flash->success(__('El cliente se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El cliente no pudo ser actualizado. Intente de nuevo.'));
        }
        $this->set(compact('cliente'));
        $this->set('_serialize', ['cliente']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Cliente->get($id);
        if ($this->Cliente->delete($cliente)) {
            $this->Flash->success(__('El cliente se ha eliminado.'));
        } else {
            $this->Flash->error(__('El cliente no pudo ser eliminado. Intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
        
    }


    public function buscar(){
        
        $buscar = null;
        if(!empty($this->request->query['buscar'])){
            $buscar = $this->request->query['buscar'];
            
            $opciones=array('conditions' => array('Cliente.telefono' => $buscar));
            $clientes = $this->Cliente->find('all', $opciones);
            
        
                return $this->redirect(array('action' => 'view', $clientes->first()->id)); 

    }
}

}
