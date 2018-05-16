<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum[]|\Cake\Collection\CollectionInterface $boleta
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);
echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="boleta index large-12 medium-8 columns content">
    <h3><?= __('Boleta') ?></h3>
    <h4></h4>
    <?= $this->Html->link(__(' Agregar boleta'), ['action' => 'add'],['class'=>'fa fa-plus btn btn-lg btn-success']) ?>  
         <?= $this->Form->end(); ?>
    <div><br></div>  
<div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr >
                 <th scope="col"><?= $this->Paginator->sort('# Boleta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fecha de registro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_salida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boleta as $boletum): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/boleta/view/' +  <?= $boletum->id ?>;">
                 <td><?= h($boletum->id)?></td>
                <td><?= h($boletum->fecha_entrada) ?></td>
                <td><?= h($boletum->fecha_salida) ?></td>
                <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
                <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->nombre, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
                <td class="actions">
                
                    <?= $this->html->Link(__(''), ['action' => 'delete', $boletum->id], ['confirm' => __('Estas seguro que quieres eliminar la boleta numero  {0}?', $boletum->nombre),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>
                </td>
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
