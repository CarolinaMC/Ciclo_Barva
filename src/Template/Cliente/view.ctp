<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de clientes', 'url' => ['controller' => 'Cliente', 'action' => 'index']],
    ['title' => 'Ver cliente', 'url' => ['controller' => 'Cliente', 'action' => 'view',$cliente->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
    <div class="cliente view  content">
    <h4 class=""><legend><?= __('Detalle del cliente') ?></legend></h4>
    <h3 class="heading"><?= h($cliente->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cédula') ?></th>
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
            <th scope="row"><?= __('Teléfono') ?></th>
            <td><?= h($cliente->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección física') ?></th>
            <td><?= h($cliente->direccion) ?></td>
        </tr>
    </table>
     <?=$this->Html->link(__(' Agregar bicicleta'),['controller' => 'Bicicleta','action' => 'add', $cliente->id],['class'=>'fa fa-plus btn  btn-lg btn-success']) ?>
     <?php if (!empty($cliente->bicicleta)): ?>
            <?=$this->Html->link(__(' Ver mantenimientos'),['controller' => 'Mantenimiento', 'action' => 'vistaPorCliente', $cliente->id],['class'=>'   fa fa-wrench btn btn-lg btn-info']) ?>
     <div><br></div>
    <h4 class=""><legend><?= __('Lista de bicicletas') ?>
    </legend>
</h4>
     <div><br></div>
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
     <div><br></div>
    <h5> El cliente no posee bicicletas registradas </h5>
    <?php endif; ?>
</div>
