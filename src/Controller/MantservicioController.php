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
    public function add()
    {
        $mantservicio = $this->Mantservicio->newEntity();
        if ($this->request->is('post')) {
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
