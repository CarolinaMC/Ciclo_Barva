<div >
<h2>Mantenimento</h2>
    <dl>
        <dt><?= __('Numero') ?></dt>
        <dd>
            <?= $this->Number->format($mantenimiento->id) ?>
            &nbsp;
        </dd>
        <dt><?= __('Garantia') ?></dt>
        <dd>
            <?= h($mantenimiento->garantia) ?>
            &nbsp;
        </dd>
        <dd>
            <dt><?= __('descricion') ?></dt>
            <?= h($mantenimiento->descripcion) ?>
            &nbsp;
        </dd>
    <div >
        <h4><?= __('Repuestos') ?></h4>
        <?php if (!empty($repuestos)): ?>
        <table >
            <tr>
                <th scope="col"><?= __('Descripcion') ?></th>
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
                <th scope="col"><?= __('descripcion') ?></th>
                <th scope="col"><?= __('precio') ?></th>
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
    </dl>
</div>