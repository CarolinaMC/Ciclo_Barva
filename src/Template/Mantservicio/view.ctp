<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantservicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mantservicio'), ['action' => 'edit', $mantservicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mantservicio'), ['action' => 'delete', $mantservicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantservicio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mantservicio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mantservicio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mantservicio view large-9 medium-8 columns content">
    <h3><?= h($mantservicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mantservicio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicio Id') ?></th>
            <td><?= $this->Number->format($mantservicio->servicio_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mantenimiento Id') ?></th>
            <td><?= $this->Number->format($mantservicio->mantenimiento_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($mantservicio->fecha) ?></td>
        </tr>
    </table>
</div>
