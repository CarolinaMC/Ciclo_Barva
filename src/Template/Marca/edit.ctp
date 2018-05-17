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
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de marcas', 'url' => ['action' => 'index']],
    ['title' => 'Editar marca', 'url' => ['action' => 'edit',$marca->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<br>
    <div>
    <?= $this->Form->create($marca) ?>
    <fieldset>
        <legend><?= __('Editar Marca') ?></legend>
        <?php
        ?>
         <table>
            <tr>
                <td> <?php echo $this->Form->control('nombre',array('type'=>'text','onkeypress'=>'return validaL(event)' ,'placeholder' => 'Ingrese solo letras'));?> </td> 
                <td> <?php echo $this->Form->control('tipo', ['options' => ['ambos' =>'Ambos', 'marco' =>'De bicicleta','repuesto' =>'De repuesto']]);?> </td>
            </tr> 
        </table>
    </fieldset>
   <?= $this->Form->button('Editar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>