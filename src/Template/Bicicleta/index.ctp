<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum[]|\Cake\Collection\CollectionInterface $bicicleta
 */
?>
<<<<<<< HEAD
=======
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Bicicleta') ?></li>
        <li><?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Marca'), ['controller' => 'Marca', 'action' => 'index']) ?></li>
    </ul>
</nav>
>>>>>>> afcf1d5a782b2c177ae46e4e201226521cc7662b
<div class="bicicleta index large-9 medium-8 columns content">
    <h3>
        <?= __('Bicicletas') ?>
        <?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'add']) ?>    
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicicleta as $bicicletum): ?>
            <tr>
                <td><?= h($bicicletum->tamano) ?></td>
                <td><?= h($bicicletum->color) ?></td>
                <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->id, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
                <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->id, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
               <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $bicicletum->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $bicicletum->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Estas seguro que quieres eliminar la bicicleta  {0}?', $bicicletum->color)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
