<?php
use Cake\Routing\Router;

Router::plugin('Ptb', function ($routes) {
    $routes->fallbacks('DashedRoute');
});
