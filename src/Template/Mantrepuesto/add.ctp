<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>

<div class="mantrepuesto form large-12 medium-8 columns content">
    <?= $this->Form->create($mantrepuesto) ?>
    <fieldset>
        <legend><?= __('Solicitar repuesto para mantenimiento') ?></legend>
        <?php?>
         <table <table class="table">
            <tr>
                <td>
        <?php

         if($mantenimiento==null){
            echo $this->Form->control('mantenimiento_id',['type'=>'text', 'id'=>'mantenimiento_id', 'placeholder' => 'id mantenimiento']);
        }
        else{
             echo $this->Form->control('mantenimiento_id',['type'=>'text', 'value' => $mantenimiento]);
        } ?>
                <td> <?php echo $this->Form->control('repuesto_id', array( 'div' => false, 'id' => 'repuesto_id', 'placeholder' => 'Descripción del repuesto', 'required', 'type' => 'text')); ?> </td>
            </td>
        </tr>
            
        </table>
        
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteRepuesto('<?php echo $repuesto ?>');
});

</script>