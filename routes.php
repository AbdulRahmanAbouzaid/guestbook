<?php 

$router->get('', 'PagesController@index');
$router->get('register', 'UsersController@showRegisterForm');
$router->post('register', 'UsersController@register');

$router->get('login', 'UsersController@showLoginForm');
$router->post('login', 'UsersController@login');

$router->get('logout', 'UsersController@logout');