<?= $this->Html->css('menu') ?>

<?php if(isset($current_user)): ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
   


    <ul class="navbar-nav nav2">
      
      <a href="../usuario/home">
          <li>
             <?= $this->Html->image("ciclo.jpg", [
          "alt" => "Logo", 'class'=>'logo', 'label'=>'Ciclo Barva',
         'url' => ['controller' => 'Usuario', 'action' => 'home']
          ]);?> 
          Ciclo Barva
          </li>
      </a>

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

      <ul class="navbar-nav nav1">
        <li>
          <div>
            <h4><?= $current_user['nombre']?>  <?= $current_user['puesto']?></h4>
          </div>
        </li>
        <li class="nav-item dropdown">
        
          <?= $this->Html->link('Salir',['controller'=>'Usuario', 'action'=>'logout'],['class'=>'dropdown-item'])?>
         
        
      </li>
      </ul>
       
    </ul>
      
    <ul>
     
    </ul>

  
  </nav>
   <?php endif; ?>