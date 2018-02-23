<?php
/**
 * @var \App\View\AppView $this
 */
?>
<script>
function validaEx(e){
    if(!document.getElementById('extranjero').checked){
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
return 0;
}

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
<div class="cliente form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Agregar Cliente') ?></legend>
        <?php
            echo $this->Form->control('extranjero',array('type'=>'checkbox','id'=>'extranjero')); ?>
  <table>
    <tr>
          <td> <?php echo $this->Form->control('cedula',array('type'=>'text','minlength'=>'9','maxlength'=>'9', 'onkeypress'=>'return validaEx(event)')); ?> </td>
            
          <td> <?php echo $this->Form->control('nombre',array('type'=>'text', 'onkeypress'=>'return validaL(event)' )); ?> </td>
            </tr>
<tr>
        <td> <?php echo $this->Form->control('primer_ape',array('type'=>'text', 'onkeypress'=>'return validaL(event)')); ?> </td>

        <td> <?php echo $this->Form->control('segundo_ape',array('type'=>'text','onkeypress'=>'return validaL(event)' ));?> </td> 
    </tr>
        <tr>
         <td> <?php echo $this->Form->control('alias',array('type'=>'text', 'onkeypress'=>'return validaL(event)'));?> </td>
            
           <td> <?php echo $this->Form->control('telefono',array('type'=>'text','minlength'=>'8','maxlength'=>'8','onkeypress'=>'return validaN(event)')); ?> </td> 
       </tr>
            <tr>
                <td> <?php echo $this->Form->control('email',array('type'=>'text', 'placeholder' => "@"));?> </td>

            <td><?php echo $this->Form->control('direccion',array('placeholder'=>"Ingrese una dirección física"));
        ?></td>
    </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>