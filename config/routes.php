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

    $routes->connect('/auth',['controller'=>'Authexs','action'=>'index']);

    $routes->connect('/login',['controller'=>'Authexs','action'=>'login']);

    $routes->connect('/logout',['controller'=>'Authexs','action'=>'logout']);

    $routes->fallbacks('DashedRoute');

});
Plugin::routes();
