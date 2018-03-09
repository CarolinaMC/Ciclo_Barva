<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum[]|\Cake\Collection\CollectionInterface $boleta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Boletum'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boleta index large-9 medium-8 columns content">
    <h3><?= __('Boleta') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_entrada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_salida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boleta as $boletum): ?>
            <tr>
                <td><?= $this->Number->format($boletum->id) ?></td>
                <td><?= h($boletum->fecha_entrada) ?></td>
                <td><?= h($boletum->fecha_salida) ?></td>
                <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->id, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
                <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->id, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $boletum->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $boletum->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $boletum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boletum->id)]) ?>
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
