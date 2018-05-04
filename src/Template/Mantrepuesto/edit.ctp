<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de repuestos del mantenimiento', 'url' => ['action' => 'index']],
    ['title' => 'Eidtar repuesto', 'url' => ['action' => 'edit',$mantrepuesto->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantrepuesto form large-9 medium-8 columns content">
    <?= $this->Form->create($mantrepuesto) ?>
    <fieldset>
        <legend><?= __('Edit Mantrepuesto') ?></legend>
        <?php
            echo $this->Form->control('fecha');
            echo $this->Form->control('repuesto_id');
            echo $this->Form->control('mantenimiento_id');
        ?>
    </fieldset>
    <?= $this->Form->button('Editar' , array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
