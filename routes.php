<?php 

$router->get('', 'PagesController@index');
$router->get('register', 'UsersController@showRegisterForm');
$router->post('register', 'UsersController@register');