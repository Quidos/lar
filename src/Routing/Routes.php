<?php

namespace Quidos\Lar\Routing;

$routes = new RouteCollection();

$routes->get('/', 'UserController@index');
$routes->get('/user/{userId}', 'UserController@show');
$routes->post('/user', 'UserController@create');

return $routes;