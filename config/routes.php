<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Tests', 'action' => 'index']);

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect('tests/:arg1/:arg2', ['controller' => 'Tests', 'action'=>
        'args'],['pass' =>['arg1', 'arg2']]);

    $routes->connect('/redirectcontroller',['
         controller'=>'Redirects','action'=>'action1']);

    $routes->connect('/redirectcontroller2',['
         controller'=>'Redirects','action'=>'action2']);

    $routes->connect('/exception/:arg1/:arg2',[
        'controller'=>'Exps','action'=>'index'],['pass' => ['arg1', 'arg2']]);

    $routes->fallbacks('DashedRoute');

});
Plugin::routes();
