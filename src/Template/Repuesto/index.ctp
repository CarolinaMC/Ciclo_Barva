<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repuesto[]|\Cake\Collection\CollectionInterface $repuesto
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de repuestos', 'url' => ['action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="repuesto index large-12 medium-8 columns content">
    <h3><?= __('Repuesto') ?></h3>
    <h4></h4>
    <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
    <?= $this->Html->link(__(' Agregar repuesto'), ['action' => 'add'],['class'=>'fa fa-plus btn btn-lg btn-success']) ?>  
         <?= $this->Form->end(); ?>
         <?php endif; ?>
    <div><br></div>  
<div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoría') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
                 <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repuesto as $repuesto): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/repuesto/view/' +  <?= $repuesto->id ?>;">
                <td><?= h($repuesto->descripcion) ?></td>
                <td><?= h($repuesto->categoria) ?></td>
                <td><?= h($repuesto->estado) ?></td>
                <td><?= $this->Number->format($repuesto->precio) ?></td>
                <td><?= $repuesto->has('marca') ? $this->Html->link($repuesto->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $repuesto->marca->id]) : '' ?></td>
                <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <td class="actions">
                   
                    <?= $this->Html->link(__(''), ['action' => 'edit', $repuesto->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $repuesto->id], ['confirm' => __('Estas seguro que quieres eliminar el repuesto  {0}?', $repuesto->descripcion),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>

                </td>
                <?php endif; ?>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('>') ?>     
        </div>
    </div>
</div>
