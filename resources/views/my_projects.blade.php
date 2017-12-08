
<html>
    <head>
        <title>
            Munkáim
        </title>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script type="text/javascript">
            var url = "<?php echo route('item-ajax.index')?>";
        </script>

        <script src="/js/item-ajax.js"></script>


    </head>
    <body>
        <header>
            <!-- Pista works on it -->
        </header>

        <h1>

        </h1>

        <div id="container">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                            Create Item
                        </button>
                    </div>
                </div>
            </div>

            <table>
                <thead>
                <tr>
                    <th>P név</th>
                    <th>M név</th>
                    <th>Ár</th>
                    <th>Státusz</th>
                    <th>Változtatás</th>
                    <th width="200px">Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

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
                                    <label class="control-label" for="title">P név:</label>
                                    <input type="text" name="name" class="form-control" data-error="Please enter title." required />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Costumer:</label>
                                    <textarea name="costumer" class="form-control" data-error="Please enter description." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Price:</label>
                                    <textarea name="price" class="form-control" data-error="Please enter description." required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">Status:</label>
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
        </div>
        <footer>
            <!-- Pista works on it -->
        </footer>
    </body>
</html>