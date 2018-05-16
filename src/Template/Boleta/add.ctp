<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>


<script>
    
    $(document).ready(function(){
    llenarAutoCompleteCliente('<?php echo $clientes ?>');
});

</script> 
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
    ['title' => 'Agregar boleta', 'url' => ['controller' => 'Boleta', 'action' => 'add']]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);
echo $this->Breadcrumbs->render();
    ?>
</div>
  <div class="">
<div class="cliente index large-12 medium-8 content">
    <h3><?= __('Seleccione un cliente para crear la boleta') ?></h3>
    <div class="form-group">
    <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?> 
<?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar Cliente', 'required'))?>
    </div>
    <?= $this->Form->button('buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Form->end(); ?>
    <?= $this->Html->link(__('Agregar Cliente'), ['controller' => 'Cliente','action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente as $cliente): ?>
            <tr ondblclick = "comfirmar('<?php echo($cliente->nombre) ?>' , '<?php echo($cliente->id) ?>', '<?php echo($current_user['id']) ?>' )"; >
                <td><?= h($cliente->telefono) ?></td>
                <td><?= h($cliente->nombre) ?></td>
                <td><?= h($cliente->primer_ape) ?></td>
                <td><?= h($cliente->segundo_ape) ?></td>
                <td><?= h($cliente->alias) ?></td>
                </tr >
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
</div>