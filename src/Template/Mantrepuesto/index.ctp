<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $mantrepuesto
 */
?>
<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de mantenimiento de repuesto', 'url' => ['action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="mantrepuesto index large-9 medium-8 columns content">
    <h3><?= __('Mantrepuesto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repuesto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mantenimiento_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mantrepuesto as $mantrepuesto): ?>
            <tr>
                <td><?= $this->Number->format($mantrepuesto->id) ?></td>
                <td><?= h($mantrepuesto->fecha) ?></td>
                <td><?= $this->Number->format($mantrepuesto->repuesto_id) ?></td>
                <td><?= $this->Number->format($mantrepuesto->mantenimiento_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mantrepuesto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mantrepuesto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mantrepuesto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mantrepuesto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
