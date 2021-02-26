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
$router->get('/admin/categories/show/{id}','Backend/CategoryController@show');
$router->get('/admin/categories/create','Backend/CategoryController@create');
$router->post('/admin/categories','Backend/CategoryController@store');
$router->post('/admin/categories/update/{id}','Backend/CategoryController@update');
$router->post('/admin/categories/delete/{id}','Backend/CategoryController@destroy');
$router->get('/admin/categories/{id}/edit','Backend/CategoryController@edit');

//Movies
$router->get('/admin/movies','Backend/MovieController@index');
$router->get('/admin/movies/create','Backend/MovieController@create');
$router->post('/admin/movies','Backend/MovieController@store');
$router->get('/admin/movies/show/{id}','Backend/MovieController@show');
$router->post('/admin/movies/update/{id}','Backend/MovieController@update');
$router->post('/admin/movies/delete/{id}','Backend/MovieController@destroy');
$router->get('/admin/movies/{id}/edit','Backend/MovieController@edit');

//Videos
$router->get('/admin/videos','Backend/VideoController@index');
$router->get('/admin/videos/create','Backend/VideoController@create');
$router->post('/admin/videos','Backend/VideoController@store');
$router->get('/admin/videos/show/{id}','Backend/VideoController@show');
$router->post('/admin/videos/update/{id}','Backend/VideoController@update');
$router->post('/admin/videos/delete/{id}','Backend/VideoController@destroy');
$router->get('/admin/videos/{id}/edit','Backend/VideoController@edit');

//Users
$router->get('/admin/users','Backend/UserController@index');
$router->get('/admin/users/create','Backend/UserController@create');
$router->post('/admin/users','Backend/UserController@store');
$router->post('/admin/users/show/{id}','Backend/UserController@show');
$router->post('/admin/users/update/{id}','Backend/UserController@update');
$router->post('/admin/users/delete/{id}','Backend/UserController@destroy');
$router->get('/admin/users/{id}/edit','Backend/UserController@edit');
$router->get('/admin/reset-password','Backend/UserController@getFormResetPassword');
$router->post('/admin/reset-password','Backend/UserController@resetPassword');
$router->get('/admin/users/reset-password/{id}','Backend/UserController@getFomrResetPasswordUser');
$router->post('/admin/users/reset-password/{id}','Backend/UserController@resetPasswordUser');

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