'use strict';

angular.module('InvApp.inv', ['ngRoute', 'bsTable'])

.constant('INV', {
	ROUTES: {
		'LIST': '/inv/list',

		'SERVICE_ART_AVAILABILITY': '/inv/disponible'
	},
	PARAM_NAMES: {
		CODE: 'articulo',
		DESCRIPTION: 'descripcion',
		PRODUCER: 'fabricante',
		COMPANY: 'empresa'
	}
})

.config(['$routeProvider', 'INV', function($routeProvider, INV) {
	$routeProvider
		.when(INV.ROUTES.LIST, {
			templateUrl: 'inv/partials/inv-list.html',
			controller: 'InvController'
		});
}])

.controller('InvController', ['$scope', '$http', 'NotificationModal', 'Inv', 'Auth', 'APP_SERVICE','INV',
	function($scope, $http, NotificationModal, Inv, Auth, APP_SERVICE, INV) {

	var notificationOptions = NotificationModal.create();
    var notification = notificationOptions.notification;
    var ajaxFilters = {};
    var isInitialized = false;

	// Valor inicial de los filtros de busqueda
	$scope.filters={
		articulo:'',
		descripcion:'',
		fabricante:'',
		grupo:'',
		familia:'',
		linea:'',
		empresa:''
	};

	// Search button initital state
	$scope.isSearching = false;
	// Obtiene el usuario atenticado
	var user = Auth.getUser();

	// Obtiene la lista de empresas en las que puede consultar el usuario
	user && user.getCompanies().then(function(companies){
		$scope.companies = companies;
		if(companies.length>0 && companies[0] && companies[0].Empresa){
			$scope.filters.empresa = companies[0].Empresa;
		}
	}, function(error){
		notification.title = 'No se pudieron obtener las empresas del usuario';
        notification.error = true;
        notification.setMessage(error);
        notificationOptions.open();
	})

	// Establece las propiedades de la tabla
	$scope.bsTableControl = Inv.getBsTableControl();

	$scope.bsTableControl.options.ajax = function (settings){
		var config = {headers: {'Content-Type': 'application/json'}};

		$http.post(APP_SERVICE.SERVER+INV.ROUTES.SERVICE_ART_AVAILABILITY, {data:settings.data}, config)

        .then(function(response){
            //inv = response.data.artDisponible;
			$scope.isSearching = false;
			settings.success(response.data);
        }, function(error){
        	if(isInitialized) {
	            console.error(error.status, error.statusText);
	            notification.title = 'No se pudo completar la búsqueda';
	            notification.error = true;
	            notification.setMessage(error);
	            notificationOptions.open();
	            $scope.isSearching = false;
	        }
            settings.error(error);
        });
	};

	// Realiza la consulta del disponible en inventario
	$scope.searchInv = function(filters){
		$('.search input').hide();
		$scope.isSearching = true;
		isInitialized = true;

		if(angular.equals($scope.filters, ajaxFilters)) {
			$scope.isSearching = false;
			return false;
		}

		angular.copy($scope.filters, ajaxFilters);

		var jsonFilters = JSON.stringify(ajaxFilters);
		var searchInput = $('.search input');
		searchInput.val(jsonFilters);
		searchInput.keyup();
	};


	$(window).resize(function () {
        var searchTable = $('#inv-table');

        var tableHeight = 400;
        if( $( window ).height()-15 > tableHeight){
        	tableHeight = $( window ).height();
        }

        //searchTable.attr('data-height',tableHeight);
        searchTable.bootstrapTable('resetView',{'height':tableHeight});
        //searchTable.bootstrapTable('resetWidth');
    });
}]);
