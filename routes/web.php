<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

use function GuzzleHttp\Promise\all;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
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

Route::get('/home', function () {
    return view('home');
});


/*
------------------------------------------------------
CONTROLLER along with data
------------------------------------------------------
 */

Route::get('/controller/{id}', 'App\Http\Controllers\PostsController@index');

Route::resource('/posts', 'App\Http\Controllers\PostsController');

Route::get('/contact', 'App\Http\Controllers\PostsController@contact');

Route::get('/post/{id}/{name}/{password}', 'App\Http\Controllers\PostsController@show_post');


/*
------------------------------------------------------
DATABASE Raw SQL Queries
------------------------------------------------------
 */

Route::get('/insert', function () {
    $result = DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is the best thing that has happened with Laravel']);
    if ($result == 1)
        return "<h3>Post created successfully</h3>";
    else
        return "<h3>Error creating post</h3>";
});

Route::get('/read', function () {
    //return DB::select('select * from posts where id = ?', [1]);
    $result = DB::select('select * from posts');
    foreach ($result as $item) {
        echo "<li><b>Title:</b> $item->title, <b>Content:</b> $item->content</li>";
    }
});

Route::get('/update', function () {
    return DB::update('update posts set title="Title updated" where id=?', [1]);
});

Route::get('/delete', function () {
    $result = DB::delete('delete from posts where id=?', [1]);
    if ($result == 1)
        return "<h3>Deleted!</h3>";
    else
        return "<h3>Not deleted!</h3>";
});


/*
------------------------------------------------------
ELOQUENT Model
------------------------------------------------------
 */

Route::get('/readmodel', function () {
    $posts = Post::all();
    foreach ($posts as $item) {
        echo "<h3><li>$item->title</li></h3>";
    }
});

Route::get('/find', function () {
    return Post::find(1);
});