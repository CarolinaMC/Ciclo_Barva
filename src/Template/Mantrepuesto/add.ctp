<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Mantenimiento', 'url' => ['controller' => 'Mantenimiento','action' => 'view',$mantrepuesto->mantenimiento_id]],
    ['title' => 'Agregar repuesto al mantenimiento', 'url' => ['action' => 'add',]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantrepuesto form large-12 medium-8 columns content">
    
    <legend><?= __('Seleccione la categoría del repuestos para mantenimiento') ?></legend>
 
<div class="form-group">
    <table class ="" cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Form->control('categoria', ['label' =>false,'id'=>'categoria','options' => ['Frenos' =>'Frenos', 'Marco' =>'Marco','Trasmisiones' =>'Trasmisiones','Aros' =>'Aros', 'Neumáticos' =>'Neumáticos','Otros' =>'Otros','Todas' =>'Todas' ]]);?></th>
        <th><button type='button' class='fa fa-search btn btn-lg btn-primary' onclick="buscarCategoria('<?php echo($mantenimiento) ?>')" > </button> </th>
    </tr>
    </table>
</div>
    
    <?= $this->Html->link(__(' Regresar a mantenimiento'), ['controller' => 'mantenimiento','action' => 'view', $mantenimiento],['class'=>' fa fa-check-square-o btn btn-lg btn-info']) ?>
<br><br>
        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
                
                <th scope="col" class="actions"><?= __('Seleccione') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuestos as $repuesto): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $repuesto->id ?>;">
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->categoria) ?></td>
                <td><?= h($repuesto->estado) ?></td>
                <td><?= $this->Number->format($repuesto->precio) ?></td>
                <td><?= $repuesto->has('marca') ? $this->Html->link(h($repuesto->marca_nombre), ['controller' => 'Marca', 'action' => 'view', h($repuesto->marca_id)]) : '' ?></td>
                
                <td class="actions">
                    <?= $this->Form->create($mantrepuesto, array('type' => 'POST',  'url' => ['action' => 'add', $mantenimiento, 'Todas'])) ?>
                    <?= $this->Form->control('repuesto',array('label'=> false , 'name'=> 'repuesto', 'type'=>'checkbox', 'value' => $repuesto->id, 'onclick' => "this.form.submit()")); ?>
                <?= $this->Form->end(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< ' . __('')) ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>''] ) ?>
            <?= $this->Paginator->next(__('') . ' >') ?>
        </div>
    </div>
</div>


