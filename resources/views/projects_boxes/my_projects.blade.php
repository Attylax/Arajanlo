
@extends('layout.basic')
@section('pageTitle')
    Munkáim
@stop

@section('javascript')
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>

    <!--<link rel="stylesheet" type="text/css" href=" {{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css') }}"> -->
    <script type="text/javascript">
        var url = "<?php echo route('item-ajax.index')?>";
    </script>

    <script type="text/javascript">
        var urlBox = "<?php echo route('item-box.index')?>";
    </script>
    <!--<script type="text/javascript">
        $(document).ready(function() {
            $.getScript("{{ URL::asset('js/item-ajax.js') }}");
        });
    </script> -->
     <script src = "{{ URL::asset('js/item-ajax.js') }}"></script>
    <script src = "{{ URL::asset('js/item-box.js') }}"></script>

@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/my_jobs.css') }}"/>
@stop

@section('content')
        <div id="container">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                            Új elem
                        </button>
                    </div>
                </div>
            </div>

            <table class="table-bordered" class="table">
                <thead>
                <tr>
                    <th>Boxok</th>
                    <th>Projekt név</th>
                    <th>Megrendelő név</th>
                    <th>Ár</th>
                    <th>Státusz</th>
                    <th>Változtatás</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <ul id="pagination" class="pagination-sm" style='display: none;'></ul>

            <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create Item</h4>
                        </div>
                        <div class="modal-body">

                            <form data-toggle="validator" action="{{ route('item-ajax.store') }}" method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="title">Project név:</label>
                                    <input type="text" name="name" class="form-control" data-error="Kérem írja be a projekt nevét." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Megrendelő:</label>
                                    <textarea name="costumer" class="form-control" data-error="Kérem írja be a megrendelő nevét." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Státusz:</label>
                                    <textarea name="Status" class="form-control" data-error="Please enter description." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Item Modal -->
            <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                        </div>
                        <div class="modal-body">

                            <form data-toggle="validator" action="{{URL::asset('/item-ajax/14')}}" method="put">
                                <div class="form-group">
                                    <label class="control-label" for="title">Project név:</label>
                                    <input type="text" name="name" class="form-control" data-error="Kérem írja be a projekt nevét." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Megrendelő:</label>
                                    <textarea name="costumer" class="form-control" data-error="Kérem írja be a megrendelő nevét." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Státusz:</label>
                                    <textarea name="Status" class="form-control" data-error="Please enter description." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success crud-submit-edit">Modósítás</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop