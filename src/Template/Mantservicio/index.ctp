<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $mantservicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mantservicio'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mantservicio index large-9 medium-8 columns content">
    <h3><?= __('Mantservicio') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servicio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mantenimiento_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantservicio as $mantservicio): ?>
            <tr>
                <td><?= $this->Number->format($mantservicio->id) ?></td>
                <td><?= h($mantservicio->fecha) ?></td>
                <td><?= $this->Number->format($mantservicio->servicio_id) ?></td>
                <td><?= $this->Number->format($mantservicio->mantenimiento_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mantservicio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mantservicio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mantservicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantservicio->id)]) ?>
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
