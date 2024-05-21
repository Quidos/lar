<?php

namespace Quidos\Lar\Routing;

// use Symfony\Component\Routing;

// $routes = new Routing\RouteCollection();

// $routes->add('home', new Routing\Route('/home/{id}', ['id' => 0]));

// return $routes;

$routes = new RouteCollection();

$routes->add(new Route('GET', '/user/{id}'));

return $routes;