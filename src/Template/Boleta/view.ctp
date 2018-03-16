<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>

<div class="boleta view large-9 medium-8 columns content">
    <h3>Boleta # <?= h($boletum->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->nombre, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Entrada') ?></th>
            <td><?= h($boletum->fecha_entrada) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Salida') ?></th>
            <td><?= h($boletum->fecha_salida) ?></td>
        </tr>
    </table>

    <button type="button" class="btn btn-success" onclick="nuevo_mantenimiento('<?php echo($boletum->id) ?>', '<?php echo($boletum->cliente->id) ?>')" >Nuevo Mantenimiento</button>
</div>
