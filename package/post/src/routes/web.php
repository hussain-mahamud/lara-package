<?php
Route::group(['namespace'=>'Hussain\Post\Http\Controllers'],function(){
    Route::get('/post', 'PostController@index');
    Route::post('/post', 'PostController@store')->name('post.store');
});

