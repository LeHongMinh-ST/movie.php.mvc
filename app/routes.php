<?php

//Auth
$router->get('/admin/login','Auth/LoginController@showFormLogin');
$router->post('/admin/login','Auth/LoginController@login');
$router->post('/admin/logout','Auth/LoginController@logout');

//Backend
$router->get('/admin',function (){
    header('location: ' . URL . '/admin/dashboard');
});
$router->get('/admin/dashboard','Backend/DashboardController@index');

//Categories
$router->get('/admin/categories','Backend/CategoryController@index');
$router->get('/admin/categories/create','Backend/CategoryController@create');
$router->post('/admin/categories','Backend/CategoryController@store');
$router->post('/admin/categories/update/{id}','Backend/CategoryController@update');
$router->post('/admin/categories/delete/{id}','Backend/CategoryController@destroy');
$router->get('/admin/categories/{id}/edit','Backend/CategoryController@edit');

//Movies
$router->get('/admin/movies','Backend/MovieController@index');
$router->get('/admin/movies/create','Backend/MovieController@create');
$router->post('/admin/movies','Backend/MovieController@store');
$router->post('/admin/movies/show/{id}','Backend/MovieController@show');
$router->post('/admin/movies/update/{id}','Backend/MovieController@update');
$router->post('/admin/movies/delete/{id}','Backend/MovieController@destroy');
$router->get('/admin/movies/{id}/edit','Backend/MovieController@edit');

//Videos
$router->get('/admin/videos','Backend/VideoController@index');
$router->get('/admin/videos/create','Backend/VideoController@create');
$router->post('/admin/videos','Backend/VideoController@store');
$router->post('/admin/videos/show/{id}','Backend/VideoController@show');
$router->post('/admin/videos/update/{id}','Backend/VideoController@update');
$router->post('/admin/videos/delete/{id}','Backend/VideoController@destroy');
$router->get('/admin/videos/{id}/edit','Backend/VideoController@edit');

//Frontend
$router->get('/home', 'Frontend/HomeController@index');
$router->get('/', function (){
    header('location: '.URL.'/home');
});

$router->post('/search','Frontend/HomeController@search');
$router->get('/about','Frontend/HomeController@about');
$router->get('/movies','Frontend/HomeController@getAllMovie');
$router->get('/movies/{slug}','Frontend/HomeController@showMovieDetail');
$router->get('/tv-series','Frontend/HomeController@getAllTVSeries');
$router->get('/tv-series/{slug}/{id}','Frontend/HomeController@showTVSeriesDetail');
$router->get('/tv-series/{slug}','Frontend/HomeController@showTVSeriesDetail');
$router->get('/category/{category}','Frontend/HomeController@getMovieOfCategory');




?>