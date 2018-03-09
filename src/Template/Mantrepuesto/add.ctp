<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Mantrepuesto'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mantrepuesto form large-9 medium-8 columns content">
    <?= $this->Form->create($mantrepuesto) ?>
    <fieldset>
        <legend><?= __('Add Mantrepuesto') ?></legend>
        <?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('repuesto_id');
            echo $this->Form->control('mantenimiento_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
