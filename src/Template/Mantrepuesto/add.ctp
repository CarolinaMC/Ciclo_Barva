<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $mantrepuesto
 */
?>

<div class="mantrepuesto form large-12 medium-8 columns content">
    
    <legend><?= __('Seleccione repuestos para mantenimiento') ?></legend>

    <?= $this->Html->link(__('Listo'), ['controller' => 'mantenimiento','action' => 'view', $mantenimiento],['class'=>'btn btn-sm btn-info']) ?>

        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                
                <th scope="col" class="actions"><?= __('Seleccione') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuestos as $repuesto): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $repuesto->id ?>;">
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->categoria) ?></td>
                <td><?= h($repuesto->estado) ?></td>
                <td><?= $this->Number->format($repuesto->precio) ?></td>
                <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
                
                <td class="actions">
                    <?= $this->Form->create($mantrepuesto, array('type' => 'POST',  'url' => ['action' => 'add', $mantenimiento])) ?>
                    <?= $this->Form->control('repuesto',array('label'=> false , 'name'=> 'repuesto', 'type'=>'checkbox', 'value' => $repuesto->id, 'onclick' => "this.form.submit()")); ?>
                <?= $this->Form->end(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
