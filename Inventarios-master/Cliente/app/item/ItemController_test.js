'use strict';

describe('Module: InvApp.item.', function() {
  
  beforeEach(module('InvApp.item'));

  var $controller, $httpBackend, $rootScope;

  beforeEach(inject(function(_$httpBackend_, _$rootScope_,_$controller_){

  	$controller = _$controller_;
  	$httpBackend = _$httpBackend_;
  	$rootScope = _$rootScope_;
  }));

  describe('ItemController', function(){

  	var itemController, $scope;

  	beforeEach(function(){
  		$scope = $rootScope.$new();
  		itemController = $controller('ItemController', { $scope: $scope });

  		$httpBackend.expectGET('/item/data/item-list.json').
  				respond([{
							code:"001",description:"Mouse Razer R2500",price:1999.99,inventory:3
						},
						{
							code:"002",description:"Mouse Microsoft M500",price:149,inventory:100000000
						}]);
  	});

    it('should fill $scope.items with the data in /item/data/item-list.json', function(){

    	expect($scope.items).toBeUndefined();
    	$httpBackend.flush();
    	expect($scope.items).toEqual([{
							code:"001",description:"Mouse Razer R2500",price:1999.99,inventory:3
						},
						{
							code:"002",description:"Mouse Microsoft M500",price:149,inventory:100000000
						}]);
    });
 
  });

});