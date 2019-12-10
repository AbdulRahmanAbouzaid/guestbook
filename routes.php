<?php 

$router->get('', 'MessagesController@index');
$router->get('register', 'UsersController@showRegisterForm');
$router->post('register', 'UsersController@register');

$router->get('login', 'UsersController@showLoginForm');
$router->post('login', 'UsersController@login');

$router->get('logout', 'UsersController@logout');

$router->post('messages/add', 'MessagesController@addMessage');
$router->get('messages/delete', 'MessagesController@deleteMessage');
