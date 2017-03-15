var $ = require('jquery');

$(function () {
    $('input[name=erase]').on('click', function () {
        $('.console-block').empty();
    });
});