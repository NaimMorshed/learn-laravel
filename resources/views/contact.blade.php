@extends('layouts.app')

@section('title')
    Contact Page
@stop

@section('header')
    <h1 class="text-3xl font-bold">Contact</h1>
@stop

@section('content')
    <h3 class="text-2xl font-bold">Peoples List</h3>
    @if (count($people))
        <ol>
            @foreach ($people as $person)
                <li class="list-disc text-lg">{{$person}}</li>
            @endforeach
        </ol>
    @endif
@stop