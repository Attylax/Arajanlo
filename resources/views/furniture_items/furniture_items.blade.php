@extends('layout.basic')
@section('pageTitle')
    Bútor adatok
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
        var url = "<?php echo route('furniture_item_ajax.index')?>";
    </script>

    <script src="{{ URL::asset('js/ajax_files/furniture_item_ajax.js') }}"></script>
@stop


@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furniture_items.css') }}"/>
@stop

@section('content')
    <div id="furniture_items">
        <div id="furniture_items_title_section">
            <img src="{{asset('Images/dummy_image.jpg')}}" style="width: 15em;height: 11em">
            <div id="furniture_items_desc">
                <h1>Butor Nev</h1>
                <p>Ar: 523 LEI</p>
                <p>Méretek: X:421 m | Y:659 m | Z:7 m</p>
            </div>
        </div>

        <div id="furniture_items_table">
            <h2>Fa alkoto-elemek</h2>
            <table>
                <tr>
                    <th scope="col" rowspan="2">Elem név</th>
                    <th scope="col" colspan="2">Faanyag</th>
                    <th scope="col" colspan="3">Méretek</th>
                    <th scope="col" colspan="2">Felületkezelés</th>
                    <th scope="col" rowspan="2">Mennyiség</th>
                    <th scope="col" rowspan="2">Ár/db</th>
                    <th scope="col" rowspan="2">Művelet</th>

                </tr>
                <tr>
                    <th>Név</th>
                    <th>Típus</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>Y</th>
                    <th>Megnevezés</th>
                    <th>Oldalak</th>
                </tr>


            </table>

            {{--New item--}}
            <div id="create-button-container">
                <button type="button" class="my_button" data-toggle="modal" data-target="#create-item">
                    Új elem
                </button>
            </div>

            {{--New item end--}}

            <h2>Egyeb alkoto-elemek</h2>
            <table id="other_items_table">
                <tr>
                    <th>Név</th>
                    <th>Mennyiség</th>
                    <th>Művelet</th>
                </tr>


            </table>

        </div>


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

                    <form data-toggle="validator" action="{{ route('item-ajax.store') }}" method="POST">
                        {{--Elem neve--}}
                        <div class="form-group">
                            <label class="control-label" for="name">Elem név:</label>
                            <input type="text" name="name" class="popup_text_input"
                                   data-error="Kérem írja be az elem nevét." required/>
                            <div class="help-block with-errors"></div>
                        </div>
                        {{--Faanyag--}}
                        <div class="form-group">
                            <label class="control-label" for="lumber_type">Faanyag:</label>
                            <select name="lumber_type" class="popup_select_input">
                                @foreach ($wooden as $wood)
                                    <option value="{{$wood->id}}">
                                        {{$wood->name}}
                                    </option>
                                @endforeach
                            </select>
                            {{--{{Form::select('cicus',null,null,array('class' =>'popup_select_input')) }}--}}
                        </div>
                        {{--Méretek--}}
                        <div class="form-group">
                            <label class="control-label">Elem méretei(méterben):</label>
                            <label class="popup_size_label" for="sizeX">X:</label>
                            <input type="number" step="0.01" min="0" max="50" name="sizeX" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <label class="popup_size_label" for="sizeY">Y:</label>
                            <input type="number" step="0.01" min="0" max="50" name="sizeY" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <label class="popup_size_label" for="sizeZ">Z:</label>
                            <input type="number" step="0.01" min="0" max="50" name="sizeZ" class="popup_size_input"
                                   data-error="Az ertekek 0 es 50 kozott kell legyenek." value="1">
                            <div class="help-block with-errors"></div>
                        </div>
                        {{--Felületkezelés tipusa és oldalszám--}}

                        <div class="form-group">

                            <label class="control-label" for="finish">Felületkezelés:</label>
                            <select name="finish" class="popup_select_input">
                                @foreach ($finish as $finish_it)
                                    <option value="{{$finish_it->id}}">
                                        {{$finish_it->name}}
                                    </option>
                                @endforeach
                            </select>
                            <label class="control-label" for="title">Oldalak:</label>
                            <input type="number" step="1" min="0" max="2" name="number_of_sides"
                                   class="popup_size_input"
                                   data-error="Az ertekek 0 es 2 kozott kell legyenek." value="1">
                            <div class="help-block with-errors"></div>
                        </div>

                        {{--Mennyiség--}}
                        <div class="form-group">
                            <label class="control-label" for="title">Mennyiség:</label>
                            <input type="number" step="1" min="1" max="1000000" name="quantity"
                                   class="popup_text_input"
                                   data-error="Az ertekek 1 es 1000000 kozott kell legyenek." value="1">
                            <div class="help-block with-errors"></div>
                        </div>

                        {{--Ár/db (leiben)--}}
                        <div class="form-group">
                            <label class="control-label" for="price">Ár/db (leiben):</label>

                            <input type="number" step="0.01" min="0" name="price" class="popup_text_input"
                                   data-error="Kérem írja be az egysegarat." required>
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="my_button">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- Create section end. --}}

@stop