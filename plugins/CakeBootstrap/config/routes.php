<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'CakeBootstrap',
    ['path' => '/cake-bootstrap'],
    function (RouteBuilder $routes) {
        // No routes
    }
);
