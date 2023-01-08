import './bootstrap';

import $ from "jquery";

$(document).ready(function(){
    $('.js-delete-flight').click(function(){
        if (confirm($(this).attr('data-confirmation-text'))) {
            let flightId = $(this).attr('data-flight-id');
            $('form[data-flight-id="'+flightId+'"]').submit();
        }
    });
});
