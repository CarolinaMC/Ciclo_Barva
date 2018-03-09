<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mantrepuesto'), ['action' => 'edit', $mantrepuesto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mantrepuesto'), ['action' => 'delete', $mantrepuesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantrepuesto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mantrepuesto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mantrepuesto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mantrepuesto view large-9 medium-8 columns content">
    <h3><?= h($mantrepuesto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repuesto Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->repuesto_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mantenimiento Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->mantenimiento_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($mantrepuesto->fecha) ?></td>
        </tr>
    </table>
</div>
