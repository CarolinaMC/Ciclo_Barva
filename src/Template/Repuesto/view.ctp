<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto $repuesto
 */
?>
<div class="repuesto view large-12 medium-8 columns content">
    <h3><?= h($repuesto->descripcion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($repuesto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= h($repuesto->categoria) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($repuesto->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
        </tr>
       <!--  <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($repuesto->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($repuesto->precio) ?></td>
        </tr>
    </table>
</div>
