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
        <br>
        <?=$this->Html->link(__('Agregar Bicicleta'),['controller' => 'Bicicleta','action' => 'add', $cliente_id],['class'=>'btn btn-sm btn-success']) ?>
        <br>
        <br>
        <?php
       
         if($boleta_id==null && $nombre==null){
        echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'placeholder' => 'id boleta']);
        }
        

        else{ ?>
            <h3 style=display: inline-block;> Boleta # <?=$boleta_id ?> | | Cliente <?=$nombre ?> </h3> 
            <div style = 'display:none' >
                <?php
            echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'value' => $boleta_id]); ?>
            </div>
        <?php
        }
?>
            <table>
            <tr>
                <td> <?php
                echo $this->Form->control('bicicleta_id', array( 'div' => false, 'id' => 'bicicleta_id', 'placeholder' => 'id bicicleta', 'required', 'name'=>'bicicleta_id', 'type' => 'text')); ?>
            </td>
        <td><?php
                echo $this->Form->control('garantia',array('label'=>'Garantía','options'=>array('No aplica'=>'No','Aplica'=>'Si'))); ?>
            </td>
        </tr>
        <tr>
            <td><?php
                 echo $this->Form->control('prioridad',array('options'=>array('4'=>'Baja','3'=>'Media','2'=>'Alta', '1'=>'Urgente'))); ?>
            </td>
        <td> <?php

            echo $this->Form->control('estado',array('options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                ))); ?>
                
            </td>
            </tr>
         <tr>
            <td><?php
                 echo $this->Form->control('manoObra',array('label'=>'Mano de obra')); ?>
            </td>
        <td>
           <?php
            echo $this->Form->control('descripcion',array('label'=>'Descripción')); ?>
        </td>
        </tr>
            </table>
            </fieldset>
            <br> 
    <?= $this->Form->button('Agregar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Form->end() ?>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteBici('<?php echo $bicicletas ?>');
    llenarAutoCompleteBoleta('<?php echo $clientes ?>');
});

</script>