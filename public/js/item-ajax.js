/**
 * Created by k_att on 17/12/01.
 */

var page = 1;
var current_page = 1;
var total_page = 1;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {

    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page}
    }).done(function(data){

        $('#pagination').twbsPagination({

            totalPages: total_page,
            visiblePages: current_page,
            next: 'Next',
            prev: 'Prev',
            onPageClick: function (event, pageL) {
                page = pageL;
                if(is_ajax_fire != 0){
                    getPageData();
                }
            }
        });
        //console.log("helyes2");
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
        data: {page:page}
    }).done(function(data){
        manageRow(data);
    });
}

/* Add new Item table row */
function manageRow(data) {
    var	rows = '';
    console.log("manageRow()");
    $.each( data, function( key, value ) {
        rows = rows + '<tr>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" class="btn btn-primary box_items">Box</button> ';
        rows = rows + '</td>';
        rows = rows + '<td>'+value.Name+'</td>';
        rows = rows + '<td>'+value.costumer+'</td>';
        rows = rows + '<td>'+value.price+' € </td>';
        rows = rows + '<td>'+value.Status+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });

    $("tbody").html(rows);
}
$( document ).ready(function() {
    /* Create new Item */

    $(".crud-submit").click(function (e) {
        e.preventDefault();
        var form_action = $("#create-item").find("form").attr("action");
        var title = $("#create-item").find("input[name='name']").val();
        var costumer = $("#create-item").find("textarea[name='costumer']").val();
        var status = $("#create-item").find("textarea[name='Status']").val();

        console.log("szia, meghivodtam");

        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: form_action,
            data: {name: title, costumer: costumer, Status: status}
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