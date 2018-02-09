<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca $marca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones Marca') ?></li>
        <li><?= $this->Html->link(__('Editar Marca'), ['action' => 'edit', $marca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Marca'), ['action' => 'delete', $marca->id], ['confirm' => __('Estas seguro que quieres eliminar la marca # {0}?', $marca->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Lista Marcas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Marca'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="marca view large-9 medium-8 columns content">
    <h3><?= h($marca->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($marca->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($marca->tipo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h3><?= __('Bicicletas con la marca') ?></h4>
        <?php if (!empty($marca->bicicleta)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tamano') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Marca Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($marca->bicicleta as $bicicleta): ?>
            <tr>
                <td><?= h($bicicleta->id) ?></td>
                <td><?= h($bicicleta->tamano) ?></td>
                <td><?= h($bicicleta->color) ?></td>
                <td><?= h($bicicleta->descripcion) ?></td>
                <td><?= h($bicicleta->cliente_id) ?></td>
                <td><?= h($bicicleta->marca_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bicicleta', 'action' => 'view', $bicicleta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bicicleta', 'action' => 'edit', $bicicleta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bicicleta', 'action' => 'delete', $bicicleta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bicicleta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>