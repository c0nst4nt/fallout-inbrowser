var queryManager = {
    client: {},
    setClient: function (client) {
        this.client = client;
    },
    getClient: function () {
        return this.client;
    },
    createQuery: function (route, parameters, handler) {
        queryManager.getClient().make(
            route,
            parameters,
            handler
        );
    },
    discover: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('discover_search'),
            {},
            resultHandler
        );
    },
    startFight: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_start'),
            {},
            resultHandler
        );
    },
    escape: function(resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_escape'),
            {},
            resultHandler
        );
    },
    attack: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_attack'),
            {},
            resultHandler
        );
    },
    moveForward: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_move', {type: 'forward'}),
            {},
            resultHandler
        );
    },
    moveBackward: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_move', {type: 'backward'}),
            {},
            resultHandler
        );
    },
    useHealthKit: function (resultHandler) {
        queryManager.createQuery(
            Routing.generate('fight_heal'),
            {},
            resultHandler
        );
    },
    changeScore: function (scores, resultHandler) {
        queryManager.createQuery(
            Routing.generate('player_distribute_score'),
            scores,
            resultHandler
        );
    }
};

module.exports = queryManager;