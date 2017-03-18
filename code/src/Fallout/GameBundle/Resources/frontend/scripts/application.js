require('fos-js-routing');
require('fos-js-routes');
var httpClient = require('./httpClient');
var queryManager = require('./queryManager');
var eventSetter = require('./eventSetter');

queryManager.setClient(httpClient);
eventSetter.setManager(queryManager);
eventSetter.createEvents();