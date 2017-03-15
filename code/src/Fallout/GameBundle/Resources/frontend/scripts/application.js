var $ = require('jquery');
if (__RELEASE__) {
    require('fosjsrouting');
    require('../../../../../../web/js/fos_js_routes.js');
}
var RestClient = require('another-rest-client');
var api = new RestClient('http://localhost/app_dev.php');

$(function () {
    $('input[name=erase]').on('click', function () {
        $('.console-block').empty();
    });

    $('input[name=discover]').on('click', function () {
        api.res('discover').get({test: 'some-content'});

        api.on('response', function(xhr) {
            console.log(xhr);
        });
    });

    $('input[name=sleep]').on('click', function () {
        console.log('sleep');
    });

    $('input[name=fight]').on('click', function () {
        console.log('fight');
    });

    $('input[name=escape]').on('click', function () {
        console.log('escape');
    });

    // TODO :: implement fight buttons and actions
    // TODO :: implement level up and score distribute buttons and actions
});