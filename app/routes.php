<?php

//Auth
$router->get('/admin/login','Auth/LoginController@showFormLogin');
$router->post('/admin/login','Auth/LoginController@login');
$router->post('/admin/logout','Auth/LoginController@logout');

//Backend
$router->get('/admin/dashboard','Backend/DashboardController@index');

//Frontend
$router->get('/home', 'Frontend/HomeController@index');
$router->get('/', function (){
    header('location: '.URL.'/home');
});


?>