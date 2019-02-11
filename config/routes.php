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

    $routes->fallbacks('DashedRoute');

    $routes->connect('cookie/write',['controller'=>'Cookies','action'=>'write_cookie']);
    $routes->connect('cookie/read',['controller'=>'Cookies','action'=>'read_cookie']);
    $routes->connect('cookie/check',['controller'=>'Cookies','action'=>'check_cookie']);
    $routes->connect('cookie/delete',['controller'=>'Cookies','action'=>'delete_cookie']);

});
Plugin::routes();
