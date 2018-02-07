<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
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

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Usuario') ?></li>
        <li><?= $this->Html->link(__('Ver Usuario'), ['action' => 'view', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar el usuario # {0}?', $usuario->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="usuario form large-9 medium-8 columns content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Agregar Usuario') ?></legend>
        <?php?>
        <table>
    <tr>
          <td> <?php echo $this->Form->control('cedula',array('type'=>'text','minlength'=>'9','maxlength'=>'9', 'onkeypress'=>'return validaEx(event)')); ?> </td>
            
          <td> <?php echo $this->Form->control('nombre',array('type'=>'text','onkeypress'=>'return validaL(event)' )); ?> </td>
            </tr>
<tr>
        <td> <?php echo $this->Form->control('primer_ape',array('type'=>'text', 'onkeypress'=>'return validaL(event)')); ?> </td>

        <td> <?php echo $this->Form->control('segundo_ape',array('type'=>'text','onkeypress'=>'return validaL(event)' ));?> </td> 
    </tr>
            <tr>
                <td> <?php echo $this->Form->control('puesto', ['options' => ['administrador' =>'Administrador', 'dependiente' =>'Dependiente','mecanico' =>'Mecánico']]);?> </td>
            </tr>
            
            <tr>
                <td> <?php echo $this->Form->control('password',array('type'=>'text','minlength'=>'6','maxlength'=>'20')); ?> </td> 
            </tr>
            
        </table>

    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
