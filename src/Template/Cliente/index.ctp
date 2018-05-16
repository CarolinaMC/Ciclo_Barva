<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $cliente
 */
?> 

<script>
    
    $(document).ready(function(){
    llenarAutoCompleteCliente('<?php echo $clientes ?>');
});
</script>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de clientes', 'url' => ['controller' => 'Cliente', 'action' => 'index']],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
</script> 
  <div class="">
<div class="cliente index large-12 medium-8 content">
    <h3><?= __('Clientes') ?></h3>


    <div class="form-group">
    <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?> 
        <table class ="horizontal-table" cellpadding="0" cellspacing="0">
            <tr>
                <th>
                <?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar cliente por nombre o número de teléfono', 'required'))?>
                </th>
                <th>
                <?= $this->Form->button('', array('div' => false, 'class' => 'fa fa-search btn btn-lg btn-primary')); ?>
                 </th>
            </tr>
        </table>
    </div>
   
    <?= $this->Html->link(__('   Agregar Cliente'), ['action' => 'add'],['class'=>' fa fa-user-plus btn btn-lg btn-success']) ?>
    <?= $this->Form->end(); ?>
    <div><br></div>
    <div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cédula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teléfono') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente as $cliente): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/cliente/view/' +  <?= $cliente->id ?>;" >
                <td><?= h($cliente->cedula) ?></td>
                <td><?= h($cliente->nombre) ?></td>
                <td><?= h($cliente->primer_ape) ?></td>
                <td><?= h($cliente->segundo_ape) ?></td>
                <td><?= h($cliente->alias) ?></td>
                <td><?= h($cliente->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__(''), ['action' => 'edit', $cliente->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->html->Link(__(''), ['action' => 'delete', $cliente->id], ['confirm' => __('Estas seguro que quieres eliminar al cliente  {0}?', $cliente->nombre),'class'=>'fa fa-trash-o btn btn-lg btn-danger']) ?>
                     <!--<?= $this->Html->link(__(''), ['controller' => 'Bicicleta','action' => 'add'],['class'=>'fa fa-plus fa fa-bicycle btn btn-lg btn-success']) ?>-->
                </td>
            </tr >
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< ' . __('')) ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>''] ) ?>
            <?= $this->Paginator->next(__('') . ' >') ?>
        </div>
    </div>
</div>