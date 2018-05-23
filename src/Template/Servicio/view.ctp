<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de servicios', 'url' => ['action' => 'index']],
    ['title' => 'Ver servicio', 'url' => ['action' => 'view',$servicio->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="">
    <h4 class=""><legend><?= __('Detalle del servicio') ?></legend></h4>
    <h3><?= h($servicio->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripción') ?></th>
            <td><?= h($servicio->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($servicio->precio) ?></td>
        </tr>
    </table>
</div>
