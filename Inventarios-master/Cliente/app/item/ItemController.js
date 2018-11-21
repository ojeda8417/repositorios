'use strict';

angular.module('InvApp.item', ['ngRoute'])

	.constant('ITEM_ROUTES',{
		'LIST':'/item/list',
		'NEW':'/item/new',
		'UPDATE':'/item/:code/edit'
	})

	.config(['$routeProvider','ITEM_ROUTES',function($routeProvider,ITEM_ROUTES) {
		$routeProvider
			.when(ITEM_ROUTES.LIST, {
				templateUrl:'item/partials/item-list.html',
				controller:'ItemController'
			})
			.when(ITEM_ROUTES.NEW, {
				templateUrl:'item/partials/item-new.html',
				controller:'ItemController'
			})
			.when(ITEM_ROUTES.UPDATE, {
				templateUrl:'item/partials/item-new.html',
				controller:'ItemController'
			});
	}])

	.controller('ItemController', ['$scope','$http','$location','$routeParams','Item','ITEM_ROUTES',
		function($scope,$http,$location,$routeParams,Item,ITEM_ROUTES){

		var code = $routeParams.code;

		Item.all().then(function(items){
			$scope.items = items;

			if(angular.isDefined(code)){
				$scope.newItem = angular.copy(Item.get(code));
				$scope.isEdit = true;
			}
		}, function(msg){
			console.error(msg);
		});

		$scope.addItem = function(item){
			Item.create(item);
			$location.path(ITEM_ROUTES.LIST);
		}

		$scope.updateItem = function(item){
			Item.update(item);
			$location.path(ITEM_ROUTES.LIST);
		}

		$scope.lang = 'es';
	}]);