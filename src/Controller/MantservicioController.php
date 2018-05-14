<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mantservicio Controller
 *
 * @property \App\Model\Table\MantservicioTable $Mantservicio
 *
 * @method \App\Model\Entity\Mantservicio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MantservicioController extends AppController
{

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

        }else if(isset($user['puesto']) and $user['puesto']==='mecanico'){
            if(in_array($this->request->action, ['view','index','edit','add'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Servicio', 'Mantenimiento']
        ];
        $mantservicio = $this->paginate($this->Mantservicio);

        $this->set(compact('mantservicio'));
    }

    /**
     * View method
     *
     * @param string|null $id Mantservicio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mantservicio = $this->Mantservicio->get($id, [
            'contain' => ['Servicio', 'Mantenimiento']
        ]);

        $this->set('mantservicio', $mantservicio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($mantenimiento_id = null, $bici_id = null)
    {
        $mantservicio = $this->Mantservicio->newEntity();
        if(!$mantenimiento_id == null){
            if ($this->request->is(['post'])) {
                    $mantservicio = $this->Mantservicio->patchEntity($mantservicio, $this->request->getData());
                    $mantservicio->mantenimiento_id = $mantenimiento_id;
                    $mantservicio->servicio_id = $_POST['servicio'];
                if ($this->Mantservicio->save($mantservicio)) {
                    $this->Flash->success(__('La seleccion fue exitosa.'));
                     $this->set('mantservicio', $mantservicio);

                    //return $this->redirect(['controller' => 'mantservicio', 'action' => 'add', $mantenimiento_id]);
                }
                else{
                $this->Flash->error(__('La seleccion no pudo ser procesada.Por favor intente de nuevo.'));
            }
            }
        }
        $servicios = $this->Mantservicio->Servicio->find('all');
       // $mantenimiento = $this->Mantrepuesto->Mantenimiento->find('all');

        $this->set(compact('mantservicio'));
        $this->set('mantenimiento', $mantenimiento_id);
        $this->set('servicios',$servicios);
        $this->set('bici_id',$bici_id);

    }

    /**
     * Edit method
     *
     * @param string|null $id Mantservicio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mantservicio = $this->Mantservicio->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mantservicio = $this->Mantservicio->patchEntity($mantservicio, $this->request->getData());
            if ($this->Mantservicio->save($mantservicio)) {
                $this->Flash->success(__('The mantservicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mantservicio could not be saved. Please, try again.'));
        }
        $servicio = $this->Mantservicio->Servicio->find('list', ['limit' => 200]);
        $mantenimiento = $this->Mantservicio->Mantenimiento->find('list', ['limit' => 200]);
        $this->set(compact('mantservicio', 'servicio', 'mantenimiento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mantservicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mantservicio = $this->Mantservicio->get($id);
        if ($this->Mantservicio->delete($mantservicio)) {
            $this->Flash->success(__('The mantservicio has been deleted.'));
        } else {
            $this->Flash->error(__('The mantservicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}


