<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Repuesto Controller
 *
 */
class RepuestoController extends AppController
{
	public $helpers = array('Html', 'Form' );  

    var $paginate = array('limit'=>5,'order'=>array('categoria'));
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marca']
        ];
        $repuesto = $this->paginate($this->Repuesto);

        $this->set(compact('repuesto'),$repuesto);
    }

    /**
     * View method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       $repuesto = $this->Repuesto->get($id, [
            'contain' => ['Marca']
        ]);

        $this->set('repuesto', $repuesto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $repuesto = $this->Repuesto->newEntity();
        if ($this->request->is('post')) {
            $repuesto = $this->Repuesto->patchEntity($repuesto, $this->request->getData());
            if ($this->Repuesto->save($repuesto)) {
                $this->Flash->success(__('El repuesto se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
           $this->Flash->error(__('El repuesto no se pudo guardar, intente de nuevo.'));
        }
        $marca = $this->Repuesto->Marca->find('list', ['limit' => 200]);
        $this->set(compact('repuesto', 'marca'));
        }

    /**
     * Edit method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repuesto = $this->Repuesto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repuesto = $this->Repuesto->patchEntity($repuesto, $this->request->getData());
            if ($this->Repuesto->save($repuesto)) {
                $this->Flash->success(__('El repuesto se actualizó correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
             $this->Flash->error(__('El repuesto no se puedo actualizar, intente de nuevo'));
        }
        $marca = $this->Repuesto->Marca->find('list', ['limit' => 200]);
        $this->set(compact('repuesto', 'marca'));
        }


    /**
     * Delete method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repuesto = $this->Repuesto->get($id);
        if ($this->Repuesto->delete($repuesto)) {
            $this->Flash->success(__('El repuesto se ha eliminado.'));
        } else {
            $this->Flash->error(__('El repuesto no pudo ser eliminado. Intente de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
