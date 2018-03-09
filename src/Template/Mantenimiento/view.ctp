<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mantenimiento'), ['action' => 'edit', $mantenimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mantenimiento'), ['action' => 'delete', $mantenimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantenimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Mantenimiento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mantenimiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bicicleta'), ['controller' => 'Bicicleta', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bicicletum'), ['controller' => 'Bicicleta', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Boleta'), ['controller' => 'Boleta', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Boletum'), ['controller' => 'Boleta', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mantrepuesto'), ['controller' => 'Mantrepuesto', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mantrepuesto'), ['controller' => 'Mantrepuesto', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mantservicio'), ['controller' => 'Mantservicio', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mantservicio'), ['controller' => 'Mantservicio', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mantenimiento view large-9 medium-8 columns content">
    <h3><?= h($mantenimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Garantia') ?></th>
            <td><?= h($mantenimiento->garantia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prioridad') ?></th>
            <td><?= h($mantenimiento->prioridad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($mantenimiento->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bicicletum') ?></th>
            <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->id, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Boletum') ?></th>
            <td><?= $mantenimiento->has('boletum') ? $this->Html->link($mantenimiento->boletum->id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boletum->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mantenimiento->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($mantenimiento->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mantrepuesto') ?></h4>
        <?php if (!empty($mantenimiento->mantrepuesto)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Repuesto Id') ?></th>
                <th scope="col"><?= __('Mantenimiento Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mantenimiento->mantrepuesto as $mantrepuesto): ?>
            <tr>
                <td><?= h($mantrepuesto->id) ?></td>
                <td><?= h($mantrepuesto->fecha) ?></td>
                <td><?= h($mantrepuesto->repuesto_id) ?></td>
                <td><?= h($mantrepuesto->mantenimiento_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Mantrepuesto', 'action' => 'view', $mantrepuesto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Mantrepuesto', 'action' => 'edit', $mantrepuesto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Mantrepuesto', 'action' => 'delete', $mantrepuesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantrepuesto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mantservicio') ?></h4>
        <?php if (!empty($mantenimiento->mantservicio)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Servicio Id') ?></th>
                <th scope="col"><?= __('Mantenimiento Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($mantenimiento->mantservicio as $mantservicio): ?>
            <tr>
                <td><?= h($mantservicio->id) ?></td>
                <td><?= h($mantservicio->fecha) ?></td>
                <td><?= h($mantservicio->servicio_id) ?></td>
                <td><?= h($mantservicio->mantenimiento_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Mantservicio', 'action' => 'view', $mantservicio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Mantservicio', 'action' => 'edit', $mantservicio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Mantservicio', 'action' => 'delete', $mantservicio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantservicio->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
