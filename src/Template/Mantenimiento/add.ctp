<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mantenimiento'), ['action' => 'index']) ?></li>
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
<div class="mantenimiento form large-9 medium-8 columns content">
    <?= $this->Form->create($mantenimiento) ?>
    <fieldset>
        <legend><?= __('Add Mantenimiento') ?></legend>
        <?php
            echo $this->Form->control('garantia');
            echo $this->Form->control('prioridad');
            echo $this->Form->control('estado');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('bicicleta_id', ['options' => $bicicleta]);
            echo $this->Form->control('boleta_id', ['options' => $boleta]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
