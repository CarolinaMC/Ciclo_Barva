<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio[]|\Cake\Collection\CollectionInterface $servicio
 */
?>
<div class="servicio index large-12 medium-8 columns content">
    <h3><?= __('Servicio') ?>
        <?= $this->Html->link(__('Agregar Servicio'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>       
    </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicio as $servicio): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/servicio/view/' +  <?= $servicio->id ?>;">
                <td><?= h($servicio->descripcion) ?></td>
                <td><?= $this->Number->format($servicio->precio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $servicio->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $servicio->id], ['confirm' => __('Estas seguro que quieres eliminar el servicio  {0}?', $servicio->descripcion),'class'=>'btn btn-sm btn-danger']) ?>
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
