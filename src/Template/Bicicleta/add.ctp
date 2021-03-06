<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de bicicletas', 'url' => ['controller' => 'Bicicleta', 'action' => 'index']],
    ['title' => 'Agregar bicicleta', 'url' => ['controller' => 'Bicicleta', 'action' => 'add']]
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
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
        <legend><?= __('Agregar Bicicleta') ?></legend>
        <?php?>
        
            <?php if($cliente_id=='null'){  ?>
            
            <?php echo $this->Form->control('cliente_id', array('div' => false, 'id' => 'cliente_id', 'placeholder' => 'Ingrese el telefono del cliente', 'required', 'type' => 'text')); ?>
                
            <?php } ?>
            <table class="table">
            <tr>
                <td> <?php echo $this->Form->control('marca_id', array( 'div' => false, 'id' => 'marca_id', 'placeholder' => 'Ingrese la marca', 'required', 'type' => 'text'));?> </td> 

                <td> <?php echo $this->Form->control('tamano', ['label' =>'Tamaño','options' => ['12' =>'12', '16' =>'16','20' =>'20','24' =>'24', '26' =>'26','27.5' =>'27.5','28' =>'28', '29' =>'29']]);?> </td>
            </tr>
           
            <tr>
                <td> <?php echo $this->Form->control('color',array('type'=>'text', 'onkeypress'=>'return validaL(event)', 'placeholder' => 'Ingrese un color representativo' )); ?> </td>
                
                <td><?php echo $this->Form->control('descripcion',array('label' =>'Descripción','placeholder'=>"Ingrese caracteristicas de la bicicleta"));?></td>
            </tr>
        </table>

    </fieldset>
    <?= $this->Form->button('Agregar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>


<script>
        $(document).ready(function(){
    llenarAutoCompleteClienteBici('<?php echo $clientes ?>');
    llenarAutoCompleteMarca('<?php echo $marcas ?>');
});

</script>