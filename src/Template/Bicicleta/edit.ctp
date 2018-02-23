<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bicicletum->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bicicletum->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bicicleta'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Marca'), ['controller' => 'Marca', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Marca'), ['controller' => 'Marca', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bicicleta form large-9 medium-8 columns content">
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
        <legend><?= __('Edit Bicicletum') ?></legend>
        <?php
            echo $this->Form->control('tamano');
            echo $this->Form->control('color');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('cliente_id', ['options' => $cliente]);
            echo $this->Form->control('marca_id', ['options' => $marca]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
