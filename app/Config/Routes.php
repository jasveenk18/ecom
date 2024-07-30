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
$routes->get('/address-form', 'AddressController::showForm');
$routes->post('/save-address', 'AddressController::saveAddress');
$routes->get('/all-addresses', 'AddressController::showAllAddresses');
$routes->get('/AllAddresses', 'Home::showAllAddresses');
$routes->get('/product/create', 'ProductController::create');
$routes->post('/product/store', 'ProductController::store');
$routes->get('/product/all', 'ProductController::showAllProducts');



