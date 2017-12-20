/**
 * Created by k_att on 17/12/19.
 */

var page = 1;
var current_page = 1;
var total_page = 1;
var is_ajax_fire = 0;

console.log("ajax");

manageData();

console.log("kesz");

/* manage data list */
function manageData() {
    console.log("meghivodtam");
    $.ajax({
        dataType: 'json',
        url: url,
        data: {page:page, boxID: boxID}
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
    console.log(data);
    $.each( data, function( key, value ) {
        rows += "<a href=\"http://localhost:8012/Arajanlo/public/furniture_items?furnitureID=" + value.id +" \" class=\"furniture_table_element\"> \
            <img src='http://localhost:8012/Arajanlo/public/Images/furniture.jpg'> \
            <h1> " + value.name + "</h1> \
        <p> Ar:" + value.Price + " €</p> \
        <p class=\"furniture_sizes\">Méretek: X:" +  value.sizeX  + " mm | Y: " + value.sizeY + " mm | Z: " + value.sizeZ  + "mm</p>\
        </a>";
    });
    console.log(rows);
    $(".furniture_row").html(rows);
}