<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
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
        <li class="heading"><?= __('Opciones Servicio') ?></li>
        <li><?= $this->Html->link(__('Ver Servicio'), ['action' => 'view', $servicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Servicio'), ['action' => 'delete', $servicio->id], ['confirm' => __('Estas seguro que quieres eliminar el servicio {0}?', $servicio->descripcion)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Servicio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Servicio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicio form large-9 medium-8 columns content">
    <?= $this->Form->create($servicio) ?>
    <fieldset>
        <legend><?= __('Editar Servicio') ?></legend>
        <?php
        ?>
        <table>
            <tr>
                <td> <?php echo $this->Form->control('descripcion',array('type'=>'text','onkeypress'=>'return validaL(event)' ));?> </td> 
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('precio',array('type'=>'text','onkeypress'=>'return validaN(event)')); ?> </td> 
            </tr>          
        </table>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>