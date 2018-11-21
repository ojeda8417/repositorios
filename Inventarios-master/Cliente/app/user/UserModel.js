"use strict";

angular.module('InvApp.User',[])
	.constant('USER', {
		ROUTES: {
			SERVICE_EMPRESAS: '/usuario/empresas'
		}
	})
	
	.factory('User', ['$http', '$q', 'USER', 'APP_SERVICE',function($http, $q, USER, APP_SERVICE){
		
		function User (username, name) {
			this.username = username;
			this.name = name;
			this.companies = [];
		}

		User.prototype.getCompanies = function() {
			var deferred = $q.defer();

			var companies = this.companies;

			if(companies && companies.length > 0) {
				resolve(companies);
			} else {
				this.fecthCompanies(deferred);
			}

			return deferred.promise;
		};

		User.prototype.fecthCompanies = function(deferred) {
			var config = {
                    headers: {
                        'Content-Type':'application/json'
                    }
                };

			$http.get(APP_SERVICE.SERVER+USER.ROUTES.SERVICE_EMPRESAS,config)
				.then(function(response){

					deferred.resolve(response.data.empresas);
				}, function(error){
					console.error(error.status, error.statusText);
					deferred.reject(error);
				});
		};


		return User;
	}]);