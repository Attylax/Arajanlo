@extends('layout.basic')
@section('pageTitle')
    Bútorok
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furnitures.css') }}"/>
@stop

@section('content')

    <div class="furniture_row">
        <a href="#" class="furniture_table_element">
            <img src="{{asset('Images/dummy_image.jpg')}}">
            <h1>Tárgy neve</h1>
            <p>Ar: 523 LEI</p>
            <p class="furniture_sizes">Méretek: X:421 m | Y:659 m | Z:7 m</p>
        </a>
        <a href="#" class="furniture_table_element">
            <img src="{{asset('Images/dummy_image.jpg')}}">
            <h1>Tárgy neve</h1>
            <p>Ar: 523 LEI</p>
            <p class="furniture_sizes">Méretek: X:421 m | Y:659 m | Z:7 m</p>
        </a>
    </div>

@stop