<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('template',['controller'=>'Products','action'=>'view']);
    $routes->fallbacks('DashedRoute');
});
Plugin::routes();