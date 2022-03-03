@extends('layouts.app')

@section('title') 
    Post Page
@stop

@section('header')
    <h1 class="text-3xl font-bold">Posts</h1>
@stop

@section('content')
    <div class="grid grid-rows-3 border border-gray-400 p-5 bg-gray-50">
        <section class="grid grid-cols-2 gap-2">
            <span class="text-xl font-semibold">ID: </span>
            <span class="text-lg font-normal">{{$id}}</span>
        </section>
        <section class="grid grid-cols-2 gap-2">
            <span class="text-xl font-semibold">Name: </span>
            <span class="text-lg font-normal">{{$name}}</span>
        </section>
        <section class="grid grid-cols-2 gap-2">
            <span class="text-xl font-semibold">Password: </span>
            <span class="text-lg font-normal">{{$password}}</span>
        </section>
    </div>
@stop
