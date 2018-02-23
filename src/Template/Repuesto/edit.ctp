<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto $repuesto
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
        <li class="heading"><?= __('Opciones de servicio') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar Servicio'),
                ['action' => 'delete', $repuesto->id],
                ['confirm' => __('Estas seguro que quieres eliminar el repuesto {0}?', $repuesto->descripcion)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista Repuesto'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista Marca'), ['controller' => 'Marca', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="repuesto form large-9 medium-8 columns content">
    <?= $this->Form->create($repuesto) ?>
    <fieldset>
        <legend><?= __('Edit Repuesto') ?></legend>
        <?php
        ?>
        <table>
            <tr>
                <td> <?php echo $this->Form->control('descripcion',array('type'=>'text','onkeypress'=>'return validaL(event)' ));?> </td> 
            </tr>
             <tr>
                <td> <?php echo $this->Form->control('categoria', ['options' => ['Frenos' =>'Frenos', 'Marco' =>'Marco','Trasmisores' =>'Trasmisores','Aro' =>'Aro', 'Neumaticos' =>'Neumaticos','otros' =>'otros']]);?> </td>
             <tr>
            <td> <?php echo $this->Form->control('marca_id',['options' => $marca]);?> </td> 
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('estado', ['options' => ['Disponible' =>'Disponible', 'Agotado' =>'Agotado']]);?> </td>
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('precio',array('type'=>'text','onkeypress'=>'return validaN(event)')); ?> </td> 
            </tr>          
        </table>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
