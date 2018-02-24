<nav class="navbar navbar-toggleable-md navbar-dark bg-danger">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  	<?= $this->Html->link('Ciclo Barva',['controller'=>'Usuario', 'action'=>'home'],['class'=>'navbar-brand'])?>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Usuarios',['controller'=>'Usuario', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Usuario',['controller'=>'Usuario', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Clientes',['controller'=>'Cliente', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Cliente',['controller'=>'Cliente', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Bicicletas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Bicicletas',['controller'=>'Bicicleta', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Bicicleta',['controller'=>'Bicicleta', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Marca
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Marcas',['controller'=>'Marca', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Marca',['controller'=>'Marca', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Repuesto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Repuesto',['controller'=>'Repuesto', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Repuesto',['controller'=>'Repuesto', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Servicio
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?= $this->Html->link('Lista de Servicio',['controller'=>'Servicio', 'action'=>'index'],['class'=>'dropdown-item'])?>
          <?= $this->Html->link('Agregar Servicio',['controller'=>'Servicio', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>
    </ul>
  </div>
</nav>