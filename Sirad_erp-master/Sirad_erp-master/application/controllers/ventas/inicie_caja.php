<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class inicie_caja extends CI_Controller {
public function __construct()
	{
		parent::__construct();		
		$this->load->model('ventas/inicie_caja_model','inicie');
	}

	public function registrar(){
			$form = $this->input->post('formulario');
			
			$fechApertura = null; 
			$fecCierre = null;		
			$saldoInicial = null;
			$cajaIngreso = 0;
			$cajaEgreso = 0;
			$estado = null;
			$idUsuario = null;
			$idLocal = null;
			$saldoFinal=0;
			$saldoSobrante=0;			

			if ($form != null)
			{
				$fechApertura =  date_create_from_format("d/m/Y",$form["fecApertura"]);			
				$saldoInicial = $form["importe"];			
				$estado = 1;
				$idUsuario=$this->ion_auth->user()->row()->nPersonal_id;				
				$idLocal =$this->session->userdata('current_local')["nLocal_id"];					
				
				$Caja = array(
					'dCajaFechaApertura'=> $fechApertura->format('Y-m-d'),
					'dCajaFechaCierre'=> $fecCierre,
					'nCajaSaldoInicial'=> $saldoInicial,				
				 	'nCajaIngreso' => $cajaIngreso,
					'nCajaEgreso' => $cajaEgreso,
				 	'cCajaEstado'=> $estado,
				 	'nUsuario_id'=> $idUsuario,
				 	'nLocal_id' =>$idLocal,
				 	'nCajaSaldoFinal'=> $saldoFinal,
				 	'nCajaFaltanteSobrante'=>$saldoSobrante);
				$id_Caja=$this->inicie->insert($Caja);
				if($id_Caja!=null){
					$this->inicie->get_EstadoCaja();
					$return = array("responseCode"=>200, "datos"=>"ok");
				}else
					$return = array("responseCode"=>400, "greeting"=>"Bad");
			} 
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");

			$return = json_encode($return);
			echo $return;
		}
		public function cierre_caja()
		{
			$form = $this->input->post('formulario');

			$fechaCierre=null;

			if ($form != null)
			{
				$fechaCierre =  date_create_from_format("d/m/Y",$form["fecApertura"]);						
				$estado = 2;					
				
				$Caja = array(
					'dCajaFechaCierre'=> $fechaCierre->format('Y-m-d'),
				 	'cCajaEstado'=> $estado);
				if($this->inicie->cierre_caja($Caja)){
					$this->inicie->get_EstadoCaja();
					$return = array("responseCode"=>200, "datos"=>"ok");
				}else
					$return = array("responseCode"=>400, "greeting"=>"Bad");
			} 
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");

			$return = json_encode($return);
			
			echo $return;
		}
	}