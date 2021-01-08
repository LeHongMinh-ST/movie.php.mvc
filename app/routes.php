<?php

//Frontend
$router->get('/home', 'Frontend/HomeController@index');
$router->get('/', function (){
    header('location: '.URL.'/home');
});


?>