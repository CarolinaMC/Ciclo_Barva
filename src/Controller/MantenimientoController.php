<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mantenimiento Controller
 *
 *
 * @method \App\Model\Entity\Mantenimiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MantenimientoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta']
        ];
        $mantenimiento = $this->paginate($this->Mantenimiento,['order'=>['Mantenimiento.prioridad'=>'asc','Mantenimiento.estado'=>'asc']]);

        $this->set(compact('mantenimiento',$mantenimiento));
    }

    /**
     * View method
     *
     * @param string|null $id Mantenimiento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mantenimiento = $this->Mantenimiento->get($id, [
            'contain' => []
        ]);

        $this->set('mantenimiento', $mantenimiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($boleta_id = null, $cliente_id=null)
    {
        $mantenimiento = $this->Mantenimiento->newEntity();
        if ($this->request->is('post')) {
           $mantenimiento = $this->Mantenimiento->patchEntity($mantenimiento, $this->request->getData());

            if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('El mantenimiento ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El mantenimiento no ha sido guardado, revise los datos e intente de  nuevo.'));
        }
        if(!$cliente_id==null){
        $opci = array('conditions' => array('Bicicleta.cliente_id' => $cliente_id));
        $bicicleta=$this->Mantenimiento->Bicicleta->find('all',array('contain' => 'Marca'),$opci);
    }
    else{
        $bicicleta=$this->Mantenimiento->Bicicleta->find('all',array('contain' => 'Marca'));
       
    }

    $clientes=$this->Mantenimiento->Boleta->find('all',array('contain' => 'Cliente'));
        $this->set('clientes', json_encode($clientes));
        $this->set(compact('mantenimiento'));
        $this->set('bicicletas', json_encode($bicicleta));
        $this->set('boleta_id',$boleta_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mantenimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mantenimiento = $this->Mantenimiento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mantenimiento = $this->Mantenimiento->patchEntity($mantenimiento, $this->request->getData());
            if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('The mantenimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mantenimiento could not be saved. Please, try again.'));
        }
        $this->set(compact('mantenimiento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mantenimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['patch','post','put', 'get','delete']);
        $mantenimiento = $this->Mantenimiento->get($id);
        if ($this->Mantenimiento->delete($mantenimiento)) {
            $this->Flash->success(__('The mantenimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The mantenimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cambiarP($id = null){

        if(!empty($_POST['prioridad'])){
        $mantenimiento = $this->Mantenimiento->get($id);
        $mantenimiento->prioridad = $_POST['prioridad'];

        if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('Se cambio la prioridad exitosamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo cambiar la prioridad. Por favor, intente nuevamente.'));

         return $this->redirect(['action' => 'index']);
    }

    return $this->redirect(['action' => 'index']);

}

 public function cambiarE($id = null){
echo($id);
echo($_POST['estado']);
        if(!empty($_POST['estado'])){
        $mantenimiento = $this->Mantenimiento->get($id);
        $mantenimiento->estado = $_POST['estado'];

        if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('Se cambio el estado exitosamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo cambiar el estado. Por favor, intente nuevamente.'));

         return $this->redirect(['action' => 'index']);
    }

    return $this->redirect(['action' => 'index']);

}

}