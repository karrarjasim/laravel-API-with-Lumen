<?php

use \App\Song;
use \App\Category;

$router->get('/', function () use ($router) {
 return $router->app->version();
});


//Register and Login Routes
$router->group(['prefix'=>'api/v1'], function() use($router){
    
    $router->get('/songs','SongController@index'); //show all songs
    $router->post('/login', 'LoginController@login');
    $router->post('/register', 'UserController@register');
    $router->get('/user', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);
    $router->post('/add-song', ['middleware' => 'auth', 'uses' =>  'SongController@add_song']);
    $router->post('/delete-song', ['middleware' => 'auth', 'uses' =>  'SongController@delete_song']);

    });

    
          