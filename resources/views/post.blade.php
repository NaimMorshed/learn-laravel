@extends('layouts.app')

@section('title') 
    Post Page
@stop

@section('content')
    <h1>Post: {{$id}} {{$name}} {{$password}}</h1>
@stop
