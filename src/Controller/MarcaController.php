<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marca Controller
 *
 *
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MarcaController extends AppController
{
public $helpers = array('Html', 'Form' );  

    var $paginate = array('limit'=>7,'order'=>array('nombre'));
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['view','index','edit','add'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    
    public function index()
    {
        $marca = $this->paginate($this->Marca,['limit'=>7,'order'=>['Marca.nombre'=>'asc']]);

        $this->set('marca',$marca);
    }

    /**
     * View method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marca = $this->Marca->get($id, [
            'contain' => []
        ]);

        $this->set('marca', $marca);
        $this->set('_serialize', ['marca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marca = $this->Marca->newEntity();
        if ($this->request->is('post')) {
            $marca = $this->Marca->patchEntity($marca, $this->request->getData());
            if ($this->Marca->save($marca)) {
                $this->Flash->success(__('La marca se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                if(sizeof($marca)>0)
                    $this->Flash->error(__('La marca ya existe.'));
                else{
                    $this->Flash->error(__('La marca no pudo ser guardada. Intente de nuevo.'));
                    }
            }
        }
        $this->set(compact('marca'));
        $this->set('_serialize', ['marca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marca = $this->Marca->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marca = $this->Marca->patchEntity($marca, $this->request->getData());
            if ($this->Marca->save($marca)) {
                $this->Flash->success(__('La marca se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La marca no pudo ser actualizada. Intente de nuevo.'));
        }
        $this->set(compact('marca'));
        $this->set('_serialize', ['marca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marca = $this->Marca->get($id);
        if ($this->Marca->delete($marca)) {
            $this->Flash->success(__('La marca se ha eliminado.'));
        } else {
            $this->Flash->error(__('La marca no pudo ser eliminada. Intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function buscar(){
        $buscar = null;
        if(!empty($this->request->query['buscar'])){
            $buscar = $this->request->query['buscar'];
            
            $opciones=array('conditions' => array('Marca.nombre' => $buscar));
            $marcas = $this->Marca->find('all', $opciones);
            
        
                return $this->redirect(array('action' => 'view', $marcas->first()->id)); 

    }
  }

}
