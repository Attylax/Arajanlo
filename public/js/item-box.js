/**
 * Created by k_att on 17/12/13.
 */

var page = 1;
var current_page = 1;
var total_page = 1;
var is_box_fire = 0;

$(document).ready(function () {
    $("body").on("click", ".box_items", function () {
        var rowIndex = $(this).parent("td").parent("tr")[0].rowIndex;

        if ($($(this)[0].parentNode.parentNode).next("tr")[0] == undefined || $($($(this)[0].parentNode.parentNode).next("tr")[0].firstChild)[0].colSpan != 6) {
            var table = $(".table-bordered")[0];
            var row = table.insertRow(rowIndex + 1);
            var cel1 = row.insertCell(0);
            cel1.colSpan = "6";

            var boxes = "<div class='row'> \
            <div class='col-lg-12 margin-tb'> \
                <div class='pull-right'> \
                <button type='button' class='btn btn-success' data-toggle='modal' data-target='#create-box'> \
                Új elem \
            </button> \
            </div> \
            </div> \
            </div>\
            <table id='boxes' class='table-bordered' class='table'> \
                        <thead> \
                        <tr> \
                        <th>Box név</th> \
                        <th>Ár</th> \
                        <th>Változtatás</th> \
                        </tr> \
                        </thead> \
                        <tbody> \
                        </tbody> \
                        </table>\
                        <ul id='pagination1' class='pagination-sm' style='display: none;'></ul>\
                        <div class='modal fade' id='create-box' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='display:none;'> \
                <div class='modal-dialog' role='document'> \
                    <div class='modal-content'> \
                    <div class='modal-header'>\
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>\
                <h4 class='modal-title' id='myModalLabel'>Create Item</h4>\
                </div>\
                <div class='modal-body'>\
    \
                    <form data-toggle='validator' action=\"http://localhost:8012/Arajanlo/public/api/item-box\" method='POST'>\
                    <div class='form-group'>\
                    <label class='control-label' for='title'>Box név:</label> \
                <input type='text' name='name' class='form-control' data-error='Kérem írja be a Box nevét.' required />\
                    </div>\
                    <div class='form-group'>\
                    <button type='submit' class='btn crud-submit1'>Submit</button>\
                    </div>\
                    </form>\
\
                    </div>\
                    </div>\
                    </div>\
                    </div>\
                    <div class='modal fade' id='edit-box' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' style='display: none;'> \
            <div class='modal-dialog' role='document'>\
                <div class='modal-content'>\
                <div class='modal-header'>\
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>\
            <h4 class='modal-title' id='myModalLabel'>Edit Item</h4>\
            </div>\
            <div class='modal-body'>\
                    \
                <form\ data-toggle='validator' action=\"http://localhost:8012/Arajanlo/public/api/item-box/14\" method='put'>\
                <div class='form-group'>\
                <label class='control-label' for='title'>Box név:</label>\
            <input type='text' name='name' class='form-control' data-error='Kérem írja be a Box nevét.' required />\
            <div class='help-block with-errors'></div>\
                </div>\
                <div class='form-group'>\
                <button type='submit' class='btn btn-success crud-submit-edit1'>Modósítás</button>\
                </div>\
                </form>\
\
                </div>\
                </div>\
                </div>\
                </div>\
                        ";

            cel1.innerHTML = boxes;

            manageBoxesData();

            $(".crud-submit1").click(function (e) {
                e.preventDefault();

                var form_action = $("#create-box").find("form").attr("action");
                var name = $("#create-box").find("input[name='name']").val();
                var projectId = $($("#create-box").parent("td").parent("tr").prev("tr")[0].firstChild).data("id");

                console.log(projectId);

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: form_action,
                    data: {name: name, ProjectID: projectId}
                }).done(function (data) {
                    getBoxesPageData();
                    $(".modal").modal('hide');
                    toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
                });

            });

            /* Remove Item */
            $("body").on("click", ".remove-box", function () {
                var id = $(this).parent("td").data('id');
                var c_obj = $(this).parents("tr");
                $.ajax({
                    dataType: 'json',
                    type: 'delete',
                    url: urlBox + '/' + id,
                }).done(function (data) {
                    c_obj.remove();
                    toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
                    getBoxesPageData();
                });
            });

            /* Edit Item */
            $("body").on("click", ".edit-box", function () {
                var id = $(this).parent("td").data('id');
                var name = $(this).parent("td").prev("td").prev("td").text();
                $("#edit-box").find("input[name='name']").val(name);
                $("#edit-box").find("form").attr("action", urlBox + '/' + id);
            });

            /* Updated new Item */
            $(".crud-submit-edit1").click(function (e) {
                e.preventDefault();
                var form_action = $("#edit-box").find("form").attr("action");
                var name = $("#edit-box").find("input[name='name']").val();

                console.log(name);

                $.ajax({
                    dataType: 'json',
                    type: 'PUT',
                    url: form_action,
                    data: {name: name}
                }).done(function (data) {
                    getPageData();
                    $(".modal").modal('hide');
                    toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
                });
            });

        } else {
            var table = $(".table-bordered")[0];
            table.deleteRow(rowIndex + 1);
        }
    });

});

function manageBoxesData() {

    $.ajax({
        dataType: 'json',
        url: urlBox,
        data: {page: page}
    }).done(function (data) {
        console.log(urlBox);
        $('#pagination1').twbsPagination({

            totalPages: total_page,
            visiblePages: current_page,
            next: '',
            prev: '',
            onPageClick: function (event, pageL) {
                page = pageL;
                if (is_box_fire != 0) {
                    getBoxesPageData();
                }
            }
        });
        console.log("Itt van");
        manageBoxRow(data);
        is_box_fire = 1;
    });
}

function getBoxesPageData() {

    $.ajax({
        dataType: 'json',
        url: urlBox,
        data: {page: page}
    }).done(function (data) {
        console.log(urlBox);
        console.log(data);
        manageBoxRow(data);
    });
}

function manageBoxRow(data) {
    var rows = '';
    //console.log("szia");
    $.each(data, function (key, value) {
        rows = rows + '<tr>';
        rows = rows + '<td>' + value.Name + '</td>';
        rows = rows + '<td>' + value.Price + '</td>';
        rows = rows + '<td data-id="' + value.id + '">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-box" class="btn btn-primary edit-box">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-box">Delete</button>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });


    $("#boxes > tbody").html(rows);
}

