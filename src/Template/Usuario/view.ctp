<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Usuario') ?></li>
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $usuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Usuario'), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar el usuario # {0}?', $usuario->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usuario view large-9 medium-8 columns content">
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
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($usuario->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usuario->id) ?></td>
        </tr>
    </table>
</div>
