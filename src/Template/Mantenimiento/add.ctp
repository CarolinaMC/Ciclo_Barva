<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<div class="mantenimiento form large-12 medium-8 columns content">
    <?= $this->Form->create($mantenimiento) ?>
    <fieldset>
        <legend><?= __('Agregar Mantenimiento') ?></legend>
        <?php
            echo $this->Form->control('garantia',['type'=>'checkbox']);
            echo $this->Form->control('prioridad');
            echo $this->Form->control('estado');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('bicicleta_id', array( 'div' => false, 'id' => 'bicicleta_id', 'placeholder' => 'id bicicletra', 'required', 'type' => 'text')); 
            echo $this->Form->control('boleta_id',['type'=>'text', 'placeholder' => 'id boleta']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteBici('<?php echo $bicicleta ?>');});

</script>