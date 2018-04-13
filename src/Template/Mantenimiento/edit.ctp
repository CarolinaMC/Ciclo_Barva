<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<div class="mantenimiento form large-12 medium-8 columns content">
    <?= $this->Form->create($mantenimiento) ?>
    <fieldset>
        <legend><?= __('Edit Mantenimiento') ?></legend>
        <?php
            echo $this->Form->control('garantia');
            echo $this->Form->control('prioridad',array('options'=>array(
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                )));
            echo $this->Form->control('estado',array('options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                )));
            echo $this->Form->control('descripcion');
            echo $this->Form->control('bicicleta_id',['type'=>'text']);
            echo $this->Form->control('boleta_id',['type'=>'text']);
        ?>
    </fieldset>
    <?= $this->Form->button('Actualizar', array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
