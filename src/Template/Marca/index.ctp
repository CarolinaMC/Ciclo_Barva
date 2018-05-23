<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marca[]|\Cake\Collection\CollectionInterface $marca
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de marcas', 'url' => ['action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<br>
<div>
    <h3><?= __('Marcas') ?></h3>
    <h4></h4>
     <?= $this->Html->link(__(' Agregar marca'), ['action' => 'add'],['class'=>'fa fa-plus btn btn-lg btn-success']) ?>
      <?= $this->Form->end(); ?>
    <div><br></div>
    <div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marca as $marca): ?>
            <tr ondblclick = "document.location = 'marca/view/' +  <?= $marca->id ?>;">
                <td><?= h($marca->nombre) ?></td>
                <td><?= h($marca->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $marca->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $marca->id], ['confirm' => __('Estas seguro que quieres eliminar la marca  {0}?', $marca->nombre),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
      <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('>') ?>     
        </div>
    </div>
</div>

