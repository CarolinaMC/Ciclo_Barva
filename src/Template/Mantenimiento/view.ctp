<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mantenimiento $mantenimiento
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de mantenimientos', 'url' => ['action' => 'index']],
    ['title' => 'Ver mantenimiento', 'url' => ['action' => 'view',$mantenimiento->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>

<div class="mantenimiento view large-12 medium-8 columns content">
    <h3>Mantenimiento #<i><?= h($mantenimiento->id)?></i><i class="fa fa-user btn btn-lg"></i><?= $this->Html->link(h($cliente['nombre']).' '.h($cliente['primer_ape']).' '.h($cliente['segundo_ape']),['controller' => 'Cliente', 'action' => 'view', $cliente['id']]) ?></h3>
    <h4></h4>
        <table class="vertical-table">
        <tr>
            <th><?= $this->Html->link(__(' Descargar Mantenimiento en PDF'), ['action' => 'view', $mantenimiento->id, '_ext' => 'pdf'],['class'=>'fa fa-file-pdf-o btn btn-lg btn-success']); ?></th>
            <td>
                 <h5>Total : <?= total($mantenimiento->manoObra,$repuestos,$servicios)?> colones</h5>
            </td>
        </tr>
 </table>
    <div><br></div>
<h5>Detalle</h5>
    <div class="table-responsive">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bicicleta') ?></th>
            <td><?= $mantenimiento->has('bicicletum') ? $this->Html->link($mantenimiento->bicicletum->marca_nombre . "  "  . $mantenimiento->bicicletum->color . "  " . $mantenimiento->bicicletum->tamano, ['controller' => 'Bicicleta', 'action' => 'view', $mantenimiento->bicicletum->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Garantía') ?></th>
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
            <th scope="row"><?= __('Costo mano de obra') ?></th>
            <td><i class="btn btn-lg">    &#8353</i></i><?= h($mantenimiento->manoObra) ?></td>
        </tr>
    </table>
</div>
<div><br></div>
    <h5>Descripción</h5>
    <div class="table-responsive">   <?= $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambDescripcion', $mantenimiento->id])); 
         echo $this->Form->control('descripcion', array('rows'=>'5' ,'cols'=>'90', 'label'=>false, 'onblur' => "this.form.submit()", 'name' => 'descripcion')); 
              $this->Form->end() ?>
    </div>
    <br><br>
    <h4></h4>
    <table>
        <tr>
            <td>
                <div class="related">
                    <h4><?= __('Repuestos') ?></h4>
                    <?= $this->Html->link(__('Solicitar Repuesto'), ['controller' => 'Mantrepuesto','action' => 'add', $mantenimiento->id, 'Todas'],['class'=>'btn btn-sm btn-info']) ?>
                    <?php if (!empty($repuestos)): ?>
                    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Descripción') ?></th>
                            <th scope="col"><?= __('Precio') ?></th>
                            <th scope="col" class="actions"><?= __('Acción') ?></th>
                             </tr>
                        <?php foreach ($repuestos as $repuesto): ?>
                        <tr>
                            <td><?= h($repuesto->descripcion) ?></td>
                            <td><?= h($repuesto->precio) ?></td>
                            <td class="actions">
                                <?= $this->Form->postLink(__(''), ['controller' => 'Mantrepuesto', 'action' => 'delete', $repuesto->mantrepuesto['id'], $mantenimiento->id], ['confirm' => __('Estas seguro que quieres quitar el repuesto # {0}?', $repuesto->descripcion), 'class'=>' fa fa-close btn btn-lg btn-danger']) ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </td>
            <td>
                <div class="related">
                    <h4><?= __('Servicios') ?></h4>
                     <?= $this->Html->link(__('Seleccionar Servicio'), ['controller' => 'Mantservicio','action' => 'add', $mantenimiento->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?php if (!empty($servicios)): ?>
                    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Descripción') ?></th>
                            <th scope="col"><?= __('precio') ?></th>
                            <th scope="col" class="actions"><?= __('Acción') ?></th>
                        </tr>
                        <?php foreach ($servicios as $servicio): ?>
                        <tr>
                            <td><?= h($servicio->descripcion) ?></td>
                            <td><?= h($servicio->precio) ?></td>
                            <td class="actions">
                                <?= $this->Form->postLink(__(''), ['controller' => 'Mantservicio', 'action' => 'delete', $servicio->mantservicio['id'], $mantenimiento->id], ['confirm' => __('Estas seguro que quieres quitar el servicio # {0}?', $servicio->descripcion),'class'=>'fa fa-close btn btn-lg btn-danger']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
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