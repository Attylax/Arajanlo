@extends('layout.basic')
@section('pageTitle')
    Bútorok
@stop

@section('javascript')
    <script type="text/javascript"
            src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js')}}"></script>
    <script type="text/javascript"
            src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>

    <script type="text/javascript">
        var url = "<?php echo route('furniture-ajax.index')?>";
    </script>

    <script src="{{ URL::asset('js/furniture-ajax.js') }}"></script>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furnitures.css') }}"/>
@stop

@section('content')
    {{\Illuminate\Support\Facades\Input::get('szia')}}
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