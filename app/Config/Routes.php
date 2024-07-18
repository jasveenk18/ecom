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
$routes->get('/family', 'FamilyMemberController::index');
$routes->post('/family/save', 'FamilyMemberController::save');
$routes->get('/family/createTable', 'FamilyMemberController::createTable'); 
