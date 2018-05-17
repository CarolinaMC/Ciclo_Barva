<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantservicio
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
   ['title' => 'Mantenimiento', 'url' => ['controller' => 'Mantenimiento','action' => 'view',$mantenimiento]],
    ['title' => 'Agregar servicio al mantenimiento', 'url' => ['action' => 'add',$mantenimiento]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);


echo $this->Breadcrumbs->render();
    ?>
</div>
<div>
    
    <legend><?= __('Seleccione servicios para mantenimiento') ?></legend>
<h4></h4>
<?= $this->Html->link(__('Regresar a mantenimiento'), ['controller' => 'mantenimiento','action' => 'view', $mantenimiento],['class'=>'fa fa-check-square-o btn btn-lg btn-info']) ?>
<br><br>
        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                
                <th scope="col" class="actions"><?= __('Seleccione') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $servicio->id ?>;">
                <td><?= h($servicio->descripcion) ?></td>
                <td><?= $this->Number->format($servicio->precio) ?></td>
                <td class="actions">
                    <?= $this->Form->create($mantservicio, array('type' => 'POST',  'url' => ['action' => 'add', $mantenimiento])) ?>
                    <?= $this->Form->control('servicio',array('label'=> false , 'name'=> 'servicio', 'type'=>'checkbox', 'value' => $servicio->id, 'onclick' => "this.form.submit()")); ?>
                <?= $this->Form->end(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
