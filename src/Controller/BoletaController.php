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
    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['add','edit','view','index'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuario', 'Cliente']
        ];

         $boleta = $this->paginate($this->Boleta,['limit'=>7,'order'=>['Boleta.id'=>'asc']]);


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
            'contain' => ['Cliente', 'Usuario', 'Mantenimiento']
        ]);

        $this->set('boletum', $boletum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($nombre = null, $cliente_id = null, $usuario_id = null)
    {
        $this->loadModel('Cliente');
        $cliente = $this->paginate($this->Cliente,['limit'=>3]);


        $boletum = $this->Boleta->newEntity();
        if(!($cliente_id == null && $usuario_id == null)){
        if ($this->request->is(['post', 'get'])) {
             $boletum->fecha_entrada = date('d-m-y');
            if($this->request->is('get')){

            $boletum->cliente_id = $cliente_id;
            $boletum->usuario_id = $usuario_id;
            echo($boletum);
            echo($boletum->cliente_id);
            }

            else {
                $boletum = $this->Boleta->patchEntity($boletum, $this->request->getData());
            }

            if ($this->Boleta->save($boletum)) {
                $this->Flash->success(__('La boleta a sido creada.'));
                $this->set('boleta', $boletum);

                return $this->redirect( ['controller' => 'boleta', 'action' => 'view',  $boletum->id, $boletum->id]);
            }
            $this->Flash->error(__('La boleta no pudo ser creada. Por favor, intente de nuevo.'));
        }

    }
    

         $clientes = $this->paginate($this->Boleta->Cliente->find('all'),['order'=>['nombre','primer_ape','segundo_ape']]);
        $this->set('cliente',$clientes);
         $this->set('clientes', json_encode($clientes));
        $this->set(compact('boletum'));
        $this->set('nombre', $nombre);
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
        $this->request->allowMethod(['patch', 'post', 'put', 'get', 'delete']);
        $boletum = $this->Boleta->get($id);
        if ($this->Boleta->delete($boletum)) {
            $this->Flash->success(__('La boleta a sido borrada exitosamente.'));
        } else {
            $this->Flash->error(__('No se pudo borrar la boleta. Por favor trate de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

        public function buscar(){

        $buscar = null;
        if(!empty($this->request->query['buscar'])){
            $buscar = $this->request->query['buscar'];
            $porciones = explode(" ", $buscar);
            $opciones=array('conditions' => array('Cliente.telefono' => $porciones[0]));
            //echo($porciones[0]);
            $clientes = $this->Boleta->Cliente->find('all', $opciones);
            
        if(!empty($clientes->first()->id)){
                return $this->redirect(array('controller' => 'cliente','action' => 'view', $clientes->first()->id));
                }
                else{
                    //return $this->redirect(array('action' => 'view', $clientes->first()->id));
                    $this->Flash->error(__('Valor no enconcontrado. Intente de nuevo.'));
                    return $this->redirect(array('action' => 'index'));
                } 

    }
}

      public function asinarFechaEntrega($id = null){
//echo($_POST['fecha_salida']);
//echo("si entro");
        if(!empty($_POST['fecha_salida'])){
        $boleta = $this->Boleta->get($id);
        $boleta->fecha_salida = $_POST['fecha_salida'];

        if ($this->Boleta->save($boleta)) {
                $this->Flash->success(__('Se asigno corretamente la fecha'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('No se pudo asinar la fecha de entrega. Por favor, intente nuevamente.'));

         return $this->redirect(['action' => 'view',  $id]);
    }

    return $this->redirect(['action' => 'view',  $id]);

}
}
