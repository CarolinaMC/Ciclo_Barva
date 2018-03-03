<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicio Controller
 *
 */
class ServicioController extends AppController
{
	public $helpers = array('Html', 'Form' );  

    var $paginate = array('limit'=>5,'order'=>array('descripcion'));
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $servicios = $this->paginate($this->Servicio);
        $this->set('servicio',$servicios);
    }

    /**
     * View method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicio = $this->Servicio->get($id, [
            'contain' => []
        ]);

        $this->set('servicio', $servicio);
        $this->set('_serialize', ['servicio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicio = $this->Servicio->newEntity();
        if ($this->request->is('post')) {
            $servicio = $this->Servicio->patchEntity($servicio, $this->request->getData());
            if ($this->Servicio->save($servicio)) {
                $this->Flash->success(__('El servicio se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            else{
                if(sizeof($servicio)>0)
                    $this->Flash->error(__('El servicio ya existe.'));
                else{
                    $this->Flash->error(__('El servicio no pudo ser guardado. Intente de nuevo.'));
                    }
            }
        }
        $this->set(compact('servicio'));
        $this->set('_serialize', ['servicio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicio = $this->Servicio->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicio = $this->Servicio->patchEntity($servicio, $this->request->getData());
            if ($this->Servicio->save($servicio)) {
                $this->Flash->success(__('El servicio se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El servicio no pudo ser actualizado. Intente de nuevo.'));
        }
        $this->set(compact('servicio'));
        $this->set('_serialize', ['servicio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicio = $this->Servicio->get($id);
        if ($this->Servicio->delete($servicio)) {
            $this->Flash->success(__('El servicio se ha eliminado.'));
        } else {
            $this->Flash->error(__('El servicio no pudo ser eliminado. Intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
