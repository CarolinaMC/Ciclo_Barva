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
    ['title' => 'Ver bicicleta', 'url' => ['controller' => 'Bicicleta', 'action' => 'view',$bicicletum->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="bicicleta view large-8 medium-8 columns content">
    <h4 class=""><legend><?= __('Detalle de la bicicleta') ?></legend></h4>
    <h3><?= h($bicicletum->color) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamaño') ?></th>
            <td><?= h($bicicletum->tamano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($bicicletum->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($bicicletum->descripcion) ?></td>
        </tr>
        
    </table>
    <div><br></div>
    <h4 class=""><legend><?= __('Mantenimientos de la bicicleta') ?></legend></h4>
    <?=$this->Html->link(__('    Ver mantenimientos'),['controller' => 'Mantenimiento', 'action' => 'vistaPorBicicleta', $bicicletum->id],['class'=>'   fa fa-wrench btn btn-lg btn-info']); ?>
</div>
