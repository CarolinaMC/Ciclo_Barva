<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum[]|\Cake\Collection\CollectionInterface $bicicleta
 */
?>
<div class="bicicleta index large-9 medium-8 columns content">
    <h3>
        <?= __('Bicicletas') ?>
        <?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>    
    </h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicicleta as $bicicletum): ?>
            <tr>
                <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>
                <td><?= h($bicicletum->tamano) ?></td>
                <td><?= h($bicicletum->color) ?></td>             
                <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
               <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $bicicletum->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $bicicletum->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Estas seguro que quieres eliminar la bicicleta  {0} del cliente {1}?', $bicicletum->color, $bicicletum->cliente->nombre),'class'=>'btn btn-sm btn-info']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
