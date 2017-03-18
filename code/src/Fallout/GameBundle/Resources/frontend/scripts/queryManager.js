var queryManager = {
    client: {},
    setClient: function (client) {
        this.client = client;
    },
    getClient: function () {
        return this.client;
    },
    discover: function (resultHandler) {
        queryManager.getClient().make(
            Routing.generate('discover_search'),
            {},
            resultHandler
        );
    },
    sleep: function () {
        queryManager.getClient().make(Routing.generate('discover_sleep'));
    },
    startFight: function () {
        queryManager.getClient().make(Routing.generate('fight_start'));
    },
    escape: function() {
        queryManager.getClient().make(Routing.generate('fight_escape'));
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

module.exports = queryManager;