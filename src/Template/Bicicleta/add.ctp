<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>


<div class="bicicleta form large-9 medium-8 columns content">
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
        <legend><?= __('Agregar Bicicleta') ?></legend>
        <?php?>
        <table>
            <tr>
                <td> <?php echo $this->Form->control('cliente_id', array( 'div' => false, 'id' => 'cliente_id', 'placeholder' => '# Cliente', 'required', 'type' => 'text')); ?> </td>
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('marca_id', array( 'div' => false, 'id' => 'marca_id', 'placeholder' => '# Marca', 'required', 'type' => 'text'));?> </td> 
            </tr>

            <tr>
                <td> <?php echo $this->Form->control('tamano', ['options' => ['1' =>'1', '2' =>'2','3' =>'3','4' =>'4', '5' =>'5','6' =>'6','7' =>'7', '8' =>'8','9' =>'9']]);?> </td>
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('color',array('type'=>'text', 'onkeypress'=>'return validaL(event)' )); ?> </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->control('descripcion',array('placeholder'=>"Ingrese caracteristicas de la bicicleta"));?></td>
            </tr>
        </table>

    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteClienteBici('<?php echo $clientes ?>');
    llenarAutoCompleteMarca('<?php echo $marcas ?>');
});

</script>