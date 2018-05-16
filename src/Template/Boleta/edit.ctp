<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>
<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
    ['title' => 'Editar boleta', 'url' => ['controller' => 'Boleta', 'action' => 'edit',$boletum->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>

<div class="boleta form large-12 medium-8 columns content">
    <?= $this->Form->create($boletum) ?>
    <fieldset>
         <legend><?= __('Editar Bicicleta') ?></legend>

         <table>
            <tr>
                <td> <?php echo $this->Form->control('Fecha de entrada', array('value'=>[$boletum->fecha_entrada],'type' => 'text','readonly')); ?> </td>
                </tr>

                 <td> <?php echo $this->Form->control('fecha_salida', array('value'=>[$boletum->fecha_entrada],'type' => 'text','readonly')); ?> </td>
                </tr>

            <tr>
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
