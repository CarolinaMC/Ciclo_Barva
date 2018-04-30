<?= $this->Html->css('menu') ?>

<?php if(isset($current_user)): ?>

<nav class="navbar navbar-expand-lg navbar-dark">

       
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-dark">

      
          <li class="nav-item dropdown logo">
            
                <?= $this->Html->image("ciclo.jpg", ["alt" => "Logo", 'class'=>'logo navbar-brand', 'url' => ['controller' => 'Usuario', 'action' => 'home']]);?>
                
              
            
          </li>
          <li class="nav-item dropdown cic">
            <?= $this->Html->link("Ciclo Barva", ['controller'=>'Usuario', 'action'=>'home'], ['class'=>'dropdown-item cic'])?>
          </li>
      



    <?php if(isset($current_user['puesto']) and $current_user['puesto']==='administrador'):?>
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <?= $this->Html->link('Lista de Usuarios',['controller'=>'Usuario', 'action'=>'index'],['class'=>'dropdown-item'])?>
            <div class="dropdown-divider"></div>
          <?= $this->Html->link('Agregar Usuario',['controller'=>'Usuario', 'action'=>'add'],['class'=>'dropdown-item'])?>
           
          
        </div>
      </li>
    <?php endif;?>

    
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
          Cliente
          <?php endif; ?>
          <?php if(isset($current_user['puesto']) and $current_user['puesto']==='mecanico'):?>
          Bicicleta
          <?php endif; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

          <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
            <?= $this->Html->link('Lista de Clientes',['controller'=>'Cliente', 'action'=>'index'],['class'=>'dropdown-item'])?>
            
          <?= $this->Html->link('Agregar Cliente',['controller'=>'Cliente', 'action'=>'add'],['class'=>'dropdown-item'])?>
            <div class="dropdown-divider"></div>
          <?php endif;?>

          <?= $this->Html->link('Lista de Bicicletas',['controller'=>'Bicicleta', 'action'=>'index'],['class'=>'dropdown-item'])?>
           
          <?= $this->Html->link('Agregar Bicicleta',['controller'=>'Bicicleta', 'action'=>'add'],['class'=>'dropdown-item'])?>
        </div>
      </li>
    
      
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimiento
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
              <?= $this->Html->link('Lista de Mantenimiento',['controller'=>'Mantenimiento', 'action'=>'index'],['class'=>'dropdown-item '])?>
              <?= $this->Html->link('Agregar Mantenimiento',['controller'=>'Mantenimiento', 'action'=>'add'],['class'=>'dropdown-item '])?>
              <?= $this->Html->link('Vista Mecanico',['controller'=>'Mantenimiento', 'action'=>'mechanic'],['class'=>'dropdown-item '])?>
              <?= $this->Html->link('Vista reparado',['controller'=>'Mantenimiento', 'action'=>'repaired'],['class'=>'dropdown-item '])?>
              <?= $this->Html->link('Vista entregada',['controller'=>'Mantenimiento', 'action'=>'delivered'],['class'=>'dropdown-item '])?>
            
            <div class="dropdown-divider"></div>
          <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
              <?= $this->Html->link('Lista de boleta',['controller'=>'boleta', 'action'=>'index'],['class'=>'dropdown-item '])?>
              <?= $this->Html->link('Agregar boleta',['controller'=>'boleta', 'action'=>'add'],['class'=>'dropdown-item '])?>
            
            <div class="dropdown-divider"></div>
          <?php endif; ?>

            <?= $this->Html->link('Lista de Servicio',['controller'=>'Servicio', 'action'=>'index'],['class'=>'dropdown-item '])?>
            <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
            <?= $this->Html->link('Agregar Servicio',['controller'=>'Servicio', 'action'=>'add'],['class'=>'dropdown-item '])?>
            <?php endif; ?>
            <div class="dropdown-divider"></div>
            
            <?= $this->Html->link('Lista de Repuesto',['controller'=>'Repuesto', 'action'=>'index'],['class'=>'dropdown-item '])?>
            <?php if(isset($current_user['puesto']) and $current_user['puesto']!=='mecanico'):?>
              <?= $this->Html->link('Agregar Repuesto',['controller'=>'Repuesto', 'action'=>'add'],['class'=>'dropdown-item '])?>
            
          <div class="dropdown-divider"></div>
          
            <?= $this->Html->link('Lista de Marcas',['controller'=>'Marca', 'action'=>'index'],['class'=>'dropdown-item '])?>
          <?= $this->Html->link('Agregar Marca',['controller'=>'Marca', 'action'=>'add'],['class'=>'dropdown-item '])?>
            <?php endif; ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"><?= $current_user['nombre']?>  <?= $current_user['puesto']?></a>

      </li>
       <li class="salir">
         <?= $this->Html->link('Salir',['controller'=>'Usuario', 'action'=>'logout'],['class'=>'dropdown-item nav-link'])?>
       </li>
      
       
      


     

 
       
    </ul>
    
  </div>
  
   
  
</nav>

<?php endif; ?>