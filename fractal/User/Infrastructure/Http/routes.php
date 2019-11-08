<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['web'], 
    'prefix' => 'user',
    'namespace' => 'Fractal\User\Infrastructure\Http\Controller'], function() {

    Route::get('/articles/{id}', ['as' => 'user.articles', 'uses' => 'UserController@getArticles']);
    Route::post('/create', ['uses' => 'UserController@createUser']);
    Route::post('/login', ['uses' => 'UserController@login']);
   
});
