<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<div class="mantenimiento view large-12 medium-8 columns content">
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
    </table>
    <div class="row">
        <h3><?= __('Descripcion:') ?></h3>
        <?= $this->Text->autoParagraph(h($mantenimiento->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Mantrepuesto') ?></h4>
        <?= $this->Html->link(__('Solicitar Repuesto'), ['controller' => 'Mantrepuesto','action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
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
