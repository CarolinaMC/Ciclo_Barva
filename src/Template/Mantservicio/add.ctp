<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantservicio
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de mantenimiento de servicios', 'url' => ['action' => 'index']],
    ['title' => 'Agregar servicio', 'url' => ['action' => 'add']]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantrepuesto form large-12 medium-8 columns content">
    
    <legend><?= __('Seleccione servicios para mantenimiento') ?></legend>

<?= $this->Html->link(__('Listo'), ['controller' => 'mantenimiento','action' => 'view', $mantenimiento],['class'=>'btn btn-sm btn-info']) ?>

        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
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
