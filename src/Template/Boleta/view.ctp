<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Boletum $boletum
 */
?>
<!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->


<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>


<div><br></div>
<div>
    <?php 
    $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
    ['title' => 'Lista de boletas', 'url' => ['controller' => 'Boleta', 'action' => 'index']],
     ['title' => 'Ver boleta', 'url' => ['controller' => 'Boleta', 'action' => 'view',$boletum->id]],
]);
    
$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);
echo $this->Breadcrumbs->render();
    ?>
</div>


<div class="boleta view large-9 medium-8 columns content">
    <h3>Boleta # <?= h($boletum->id) ?></h3>
          <div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
        <?=  $this->Form->create($boletum, array('type' => 'POST', 'class'=>"form-horizontal", 'url' => ['action' => 'asinarFechaEntrega', h($boletum->id)])) ?>
     <div class="form-group ">
      <label class="control-label col-sm-2  for="fecha_salida">
       Fecha Entrega 
      </label>
      <div class="col-sm-10">
       <div class="input-group">
        <div class="input-group-addon">
         <i class="fa fa-calendar">
         </i>
        </div>
        <?= $this->Form->control('fecha_salida',array('label'=> false , 'name'=> 'fecha_salida' ,'id'=>'fecha_salida', 'placeholder'=>"DD/MM/YYYY", 'type'=>"text", 'onchange' => "this.form.submit()")); ?>
       </div>
      </div>
      <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <input name="_honey" style="display:none" type="text"/>
       
      </div>
     </div>
     </div>
    <?= $this->Form->end(); ?>
   </div>
  </div>
 </div>
</div>
<div class="row">
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $boletum->has('cliente') ? $this->Html->link($boletum->cliente->nombre, ['controller' => 'Cliente', 'action' => 'view', $boletum->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $boletum->has('usuario') ? $this->Html->link($boletum->usuario->nombre, ['controller' => 'Usuario', 'action' => 'view', $boletum->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Entrada') ?></th>
            <td><?= h($boletum->fecha_entrada) ?></td>
        </tr>
    </table>

    <button type="button" class="btn btn-success" onclick="nuevo_mantenimiento('<?php echo($boletum->cliente->nombre) ?>','<?php echo($boletum->id) ?>', '<?php echo($boletum->cliente->id) ?>')" >Nuevo Mantenimiento</button>
</div>
<?php if (!empty($boletum->mantenimiento)): ?>
 <table class ="table table-striped table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('garantia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioridad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($boletum->mantenimiento as $mantenimiento): ?>
            <tr ondblclick = "document.location = '/Ciclo_Barva/mantenimiento/view/' +  <?= $mantenimiento->id ?>;">
                <td><?= h($mantenimiento->garantia) ?></td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarP', $mantenimiento->id])) ?>

                <?= $this->Form->control('prioridad',array('label'=> false , 'name'=> 'prioridad', 'onchange' => "this.form.submit()", 'options'=>array(
                    '4'=>'Baja',
                    '3'=>'Media',
                    '2'=>'Alta',
                    '1'=>'Urgente'

                ))); ?>
                <?= $this->Form->end(); ?>
                </td>
                <td><?=  $this->Form->create($mantenimiento, array('type' => 'POST',  'url' => ['action' => 'cambiarE', $mantenimiento->id])) ?>
              <?php      
                 echo $this->Form->control('estado',array('label'=> false , 'name'=> 'estado', 'onchange' => "this.form.submit()",'options'=>array(
                    'espera'=>'Espera',
                    'reparando'=>'Reparando',
                    'reparada'=>'Reparada',
                    'entregada'=>'Entregada'

                ))); ?>
                <?= $this->Form->end(); ?>
                </td>
                <td><?= $mantenimiento->descripcion ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <h3> La boleta no posee mantenimientos asignados </h3>
    <?php endif; ?>
</div>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


<script>
    $(document).ready(function(){
      var date_input=$('input[name="fecha_salida"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yy',
        container: container,
        todayHighlight: true,
        autoclose: true
      };
      date_input.datepicker(options);
    })
</script>