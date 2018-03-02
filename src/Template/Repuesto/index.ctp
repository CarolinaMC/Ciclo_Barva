<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto[]|\Cake\Collection\CollectionInterface $repuesto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Repuesto') ?></li>
        <li><?= $this->Html->link(__('Agregar Repuesto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Marca'), ['controller' => 'Marca', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="repuesto index large-9 medium-8 columns content">
    <h3><?= __('Repuesto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuesto as $repuesto): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $repuesto->id ?>;">
                <td><?= $this->Number->format($repuesto->id) ?></td>
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->categoria) ?></td>
                <td><?= h($repuesto->estado) ?></td>
                <td><?= $this->Number->format($repuesto->precio) ?></td>
                <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->id, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $repuesto->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $repuesto->id], ['confirm' => __('Estas seguro que quieres eliminar el repuesto  {0}?', $repuesto->descripcion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
    </div>
</div>
