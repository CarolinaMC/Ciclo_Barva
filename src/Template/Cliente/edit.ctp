
<script>
function validaN(e){
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

</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Ver Cliente'), ['action' => 'view', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Estas seguro que quieres borrar este Cliente # {0}?', $cliente->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Cliente'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cliente form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Agregar Cliente') ?></legend>
        <?php
            echo $this->Form->control('extranjero',array('type'=>'checkbox','id'=>'extranjero')); ?>
  <table>
    <tr>
          <td> <?php echo $this->Form->control('cedula',array('type'=>'text','minlength'=>'9','maxlength'=>'9', 'onkeypress'=>'return validaN(event)')); ?> </td>
            
          <td> <?php echo $this->Form->control('nombre',array('type'=>'text', )); ?> </td>
            </tr>
<tr>
        <td> <?php echo $this->Form->control('primer_ape',array('type'=>'text', )); ?> </td>

        <td> <?php echo $this->Form->control('segundo_ape',array('type'=>'text', ));?> </td> 
    </tr>
        <tr>
         <td> <?php echo $this->Form->control('alias',array('type'=>'text', ));?> </td>
            
           <td> <?php echo $this->Form->control('telefono',array('type'=>'text','minlength'=>'8','maxlength'=>'8')); ?> </td> 
       </tr>
            <tr>
                <td> <?php echo $this->Form->control('email',array('type'=>'text', 'placeholder' => "@"));?> </td>

            <td><?php echo $this->Form->control('direccion',array('placeholder'=>"Ingrese una dirección física"));
        ?></td>
    </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>