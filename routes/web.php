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
    $result = DB::update('update posts set title="Laravel is fun" where id=?', [4]);
    if ($result == 1)
        return "<h3>Successfully updated!</h3>";
    else
        return "<h3>Updating failed!</h3>";
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

Route::get('/read-model', function () {
    $posts = Post::all();
    foreach ($posts as $item) {
        echo "<h3><li>$item->title</li></h3>";
    }
});

Route::get('/find', function () {
    return Post::find(2);
});

Route::get('/find-where', function () {
    return Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
});

Route::get('/insert-model', function () {
    $post = new Post;
    $post->title = 'New model';
    $post->content = 'Wow eloquent is really cool';
    $post->save();
});

Route::get('/update-model', function () {
    return Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'NEW PHP title', 'content'=>'The content has also been updated']);
});

Route::get('/delete-model', function () {
    $post = Post::find(3);
    $post->delete();
});

Route::get('delete-easy', function () {
    Post::destroy(4);                         // delete single
    Post::destroy([1, 2]);                   // delete multiple
    Post::where('id_admin', 0)->delete();   // using where
});


/*
------------------------------------------------------
Mass Assignment
------------------------------------------------------
 */

Route::get('/create', function () {
    return Post::create(['title'=>'Title from mass', 'content'=>'This content has been created by mass assignment']);
});