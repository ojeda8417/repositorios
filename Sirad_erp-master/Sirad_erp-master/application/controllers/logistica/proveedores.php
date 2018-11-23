<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class proveedores extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logistica/proveedor_model','pro');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		
		$Ruc = null;
		$RazonSocial = null; 
		$Telefono = null;
		$Email = null; 
		$SitioWeb= null;
		$Direccion = null; 
		$Corriente = null;
		//
		$dirFiscal=null;
		$comprobantePago=null;
		$fecInscripcion=null;
		$fecInicio=null;
		$tipContribuyente=null;
		$estado=null; 
		
		if ($form!=null){
			$Ruc = $form["ruc"];
			$RazonSocial = $form["razonsocial"];
			$Telefono = $form["telefono"];
			$Email = $form["email"];
			$SitioWeb = $form["paginaweb"];
			$Direccion = $form["direccion"];
			$Corriente=$form["ccorriente"];
			//
			$dirFiscal=$form["dirfiscal"];
			$comprobantePago=$form["comprobantePago"];
			$fecInscripcion=date_create_from_format("d/m/Y",$form["fecInscripcion"]);
			$fecInicio= date_create_from_format("d/m/Y",$form["inicioActividades"]);
			$tipContribuyente=$form["tipContribuyente"];
			$estado=$form["selectEstado"];

							
			$Proveedor = array('cProveedorRuc' => $Ruc,'cProveedorRazSocial' =>$RazonSocial,'cProveedorTel'=>$Telefono,
			'cProveedorEmail'=>$Email,'cProveedorSitioWeb'=>$SitioWeb,'cProveedorDirec'=>$Direccion,'cProveedorCCorriente'=>$Corriente,
			'cProveedorDireccionFiscal'=>$dirFiscal,'nProveedorComprobantePago'=>$comprobantePago,'nProveedorEstado'=>$estado,
			'dProveedorFechaInscripcion'=>$fecInscripcion->format('Y-m-d'),'dProveedorFechaInicioActividades'=>$fecInicio->format('Y-m-d'),
			'nProveedorTipoContribuyente'=>$tipContribuyente );
	
			if($this->pro->insert($Proveedor)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}; 

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	public function editar(){
		$form = $this->input->post('formulario',null);
		
		//$Codigo=null;
		$Ruc = null;
		$RazonSocial = null; 
		$Telefono = null;
		$Email = null; 
		$SitioWeb= null;
		$Direccion = null; 
		$Corriente = null; 
		//
		$dirFiscal=null;
		$comprobantePago=null;
		$fecInscripcion=null;
		$fecInicio=null;
		$tipContribuyente=null;
		$estado=null; 
		
		if ($form!=null){
			$Codigo=$form["codigo"];
			$Ruc = $form["ruc"];
			$RazonSocial = $form["razonsocial"];
			$Telefono = $form["telefono"];
			$Email = $form["email"];
			$SitioWeb = $form["paginaweb"];
			$Direccion = $form["direccion"];
			$Corriente=$form["ccorriente"];
			//
			$dirFiscal=$form["dirfiscal"];
			$comprobantePago=$form["comprobantePago"];
			$fecInscripcion= date_create_from_format("d/m/Y",$form["fecInscripcion"]);
			$fecInicio= date_create_from_format("d/m/Y",$form["inicioActividades"]);
			$tipContribuyente=$form["tipContribuyente"];
			$estado=$form["selectEstado"];
							
			$data = array('cProveedorRuc' => $Ruc,'cProveedorRazSocial' =>$RazonSocial,'cProveedorTel'=>$Telefono,
			'cProveedorEmail'=>$Email,'cProveedorSitioWeb'=>$SitioWeb,'cProveedorDirec'=>$Direccion,
			'cProveedorCCorriente'=>$Corriente,'cProveedorDireccionFiscal'=>$dirFiscal,
			'nProveedorComprobantePago'=>$comprobantePago,'nProveedorEstado'=>$estado,
			'dProveedorFechaInscripcion'=>$fecInscripcion->format('Y-m-d'),
			'dProveedorFechaInicioActividades'=>$fecInicio->format('Y-m-d'),
			'nProveedorTipoContribuyente'=>$tipContribuyente);		
			
			if($this->pro->update($Codigo,$data)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}		
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}
	

}