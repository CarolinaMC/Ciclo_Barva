<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<div class="mantenimiento view large-12 medium-8 columns content">
    <h3>Mantenimiento # <?= h($mantenimiento->id) ?> / <?= $this->Html->link(h($cliente['nombre']).' '.h($cliente['primer_ape']).' '.h($cliente['segundo_ape']),['controller' => 'Cliente', 'action' => 'view', $cliente['id']]) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bicicleta') ?></th>
            <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->marca_nombre . "  "  . $mantenimiento->bicicletum->color . "  " . $mantenimiento->bicicletum->tamano, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Garantia') ?></th>
            <td><?= h($mantenimiento->garantia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prioridad') ?></th>
            <td><?= h(prioridad($mantenimiento->prioridad)) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($mantenimiento->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mano Obra') ?></th>
            <td><?= h($mantenimiento->manoObra) ?></td>
        </tr>
    </table>
    <div class="row">
        
        <?= $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambDescripcion', $mantenimiento->id])); 
         echo $this->Form->control('descripcion', array('rows'=>'5' ,'cols'=>'90', 'label'=>false, 'onblur' => "this.form.submit()", 'name' => 'descripcion')); 
              $this->Form->end() ?>

    </div>
    <div>
        <br><?= $this->Html->link(__('Descargar Mantenimiento en PDF'), ['action' => 'view', $mantenimiento->id, '_ext' => 'pdf'],['class'=>'btn btn-sm btn-success']); ?></div>
    <table>
        <tr>
            <td>
    <div class="related">
        <h4><?= __('Repuestos') ?></h4>
        <?= $this->Html->link(__('Solicitar Repuesto'), ['controller' => 'Mantrepuesto','action' => 'add', $mantenimiento->id, 'Todas'],['class'=>'btn btn-sm btn-info']) ?>
        <?php if (!empty($repuestos)): ?>
        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col" class="actions"><?= __('Accion') ?></th>
                 </tr>
            <?php foreach ($repuestos as $repuesto): ?>
            <tr>
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->precio) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Quitar'), ['controller' => 'Mantrepuesto', 'action' => 'delete', $repuesto->mantrepuesto['id'], $mantenimiento->id], ['confirm' => __('Estas seguro que quieres quitar el repuesto # {0}?', $repuesto->descripcion), 'class'=>'btn btn-sm btn-danger']) ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</td><td>
    <div class="related">
        <h4><?= __('Servicios') ?></h4>
         <?= $this->Html->link(__('Seleccionar Servicio'), ['controller' => 'Mantservicio','action' => 'add', $mantenimiento->id],['class'=>'btn btn-sm btn-info']) ?>
        <?php if (!empty($servicios)): ?>
        <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('descripcion') ?></th>
                <th scope="col"><?= __('precio') ?></th>
                <th scope="col" class="actions"><?= __('Accion') ?></th>
            </tr>
            <?php foreach ($servicios as $servicio): ?>
            <tr>
                <td><?= h($servicio->descripcion) ?></td>
                <td><?= h($servicio->precio) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Quitar'), ['controller' => 'Mantservicio', 'action' => 'delete', $servicio->mantservicio['id'], $mantenimiento->id], ['confirm' => __('Estas seguro que quieres quitar el servicio # {0}?', $servicio->descripcion),'class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</td>
</tr>
    </table>
    <h3>Total : <?= total($mantenimiento->manoObra,$repuestos,$servicios)?> colones</h3>
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

function total($manoObra = null, $repuestos = null, $servicios = null){
     $total = 0;
     if($manoObra!=null){
        $total = $total + $manoObra;
     }
     if($repuestos!=null){
    foreach ($repuestos as $repuesto){
        $total = $total + $repuesto->precio; 
    }
}
if($servicios!=null){
foreach ($servicios as $servicio) {
    $total = $total + $servicio->precio;
}
}
    return $total;
}


?>