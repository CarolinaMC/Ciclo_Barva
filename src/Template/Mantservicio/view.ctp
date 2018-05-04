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
    ['title' => 'Ver servicio', 'url' => ['action' => 'view',$mantservicio->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantservicio view large-9 medium-8 columns content">
    <h3><?= h($mantservicio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mantservicio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Servicio Id') ?></th>
            <td><?= $this->Number->format($mantservicio->servicio_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mantenimiento Id') ?></th>
            <td><?= $this->Number->format($mantservicio->mantenimiento_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($mantservicio->fecha) ?></td>
        </tr>
    </table>
</div>
