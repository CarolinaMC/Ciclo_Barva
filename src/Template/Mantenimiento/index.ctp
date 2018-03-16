<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento[]|\Cake\Collection\CollectionInterface $mantenimiento
 */
?>
<div class="mantenimiento index large-12 medium-8 columns content">
    <h3>
        <?= __('Mantenimiento') ?>
        <?= $this->Html->link(__('Agregar Mantenimiento'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
    </h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('garantia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioridad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bicicleta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $mantenimiento): ?>
            <tr >
                <td><?= h($mantenimiento->garantia) ?></td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarP', $mantenimiento->id])) ?>

                <?= $this->Form->control('prioridad',array('label'=> false , 'name'=> 'prioridad', 'onchange' => "this.form.submit()", 'options'=>array(
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                ))); ?>
                <?= $this->Form->end(); ?>
                </td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarE', $mantenimiento->id])) ?>
              <?php      
                 echo $this->Form->control('estado',array('label'=> false , 'name'=> 'estado', 'onchange' => "this.form.submit()",'options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                ))); ?>

                </td>
                <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->color, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
                <td><?= $mantenimiento->has('boletum') ? $this->Html->link($mantenimiento->boletum->id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boletum->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $mantenimiento->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->html->Link('Eliminar', ['action' => 'delete', $mantenimiento->id], ['confirm' => __('Estas seguro que quieres eliminar al cliente  {0}?', $mantenimiento->id),'class'=>'btn btn-sm btn-danger']) ?>
                    <?= $this->Html->link(__('Agregar repuesto'), ['controller'=>'Mantrepuesto','action' => 'add', $mantenimiento->id],['class'=>'btn btn-sm btn-success']) ?>                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </div>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php function prioridad($pri){
    if($pri==1){
        return 'Urgente';
    }
    elseif ($pri==2) {
        return 'Alta';
    }
    elseif ($pri==3){ 
        return 'Media';
    }
    else{
        return 'Baja';
    }
}



 /*   function cambiarPriori($id){
    
        /*return location.href = '/Ciclo_Barva/mantenimiento/cambiar_Prioridad/' + '<?php $mantenimiento->boletum->id ?> + '/' + $('.priori').val() ;
        alert(id);
        alert($('.priori').val() )
        

        echo($id);
}
*/
?>