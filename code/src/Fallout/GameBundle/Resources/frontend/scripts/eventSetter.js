var eventsSetter = {
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
            this.getManager().discover();
        });

        $('input[name=sleep]').on('click', function () {
            this.getManager().sleep();
        });

        $('input[name=fight]').on('click', function () {
            this.getManager().startFight();
        });

        $('input[name=escape]').on('click', function () {
            this.getManager().escape();
        });
    }
};

module.exports(eventsSetter);