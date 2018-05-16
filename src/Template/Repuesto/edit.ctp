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
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de repuestos', 'url' => ['action' => 'index']],
    ['title' => 'Eidtar repuesto', 'url' => ['action' => 'edit',$repuesto->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="repuesto form large-12 medium-8 columns content">
    <?= $this->Form->create($repuesto) ?>
    <fieldset>
        <legend><?= __('Editar Repuesto') ?></legend>
        <?php
        ?>
        <table  class="table">
            <tr>
                <td> <?php echo $this->Form->control('descripcion',array('label' =>'Descripción','type'=>'text','placeholder' => 'Ingrese una descripción del repuesto'));?> </td>

                <td> <?php echo $this->Form->control('marca_id',['options' => $marca]);?> </td>
            </tr>
             <tr>
                <td> <?php echo $this->Form->control('categoria', ['options' => ['Frenos' =>'Frenos', 'Marco' =>'Marco','Trasmisores' =>'Trasmisores','Aro' =>'Aro', 'Neumaticos' =>'Neumaticos','otros' =>'otros']]);?> </td>

                <td> <?php echo $this->Form->control('estado', ['options' => ['Disponible' =>'Disponible', 'Agotado' =>'Agotado']]);?> </td>
            </tr>
            <tr>
                <td> <?php echo $this->Form->control('precio',array('type'=>'text','onkeypress'=>'return validaN(event)')); ?> </td> 
            </tr>          
        </table>
    </fieldset>
    <?= $this->Form->button('Editar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
