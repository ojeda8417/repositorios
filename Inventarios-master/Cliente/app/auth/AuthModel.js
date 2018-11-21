"use strict";

angular.module('InvApp.Auth')
    
.provider('Auth', ['AUTH', function(AUTH) {

    var defaultStorage = window.sessionStorage;
    var publicRoutes = [];
    var config = this;
    var token, storage;

    function isPublicRoute(aRoute){

        if(!publicRoutes || !aRoute) return false;

        var len = publicRoutes.length;
        
        for(var i=0; i<len; i++){
            if(aRoute.indexOf(publicRoutes[i]) > -1) {
                return true;
            }
        }
        return false;
    }

    function addPublicRoute(aRoute){
        if(!isPublicRoute(aRoute))
            publicRoutes.push(aRoute);
    }

    function isValidStorage(aStorage){
        return (aStorage && aStorage.setItem)?true:false;
    }

    function setStorage(aStorage){
        if(isValidStorage(aStorage)){
            storage = aStorage;
        }
    }

    function getStorage(){
        if(!isValidStorage(storage)){
            return defaultStorage;
        }

        return storage;
    }

    function setToken(aToken) {
        var storage = getStorage();

        token = aToken;

        if(aToken){
            storage.setItem(AUTH.TOKEN_NAME,aToken);
        } else {
            storage.removeItem(AUTH.TOKEN_NAME);
        }
    }

    function getToken() {
        var storage = getStorage();

        if(!token) {
            token = storage.getItem(AUTH.TOKEN_NAME);
        }

        return token;
    }

    // Available in config
    this.setStorage = setStorage;
    //this.getStorage = getStorage;
    this.addPublicRoute = addPublicRoute;
    this.setToken = setToken;
    this.getToken = getToken;


    this.$get = ['$http', '$q', 'jwtHelper', 'AUTH', 'User', 'APP_SERVICE', 
        function($http, $q, jwtHelper, AUTH, User, APP_SERVICE){
        
        var user;

        function authenticate(auth) {
            var deferred = $q.defer(),
                content = createContent(auth),
                config = {
                    headers: {
                        'Content-Type':'application/x-www-form-urlencoded'
                    }
                };

            $http.post(APP_SERVICE.SERVER+AUTH.ROUTES.SERVICE_LOGIN, content, config)
                .then(function(response){
                    login(response.data.token);
                    deferred.resolve();
                }, function(response){
                    console.error(response.status, response.statusText);
                    deferred.reject(response);
                });

            return deferred.promise;
        }

        function logout() {
            var deferred = $q.defer();

            $http.post(APP_SERVICE.SERVER+AUTH.ROUTES.SERVICE_LOGOUT)
                .then(function(response){
                    setToken(null);
                    setUser(null);
                    deferred.resolve(response);
                }, function(response){
                    setToken(null);
                    setUser(null);
                    console.error(response.status, response.statusText);
                    deferred.reject(response);
                });

            return deferred.promise;
        }

        function login(aToken) {
            setToken(aToken);
            setUser(userFromToken(aToken));
        }

        /*function logout() {
            setToken(null);
            setUser(null);
        }*/

        function isLogged() {
            return getUser()? true: false;
        }

        function setUser(aUser) {
            user = aUser;
        }

        function getUser(){
            if(!getToken()) return null;

            if(!user){
                user = userFromToken(getToken());
            }

            return user;
        }

        function userFromToken(aToken) {
            var user, payload;

            if(!aToken) return null;

            payload = decodeToken(aToken);

            if(!payload) return null;

            user = new User(payload.sub, payload.name);

            return user;
        }

        function decodeToken(aToken){
            return jwtHelper.decodeToken(aToken);
        }

        function isTokenExpired(aToken){
            return jwtHelper.isTokenExpired(aToken);
        }

        function getTokenExpirationDate(aToken){
            return jwtHelper.getTokenExpirationDate(aToken);
        }

        function createContent(auth){
            return AUTH.USER_PARAM_NAME+'='+encodeURIComponent(auth.user)+'&'+
                   AUTH.PASS_PARAM_NAME+'='+encodeURIComponent(auth.password);
        }

        function getToken() {
            var storage = getStorage();

            if(!token) {
                token = storage.getItem(AUTH.TOKEN_NAME);
            }

            if(token && isTokenExpired(token)){
                logout();
                return null;
            }

            return token;
        }

        function isLoginRoute(aRoute){
            if(aRoute.indexOf(AUTH.ROUTES.LOGIN) > -1) {
                return true;
            }
            return false;
        }

        

        return {
            logout: logout,
            getUser: getUser,
            authenticate: authenticate,

            isLogged: isLogged,
            isPublicRoute: isPublicRoute,
            isLoginRoute: isLoginRoute
        };
    }];
}]);