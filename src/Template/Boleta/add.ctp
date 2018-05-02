<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>
<?php
/** <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Boleta'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['controller' => 'Cliente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Cliente', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuario'), ['controller' => 'Usuario', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuario', 'action' => 'add']) ?></li>
    </ul>

</nav>*/
?>
<?php /*
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?= $this->Form->create($boletum) ?>
    
        <legend><?= __('Agregar Boleta') ?></legend>
                <table>
                <tr>
                <td> <?php echo $this->Form->control('cliente_id', array( 'div' => false, 'id' => 'cliente_id', 'placeholder' => 'tel Cliente', 'required', 'type' => 'text')); ?> 
                </td>

                <td> <?php echo $this->Form->control('usuario_id', array( 'div' => false, 'id' => 'usuario_id', 'placeholder' => 'cedula usuario', 'required', 'type' => 'text'));?> 
                </td> 
            </tr>
            <tr>
                <td>
                   <?php echo $this->Form->control('fecha_entrada'); ?>
                </td>

                <td>
                   <?php echo $this->Form->control('fecha_salida'); ?>
                </td>

            </tr>
            </table>
            </form>

            <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
        $(document).ready(function(){
    llenarAutoCompleteClienteBici('<?php echo $clientes ?>');
    llenarAutoCompleteUsuario('<?php echo $usuarios ?>');
});

</script>

<?php /**
<div class="boleta form large-9 medium-8 columns content">
    <?= $this->Form->create($boletum) ?>
    <fieldset>
        <legend><?= __('Add Boletum') ?></legend>
        <?php
            echo $this->Form->control('fecha_entrada');
            echo $this->Form->control('fecha_salida');
            echo $this->Form->control('cliente_id', ['options' => $cliente]);
            echo $this->Form->control('usuario_id', ['options' => $usuario]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>


<script>
    
    $(document).ready(function(){
    llenarAutoCompleteCliente('<?php echo $clientes ?>');
});

</script> 
<div><br></div>
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
    <h3><?= __('Clientes') ?></h3>
    <div class="form-group">
    <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?> 
<?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar Cliente', 'required'))?>
    </div>
    <?= $this->Form->button('buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Form->end(); ?>
    <?= $this->Html->link(__('Agregar Cliente'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
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
            <tr onclick = "comfirmar('<?php echo($cliente->nombre) ?>' , '<?php echo($cliente->id) ?>', '<?php echo($current_user['id']) ?>' )"; >
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