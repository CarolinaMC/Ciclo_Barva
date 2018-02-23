<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio $servicio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Servicio') ?></li>
        <li><?= $this->Html->link(__('Editar Servicio'), ['action' => 'edit', $servicio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Servicio'), ['action' => 'delete', $servicio->id], ['confirm' => __('Estas seguro que quieres eliminar el servicio {0}?', $servicio->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Servicio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Servicio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicio view large-9 medium-8 columns content">
    <h3><?= h($servicio->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($servicio->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($servicio->precio) ?></td>
        </tr>
    </table>
</div>
