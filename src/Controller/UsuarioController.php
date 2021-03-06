<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuario Controller
 *
 */
class UsuarioController extends AppController
{
    public $helpers = array('Html', 'Form' );  

    var $paginate = array('limit'=>7,'order'=>array('nombre'));

    
    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['home','logout'])){
                return true;
            }

        }else if(isset($user['puesto']) and $user['puesto']==='mecanico'){
            if(in_array($this->request->action, ['home','logout'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    

	public function login(){
        if($this->request->is('post')){
            $usuario=$this->Auth->identify();
            if($usuario){
                $this->Auth->setUser($usuario);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else{
                $this->Flash->error('Datos son incorrectos', ['key'=>'auth']);
            }

        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    
    public function home()
    {
        $this->render();
    }

    public function index()
    {
        $usuarios = $this->paginate($this->Usuario,['order'=>['Usuario.nombre'=>'asc']]);
        $this->set('usuario',$usuarios);
         $this->set('usuarios', json_encode($usuarios));
    }

    public function add()
    {
        $usuario = $this->Usuario->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());
    
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('El usuario se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                if(sizeof($usuario)>0)
                    $this->Flash->error(__('El usuario ya existe .'));
                else{
                    $this->Flash->error(__('El usuario no pudo ser guardado. Intente de nuevo.'));
                    }
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }


     public function view($id = null){
    
        $usuario = $this->Usuario->get($id, [
            'contain' => []
        ]);

        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }


    public function edit($id = null)
    {
        $usuario = $this->Usuario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuario->patchEntity($usuario, $this->request->getData());
            if ($this->Usuario->save($usuario)) {
                $this->Flash->success(__('El usuario se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no pudo ser actualizado. Intente de nuevo.'));
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['patch','post', 'delete', 'put', 'get']);
        $usuario = $this->Usuario->get($id);
        if ($this->Usuario->delete($usuario)) {
            $this->Flash->success(__('El usuario se ha eliminado.'));
        } else {
            $this->Flash->error(__('El usuario no pudo ser eliminado. Intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
        
    }
    
    public function buscar(){
        
        $buscar = null;
        if(!empty($this->request->query['buscar'])){
            $buscar = $this->request->query['buscar'];
             $porciones = explode(" ", $buscar);
            $opciones=array('conditions' => array('Usuario.cedula' => $porciones[0]));
            $usuarios = $this->Usuario->find('all', $opciones);
            
        if(!empty($usuarios->first())){
                return $this->redirect(array('action' => 'view', $usuarios->first()->id));
                }
                else{
                    //return $this->redirect(array('action' => 'view', $clientes->first()->id));
                    $this->Flash->error(__('Valor no enconcontrado. Intente de nuevo.'));
                    return $this->redirect(array('action' => 'index'));
                }  
        }
    }


	
}
