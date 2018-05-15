<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum[]|\Cake\Collection\CollectionInterface $bicicleta
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de bicicletas', 'url' => ['controller' => 'Bicicleta', 'action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="bicicleta index large-12 medium-8 columns content">
    <h3>
        <?= __('Bicicletas') ?>
        <?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>    
    </h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicicleta as $bicicletum): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/bicicleta/view/' +  <?= $bicicletum->id ?>;" >
                <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>            
                <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
                <td><?= h($bicicletum->color) ?></td> 
                <td><?= h($bicicletum->tamano) ?></td>
               <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $bicicletum->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->Link(__('Eliminar'), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Estas seguro que quieres eliminar la bicicleta  {0} del cliente {1}?', $bicicletum->color, $bicicletum->cliente->nombre),'class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </div>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
