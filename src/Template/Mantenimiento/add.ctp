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
        <?php

         if($boleta_id==null && $nombre==null){
            echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'placeholder' => 'id boleta']);
        }
        else{ ?>
              <h3 style="display: inline-block;"> Boleta # <?php echo($boleta_id) ?>      /      </h3> 
              <h3 style="display: inline-block;"> Cliente <?php echo($nombre) ?> </h3>
              <div style = 'display : none' >
              <?php
              echo $this->Form->control('boleta_id',['type'=>'text', 'id'=>'boleta_id', 'value' => $boleta_id]);
              ?>
          </div>
          <?php
        }

         echo $this->Form->control('bicicleta_id', array( 'div' => false, 'id' => 'bicicleta_id', 'placeholder' => 'id bicicleta', 'required', 'name'=>'bicicleta_id', 'type' => 'text')); 


            echo $this->Form->control('garantia',array('options'=>array(
                'No aplica'=>'No',
                'Aplica'=>'Si'
            )));

            echo $this->Form->control('prioridad',array('options'=>array(
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                ))); ?>
                <div style = 'display : none' >
<?php
            echo $this->Form->control('estado',array('options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                )));
                ?>
                </div><?php
            echo $this->Form->control('manoObra');
            echo $this->Form->control('descripcion');
             
        ?>
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