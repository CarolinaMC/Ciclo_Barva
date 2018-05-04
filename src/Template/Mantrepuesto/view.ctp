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
    ['title' => 'Lista de mantenimiento de repuesto', 'url' => ['action' => 'index']],
    ['title' => 'Ver repuesto', 'url' => ['action' => 'view',$mantrepuesto->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantrepuesto view large-9 medium-8 columns content">
    <h3><?= h($mantrepuesto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repuesto Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->repuesto_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mantenimiento Id') ?></th>
            <td><?= $this->Number->format($mantrepuesto->mantenimiento_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($mantrepuesto->fecha) ?></td>
        </tr>
    </table>
</div>
