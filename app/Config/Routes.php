<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/add', 'Home::add');
$routes->get('/edit/(:any)', 'Home::edit/$1');
$routes->post('/update', 'Home::update');
$routes->post('/save', 'Home::save');
$routes->delete('/delete/(:any)', 'Home::delete/$1');
