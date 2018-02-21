<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuario
 */
?>
<div class="row">
    <div class="col-md-12">
    <div class="page-header">
        <h3>
            <?= __('Usuarios') ?>
            <?= $this->Html->link(__('Agregar Usuario'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
        </h3>
        
    </div>
    <div class="">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cedula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario): ?>
            <tr>
                <td><?= h($usuario->cedula) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->primer_ape) ?></td>
                <td><?= h($usuario->segundo_ape) ?></td>
                <td><?= h($usuario->puesto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar al usuario  {0}?', $usuario->nombre),'class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< anterior') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('siguiente >') ?>
        </div>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
