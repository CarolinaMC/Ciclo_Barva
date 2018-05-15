<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bicicletum[]|\Cake\Collection\CollectionInterface $bicicleta
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de bicicletas', 'url' => ['controller' => 'Bicicleta', 'action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="bicicleta index large-12 medium-8 columns content">
    <h3><?= __('Bicicleta') ?></h3>  
    <div class="form-group">
        <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?>   
        <table class ="horizontal-table" cellpadding="0" cellspacing="0">
        <tr>
        <th>
        <?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar bicicleta por cliente o color','required'))?>
        </th>
        <th>
        <?= $this->Form->button('', array('div' => false, 'class' => 'fa fa-search btn btn-lg btn-primary' )); ?>
        </th>
        </tr>
        </table>
    </div>
        <?= $this->Html->link(__(' Agregar Bicicleta'), ['action' => 'add'],['class'=>'fa fa-user-plus btn btn-sm btn-success']) ?>  
         <?= $this->Form->end(); ?>
    <div><br></div>  
<div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tamano') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bicicleta as $bicicletum): ?>
            <tr onclick = "document.location = '/Ciclo_Barva/bicicleta/view/' +  <?= $bicicletum->id ?>;" >
                <td><?= $bicicletum->has('cliente') ? $this->Html->link($bicicletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $bicicletum->cliente->id]) : '' ?></td>            
                <td><?= $bicicletum->has('marca') ? $this->Html->link($bicicletum->marca->nombre, ['controller' => 'Marca', 'action' => 'view', $bicicletum->marca->id]) : '' ?></td>
                <td><?= h($bicicletum->color) ?></td> 
                <td><?= h($bicicletum->tamano) ?></td>
               <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $bicicletum->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->Html->Link(__(''), ['action' => 'delete', $bicicletum->id], ['confirm' => __('Estas seguro que quieres eliminar la bicicleta  {0} del cliente {1}?', $bicicletum->color, $bicicletum->cliente->nombre),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
     <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< anterior') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('siguiente >') ?>     
        </div>
    </div>
</div>
