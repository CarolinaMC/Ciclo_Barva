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
        <?php

        echo ("<table>");
        echo ("<tr>");
       
         if($boleta_id==null && $nombre==null){
            echo ("<td>");
            echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'placeholder' => 'id boleta']);
            echo ("</td>");
        }
        

        else{ 
            echo ("<td>");
            echo ("<h3 style=display: inline-block;> Boleta #".$boleta_id." </h3> ");
            echo ("</td>");

            echo ("<td>");
            echo ("<h3 style=display: inline-block;> Cliente".$nombre."</h3>");
            echo ("</td>");

            echo ("<td>");
            //echo ("<div style = 'display : none' >");
            echo ("</td>");

            echo ("<td>"); 
            echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'value' => $boleta_id]);
            echo ("</td>");

            echo ("<td>");  
            //echo ("</div>");
            echo ("</td>");

        
        }

            echo ("<td>");
                echo $this->Form->control('bicicleta_id', array( 'div' => false, 'id' => 'bicicleta_id', 'placeholder' => 'id bicicleta', 'required', 'name'=>'bicicleta_id', 'type' => 'text')); 
            echo ("</td>");
        

        

            echo ("<td>");
                echo $this->Form->control('garantia',array('label'=>'Garantía','options'=>array('No aplica'=>'No','Aplica'=>'Si')));
            echo ("</td>");
        echo ("</tr>");
        echo ("<tr>");
            echo ("<td>");
                 echo $this->Form->control('prioridad',array('options'=>array('4'=>'Baja','3'=>'Media','2'=>'Alta', '1'=>'Urgente')));
            echo ("</td>");
        
        
        
            echo ("<td>");
                

            echo $this->Form->control('estado',array('options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                )));
                
            
            echo ("</td>");

            echo ("<td>");
                 echo $this->Form->control('manoObra',array('label'=>'Mano de obra'));
            echo ("</td>");
        echo ("</tr>");

        echo ("<tr>");
        echo ("<td colspan=3>");
           
            echo $this->Form->control('descripcion',array('label'=>'Descripción'));
        echo ("</td>");
        echo ("</tr>");
            echo ("</table>");
            echo ("</fieldset>");
            echo ("<br>"); 
        ?>
    <?= $this->Form->button('Agregar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Form->end() ?>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteBici('<?php echo $bicicletas ?>');
    llenarAutoCompleteBoleta('<?php echo $clientes ?>');
});

</script>