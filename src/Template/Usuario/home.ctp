
<div>
<br><br>
</div>

<div id"encabezado" class="col-sm-12">
	<div class="col-sm-4"></div>
	<div class="col-sm-4" align="center"><h2><b>Menú Principal<b></h2></div>
	<div class="col-sm-4"></div>

</div>


<div>
<br><br>
</div>

<div class="contenedor" id="uno">
<h1><?= $this->Html->link("Menú de Usuario",['controller'=>'Usuario', 'action'=>'index'])?></h1>
</div>

<div class="contenedor" id="dos">
<h1><?= $this->Html->link("Menú de Cliente",['controller'=>'Cliente', 'action'=>'index'])?></h1>
</div>

<div class="contenedor" id="tres">
<h1><?= $this->Html->link("Menú de Bicicleta",['controller'=>'Bicicleta', 'action'=>'index'])?></h1>
</div>
<div class="contenedor" id="cuatro">
<h1><?= $this->Html->link("Menú de Repuesto",['controller'=>'Repuesto', 'action'=>'index'])?></h1>
</div>
<div class="contenedor" id="cinco">
<h1><?= $this->Html->link("Menú de Marca",['controller'=>'Marca', 'action'=>'index'])?></h1>
</div>
<div class="contenedor" id="seis">
<h1><?= $this->Html->link("Menú de Servicio",['controller'=>'Servicio', 'action'=>'index'])?></h1>
</div>

<br><br>