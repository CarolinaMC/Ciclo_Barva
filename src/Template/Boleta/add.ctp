<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Boleta'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boleta form large-9 medium-8 columns content">
    <?= $this->Form->create($boletum) ?>
    <fieldset>
        <legend><?= __('Add Boletum') ?></legend>
        <?php
            echo $this->Form->control('fecha_entrada');
            echo $this->Form->control('fecha_salida');
            echo $this->Form->control('cliente_id', ['options' => $cliente]);
            echo $this->Form->control('usuario_id', ['options' => $usuario]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
