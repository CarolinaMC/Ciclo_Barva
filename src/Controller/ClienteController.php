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

    var $paginate = array('limit'=>7,'order'=>array('nombre'));


    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['add','edit','view','index'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    
    public function index()
    {
        $clientes = $this->paginate($this->Cliente,['order'=>['Cliente.nombre'=>'asc']]);
        $this->set('cliente',$clientes);
         $this->set('clientes', json_encode($clientes));
    }

    public function view($id = null){
    
        $cliente = $this->Cliente->get($id, [
            'contain' => ['Bicicleta']
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
        
        $this->request->allowMethod(['patch', 'post', 'put', 'get', 'delete']);
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
            $porciones = explode(" ", $buscar);
            $opciones=array('conditions' => array('Cliente.telefono' => $porciones[0]));
            //echo($porciones[0]);
            $clientes = $this->Cliente->find('all', $opciones);
            
        if(!empty($clientes->first())){
                return $this->redirect(array('action' => 'view', $clientes->first()->id));
                }
                else{
                    //return $this->redirect(array('action' => 'view', $clientes->first()->id));
                    $this->Flash->error(__('Valor no enconcontrado. Intente de nuevo.'));
                    return $this->redirect(array('action' => 'index'));
                } 

    }
}

}
