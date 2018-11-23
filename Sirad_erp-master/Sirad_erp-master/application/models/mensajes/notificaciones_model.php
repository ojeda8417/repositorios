<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class notificaciones_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	public function getnotificaciones()
	{
		$this->load->model('mensajes/minstock_model','prod');			
		$stockmin = $this->prod->get_produtomin();
		if (count($stockmin) >0)
			$activo = 1;
		else
			$activo = 0;
		$mensaje_stockmin = array(
			"activo" => $activo,
			"mensaje" =>"Stock Agotado",
			"url" => "mensajes/views/producto_minstock",
			"area" => "Logistica",
			"icono"=>"fa-tag",
			);
		$notificaciones[] = $mensaje_stockmin;

		return $notificaciones;
	}
}

?>