<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum[]|\Cake\Collection\CollectionInterface $boleta
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);
echo $this->Breadcrumbs->render();
    ?>
</div>

<div class="boleta index large-12 medium-8 columns content">
    <h3>
        <?= __('Boleta') ?>
        <?= $this->Html->link(__('Nueva Boleta'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
    </h3>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr >
                <th scope="col"><?= $this->Paginator->sort('fecha_entrada') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_salida') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boleta as $boletum): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/boleta/view/' +  <?= $boletum->id ?>;">
                <td><?= h($boletum->fecha_entrada) ?></td>
                <td><?= h($boletum->fecha_salida) ?></td>
                <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->id, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
                <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->id, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $boletum->id]) ?>
                    <?= $this->html->Link(__('Eliminar'), ['action' => 'delete', $boletum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $boletum->id)]) ?>
                </td>
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
