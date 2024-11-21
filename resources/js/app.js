import './bootstrap';

import jQuery from 'jquery';

import 'select2/dist/css/select2.min.css'; // Import Select2 CSS

import select2 from 'select2';

window.$ = jQuery;

select2($);

$(document).ready(function () {

    function initSelect2(element) {
        const parentDiv = element.parent();
        element.select2({
            dropdownParent: parentDiv,
            placeholder: 'Select an option',
        });
    }
    initSelect2($(".select2"));
    window.initSelect2 = initSelect2;
});

