<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'user',
    'namespace' => 'Fractal\User\Infrastructure\Http\Controller'], function() {

    Route::get('/articles/{id}', ['as' => 'user.articles', 'uses' => 'UserController@getArticles']);
    Route::post('/create', ['uses' => 'UserController@createUser']);
    Route::get('/{id}', ['uses' => 'UserController@getUser']);
    Route::post('/login', ['uses' => 'UserController@login']);
   
});
