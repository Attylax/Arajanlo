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
        var boxID = "<?php echo $_GET['boxID']?>"
    </script>

    <script src="{{ URL::asset('js/furniture-ajax.js') }}"></script>
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furnitures.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/furniture_items.css') }}"/>
@stop

@section('content')

    <div id="create-button-container">
        <button type="button" class="my_button" data-toggle="modal" data-target="#create-item">
            Új elem
        </button>
    </div>
    <div class="furniture_row">
        <!--<a href="#" class="furniture_table_element">
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
        </a> -->

    </div>

@stop

@section('popups')

    {{-- Create section --}}

    <div class="popup_main" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="popup_dialog" role="document">
            <div class="popup_header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="popup_title" id="myModalLabel">Create Item</h4>
            </div>
            <div class="popup_form">
                <div class="modal-body">

                    <form data-toggle="validator" action="{{ route('furniture-ajax.store') }}"
                          method="POST">
                        {{--Elem neve--}}
                        <div class="form-group">
                            <label class="control-label" for="name">Elem név:</label>
                            <input type="text" name="name" class="popup_text_input"
                                   data-error="Kérem írja be az elem nevét." required/>
                            <div class="help-block with-errors"></div>
                        </div>

                        {{--Méretek--}}
                        <div class="form-group">
                            <label class="control-label">Elem méretei(méterben):</label>
                            <label class="popup_size_label" for="sizeX">X:</label>
                            <input type="number" step="1" min="0" max="50000" name="sizeX" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <label class="popup_size_label" for="sizeY">Y:</label>
                            <input type="number" step="1" min="0" max="50000" name="sizeY" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <label class="popup_size_label" for="sizeZ">Z:</label>
                            <input type="number" step="1" min="0" max="50000" name="sizeZ" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <div class="help-block with-errors"></div>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="my_button crud-submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- Create section end. --}}

