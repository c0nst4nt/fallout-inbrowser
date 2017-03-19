var $ = require('jquery');

var mainController = {
    manager: {},
    setManager: function (manager) {
        this.manager = manager;
    },
    getManager: function () {
        return this.manager;
    },
    createActions: function () {
        $('input[name=erase]').on('click', function () {
            $('.console-block').empty();
        });

        $('input[name=discover]').on('click', function () {
            mainController.getManager().discover(
                function (response) {
                    var $consoleBlock = $('.console-block');
                    if ($consoleBlock.find('.welcome-message').length > 0) {
                        $consoleBlock.empty();
                    }

                    var currentDateTime = new Date().toLocaleString() + ': ';
                    var currentContent = $consoleBlock.html();
                    var newContent = '';
                    switch (response.type) {
                        case 'discover':
                            newContent += '<strong>' + currentDateTime + 'You\'ve found a health item</strong>';
                            break;
                        case 'fight':
                            $('input[name=discover],input[name=sleep]').prop('disabled', true);
                            $('input[name=fight],input[name=escape]').prop('disabled', false);
                            newContent += '<strong>' + currentDateTime + 'You\'ve trapped into fight</strong>';
                            break;
                        default:
                            console.log('There was unknown discover type: ' + response.type);
                    }

                    var output = newContent + '<p>' + currentDateTime + response.description + '</p>' + currentContent;
                    $consoleBlock.html(output);
                }
            );
        });

        $('input[name=fight]').on('click', function () {
            mainController.getManager().startFight(
                function (response) {
                    console.log(response);
                }
            );
        });

        $('input[name=escape]').on('click', function () {
            var $consoleBlock = $('.console-block');
            var currentDateTime = new Date().toLocaleString() + ': ';
            var currentContent = $consoleBlock.html();
            var newContent = 'You\'re trying to escape from this fight';
            var output = '<p>' + currentDateTime + newContent + '</p>' + currentContent;
            $consoleBlock.html(output);

            mainController.getManager().escape(
                function (response) {
                    switch (response.result) {
                        case 'success':
                            newContent = 'You\'ve successfully escaped!';
                            output = '<p>' + currentDateTime + newContent + '</p>' + currentContent;
                            $consoleBlock.html(output);
                            break;
                        case 'failure':
                            newContent = 'You hadn\'t escaped, fight will go on.';
                            output = '<p>' + currentDateTime + newContent + '</p>' + currentContent;
                            $consoleBlock.html(output);
                            mainController.getManager().startFight(
                                function (response) {
                                    console.log(response);
                                }
                            );
                            break;
                    }
                }
            );
        });
    }
};

module.exports = mainController;