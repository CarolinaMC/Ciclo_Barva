<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto $repuesto
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de repuestos', 'url' => ['action' => 'index']],
    ['title' => 'Ver repuesto', 'url' => ['action' => 'view',$repuesto->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="">
    <h4 class=""><legend><?= __('Detalle del repuesto') ?></legend></h4>
    <h3><?= h($repuesto->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($repuesto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoría') ?></th>
            <td><?= h($repuesto->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($repuesto->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($repuesto->precio) ?></td>
        </tr>
    </table>
</div>
