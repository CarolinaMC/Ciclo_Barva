<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Boleta Controller
 *
 *
 * @method \App\Model\Entity\Boletum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BoletaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $boleta = $this->paginate($this->Boleta);

        $this->set(compact('boleta'));
    }

    /**
     * View method
     *
     * @param string|null $id Boletum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $boletum = $this->Boleta->get($id, [
            'contain' => ['Cliente', 'Usuario']
        ]);

        $this->set('boletum', $boletum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cliente_id = null, $usuario_id = null)
    {
        $boletum = $this->Boleta->newEntity();
        if(!($cliente_id == null && $usuario_id == null)){
        if ($this->request->is(['post', 'get'])) {

            if($this->request->is('get')){

            $boletum->cliente_id = $cliente_id;
            $boletum->usuario_id = $usuario_id;
            
            }

            else {
                $boletum = $this->Boleta->patchEntity($boletum, $this->request->getData());
            }

            if ($this->Boleta->save($boletum)) {
                $this->Flash->success(__('La boleta a sido creada.'));
                $this->set('boleta', $boletum);

                return $this->redirect( ['controller' => 'boleta', 'action' => 'view',  $boletum->id]);
            }
            $this->Flash->error(__('La boleta no pudo ser creada. Por favor, intente de nuevo.'));
        }

    }
    

         $clientes = $this->Boleta->Cliente->find('all');
        $this->set('cliente',$clientes);
         $this->set('clientes', json_encode($clientes));
        $this->set(compact('boletum'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Boletum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $boletum = $this->Boleta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $boletum = $this->Boleta->patchEntity($boletum, $this->request->getData());
            if ($this->Boleta->save($boletum)) {
                $this->Flash->success(__('The boletum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The boletum could not be saved. Please, try again.'));
        }
        $this->set(compact('boletum'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Boletum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $boletum = $this->Boleta->get($id);
        if ($this->Boleta->delete($boletum)) {
            $this->Flash->success(__('The boletum has been deleted.'));
        } else {
            $this->Flash->error(__('The boletum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

       public function buscar(){

        $buscar = null;
        if(!empty($this->request->query['buscar'])){
            $buscar = $this->request->query['buscar'];
            
            $opciones=array('conditions' => array('Cliente.telefono' => $buscar));
            $clientes = $this->Boleta->Cliente->find('all', $opciones);
            echo($clientes->first()->id);
            
        
                return $this->redirect(['controller' => 'cliente', 'action' => 'view', $clientes->first()->id]); 

    }
}
}
