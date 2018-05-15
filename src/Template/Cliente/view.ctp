<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de clientes', 'url' => ['controller' => 'Cliente', 'action' => 'index']],
    ['title' => 'Ver cliente', 'url' => ['controller' => 'Cliente', 'action' => 'view',$cliente->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="cliente view large-12 medium-8 columns content">
    <h3><?= h($cliente->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cedula') ?></th>
            <td><?= h($cliente->cedula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cliente->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Primer Apellido') ?></th>
            <td><?= h($cliente->primer_ape) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Segundo Apellido') ?></th>
            <td><?= h($cliente->segundo_ape) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($cliente->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($cliente->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion física') ?></th>
            <td><?= h($cliente->direccion) ?></td>
        </tr>
    </table>
    <?=$this->Html->link(__('Agregar Bicicleta'),['controller' => 'Bicicleta','action' => 'add', $cliente->id],['class'=>'btn btn-sm btn-success']) ?>

    <?php if (!empty($cliente->bicicleta)): ?>
     <?=$this->Html->link(__('Mantenimientos'),['controller' => 'Mantenimiento', 'action' => 'vistaPorCliente', $cliente->id],['class'=>'btn btn-sm btn-info']) ?>
     <br>

    <h3> Bicicletas perteneciantes al cliente </h3>
<table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente->bicicleta as $bicicletum): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/bicicleta/view/' +  <?= $bicicletum->id ?>;">
                <td><?= $bicicletum->marca_nombre ?></td>
                <td><?= h($bicicletum->color) ?></td>
                <td><?= h($bicicletum->tamano) ?></td>
             
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h3> El cliente no posee bicicletas registradas </h3>
    <?php endif; ?>
</div>