<script>
function validaN(e){
    if(!document.getElementById('extranjero').checked){
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
return 0;
}
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
    ['title' => 'Lista de clientes', 'url' => ['controller' => 'Cliente', 'action' => 'index']],
    ['title' => 'Editar cliente', 'url' => ['controller' => 'Cliente', 'action' => 'edit',$cliente->id]]
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<dl class="">{{content}}</dl>',
     'item' => '<dd><a href="{{url}}">{{title}}</a></dd>'
]);

echo $this->Breadcrumbs->render();
    ?>
</div>
<div class="cliente form large-12 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Editar Cliente') ?></legend>
        <?php
            echo $this->Form->control('extranjero',array('type'=>'checkbox','id'=>'extranjero')); ?>
  <table>
    <tr>
          <td> <?php echo $this->Form->control('cedula',array('label' =>'Cédula','type'=>'text','minlength'=>'9','maxlength'=>'9', 'onkeypress'=>'return validaN(event)', 'readonly')); ?> </td>
            
          <td> <?php echo $this->Form->control('nombre',array('type'=>'text', 'onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras")); ?> </td>
            </tr>
<tr>
        <td> <?php echo $this->Form->control('primer_ape',array('label' =>'Primer apellido','type'=>'text','onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras" )); ?> </td>

        <td> <?php echo $this->Form->control('segundo_ape',array('label' =>'Segundo apellido','type'=>'text', 'onkeypress'=>'return validaL(event)','placeholder' => "Ingrese solo letras"));?> </td> 
    </tr>
        <tr>
         <td> <?php echo $this->Form->control('alias',array('type'=>'text'));?> </td>
            
           <td> <?php echo $this->Form->control('telefono',array('label' =>'Teléfono','type'=>'text','minlength'=>'8','maxlength'=>'8','onkeypress'=>'return validaN(event)','placeholder' => "Ingrese solo números")); ?> </td> 
       </tr>
            <tr>
                <td> <?php echo $this->Form->control('email',array('type'=>'text','placeholder' => "Ejemplo: elena93@gmail.com"));?> </td>

            <td><?php echo $this->Form->control('direccion',array('label' =>'Dirección','placeholder'=>"Ingrese una dirección física"));
        ?></td>
    </tr>
        </table>
    </fieldset>
    <?= $this->Form->button('Editar',array('div' => false, 'class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>