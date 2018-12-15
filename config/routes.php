<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/generate2', ['controller' => 'Tests', 'action' => 'index']);
    $routes->redirect('/generate1','http://tutorialspoint.com/');
    $routes->connect('/generate_url',['controller'=>'Generates','action'=>'index']);
    $routes->fallbacks('DashedRoute');
});
Plugin::routes();