require('fos-js-routing');
require('fos-js-routes');
var httpClient = require('./httpClient');
var queryManager = require('./queryManager');
var mainController = require('./mainController');

queryManager.setClient(httpClient);
mainController.setManager(queryManager);
mainController.createActions();