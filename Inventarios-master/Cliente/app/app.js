'use strict';

// Declare app level module which depends on views, and components
angular.module('InvApp', [
  'ngRoute',
  'ui.bootstrap',
  'jcs-autoValidate',
  'angular-ladda',
  'InvApp.BsTable',
  'InvApp.Modal',
  'InvApp.Auth',
  'InvApp.inv',
  'InvApp.User'
])
.constant('APP', {
	'ROUTES':{
		'HOME':'/inv/list'
	}
})
.config(['$routeProvider','APP', function($routeProvider, APP) {
  $routeProvider.otherwise({redirectTo: APP.ROUTES.HOME});
}])
.controller('InvAppController',['$scope', '$location', 'Auth', 'AUTH',function($scope, $location, Auth, AUTH){
	$scope.logout = function($event){
		$event.preventDefault();
		Auth.logout().then(function(){
			$location.path(AUTH.ROUTES.LOGIN);
		},function(){
			$location.path(AUTH.ROUTES.LOGIN);
		});
	};
}])
.run([
	'bootstrap3ElementModifier',
	function (bootstrap3ElementModifier) {
	      bootstrap3ElementModifier.enableValidationStateIcons(true);
}])
.run([
    'defaultErrorMessageResolver',
    function (defaultErrorMessageResolver) {
        // To change the root resource file path
        defaultErrorMessageResolver.setI18nFileRootPath('bower_components/angular-auto-validate/dist/lang');
        defaultErrorMessageResolver.setCulture('es-Co');
    }
]);