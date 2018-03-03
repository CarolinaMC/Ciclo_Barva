<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca[]|\Cake\Collection\CollectionInterface $marca
 */
?>
<div class="marca index large-12 medium-8 columns content">
    <h3><?= __('Marca') ?>
        <?= $this->Html->link(__('Agregar Marca'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?></h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marca as $marca): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/marca/view/' +  <?= $marca->id ?>;">
                <td><?= h($marca->nombre) ?></td>
                <td><?= h($marca->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $marca->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $marca->id], ['confirm' => __('Estas seguro que quieres eliminar la marca  {0}?', $marca->nombre),'class'=>'btn btn-sm btn-danger']) ?>
                </td>
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
