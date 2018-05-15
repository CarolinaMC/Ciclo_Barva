<div class="mantenimiento index large-12 medium-8 columns content">
    <h3>
        <?= __('Mantenimientos de bicicleta') ?><?php foreach ($nombre as $nombre):?>
        <?= $nombre->descripcion;?> - <?= $nombre->marca_nombre; ?>
        <?php endforeach;?>
        
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
            <tr ondblclick = "document.location = '/Ciclo_Barva/mantenimiento/view/' +  <?= $mantenimiento->id ?>;">
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
                <?= $this->Form->end(); ?>
                </td>
                <td><?=$this->Html->link($mantenimiento->bicicleta_id, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicleta_id])?></td>
                <td><?= $this->Html->link($mantenimiento->boleta_id, ['controller' => 'Boleta', 'action' => 'view', $mantenimiento->boleta_id]); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $mantenimiento->id],['class'=>'btn btn-sm btn-primary']) ?>  
                                  </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
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
