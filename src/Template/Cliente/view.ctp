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
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
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
<div class="cliente view large-8 medium-8 columns content">
    <h4 class=""><legend><?= __('Detalle del cliente') ?></legend></h4>
    <h3 class="heading"><?= h($cliente->nombre) ?></h3>
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
    <h4 class=""><legend><?= __('Mantenimientos de bicicletas') ?></legend></h4>
    <?=$this->Html->link(__('  Ver mantenimientos'),['controller' => 'Mantenimiento', 'action' => 'vistaPorCliente', $cliente->id],['class'=>'btn btn-sm btn-success  fa fa-bicycle']) ?>

</div>