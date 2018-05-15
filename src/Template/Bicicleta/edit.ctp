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
    ['title' => 'Editar bicicleta', 'url' => ['controller' => 'Bicicleta', 'action' => 'edit',$bicicletum->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
?>
</div>
<div class="bicicleta form large-12 medium-8 columns content">
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
         <legend><?= __('Editar Bicicleta') ?></legend>
        <table>

        <tr>
            <td> <?php echo $this->Form->control('color',array('type'=>'text', 'onkeypress'=>'return validaL(event)', 'placeholder' => 'Ingrese un color representativo' )); ?> </td>
                
            <td><?php echo $this->Form->control('descripcion',array('label' =>'descripción','placeholder'=>"Ingrese caracteristicas de la bicicleta"));?></td>
        </tr>
</table>        
    </fieldset>
    <?= $this->Form->button('Editar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
