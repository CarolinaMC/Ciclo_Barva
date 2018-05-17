<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento[]|\Cake\Collection\CollectionInterface $mantenimiento
 */
?>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de mantenimientos', 'url' => ['action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>

<div class="mantenimiento index large-12 medium-8 columns content">
    <h3><?= __('Mantenimientos') ?></h3>
    <h4></h4>
    
        <?= $this->Html->link(__('Agregar Mantenimiento'), ['action' => 'add'],['class'=>'  fa fa-wrench btn btn-lg btn-success']) ?>
    
     <div><br></div>
     <div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('garantía') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioridad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bicicleta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_id') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $mantenimiento): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/mantenimiento/view/' +  <?= $mantenimiento->id ?>;">
                <td><?= h($mantenimiento->garantia) ?></td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarP', $mantenimiento->id])) ?>

                <?= $this->Form->control('prioridad',array('label'=> false , 'name'=> 'prioridad', 'onchange' => "this.form.submit()", 'options'=>array(
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                ))); ?>
                <?= $this->Form->end(); ?>
                </td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarE', $mantenimiento->id])) ?>
              <?php      
                 echo $this->Form->control('estado',array('label'=> false , 'name'=> 'estado', 'onchange' => "this.form.submit()",'options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                ))); ?>
                <?= $this->Form->end(); ?>
                </td>
                <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->marca_nombre . "  "  . $mantenimiento->bicicletum->color . "  " . $mantenimiento->bicicletum->tamano, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
                <td><?= $mantenimiento->has('boletum') ? $this->Html->link($mantenimiento->boletum->id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boletum->id]) : '' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
   <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('>') ?>     
        </div>
    </div>
</div>

<?php function prioridad($pri){
    if($pri==1){
        return 'Urgente';
    }
    elseif ($pri==2) {
        return 'Alta';
    }
    elseif ($pri==3){ 
        return 'Media';
    }
    else{
        return 'Baja';
    }
}


 /*   function cambiarPriori($id){
    
        /*return location.href = '/Ciclo_Barva/mantenimiento/cambiar_Prioridad/' + '<?php $mantenimiento->boletum->id ?> + '/' + $('.priori').val() ;
        alert(id);
        alert($('.priori').val() )
        

        echo($id);
}
*/
?>