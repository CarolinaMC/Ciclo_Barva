<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantservicio
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de mantenimiento de servicios', 'url' => ['action' => 'index']],
    ['title' => 'Editar servicio', 'url' => ['action' => 'edit',$mantservicio->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantservicio form large-9 medium-8 columns content">
    <?= $this->Form->create($mantservicio) ?>
    <fieldset>
        <legend><?= __('Edit Mantservicio') ?></legend>
        <?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('servicio_id');
            echo $this->Form->control('mantenimiento_id');
        ?>
    </fieldset>
    <?= $this->Form->button('Editar', array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
