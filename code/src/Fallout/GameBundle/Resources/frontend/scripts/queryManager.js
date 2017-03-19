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
    sleep: function (resultHandler) {
        queryManager.getClient().make(
            Routing.generate('discover_sleep'),
            {},
           resultHandler
        );
    },
    startFight: function (resultHandler) {
        queryManager.getClient().make(
            Routing.generate('fight_start'),
            {},
            resultHandler
        );
    },
    escape: function(resultHandler) {
        queryManager.getClient().make(
            Routing.generate('fight_escape'),
            {},
            resultHandler
        );
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