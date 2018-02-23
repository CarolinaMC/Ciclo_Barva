<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $cliente
 */
?>    <div class="">
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">

<script>
    
    $(document).ready(function(){
    llenarAutoCompleteCliente('<?php echo $clientes ?>');
});

</script>

<div class="cliente index large-9 medium-8 content">
    <h3><?= __('Clientes') ?></h3>
    <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?>
    <div class="form-group"> 
<?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar Cliente'))?>
    </div>
    <?= $this->Form->button('buscar', array('div' => false, 'class' => 'btn btn-primary')); ?>
    <?= $this->Html->link(__('Agregar Cliente'), ['action' => 'add'],['class'=>'btn btn-sm btn-success']) ?>
    <?= $this->Form->end(); ?>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('cedula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('segundo_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente as $cliente): ?>
            <tr>
                <td><?= h($cliente->cedula) ?></td>
                <td><?= h($cliente->nombre) ?></td>
                <td><?= h($cliente->primer_ape) ?></td>
                <td><?= h($cliente->segundo_ape) ?></td>
                <td><?= h($cliente->alias) ?></td>
                <td><?= h($cliente->telefono) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $cliente->id],['class'=>'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $cliente->id],['class'=>'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Estas seguro que quieres eliminar al cliente  {0}?', $cliente->nombre),'class'=>'btn btn-sm btn-danger']) ?>
                    <?= $this->Html->link(__('Agregar Bicicleta'), ['action' => 'view', $cliente->id],['class'=>'btn btn-sm btn-success']) ?>
                    <!-- poner aqui en accion una direccion al add de bicicleta  -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="paginator">
        <div class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers(['before'=>'','after'=>''] ) ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </div>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
</div>
