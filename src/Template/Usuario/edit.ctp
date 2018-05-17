<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<script>
function validaN(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function validaL(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8) return true;
        
    // Patron de entrada, en este caso solo acepta letras
    patron =/[A-Za-zñÑáÁéÉíÍóÓúÚÜü ]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>

<div><br></div>
<div class="breadcrumbs-two">
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Página Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de usuarios', 'url' => ['controller' => 'Usuario', 'action' => 'index']],
    ['title' => 'Editar usuario', 'url' => ['controller' => 'Usuario', 'action' => 'edit',$usuario->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<br>
<div >
    <div class="usuario form content">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <?php?>
        <table>
    <tr>
          <td> <?php echo $this->Form->control('cedula',array('label' =>'Cédula','type'=>'text','minlength'=>'9','maxlength'=>'9', 'onkeypress'=>'return validaEx(event)', 'readonly')); ?> </td>
            
          <td> <?php echo $this->Form->control('nombre',array('type'=>'text','onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras"  )); ?> </td>
            </tr>
<tr>
        <td> <?php echo $this->Form->control('primer_ape',array('label' =>'Primer apellido','type'=>'text', 'onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras" )); ?> </td>

        <td> <?php echo $this->Form->control('segundo_ape',array('label' =>'Segundo apellido','type'=>'text','onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras"  ));?> </td> 
    </tr>
            <tr>
                <td> <?php echo $this->Form->control('puesto', ['options' => ['administrador' =>'Administrador', 'dependiente' =>'Dependiente','mecanico' =>'Mecánico']]);?> </td>
        
                <td> <?php echo $this->Form->control('password',array('type'=>'password','minlength'=>'6','maxlength'=>'20','placeholder' => "Ingrese mínimo 6 caracteres")); ?> </td> 
            </tr>
            
        </table>

    </fieldset>
    <?= $this->Form->button('Editar', array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>
</div>