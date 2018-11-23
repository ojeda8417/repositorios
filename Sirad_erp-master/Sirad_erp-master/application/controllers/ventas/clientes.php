<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class clientes extends CI_Controller {
public function __construct()
	{
		parent::__construct();		
		$this->load->model('ventas/clientes_model','climod');
	}

public function registrar(){
		$form = $this->input->post('formulario');
		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteDirec = null;
		$ClienteZona = null;
		$ClienteRef = null;
		$ClienteLinOpe = null;
		$ClienteOcup = null;
		$ClienteTelefono=null;
		$Ruc=null;			

		if ($form != null)
		{
			$ClienteNombre = $form["nombres"];
			$ClienteApell = $form["apellidos"];
			$ClienteDNI = $form["dni"];
			$ClienteRef = $form["referencia"];
			$ClienteDirec = $form["direccion"];			
			$ClienteZona = intval($this->session->userdata('current_local')["nUbigeo_id"]);
			$ClienteLinOpe=1;				
			$ClienteTelefono = $form["telefono"];	
			$cClienteArcCredito =null;
			$ClienteOcup = $form["ocupacion"];				
			$ruc=$form["ruc"];
			$razonsocial=null;
			$tipoContribuyente=-1;

			$Cliente = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	'cClienteArcCredito' =>"0",
			 	'cClienteOcup'=> $ClienteOcup,
			 	'cClienteTel'=>$ClienteTelefono,
			 	'cClienteRuc'=>$ruc,
			 	'cClienteRazonSocial'=>$razonsocial,
			 	'cClienteTipoContribuyente'=>$tipoContribuyente);
			if($this->climod->insert($Cliente))
				$return = array("responseCode"=>200, "datos"=>"ok");
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}

	public function registrar_empresa(){
		$form = $this->input->post('formulario');
		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteZona = null;
		$ClienteRef = null;
		$ClienteLinOpe = null;
		$ClienteOcup = null;
		$ClienteTelefono=null;
		$Ruc=null;
		$razonsocial=null;
		$tipocontribuyente=null;


		if ($form != null)
		{
					
			$ClienteZona = intval($this->session->userdata('current_local')["nUbigeo_id"]);
			$ClienteLinOpe=1;				
			$cClienteArcCredito =null;			
			$ruc=$form["eruc"];
			$razonsocial=$form["erazonsocial"];
			$tipocontribuyente=$form["etipCont"];
			$ClienteTelefono=$form["etelefono"];
			$ClienteDirec = $form["edirfiscal"];
			$Cliente = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	'cClienteArcCredito' =>"0",
			 	'cClienteOcup'=> $ClienteOcup,
			 	'cClienteTel'=>$ClienteTelefono,
			 	'cClienteRuc'=>$ruc,
			 	'cClienteRazonSocial'=>$razonsocial,
			 	'cClienteTipoContribuyente'=>$tipocontribuyente);
			if($this->climod->insert($Cliente))
				$return = array("responseCode"=>200, "datos"=>"ok");
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}



	public function editar(){
		$form = $this->input->post('formulario',null);

		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteDirec = null;
		$ClienteZona = null;
		$ClienteRef = null;
		$ClienteLinOpe = null;
		$ClienteOcup = null;
		$ClienteTelefono=null;
		$Ruc=null;
		$razonsocial=null;
		$tipoContribuyente=null;
		
		if ($form!=null){

			$nCliente_id =$form["idClientes"];
			$ClienteNombre = $form["nombres"];
			$ClienteApell = $form["apellidos"];
			$ClienteDNI = $form["dni"];
			$ClienteRef = $form["referencia"];
			$ClienteDirec = $form["direccion"];			
			$ClienteZona = intval($this->session->userdata('current_local')["nUbigeo_id"]);				
			$ClienteLinOpe = 1;				
			$ClienteOcup = $form["ocupacion"];
			$ClienteTelefono=$form["telefono"];
			$ruc=$form["ruc"];
			$tipoContribuyente=-1;			
			$data = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	'cClienteArcCredito' =>"0",
			 	'cClienteOcup'=> $ClienteOcup,
			 	'cClienteTel'=>$ClienteTelefono,
			 	'cClienteRuc'=>$ruc,
			 	'cClienteRazonSocial'=>$razonsocial,
			 	'cClienteTipoContribuyente'=>$tipoContribuyente);					
			if($this->climod->update($nCliente_id,$data))
				$return = array('responseCode'=>200, 'datos'=>$data);
			else
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		else 
			$return = array("responseCode"=>400, "greeting"=>"Bad");
			
		$return = json_encode($return);
		echo $return;
	}

	public function editar_empresa(){
		$form = $this->input->post('formulario',null);

		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteZona = null;
		$ClienteRef = null;
		$ClienteLinOpe = null;
		$ClienteOcup = null;
		$ClienteTelefono=null;
		$Ruc=null;
		$razonsocial=null;
		$tipocontribuyente=null;
		
		if ($form!=null){

			$nCliente_id =$form["idEmpresa"];
			$ClienteZona = intval($this->session->userdata('current_local')["nUbigeo_id"]);
			$ClienteLinOpe=1;				
			$cClienteArcCredito =null;			
			$ruc=$form["eruc"];
			$razonsocial=$form["erazonsocial"];
			$tipocontribuyente=$form["etipCont"];
			$ClienteTelefono=$form["etelefono"];
			$ClienteDirec = $form["edirfiscal"];
			$Empresa = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	'cClienteArcCredito' =>"0",
			 	'cClienteOcup'=> $ClienteOcup,
			 	'cClienteTel'=>$ClienteTelefono,
			 	'cClienteRuc'=>$ruc,
			 	'cClienteRazonSocial'=>$razonsocial,
			 	'cClienteTipoContribuyente'=>$tipocontribuyente);					
			if($this->climod->update($nCliente_id,$Empresa))
				$return = array('responseCode'=>200, 'datos'=>$Empresa);
			else
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		else 
			$return = array("responseCode"=>400, "greeting"=>"Bad");
			
		$return = json_encode($return);
		echo $return;
	}  
	

	
}