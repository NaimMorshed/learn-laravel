@extends('layouts.app')

@section('title')
    Home
@stop

@section('header')
    <h1 class="text-3xl font-bold">Home</h1>
@stop

@section('content')
    <h1 class="text-2xl">Welcome</h1>
    <p class="text-3xl font-bold">This is learning basics of Laravel</p>
    <span class="text-2xl font-semibold mt-10">👉Links</span>
    <div class="mt-10 text-xl text-blue-500">
        <a class="border border-blue-200 p-3 bg-gray-50 hover:bg-blue-100 cursor-pointer" href="/welcome">Welcome</a>
        <a class="border border-blue-200 p-3 bg-gray-50 hover:bg-blue-100 cursor-pointer" href="/home">Home</a>
        <a class="border border-blue-200 p-3 bg-gray-50 hover:bg-blue-100 cursor-pointer" href="/contact">Contact</a>
    </div>
@stop
