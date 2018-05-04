<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Usuario', 'action' =>'login']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

// Router::scope('/usuario', function (RouteBuilder $routes) { 
//     $routes->connect('/login', ['controller' => 'Usuario', 'action' => 'login']);
//     $routes->connect('/index', ['controller' => 'Usuario', 'action' => 'index']);
//     $routes->connect('/view', ['controller' => 'Usuario', 'action' => 'view']);
//     $routes->connect('/add', ['controller' => 'Usuario', 'action' => 'add']);
//     $routes->connect('/edit', ['controller' => 'Usuario', 'action' => 'edit']);
//     $routes->connect('/delete', ['controller' => 'Usuario', 'action' => 'delete']);
//     $routes->fallbacks(DashedRoute::class);
// });

// Router::scope('/cliente', function (RouteBuilder $routes) { 
//     $routes->connect('/index', ['controller' => 'Cliente', 'action' => 'index']);
//     $routes->connect('/view', ['controller' => 'Cliente', 'action' => 'view']);
//     $routes->connect('/add', ['controller' => 'Cliente', 'action' => 'add']);
//     $routes->connect('/edit', ['controller' => 'Cliente', 'action' => 'edit']);
//     $routes->connect('/delete', ['controller' => 'Cliente', 'action' => 'delete']);
//     $routes->fallbacks(DashedRoute::class);
// });

//Ruta para usuario
// Router::connect('/usuario/login',['controller'=>'Usuario','action'=>'login']); 
// Router::connect('/cliente/index',['controller'=>'Cliente','action'=>'index']);
// Router::connect('/marca/index',['controller'=>'Marca','action'=>'index']);
// Router::connect('/bicicleta/index',['controller'=>'Bicicleta','action'=>'index']);

/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

Router::scope('/mantenimiento', function ($routes) {
    $routes->extensions('pdf');
    $routes->connect('/index/*', ['controller' => 'Mantenimiento', 'action' => 'index']);
    $routes->connect('/view/*', ['controller' => 'Mantenimiento', 'action' => 'view']);
    $routes->connect('/add/*', ['controller' => 'Mantenimiento', 'action' => 'add']);
     $routes->connect('/edit/*', ['controller' => 'Mantenimiento', 'action' => 'edit']);
    $routes->connect('/delete/*', ['controller' => 'Mantenimiento', 'action' => 'delete']);
     $routes->connect('/cambDescripcion/*', ['controller' => 'Mantenimiento', 'action' => 'cambDescripcion']);
   $routes->connect('/mechanic/*', ['controller' => 'Mantenimiento', 'action' => 'mechanic']);
   $routes->connect('/delivered/*', ['controller' => 'Mantenimiento', 'action' => 'delivered']);
   $routes->connect('/repaired/*', ['controller' => 'Mantenimiento', 'action' => 'repaired']);
   $routes->connect('/initialize/*', ['controller' => 'Mantenimiento', 'action' => 'initialize']);
   $routes->connect('/cambiarP/*', ['controller' => 'Mantenimiento', 'action' => 'cambiarP']);
   $routes->connect('/cambiarE*', ['controller' => 'Mantenimiento', 'action' => 'cambiarE']);
   $routes->connect('/list/*', ['controller' => 'Mantenimiento', 'action' => 'list']);
   $routes->connect('/vistaPorBicicleta/*', ['controller' => 'Mantenimiento', 'action' => 'vistaPorBicicleta']);
   $routes->connect('/vistaPorCliente/*', ['controller' => 'Mantenimiento', 'action' => 'vistaPorCliente']);
    $routes->fallbacks('InflectedRoute');
});