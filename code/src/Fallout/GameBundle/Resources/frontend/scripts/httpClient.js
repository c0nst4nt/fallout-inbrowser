var httpClient = {
    make: function (route, parameters) {
        if (!parameters) {
            parameters = {};
        }

        var response = null;
        $.ajax({
            url: route,
            data: parameters,
            success: function (xhr) {
                response = xhr;
            }
        });

        return response;
    }
};

module.exports(httpClient);