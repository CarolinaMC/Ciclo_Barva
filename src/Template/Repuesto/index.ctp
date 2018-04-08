<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto[]|\Cake\Collection\CollectionInterface $repuesto
 */
?>
<div class="repuesto index large-12 medium-8 columns content">
    <h3><?= __('Repuesto') ?>
        <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
        <?= $this->Html->link(__('Agregar Repuesto'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
    <?php endif; ?>
    </h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                 <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuesto as $repuesto): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $repuesto->id ?>;">
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->categoria) ?></td>
                <td><?= h($repuesto->estado) ?></td>
                <td><?= $this->Number->format($repuesto->precio) ?></td>
                <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->id, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
                <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <td class="actions">
                   
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $repuesto->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $repuesto->id], ['confirm' => __('Estas seguro que quieres eliminar el repuesto  {0}?', $repuesto->descripcion),'class'=>'btn btn-sm btn-danger']) ?>

                </td>
                <?php endif; ?>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </div>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
