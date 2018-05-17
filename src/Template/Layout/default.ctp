<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        CicloBarva
    </title>
    
   
    </div>



    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('red.css') ?>
    <?= $this->Html->css('login.css') ?>
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('easy-autocomplete') ?>
    <?= $this->Html->css('easy-autocomplete.themes') ?>
    <?= $this->Html->css('style.css')?>
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    
    <?= $this->Html->script('jquery-3.3.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('jquery.easy-autocomplete') ?>
    <?= $this->Html->script('search') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body class="fondo" style="position: relative; top: 63px;">

    <div class="contenedor1">
        <?= $this->element('menu1')?>
         <?= $this->Flash->render() ?>
        <div class="container-fluid">
            <div class="row">
              <div class=" col-lg-2 col-md-1 col-sm-1">
              </div>
              <div class=" col-lg-10 col-md-11 col-sm-11">
            <?= $this->fetch('content') ?>
        </div>
        <div class=" col-lg-2 col-md-1 col-sm-1">
        </div>
        </div>
        </div>
        <?= $this->element('footer')?>
         <?= $this->Flash->render() ?> 
                      
                  
    </div>
</body>
</html>
