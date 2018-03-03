<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<div class="bicicleta form large-12 medium-8 columns content">
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
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
