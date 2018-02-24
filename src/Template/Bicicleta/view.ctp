<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bicicletum'), ['action' => 'edit', $bicicletum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bicicletum'), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bicicletum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bicicleta'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bicicletum'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Marca'), ['controller' => 'Marca', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marca', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bicicleta view large-9 medium-8 columns content">
    <h3><?= h($bicicletum->color) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($bicicletum->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamano') ?></th>
            <td><?= h($bicicletum->tamano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($bicicletum->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bicicletum->id) ?></td>
        </tr>
    </table>
    <!-- <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($bicicletum->descripcion)); ?>
    </div> -->
</div>
