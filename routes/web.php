<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'ProductController@index');

$router->get('/products', 'ProductController@index');

$router->get('/product/{id}', 'ProductController@detail');

$router->post('/product', 'ProductController@create');

$router->put('/product/{id}', 'ProductController@update');

$router->post('/product/order', 'ProductController@order');

$router->delete('/product/{id}', 'ProductController@destroy');

//$router->get('/key', function() {
//    return \Illuminate\Support\Str::random(32);
//});

