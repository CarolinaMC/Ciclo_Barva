<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mantrepuesto Controller
 *
 * @property \App\Model\Table\MantrepuestoTable $Mantrepuesto
 *
 * @method \App\Model\Entity\Mantrepuesto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MantrepuestoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
       $this->paginate = [
            'contain' => ['Repuesto', 'Mantenimiento']
        ];
        $mantrepuesto = $this->paginate($this->Mantrepuesto);

        $this->set(compact('mantrepuesto',$mantrepuesto));
    }

    /**
     * View method
     *
     * @param string|null $id Mantrepuesto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mantrepuesto = $this->Mantrepuesto->get($id, [
            'contain' => ['Repuesto', 'Mantenimiento']
        ]);

        $this->set('mantrepuesto', $mantrepuesto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   public function add($mantenimiento_id=null)
    {
        $mantrepuesto = $this->Mantrepuesto->newEntity();
            if ($this->request->is(['post','get'])) {
                    $mantrepuesto = $this->Mantrepuesto->patchEntity($mantrepuesto, $this->request->getData());

                if ($this->Mantrepuesto->save($mantrepuesto)) {
                    $this->Flash->success(__('La solicitud fue exitosa.'));
                     $this->set('mantrepuesto', $mantrepuesto);

                    return $this->redirect(['controller' => 'mantenimiento', 'action' => 'index']);
                }
                $this->Flash->error(__('La solicitud no pudo ser procesada.Por favor intente de nuevo.'));
            }
        $repuesto = $this->Mantrepuesto->Repuesto->find('all');
       // $mantenimiento = $this->Mantrepuesto->Mantenimiento->find('all');
        $this->set(compact('mantrepuesto'));
        $this->set('mantenimiento', $mantenimiento_id);
        $this->set('repuesto',$repuesto);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mantrepuesto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mantrepuesto = $this->Mantrepuesto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mantrepuesto = $this->Mantrepuesto->patchEntity($mantrepuesto, $this->request->getData());
            if ($this->Mantrepuesto->save($mantrepuesto)) {
                $this->Flash->success(__('The mantrepuesto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mantrepuesto could not be saved. Please, try again.'));
        }
        $repuesto = $this->Mantrepuesto->Repuesto->find('list', ['limit' => 200]);
        $mantenimiento = $this->Mantrepuesto->Mantenimiento->find('list', ['limit' => 200]);
        $this->set(compact('mantrepuesto', 'repuesto', 'mantenimiento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mantrepuesto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mantrepuesto = $this->Mantrepuesto->get($id);
        if ($this->Mantrepuesto->delete($mantrepuesto)) {
            $this->Flash->success(__('The mantrepuesto has been deleted.'));
        } else {
            $this->Flash->error(__('The mantrepuesto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
