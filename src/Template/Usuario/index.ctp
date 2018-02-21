<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuario
 */
?>
<<<<<<< HEAD
<div class="row">
    <div class="col-md-12">
    <div class="page-header">
        <h3>
            <?= __('Usuarios') ?>
            <?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
        </h3>
        
    </div>
    <div class="">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
=======

<script>
    
    $(document).ready(function(){
    llenarAutoCompleteUsuario('<?php echo $usuarios ?>');
});

</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Usuario') ?></li>
        <li><?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuario index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
     <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?>
    <div class="form-group"> 
<?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar Usuario'))?>
    </div>
    <?= $this->Form->button('buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Form->end(); ?>
    <table cellpadding="0" cellspacing="0">
>>>>>>> afcf1d5a782b2c177ae46e4e201226521cc7662b
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cedula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario): ?>
            <tr>
                <td><?= h($usuario->cedula) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->primer_ape) ?></td>
                <td><?= h($usuario->segundo_ape) ?></td>
                <td><?= h($usuario->puesto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar al usuario  {0}?', $usuario->nombre),'class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< anterior') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('siguiente >') ?>
        </div>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
