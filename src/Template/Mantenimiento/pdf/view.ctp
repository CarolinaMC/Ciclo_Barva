<div >
    <?= $this->Html->image("ciclo.jpg", [
          "alt" => "Logo", 'class'=>'logo', 'label'=>'Ciclo Barva'
          ]);?>
<h2>Mantenimento # <?= $this->Number->format($mantenimiento->id) ?></h2>
    <dl>
       
        <dt><?= __('Cliente') ?></dt>
        <dd>
            <?= $nombre ?>
            &nbsp;
        </dd>

        <dt><?= __('Descripcíon') ?></dt>
        <dd>
            <?= h($mantenimiento->descripcion) ?>
            &nbsp;
        </dd>

        <dt><?= __('Mano de obra') ?></dt>
        <dd>
            <?= h($mantenimiento->manoObra) ?>
            &nbsp;
        </dd>
    <div >
        <h4><?= __('Repuestos') ?></h4>
        <?php if (!empty($repuestos)): ?>
        <table >
            <tr>
                <th scope="col"><?= __('Descripcíon') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                 </tr>
            <?php foreach ($repuestos as $repuesto): ?>
            <tr>
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->precio) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <div >
        <h4><?= __('Servicios') ?></h4>
         <?php if (!empty($servicios)): ?>
        <table >
            <tr>
                <th scope="col"><?= __('Descripcíon') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
               </tr>
            <?php foreach ($servicios as $servicio): ?>
            <tr>
                <td><?= h($servicio->descripcion) ?></td>
                <td><?= h($servicio->precio) ?></td>
                
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div><h3>Total : <?= total($mantenimiento->manoObra,$repuestos,$servicios)?></h3></div>
    </dl>
</div>

<?php 
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