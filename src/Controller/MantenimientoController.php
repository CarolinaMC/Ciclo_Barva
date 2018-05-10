<?php
namespace App\Controller;

use App\Controller\AppController;

?>
<? Use src\Template\Element\Flash\success.ctp;?>
<?php

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
    public function isAuthorized($user){
        if(isset($user['puesto']) and $user['puesto']==='dependiente'){
            if(in_array($this->request->action, ['view','index','add','edit'])){
                return true;
            }

        }else if(isset($user['puesto']) and $user['puesto']==='mecanico'){
            if(in_array($this->request->action, ['view','index','add','edit'])){
                return true;
            }

        }
        return parent::isAuthorized($user);
    }
    
    
public function vistaPorBicicleta($id=null){

     $mantenimiento = $this->Mantenimiento->get($id, [
             'contain' => []
        ]);

            $mantenimiento = $this->Mantenimiento->find('all')
            ->select(['id'])
            ->select(['garantia'])
            ->select(['prioridad'])
            ->select(['estado'])
            ->select(['descripcion'])
            ->select(['bicicleta_id'])
            ->from(['Bicicleta'])
            ->from(['Mantenimiento'])
            ->where('Mantenimiento.bicicleta_id ='.$id);


         $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta']
        ];
       
        $this->set(compact('mantenimiento',$mantenimiento));

}

    
    public function vistaPorCliente($id=null){

        $mantenimiento = $this->Mantenimiento->get($id, [
             'contain' => []
        ]);

            $mantenimiento = $this->Mantenimiento->find('all')
            ->select(['id'])
            ->select(['garantia'])
            ->select(['prioridad'])
            ->select(['estado'])
            ->select(['descripcion'])
            ->select(['bicicleta_id'])
            ->select(['boleta_id'])
            ->from(['Boleta'])
            ->from(['Mantenimiento'])
            ->where('Mantenimiento.boleta_id = Boleta.id')
            ->where('Boleta.cliente_id='.$id);


         $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta']
        ];
        
        
        $this->set(compact('mantenimiento',$mantenimiento));
}

    public function index()
    {
        $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta']
        ];
        $mantenimiento = $this->paginate($this->Mantenimiento,['order'=>['Mantenimiento.prioridad'=>'asc','Mantenimiento.estado'=>'asc']]);

        $this->set(compact('mantenimiento',$mantenimiento));

        foreach ($mantenimiento as $mantenimiento):


            $fecha_actual = date("n/j/y",time());

            $fecha_entrada = substr($mantenimiento->boletum->fecha_salida, 0, -9);

            if($fecha_actual == $fecha_entrada){$this->Flash->success('La bicicleta '.$mantenimiento->bicicletum->marca_nombre." ".$mantenimiento->bicicletum->color." ".$mantenimiento->bicicletum->tamano.' se debe entregar hoy.');}
            
        endforeach;

    }

    public function mechanic(){
        $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta'],
            'conditions'=> ['estado !=' => 'entregada']
        ];
        $mantenimiento = $this->paginate($this->Mantenimiento,['order'=>['Mantenimiento.prioridad'=>'asc','Mantenimiento.estado'=>'asc']]);

        $this->set(compact('mantenimiento',$mantenimiento));

        foreach ($mantenimiento as $mantenimiento):

            $fecha_actual = date("n/j/y",time());

            $fecha_entrada = substr($mantenimiento->boletum->fecha_salida, 0, -10);

            if($fecha_actual == $fecha_entrada){$this->Flash->success('La bicicleta color '.$mantenimiento->bicicletum->color.' se debe entregar hoy.');}

        endforeach;
    }

    public function delivered(){
        $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta'],
            'conditions'=> ['estado' => 'entregada']
        ];
        $mantenimiento = $this->paginate($this->Mantenimiento,['order'=>['Mantenimiento.prioridad'=>'asc','Mantenimiento.estado'=>'asc']]);

        $this->set(compact('mantenimiento',$mantenimiento));
    }

    public function repaired(){
        $this->paginate = [
            'contain' => ['Bicicleta', 'Boleta'],
            'conditions'=> ['estado' => 'Reparada']
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
        
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Mantenimiento#_' . $id . '.pdf'
            ]
        ]);

        $this->loadModel('Mantrepuesto'); 
            $repuestos = $this->Mantrepuesto->Repuesto->find('all')
            ->select(['descripcion'])
            ->select(['precio'])
            ->select(['mantrepuesto.id'])
            ->join([
                            'table' => 'mantrepuesto',
                            'alias' => 'mantrepuesto',
                            'conditions' => ['mantrepuesto.mantenimiento_id' => $id ,'mantrepuesto.repuesto_id = repuesto.id']
                          ]);

            $this->loadModel('Mantservicio'); 
            $servicios = $this->Mantservicio->Servicio->find('all')
            ->select(['descripcion'])
            ->select(['precio'])
            ->select(['mantservicio.id'])
            ->join([
                            'table' => 'mantservicio',
                            'alias' => 'mantservicio',
                            'conditions' => ['mantservicio.mantenimiento_id' => $id ,'mantservicio.servicio_id = servicio.id']
                          ]);
       // $this->set('mantenimiento', $mantenimiento);
            //echo($repuestos);
            //echo($repuestos->first()->mantrepuesto['id']);
        $this->set(compact('mantenimiento',$mantenimiento));
        $this->set(compact('repuestos',$repuestos));
        $this->set(compact('servicios',$servicios));
        
    }

    public function cambDescripcion($id = null){
        if(!empty($_POST['descripcion'])){
        $mantenimiento = $this->Mantenimiento->get($id);
        $mantenimiento->descripcion = $_POST['descripcion'];

        if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('Se agredaron las anotaciones exitosamente'));

                return $this->redirect(['action' => 'view', $mantenimiento->id]);
            }
            $this->Flash->error(__('No se pudo cambiar la prioridad. Por favor, intente nuevamente.'));

         return $this->redirect(['action' => 'view', $mantenimiento->id]);
    }

    return $this->redirect(['action' => 'view', $mantenimiento->id]);

}


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cliente_nombre = null, $boleta_id = null, $cliente_id=null)
    {
        $mantenimiento = $this->Mantenimiento->newEntity();
        if ($this->request->is('post')) {
           $mantenimiento = $this->Mantenimiento->patchEntity($mantenimiento, $this->request->getData());

           $porciones = explode(" ", $_POST['bicicleta_id']);
           $mantenimiento->bicicleta_id = $porciones[0];
            
            if ($this->Mantenimiento->save($mantenimiento)) {
                $this->Flash->success(__('El mantenimiento ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El mantenimiento no ha sido guardado, revise los datos e intente de  nuevo.'));
        }
        if(!$cliente_id==null){
            
        $opci = array('conditions' => array('Bicicleta.cliente_id' => $cliente_id));
        $bicicleta=$this->Mantenimiento->Bicicleta->find('all',$opci);
    }
    else{

        $bicicleta=$this->Mantenimiento->Bicicleta->find('all',array('contain' => 'Marca'));
       
    }

    $clientes=$this->Mantenimiento->Boleta->find('all',array('contain' => 'Cliente'));
        $this->set('clientes', json_encode($clientes));
        $this->set(compact('mantenimiento'));
        $this->set('bicicletas', json_encode($bicicleta));
        $this->set('boleta_id',$boleta_id);
        $this->set('nombre',$cliente_nombre);
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