/*global angular */
/*jshint unused:false */
'use strict';

/**
 * The main web-dev app module
 *
 * @type {angular.Module}
 */
var web-dev = angular.module('web-dev', ['firebase']);

web-dev.filter('todoFilter', function ($location) {
	return function (input) {
		var filtered = {};
		angular.forEach(input, function (todo, id) {
			var path = $location.path();
			if (path === '/active') {
				if (!todo.completed) {
					filtered[id] = todo;
				}
			} else if (path === '/completed') {
				if (todo.completed) {
					filtered[id] = todo;
				}
			} else {
				filtered[id] = todo;
			}
		});
		return filtered;
	};
});
