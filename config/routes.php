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

    $routes->connect('/sessionobject',
        ['controller'=>'Sessions','action'=>'index']);
    $routes->connect('/sessionread',
        ['controller'=>'Sessions','action'=>'retrieve_session_data']);
    $routes->connect('/sessionwrite',
        ['controller'=>'Sessions','action'=>'write_session_data']);
    $routes->connect('/sessioncheck',
        ['controller'=>'Sessions','action'=>'check_session_data']);
    $routes->connect('/sessiondelete',
        ['controller'=>'Sessions','action'=>'delete_session_data']);
    $routes->connect('/sessiondestroy',
        ['controller'=>'Sessions','action'=>'destroy_session_data']);

    $routes->fallbacks('DashedRoute');

});
Plugin::routes();
