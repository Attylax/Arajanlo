/**
 * Created by k_att on 17/12/01.
 */

var page = 1;
var current_page = 1;
var total_page = 10;
var is_ajax_fire = 0;


//var url = "http://localhost:8012/Arajanlo/public/api/item-ajax";

manageData();

/* manage data list */
function manageData() {
    console.log("manageData()");
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page: page, FurnitureID: furnitureID}
    }).done(function (data) {

        $('#pagination').twbsPagination({

            totalPages: total_page,
            visiblePages: current_page,
            next: 'Next',
            prev: 'Prev',

            onPageClick: function (event, pageL) {
                console.log("benne");
                page = pageL;
                if (is_ajax_fire != 0) {
                    getPageData();
                }
            }
        });
        console.log("helyes2");
        manageRow(data);
        is_ajax_fire = 1;
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Get Page Data*/
function getPageData() {
    console.log("getPageData()");
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page: page, FurnitureID: furnitureID}
    }).done(function (data) {
        manageRow(data);
    });
}

/* Add new Item table row */
function manageRow(data) {
    var rows = '';
    console.log("manageRow()");
    $.each(data, function (key, value) {
        rows = rows + '<tr>';
        rows = rows + '<td>' + value.name + '</td>';
        rows = rows + '<td>' + value.wooden_name + '</td>';
        rows = rows + '<td>' + value.wooden_type + '</td>';
        rows = rows + '<td>' + value.sizeX + '</td>';
        rows = rows + '<td>' + value.sizeY + '</td>';
        rows = rows + '<td>' + value.sizeZ + '</td>';
        if (value.finish_name == null) {
            rows = rows + '<td> - </td>';
            rows = rows + '<td> - </td>';
        } else {
            rows = rows + '<td>' + value.finish_name + '</td>';
            rows = rows + '<td>' + value.finish_sides + '</td>';
        }
        
        rows = rows + '<td>' + value.quantity + '</td>';
        rows = rows + '<td>' + value.price + '</td>';


        // rows = rows + '<td>' + value.description + '</td>';
        // rows = rows + '<td data-id="' + value.id + '">';
        // rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        // rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        // rows = rows + '</td>';
        rows = rows + '</tr>';

    });

    $('#furniture_items_table_data').html(rows);
}
$(document).ready(function () {
    /* Create new Item */
    $(".crud-submit").click(function (e) {
        e.preventDefault();

        var form_action = $("#create-item").find("form").attr("action");
        var name = $("#create-item").find("input[name='name']").val();
        var woodenID = $("#create-item").find("select[name='WoodenID']").val();
        var sizeX = $("#create-item").find("input[name='sizeX']").val();
        var sizeY = $("#create-item").find("input[name='sizeY']").val();
        var sizeZ = $("#create-item").find("input[name='sizeZ']").val();
        var finishID = $("#create-item").find("select[name='Element_finishID']").val();
        var numberOfSides = $("#create-item").find("input[name='number_of_sides']").val();
        var quantity = $("#create-item").find("input[name='quantity']").val();
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data: {name: name, FurnitureID: furnitureID, quantity: quantity, sizeX: sizeX, sizeY: sizeY, sizeZ: sizeZ, FinishID: finishID, WoodenID: woodenID}
        }).done(function (data) {
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });

    });

    /* Remove Item */
    $("body").on("click", ".remove-item", function () {
        var id = $(this).parent("td").data('id');
        var c_obj = $(this).parents("tr");
        $.ajax({
            dataType: 'json',
            type: 'delete',
            url: url + '/' + id,
        }).done(function (data) {
            c_obj.remove();
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            getPageData();
        });
    });

    /* Edit Item */
    $("body").on("click", ".edit-item", function () {
        var id = $(this).parent("td").data('id');
        var name = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        var status = $(this).parent("td").prev("td").text();
        var consumer = $(this).parent("td").prev("td").prev("td").prev("td").text();
        $("#edit-item").find("input[name='name']").val(name);
        $("#edit-item").find("textarea[name='costumer']").val(consumer);
        $("#edit-item").find("textarea[name='Status']").val(status);
        $("#edit-item").find("form").attr("action", url + '/' + id);
    });

    /* Updated new Item */
    $(".crud-submit-edit").click(function (e) {
        e.preventDefault();
        var form_action = $("#edit-item").find("form").attr("action");
        var name = $("#edit-item").find("input[name='name']").val();
        var consumer = $("#edit-item").find("textarea[name='costumer']").val();
        var status = $("#edit-item").find("textarea[name='Status']").val();

        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: form_action,
            data: {name: name, costumer: consumer, Status: status}
        }).done(function (data) {
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        });
    });

});