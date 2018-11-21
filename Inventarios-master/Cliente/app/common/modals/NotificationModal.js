'use strict';

angular.module('InvApp.Modal',[])
.controller('NotificationModalController', ['$scope', '$uibModalInstance', 'notification',
    function NotificationModalController($scope, $uibModalInstance, notification) {

    $scope.notification = notification;

    $scope.states = {
        'alert-danger': $scope.notification.error,
        'alert-success': $scope.notification.success,
        'alert-info': $scope.notification.info
    };

    $scope.ok = function () {
        $uibModalInstance.close();
    };


}])

.factory('NotificationModal', ['$uibModal', function($uibModal){

    function Notification() {
        this.title = 'Notification';
        this.message = 'Message';
        this.error = false;
        this.info = false;
        this.success = false;
    }

    Notification.prototype.setMessage = function(error){
        var message, 
            status = error.status,
            statusText = error.statusText,
            data = error.data;

        if(status==-1){
            message = 'El servidor no respondió.';
        } else {
            if(data && data.error){
                switch(data.error){
                    case 'invalid_credentials':
                        message = 'Usuario y/o contraseña incorrectos';
                        break;
                    case 'token_invalid':
                        message = 'La sesión es inválida. Inicie sesión nuevamente.';
                        break;
                    case 'token_expired':
                        message = 'La sesión ha expirado. Inicie sesión nuevamente.';
                        break;
                    case 'token_not_provided':
                        message = 'La sesión se ha terminado inesperadamente. Inicie sesión nuevamente.';
                        break;
                }
            }
        }

        if(status==500 && !message){
            message = 'Error interno del servidor';
        }

        if(status==403 && !message){
            message = 'No tiene los permisos necesarios';
        }

        if(!message) {
            message = statusText;
        }

        this.message = message;
    };

    function ModalOptions() {
        var that = this;

        this.notification = new Notification();

        this.animation = true;
        this.templateUrl = 'common/modals/modal-notification.html';
        this.controller = 'NotificationModalController';
        this.size = 'md';
        this.resolve = {
            notification: function(){
                return that.notification;
            }
        };
    }

    ModalOptions.prototype.open = function(){
        $uibModal.open(this);
    };

    /* Public */

    function create(){
        return new ModalOptions();
    }

    return {
        create: create,
    }
}]);