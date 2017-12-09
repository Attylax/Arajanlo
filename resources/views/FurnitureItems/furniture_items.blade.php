@extends('layout.basic')
@section('pageTitle')
    Bútorok
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furniture_items.css') }}"/>
@stop

@section('content')
    <div id="furniture_items">
        <img src="{{asset('Images/dummy_image.jpg')}}" style="width: 15em;height: 11em">
        <h1>Butor Nev</h1>
        <p>Ar: 523 LEI</p>
        <p>Méretek: X:421 m | Y:659 m | Z:7 m</p>

        {{--Todo: make the lists of items, both types of it--}}

    </div>

@stop