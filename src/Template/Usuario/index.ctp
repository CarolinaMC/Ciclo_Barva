<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Usuario') ?></li>
        <li><?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuario index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cedula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario): ?>
            <tr>
                <td><?= h($usuario->cedula) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->primer_ape) ?></td>
                <td><?= h($usuario->segundo_ape) ?></td>
                <td><?= h($usuario->puesto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar al usuario  {0}?', $usuario->nombre)]) ?>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
