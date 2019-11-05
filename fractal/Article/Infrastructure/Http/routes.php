<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['web'], 
    'prefix' => '',
    'namespace' => 'Fractal\Article\Infrastructure\Http\Controller'], function() {

    Route::get('/articles', ['as' => 'articles', 'uses' => 'ArticleController@getAllArtical']);
   
});
