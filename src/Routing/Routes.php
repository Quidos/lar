<?php

namespace Quidos\Lar\Routing;

$routes = new RouteCollection();

$routes->get('/user/{userId}', 'UserController@show');
$routes->post('/user', 'UserController@create');

return $routes;