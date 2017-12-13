/**
 * Created by k_att on 17/12/13.
 */

var page = 1;
var current_page = 1;
var total_page = 1;
var is_box_fire = 0;

$( document ).ready(function() {
    $("body").on("click", ".box_items", function () {
        //console.log($(this).parent("td").parent("tr")[0].rowIndex);
        var rowIndex = $(this).parent("td").parent("tr")[0].rowIndex;
        console.log($($($(this)[0].parentNode.parentNode).next("tr")[0].firstChild)[0].colSpan);
        if($($($(this)[0].parentNode.parentNode).next("tr")[0].firstChild)[0].colSpan != 6) {
            var table = $(".table-bordered")[0];
            var row = table.insertRow(rowIndex + 1);
            var cel1 = row.insertCell(0);
            cel1.colSpan = "6";

            var boxes = "<table id='boxes' class='table-bordered' class='table'> \
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
                        <ul id='pagination1' class='pagination-sm'></ul>"

            cel1.innerHTML = boxes;

            manageBoxesData()
        }else{
            var table = $(".table-bordered")[0];
            table.deleteRow(rowIndex + 1);
        }
    });

});

function manageBoxesData() {

    $.ajax({
        dataType: 'json',
        url: urlBox,
        data: {page:page}
    }).done(function(data){
        console.log("manageBoxesData");
        $('#pagination1').twbsPagination({

            totalPages: total_page,
            visiblePages: current_page,
            next: '',
            prev: '',
            onPageClick: function (event, pageL) {
                page = pageL;
                if(is_box_fire != 0){
                    getBoxesPageData();
                }
            }
        });
        manageBoxRow(data);
        is_box_fire = 1;
    });
}

function getBoxesPageData() {

    $.ajax({
        dataType: 'json',
        url: urlBox,
        data: {page:page}
    }).done(function(data){
        console.log(urlBox);
        console.log("hallo");
        manageBoxRow(data);
    });
}

function manageBoxRow(data) {
    var	rows = '';
    console.log("szia");
    $.each( data, function( key, value ) {
        rows = rows + '<tr>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" class="btn btn-primary box_items">Box</button> ';
        rows = rows + '</td>';
        rows = rows + '<td>'+value.Name+'</td>';
        rows = rows + '<td>'+value.Price+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</td>';
        rows = rows + '</tr>';
    });

    $("#boxes > tbody").html(rows);
}