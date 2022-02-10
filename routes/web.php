<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return "<h1>This is about page</h1>";
});

Route::get('/post/{id}', function ($id) {
    return "<h1>This is Post number $id</h1>";
});

Route::get('/details/{id}/{name}', function ($id, $name) {
    return "<h1>This is Post from $name $id</h1>";
});

Route::get('admin/posts/example', array('as' => 'admin.home', function(){
    $url = route('admin.home');
    return "This url is: $url";
}));
