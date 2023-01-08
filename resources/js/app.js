import './bootstrap';

import $ from "jquery";
import 'select2';
import 'select2/dist/css/select2.min.css';

$(document).ready(function(){
    $('select').select2();
    $('.js-delete-flight').click(function(){
        if (confirm($(this).attr('data-confirmation-text'))) {
            let flightId = $(this).attr('data-flight-id');
            $('form[data-flight-id="'+flightId+'"]').submit();
        }
    });
});
