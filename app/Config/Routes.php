<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/loginSubmit', 'Home::loginSubmit');
$routes->post('/loginSuccessful', 'Home::loginSuccessful');
$routes->post('/signUp', 'Home::signUp');
$routes->get('/address', 'Home::address');
$routes->post('/address/submit', 'Home::saveAddress');
$routes->get('/logout', 'Home::logout');


