<?php

use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return "<h1>This is about page</h1>";
});

// Route::get('/post/{id}', function ($id) {
//     return "<h1>This is Post number $id</h1>";
// });

Route::get('/details/{id}/{name}', function ($id, $name) {
    return "<h1>This is Post from $name $id</h1>";
});

Route::get('admin/posts/example', array('as' => 'admin.home', function(){
    $url = route('admin.home');
    return "This url is: $url";
}));

Route::get('/home', function () {
    return view('home');
});


// Controller, along with data
Route::get('/controller/{id}', 'App\Http\Controllers\PostsController@index');

Route::resource('/posts', 'App\Http\Controllers\PostsController');

Route::get('/contact', 'App\Http\Controllers\PostsController@contact');

Route::get('/post/{id}/{name}/{password}', 'App\Http\Controllers\PostsController@show_post');


