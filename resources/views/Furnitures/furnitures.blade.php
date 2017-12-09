@extends('layout.basic')
@section('pageTitle')
    Bútorok
@stop

@section('css')

@stop

@section('content')
    <tr>
        <td>
            <div class="furniture_table_element">
                <img src="{{asset('Images/dummy_image.jpg')}}">
                <h1>Item name</h1>
                <p>Box short description</p>
            </div>
        </td>
        <td></td>
    </tr>

@stop