<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de usuarios', 'url' => ['controller' => 'Usuario', 'action' => 'index']],
    ['title' => 'Ver usuario', 'url' => ['controller' => 'Usuario', 'action' => 'view',$usuario->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="usuario view large-8 medium-6 columns content">

    <h4 class=""><legend><?= __('Detalle del usuario') ?></legend></h4>
    <h3 class="heading"><?= h($usuario->nombre) ?></h3>
    
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cedula') ?></th>
            <td><?= h($usuario->cedula) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($usuario->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Primer Ape') ?></th>
            <td><?= h($usuario->primer_ape) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Segundo Ape') ?></th>
            <td><?= h($usuario->segundo_ape) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puesto') ?></th>
            <td><?= h($usuario->puesto) ?></td>
        </tr>
    </table>
</div>
