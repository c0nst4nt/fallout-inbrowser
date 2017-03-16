var queryManager = {
    setClient: function (client) {
        this.client = client;
    },
    getClient: function () {
        return this.client;
    },
    discover: function () {
        var response = this.getClient().make(Routing.generate('discover_search'));
        console.log(response);
    },
    sleep: function () {
        this.getClient().make(Routing.generate('discover_sleep'));
    },
    startFight: function () {
        this.getClient().make(Routing.generate('fight_start'));
    },
    escape: function() {
        this.getClient().make(Routing.generate('fight_escape'));
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

module.exports(queryManager);