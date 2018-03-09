<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Boletum'), ['action' => 'edit', $boletum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Boletum'), ['action' => 'delete', $boletum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boletum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Boleta'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boletum'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="boleta view large-9 medium-8 columns content">
    <h3><?= h($boletum->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->id, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->id, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($boletum->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Entrada') ?></th>
            <td><?= h($boletum->fecha_entrada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Salida') ?></th>
            <td><?= h($boletum->fecha_salida) ?></td>
        </tr>
    </table>
</div>
