<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum[]|\Cake\Collection\CollectionInterface $bicicleta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Marca'), ['controller' => 'Marca', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marca', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bicicleta index large-9 medium-8 columns content">
    <h3><?= __('Bicicletas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicicleta as $bicicletum): ?>
            <tr>
                <td><?= $this->Number->format($bicicletum->id) ?></td>
                <td><?= h($bicicletum->tamano) ?></td>
                <td><?= h($bicicletum->color) ?></td>
                <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->id, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
                <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->id, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bicicletum->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bicicletum->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bicicletum->id)]) ?>
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
