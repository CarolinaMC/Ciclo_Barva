<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario[]|\Cake\Collection\CollectionInterface $usuario
 */
?>
<script>
    
    $(document).ready(function(){
    llenarAutoCompleteUsuario('<?php echo $usuarios ?>');
});

</script>
<div><br></div>
<div class="breadcrumbs-two" >
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de usuarios', 'url' => ['controller' => 'Usuario', 'action' => 'index']]
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
    <h3><?= __('Usuarios') ?></h3>
    <?= $this->Form->create('buscar', array('type' => 'GET',  'url' => ['action' => 'buscar'])) ?>   
    <div class="row">  
        <div class=" col-lg-6 col-md-10 col-sm-12">
        <?php echo $this->Form->input('buscar', array('label' => false, 'div' => false, 'id' => 'buscar', 'class' => 'form-control buscar', 'placeholder' => 'Buscar usuario por cédula o nombre','required'))?>
        </div>
        <div class=" col-lg-6 col-md-2 col-sm-12">
        <?= $this->Form->button('', array('div' => false, 'class' => 'fa fa-search btn btn-lg btn-primary' )); ?>
        </div>
    </div>
    <div><br></div>

    <?= $this->Html->link(__('   Agregar Usuario'), ['action' => 'add'],['class'=>' fa fa-user-plus btn btn-lg btn-success']) ?>
    <?= $this->Form->end(); ?>
    <div><br></div>
    <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr >
                <th scope="col"><?= $this->Paginator->sort('cédula') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('primer_apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puesto') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario as $usuario): ?>
            <tr ondblclick = "document.location = 'usuario/view/' +  <?= $usuario->id ?>;">
                <td><?= h($usuario->cedula) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td><?= h($usuario->primer_ape) ?></td>
                <td><?= h($usuario->puesto) ?></td>
                <td class="actions" >
                    <?= $this->Html->link(__(''), ['action' => 'edit', $usuario->id],['class'=>'fa fa-pencil btn btn-lg btn-primary']) ?>
                    <?= $this->Html->Link(__(''), ['action' => 'delete', $usuario->id], ['confirm' => __('Estas seguro que quieres eliminar al usuario  {0}?', $usuario->nombre),'class'=>' fa fa-trash-o btn btn-lg btn-danger']) ?>
                </td>
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


