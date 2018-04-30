
<div><br></div>
<div>
	<?php $this->Breadcrumbs->add([
    ['title' => 'Pagina Principal', 'url' => ['controller' => 'Usuario', 'action' => 'home']],
]);

$this->Breadcrumbs->templates([
    'wrapper' => '<ol class="breadcrumbs">{{content}}</ol>',
     'item' => '<li><a href="{{url}}">{{title}}</a></li>',
]);

echo $this->Breadcrumbs->render();
	?>
</div>
<div id"encabezado" class="header-title">
	<div class="col-sm-12" align="center"><h2><b>Menú Principal<b></h2></div>

</div>
<div>
<br><br>
</div>
<div class="row">
<<<<<<< HEAD
	<?php if(isset($current_user['puesto']) and $current_user['puesto']==='administrador'):?>
<div class="contenedor" id="uno">
<h1  class="imagen"><?= $this->Html->image("usuario2.png")?></h1>
<h3 class="home"><?= $this->Html->link("Menú de Usuario",['controller'=>'Usuario', 'action'=>'index'])?></h3>
<?php $this->Breadcrumbs->add('Menú de Usuario',['controller'=>'Usuario', 'action'=>'index'])?>
</div>
	<?php endif; ?>
=======
<?php if(isset($current_user['puesto']) and $current_user['puesto']==='administrador'):?>
	<a href="../usuario/index">
		<div class="contenedor" id="uno">
			<h1  class="imagen"><?= $this->Html->image("usuario2.png")?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Usuario",['controller'=>'Usuario', 'action'=>'index'])?></h3>
		</div>
	</a>
<?php endif; ?>
>>>>>>> origin/master

<?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
	<a href="../cliente/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12"><?= $this->Html->image("cliente1.png",['controller'=>'Cliente', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Cliente",['controller'=>'Cliente', 'action'=>'index'])?></h3>
		</div>
	</a>
<?php endif; ?>

	<a href="../bicicleta/index"><div class="contenedor" id="uno">
			<h1 class="col-sm-12" ><?= $this->Html->image("bicicleta.png",['controller'=>'Bicicleta', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Bicicleta",['controller'=>'Bicicleta', 'action'=>'index'])?></h3>
		</div>
	</a>



<?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
	<a href="../marca/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12" ><?= $this->Html->image("marca1.png",['controller'=>'Marca', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Marca",['controller'=>'Marca', 'action'=>'index'])?></h3>
		</div>
	</a>
<?php endif; ?>

	<a href="../repuesto/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12" ><?= $this->Html->image("repuesto2.png",['controller'=>'Repuesto', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Repuesto",['controller'=>'Repuesto', 'action'=>'index'])?></h3>
		</div>
	</a>
	
	<a href="../servicio/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12" ><?= $this->Html->image("servicio3.png",['controller'=>'Servicio', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Servicio",['controller'=>'Servicio', 'action'=>'index'])?></h3>
		</div>
	</a>

<?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>

	<a href="../boleta/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12" ><?= $this->Html->image("boleta3.png",['controller'=>'Boleta', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Menú de Boleta",['controller'=>'Boleta', 'action'=>'index'])?></h3>
		</div>
	</a>

<?php endif; ?>
	<a href="../mantenimiento/index">
		<div class="contenedor" id="uno">
			<h1 class="col-sm-12"><?= $this->Html->image("servicio.png",['controller'=>'Mantenimiento', 'action'=>'index'])?></h1>
			<h3 class="home"><?= $this->Html->link("Mantenimiento",['controller'=>'Mantenimiento', 'action'=>'index'])?></h3>
		</div>
	</a>
</div>

