<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantservicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mantservicio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mantservicio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mantservicio'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mantservicio form large-9 medium-8 columns content">
    <?= $this->Form->create($mantservicio) ?>
    <fieldset>
        <legend><?= __('Edit Mantservicio') ?></legend>
        <?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('servicio_id');
            echo $this->Form->control('mantenimiento_id');
        ?>
    </fieldset>
    <?= $this->Form->button('Editar', array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
