<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>

<script>
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
        <li class="heading"><?= __('Opciones Marca') ?></li>
        <li><?= $this->Html->link(__('Ver Marca'), ['action' => 'view', $marca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Marca'), ['action' => 'delete', $marca->id], ['confirm' => __('Estas seguro que quieres eliminar la marca # {0}?', $marca->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Marcas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Marca'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="marca form large-9 medium-8 columns content">
    <?= $this->Form->create($marca) ?>
    <fieldset>
        <legend><?= __('Editar Marca') ?></legend>
        <?php
        ?>
         <table>
            <tr>
                <td> <?php echo $this->Form->control('nombre',array('type'=>'text','onkeypress'=>'return validaL(event)' ));?> </td> 
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('tipo', ['options' => ['ambos' =>'Ambos', 'marco' =>'De bicicleta','repuesto' =>'De repuesto']]);?> </td>
            </tr>          
        </table>
    </fieldset>
   <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
