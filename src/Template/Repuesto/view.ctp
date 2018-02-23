<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto $repuesto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Repuesto') ?></li>
        <li><?= $this->Html->link(__('Editar Repuesto'), ['action' => 'edit', $repuesto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Repuesto'), ['action' => 'delete', $repuesto->id], ['confirm' => __('Estas seguro que quieres eliminar el repuesto {0}?', $repuesto->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Repuesto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Marca'), ['controller' => 'Marca', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="repuesto view large-9 medium-8 columns content">
    <h3><?= h($repuesto->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($repuesto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($repuesto->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($repuesto->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->id, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
        </tr>
       <!--  <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($repuesto->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($repuesto->precio) ?></td>
        </tr>
    </table>
</div>
