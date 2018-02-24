<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<script>
function validaN(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validaL(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8) return true;
        
    // Patron de entrada, en este caso solo acepta letras
    patron =/[A-Za-zñÑáÁéÉíÍóÓúÚÜü ]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

</script>
<div class="bicicleta form large-9 medium-8 columns content">
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
        <legend><?= __('Agregar Bicicleta') ?></legend>
        <?php?>
        <table>
            <tr>
                <td> <?php echo $this->Form->control('cliente_id',['options' => $cliente]); ?> </td>
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('marca_id',['options' => $marca]);?> </td> 
            </tr>

            <tr>
                <td> <?php echo $this->Form->control('tamano', ['options' => ['12' =>'12', '16' =>'16','18' =>'18','20' =>'20', '24' =>'24','26' =>'26','27.5' =>'27.5', '28' =>'28','29' =>'29','700' =>'700']]);?> </td>
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
