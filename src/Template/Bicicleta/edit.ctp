<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum $bicicletum
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de bicicletas', 'url' => ['controller' => 'Bicicleta', 'action' => 'index']],
    ['title' => 'Editar bicicleta', 'url' => ['controller' => 'Bicicleta', 'action' => 'edit',$bicicletum->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="bicicleta form large-12 medium-8 columns content">
    <?= $this->Form->create($bicicletum) ?>
    <fieldset>
        <legend><?= __('Edit Bicicletum') ?></legend>
        <?php
            echo $this->Form->control('tamano');
            echo $this->Form->control('color');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('cliente_id', ['options' => $cliente]);
            echo $this->Form->control('marca_id', ['options' => $marca]);
        ?>
    </fieldset>
    <?= $this->Form->button('Agregar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
