<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('extend',['controller'=>'Extends','action'=>'index']);
    $routes->connect('extend',['controller'=>'Extends','action'=>'hallow']);
    $routes->fallbacks('DashedRoute');
});
Plugin::routes();