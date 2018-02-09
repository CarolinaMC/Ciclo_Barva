<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bicicleta Controller
 *
 * @property \App\Model\Table\BicicletaTable $Bicicleta
 *
 * @method \App\Model\Entity\Bicicletum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BicicletaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cliente', 'Marca']
        ];
        $bicicleta = $this->paginate($this->Bicicleta);

        $this->set(compact('bicicleta'));
    }

    /**
     * View method
     *
     * @param string|null $id Bicicletum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bicicletum = $this->Bicicleta->get($id, [
            'contain' => ['Cliente', 'Marca']
        ]);

        $this->set('bicicletum', $bicicletum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bicicletum = $this->Bicicleta->newEntity();
        if ($this->request->is('post')) {
            $bicicletum = $this->Bicicleta->patchEntity($bicicletum, $this->request->getData());
            if ($this->Bicicleta->save($bicicletum)) {
                $this->Flash->success(__('The bicicletum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bicicletum could not be saved. Please, try again.'));
        }
        $cliente = $this->Bicicleta->Cliente->find('list', ['limit' => 200]);
        $marca = $this->Bicicleta->Marca->find('list', ['limit' => 200]);
        $this->set(compact('bicicletum', 'cliente', 'marca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bicicletum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bicicletum = $this->Bicicleta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bicicletum = $this->Bicicleta->patchEntity($bicicletum, $this->request->getData());
            if ($this->Bicicleta->save($bicicletum)) {
                $this->Flash->success(__('The bicicletum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bicicletum could not be saved. Please, try again.'));
        }
        $cliente = $this->Bicicleta->Cliente->find('list', ['limit' => 200]);
        $marca = $this->Bicicleta->Marca->find('list', ['limit' => 200]);
        $this->set(compact('bicicletum', 'cliente', 'marca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bicicletum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bicicletum = $this->Bicicleta->get($id);
        if ($this->Bicicleta->delete($bicicletum)) {
            $this->Flash->success(__('The bicicletum has been deleted.'));
        } else {
            $this->Flash->error(__('The bicicletum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function verBiciCliente($id = null)
    {
        $bicicletum = $this->Bicicleta->get($id, [
            'conditions' => ['cliente_id'=>$this->Auth->cliente($id)]
        ]);

        $this->set('bicicletum', $bicicletum);
    }
}
