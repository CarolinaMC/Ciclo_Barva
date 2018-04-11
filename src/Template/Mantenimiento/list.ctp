<br>
<br>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento[]|\Cake\Collection\CollectionInterface $mantenimiento
 */
?>
<div class="mantenimiento index large-12 medium-8 columns content">
    <h3>
        <?= __('Mantenimiento por prioridad') ?>
    </h3>
	<?php
	echo $this->Form->control('prioridad',array('options'=>array(
					'5'=>'Todo',
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                )));

    ?>
    <h3>
        <?= $this->Html->link(__('Consultar'), ['action' => 'consultar'],['class'=>'btn btn-sm btn-success']) ?>
    </h3>
    <br>
	<br>
        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bicicleta_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('boleta_id') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantenimiento as $mantenimiento): ?>
            <tr >

                <td><?= h($mantenimiento->estado)?>
                </td>
                <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->color, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
                <td><?= $mantenimiento->has('boletum') ? $this->Html->link($mantenimiento->boletum->id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boletum->id]) : '' ?></td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->first('<< ' . __('primera')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </div>
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
    elseif($pri==1){
        return 'Baja';
    }
    elseif($pri==5)
    	return 'todo';
}
?>

<?php function consultar($prioridad){
 if($prioridad == 1)
 	return 0;
}

?>