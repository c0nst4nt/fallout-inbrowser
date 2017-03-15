var $ = require('jquery');
require('fos-js-routing');
require('fos-js-routes');

var QueryClient = {
    make: function (route, parameters) {
        if (!parameters) {
            parameters = {};
        }

        $.ajax({
            url: route,
            data: parameters,
            success: function (xhr) {
                console.log(xhr);
            }
        });
    }
};

var QueryManager = {
    discover: function () {
        QueryClient.make(Routing.generate('discover_search'));
    },
    sleep: function () {
        QueryClient.make(Routing.generate('discover_sleep'));
    },
    startFight: function () {
        QueryClient.make(Routing.generate('fight_start'));
    },
    escape: function() {
        QueryClient.make(Routing.generate('fight_escape'));
    },
    attack: function () {

    },
    moveForward: function () {

    },
    moveBackward: function () {

    },
    useHealthKit: function () {

    },
    changeScore: function (score) {

    }
};

$(function () {
    $('input[name=erase]').on('click', function () {
        $('.console-block').empty();
    });

    $('input[name=discover]').on('click', function () {
        QueryManager.discover();
    });

    $('input[name=sleep]').on('click', function () {
        QueryManager.sleep();
    });

    $('input[name=fight]').on('click', function () {
        QueryManager.startFight();
    });

    $('input[name=escape]').on('click', function () {
        QueryManager.escape();
    });
});