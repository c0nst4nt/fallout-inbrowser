var $ = require('jquery');

var httpClient = {
    make: function (route, parameters, resultHandler) {
        if (!parameters) {
            parameters = {};
        }

        $.ajax({
            url: route,
            data: parameters,
            dataType: 'json',
            success: function (xhr) {
                resultHandler(xhr);
            }
        });
    }
};

module.exports = httpClient;