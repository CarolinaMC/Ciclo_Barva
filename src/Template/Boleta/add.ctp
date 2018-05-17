<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>

<?php if(isset($current_user)): ?>
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
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
    ['title' => 'Agregar boleta', 'url' => ['controller' => 'Boleta', 'action' => 'add']]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);
echo $this->Breadcrumbs->render();
    ?>
</div>

<div class="cliente index content">
    <h4 class=""><legend><?= __('Seleccione un cliente para crear la boleta') ?></legend></h4>
    
   <div class="form-group">

        <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?> 
        <table class ="horizontal-table" cellpadding="0" cellspacing="0">
            <div class="row">  
        <div class=" col-lg-6 col-md-10 col-sm-12">
                <?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar cliente por nombre o número de teléfono', 'required'))?>
                </div>
        <div class=" col-lg-6 col-md-2 col-sm-12">
                <?= $this->Form->button('', array('div' => false, 'class' => 'fa fa-search btn btn-lg btn-primary')); ?>
                </div>
    </div>
    </div>
    <br>
    
    <?= $this->Html->link(__('Agregar Cliente'), ['controller' => 'Cliente','action' => 'add'],['class'=>'fa fa-user-plus btn btn-lg btn-success']) ?>
     <?= $this->Form->end(); ?>
    <div><br></div> 
    <div class="table-responsive">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('teléfono') ?></th>
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
<div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>'']); ?>
            <?= $this->Paginator->next('>') ?>     
        </div>
    </div> 
</div>
<?php endif; ?>