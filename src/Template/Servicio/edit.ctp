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
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de servicios', 'url' => ['action' => 'index']],
    ['title' => 'Editar servicio', 'url' => ['action' => 'edit',$servicio->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="servicio form large-12 medium-8 columns content">
    <?= $this->Form->create($servicio) ?>
    <fieldset>
        <legend><?= __('Editar Servicio') ?></legend>
        <?php
        ?>
        <table>
            <tr>
                <td> <?php echo $this->Form->control('descripcion',array('label' =>'Descripción','type'=>'text','onkeypress'=>'return validaL(event)','placeholder' => 'Ingrese solo letras' ));?> </td> 
                 <td> <?php echo $this->Form->control('precio',array('type'=>'text','onkeypress'=>'return validaN(event)','placeholder' => 'Ingrese solo números')); ?> </td> 
            </tr>
         
        </table>
    </fieldset>
    <?= $this->Form->button('Editar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
