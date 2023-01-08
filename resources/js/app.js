import './bootstrap';

import $ from "jquery";
import 'select2';
import 'select2/dist/css/select2.min.css';

$(document).ready(function(){
    $('select').select2();
    $('body').on('click', '.js-delete-flight', function(){
        if (confirm($(this).attr('data-confirmation-text'))) {
            let flightId = $(this).attr('data-flight-id');
            //$('form[data-flight-id="'+flightId+'"]').submit();
            deleteFlight(flightId, $('#selected_timezone').val());
        }
    });
    $('body').on('click', 'a.page-link', function(event){
        event.preventDefault();
        loadFlightsPage($(this).text(), $('#selected_timezone').val());
    });
    $('#selected_timezone').change(function(){
        loadFlightsPage($('.page-item.active span.page-link').text(), $('#selected_timezone').val());
    });
});

function loadFlightsPage(page, timezoneId) {
    $.ajax({
        method: 'get',
        url: '/get-flights-page',
        data: {
            page: page,
            timezone_id: timezoneId
        },
        success: function(response) {
            $('.js-flights-list-content').html(response);
        }
    });
}

function deleteFlight(flightId, timezoneId) {
    $.ajax({
        method: 'post',
        url: '/ajax-delete-flight',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            flight_id: flightId,
            timezone_id: timezoneId
        },
        success: function (response) {
            $('.js-flights-list-content').html(response);
        }
    });
}
