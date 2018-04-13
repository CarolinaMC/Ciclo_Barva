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

    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['add','edit','view','index'])){
                return true;
            }

        }else if(isset($user['puesto']) and $user['puesto']==='mecanico'){
            if(in_array($this->request->action, ['add','edit','view','index'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    

    public function index()
    {
        $this->paginate = [
            'contain' => ['Cliente', 'Marca']
        ];
        $bicicleta = $this->paginate($this->Bicicleta);

        $this->set(compact('bicicleta',$bicicleta));
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
            $bici_json = json_decode(json_encode($this->request->getData()));

            $opc = array('conditions' => array('Cliente.telefono' => $bici_json->cliente_id));
            $clientes = $this->Bicicleta->Cliente->find('all', $opc);

            $opciones = array('conditions' => array('Marca.nombre' => $bici_json->marca_id));
            $marcas = $this->Bicicleta->Marca->find('all', $opciones);


            $bicicletum->cliente_id = $clientes->first()->id;
            $bicicletum->marca_id = $marcas->first()->id;
            $bicicletum->marca_nombre = $marcas->first()->nombre;

            
            if ($this->Bicicleta->save($bicicletum)) {
                $this->Flash->success(__('La bicicleta a sido guardada exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La bicicleta no pudo ser guardada. Por favor intente de nuevo.'));
        }
        $cliente = $this->Bicicleta->Cliente->find('all');
        $marca = $this->Bicicleta->Marca->find('all');
        $this->set(compact('bicicletum', 'cliente', 'marca'));
        $this->set('clientes', json_encode($cliente));
        $this->set('marcas', json_encode($marca));
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
        $this->request->allowMethod(['patch', 'post', 'put', 'get', 'delete']);
        $bicicletum = $this->Bicicleta->get($id);
        if ($this->Bicicleta->delete($bicicletum)) {
            $this->Flash->success(__('La bicicleta a sido borrada exitosamente'));
        } else {
            $this->Flash->error(__('No se a podido borrar la bicicleta. Por favor, intente de nuevo.'));
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
