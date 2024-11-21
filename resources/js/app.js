import './bootstrap';

import jQuery from 'jquery';

import 'select2/dist/css/select2.min.css'; // Import Select2 CSS

import select2 from 'select2';

window.$ = jQuery;

select2($);

$(document).ready(function () {
    const parentDiv = $(".select2").parent();
    $('.select2').select2({
        dropdownParent: parentDiv,
        placeholder: 'Select an option',
    });
});
