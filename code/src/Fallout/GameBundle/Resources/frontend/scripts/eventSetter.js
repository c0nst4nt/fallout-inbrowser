var $ = require('jquery');

var eventsSetter = {
    manager: {},
    setManager: function (manager) {
        this.manager = manager;
    },
    getManager: function () {
        return this.manager;
    },
    createEvents: function () {
        $('input[name=erase]').on('click', function () {
            $('.console-block').empty();
        });

        $('input[name=discover]').on('click', function () {
            eventsSetter.getManager().discover();
        });

        $('input[name=sleep]').on('click', function () {
            eventsSetter.getManager().sleep();
        });

        $('input[name=fight]').on('click', function () {
            eventsSetter.getManager().startFight();
        });

        $('input[name=escape]').on('click', function () {
            eventsSetter.getManager().escape();
        });
    }
};

module.exports = eventsSetter;