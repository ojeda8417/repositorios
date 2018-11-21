// register the interceptor as a service
angular.module('InvApp.Auth')

.provider('AuthInterceptor', function(){

    // Available in config
    //this.storage;
    this.setToken;
    this.getToken;

    var config = this;
    //var defaultStorage = window.sessionStorage;

    this.$get = ['$q','AUTH', function($q,AUTH) {

        //var storage = config.storage || defaultStorage;

        function refreshAuthToken(response){
            var token, authHeader = response.headers(AUTH.HEADER);

            if(authHeader){
                //Gets the authorization token from the header
                token = authHeader.split(' ')[1];

                if(token){
                    console.log('token anterior: '+ config.getToken());
                    //storage.setItem(AUTH.TOKEN_NAME,token);
                    if(config.setToken){
                        config.setToken(token);
                    } else {
                        console.error('AuthInterceptor refreshAuthToken(): Token not saved, config.setToken undefined');
                    }
                    
                    console.log('header token: '+ token);

                    console.log('token posterior: '+ config.getToken());
                }
            }
        }

        return {
            'request': function(response) {
                 console.log('[Request] token: '+ config.getToken(),response);

                return response;
            },

            'requestError': function(rejection) {
                refreshAuthToken(rejection);

                console.log('[RequestError] token: '+ config.getToken(),rejection);
            },

            'response': function(response) {
                console.log('response:'+response);
                refreshAuthToken(response);

                return response;
            },

            'responseError': function(rejection) {
                refreshAuthToken(rejection);

                return $q.reject(rejection);
            }
        };
    }];

});