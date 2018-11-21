'use strict';

angular.module('InvApp.BsTable', [])

.factory('BsTableHelper', function() {

	function BsTableControl() {
		this.options = new BsTableOptions();
	}

	BsTableControl.prototype.setData = function(data){
		this.options.data = data || {};
	};

	function BsTableOptions() {
		this.data = [];
		this.cache = false;
		this.height = 600;
		this.striped = true,
        this.pagination = true;
        this.sidePagination='server';
        this.pageSize = 10;
        this.pageList = [5, 10, 25, 50, 100, 200];
        this.search = true;
        this.showColumns = true;
        this.showRefresh = false;
        this.showPaginationSwitch = false;
        this.minimumCountColumns = 2;
        this.clickToSelect = false;
        this.showToggle = true;
        this.maintainSelected = true;
        this.filterControl = false;
        this.silentSort = false;
        this.columns = [];
	}

	function BsTableColumns() {
		this.field = 'Campo1';
        this.title = 'Campo 1';
        this.align = 'left';
        this.valign = 'bottom';
        this.sortable = true;
        this.search = true;
        this.filterControl = null;
	}


	function createBsTableControl(){
		return new BsTableControl();
	}

	function createBsTableOptions(){
		return new BsTableOptions();
	}

	function createBsTableColumns(){
		return new BsTableColumns();
	}

	return {
		createBsTableControl: createBsTableControl,
		createBsTableOptions: createBsTableOptions,
		createBsTableColumns: createBsTableColumns
	}	
});