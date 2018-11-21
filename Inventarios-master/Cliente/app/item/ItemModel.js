"use strict";

angular.module('InvApp.item')
	
	.factory('Item', ['$http','$q','$filter', function($http,$q,$filter){
		
		var items;

		function _fetch(deferred){

			console.log('fetching data..');

			$http.get('/item/data/item-list.json')
				.then(function(response){
					items = response.data;
					deferred.resolve(items);
					console.log('data fetched');
				}, function(response){
					deferred.reject(response.status,response.statusText);
				});

			return deferred;
		}

		function all(){
			var deferred = $q.defer();

			if(angular.isUndefined(items)){
				_fetch(deferred);
			}
			else{
				deferred.resolve(items);
			}

			return deferred.promise;
		}

		function create(newItem){
			items.push(newItem);
			//save in db. If an error ocur, delete the item from items array.
		}

		function update(newItem){
			var single_object = $filter('filter')(items, function (d) {return newItem && d.code === newItem.code;})[0];

	    	// If you want to see the result, just check the log
	    	angular.copy(newItem, single_object);
			//items.push(item);
			//save in db. If an error ocur, delete the item from items array.
		}

		function get(code){
			var single_object = $filter('filter')(items, function (d) {return d.code === code;})[0];

	    	// If you want to see the result, just check the log
	    	return single_object;
			//items.push(item);
			//save in db. If an error ocur, delete the item from items array.
		}

		return {
			all:all,
			create:create,
			get:get,
			update:update
		};
	}]);