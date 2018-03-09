<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento[]|\Cake\Collection\CollectionInterface $mantenimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mantenimiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bicicleta'), ['controller' => 'Bicicleta', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bicicletum'), ['controller' => 'Bicicleta', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Boleta'), ['controller' => 'Boleta', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Boletum'), ['controller' => 'Boleta', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mantrepuesto'), ['controller' => 'Mantrepuesto', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mantrepuesto'), ['controller' => 'Mantrepuesto', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mantservicio'), ['controller' => 'Mantservicio', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mantservicio'), ['controller' => 'Mantservicio', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mantenimiento index large-9 medium-8 columns content">
    <h3><?= __('Mantenimiento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('garantia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioridad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bicicleta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $mantenimiento): ?>
            <tr>
                <td><?= $this->Number->format($mantenimiento->id) ?></td>
                <td><?= h($mantenimiento->garantia) ?></td>
                <td><?= h($mantenimiento->prioridad) ?></td>
                <td><?= h($mantenimiento->estado) ?></td>
                <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->id, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
                <td><?= $mantenimiento->has('boletum') ? $this->Html->link($mantenimiento->boletum->id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boletum->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mantenimiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mantenimiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mantenimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantenimiento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
