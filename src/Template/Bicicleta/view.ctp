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
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
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
<div class="bicicleta view large-12 medium-8 columns content">
    <h3><?= h($bicicletum->color) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($bicicletum->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamano') ?></th>
            <td><?= h($bicicletum->tamano) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($bicicletum->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bicicletum->id) ?></td>
        </tr>
    </table>
    <?=$this->Html->link(__('Mantenimientos'),['controller' => 'Mantenimiento', 'action' => 'vistaPorBicicleta', $bicicletum->id],['class'=>'btn btn-sm btn-info']); ?>
</div>
