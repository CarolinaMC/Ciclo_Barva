<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicio[]|\Cake\Collection\CollectionInterface $servicio
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de servicios', 'url' => ['action' => 'index']],
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
    <h3><?= __('Servicio') ?></h3>
    <h4></h4>
        <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
        <?= $this->Html->link(__('  Agregar servicio'), ['action' => 'add'],['class'=>'fa fa-plus btn btn-lg btn-success']) ?>       
        <?php endif; ?>
    
    <div><br></div>  
<div class="table-responsive">

    <table class ="table table-striped table-hover"  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('descripción') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                 <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicio as $servicio): ?>
            <tr ondblclick  = "document.location = '/Ciclo_Barva/servicio/view/' +  <?= $servicio->id ?>;">
                <td><?= h($servicio->descripcion) ?></td>
                <td><?= $this->Number->format($servicio->precio) ?></td>
                <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
                <td class="actions">
                    
                    <?= $this->Html->link(__(''), ['action' => 'edit', $servicio->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $servicio->id], ['confirm' => __('Estas seguro que quieres eliminar el servicio  {0}?', $servicio->descripcion),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>
                
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
