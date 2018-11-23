<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicios extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
	}
	//CARGAR CARGOS
	public function getCargos()
	{
		$this->load->model('administracion/cargo_model','acam');
		$cargos = $this->acam->get_cargos();
		foreach ($cargos as $key => $cargo) {
		switch ($cargo["cCargosEst"]) {				
			    case 0:
			        $cargos[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $cargos[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $cargos));			
	}

	//Tipo de Categoria Activo get_categoria_activo

	public function getCategoria_Activo()
	{
		$this->load->model('administracion/categoria_model','acm');
		$result = $this->acm->get_categoria_activo();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	

	public function getCategoria()
	{		
		$this->load->model('administracion/categoria_model','acm');
		$categorias = $this->acm->get_categorias();
		foreach ($categorias as $key => $categoria) {
		switch ($categoria["cCategoriaEst"]) {				
			    case 0:
			        $categorias[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $categorias[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $categorias));
	}

	//Marcas activas
	public function getMarcas_Activo()
	{
		$this->load->model('administracion/marca_model','amm');
		$result = $this->amm->get_activos();	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getMarcas()
	{
		$this->load->model('administracion/marca_model','amm');
		$marcas = $this->amm->get_marcas();
		foreach ($marcas as $key => $marca) {
			switch ($marca["cMarcaEst"]) {				
			    case 0:
			        $marcas[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $marcas[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $marcas));
	}

	public function getTrabajadores()
	{
		
		$this->load->model('administracion/trabajadores_model','tramod');
		$trabajadores = $this->tramod->get_trabajadores();
		foreach ($trabajadores as $key => $trabajador) {
			switch ($trabajador["cPersonalEst"]) {				
			    case 0:
			        $trabajadores[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $trabajadores[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $trabajadores));
	}

	
	public function getConstantes()
	{
		$this->load->model('administracion/constante_model','constm');
		$result = $this->constm->get_constantes();
		echo json_encode(array('aaData' => $result));

	}

	public function getConstantesByClase($clase)
	{
		$this->load->model('administracion/constante_model','constm');
		$constante = $this->constm->get_ByClase($clase);
		echo json_encode(array('aaData' => $constante));
	}
	
	public function getClaseConstante()
	{
		$this->load->model('administracion/constante_model','constm');
		$result = $this->constm->get_Clases();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	public function getTipoMonedas($nTipoMoneda = FALSE)
	{
		$this->load->model('administracion/tipoMoneda_model','tmonmod');
		if($nTipoMoneda === FALSE)
		{
			$tipomoneda = $this->tmonmod->get_tipomoneda();
			foreach ($tipomoneda as $key => $tipomonedas) {
				switch ($tipomonedas["cTipoMonedaEst"]) {		
				    case 0:
				        $tipomoneda[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
				        break;
				    case 1:
				        $tipomoneda[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
				        break;
				}
			}
			$tipomoneda = array('aaData' => $tipomoneda);
		}
		else
		{
			$tipomoneda = $this->tmonmod->get_tipomoneda($nTipoMoneda);
		}
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($tipomoneda));
	}

	//CARGAR TIPO IGV

	public function getTipoIGVActivo()
	{
		$this->load->model('administracion/tipoigv_model','igvm');
		$result = $this->igvm->get_activo();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getTipoIGV($nTipoIGV = FALSE)
	{
		$this->load->model('administracion/tipoigv_model','igvm');
		if($nTipoIGV === FALSE)
		{
			$tipoigv = $this->igvm->get_tipoIGV();
			foreach ($tipoigv as $key => $tipo_igv) {
				switch ($tipo_igv["cTipoIGVEst"]) {				
				    case 0:
				        $tipoigv[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
				        break;
				    case 1:
				        $tipoigv[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
				        break;
				}
			}
			$tipoigv = array('aaData' => $tipoigv);
		}
		else
			$tipoigv = $this->igvm->get_tipoIGV($nTipoIGV);
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($tipoigv));
	}

	public function getZonas()
	{
		$this->load->model('administracion/zona_model','zonmod');
		$zonas = $this->zonmod->get_zonas();
		foreach ($zonas as $key => $zona) {
			switch ($zona["nZonaEst"]) {				
			    case 0:
			        $zonas[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $zonas[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $zonas));
	}

	public function get_zonas_activos()
	{	
		$this->load->model('administracion/zona_model','zonmod');
		$result = $this->zonmod->get_zonas_activos();
		echo json_encode(array('aaData' => $result));
	} 

	/*public function get_ZonaByUbigeo($nUbigeo_id)
	{	
		$this->load->model('administracion/Zona_Model','zonmod');
		$result = $this->zonmod->get_ByUbigeo($nUbigeo_id);
		echo json_encode(array('aaData' => $result));
	} */


	public function getZonasPersonal()
	{
		$this->load->model('administracion/zonapersonal_model','zopermod');
		$result = $this->zopermod->get_zonaspersonal();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getUbigeo()
	{
			$query = $this ->db->get ('ubigeo');
			echo json_encode($query -> result_array());
	}

	/*recuperar productos para ofertas
	*/
	public function getProductoSinOferta()
	{
		$this->load->model('logistica/producto_model','prodm');
		$productos = $this->prodm->get_sinoferta();
		echo json_encode(array('aaData' => $productos));
	}

	public function getProductosByOferta($nOferta_id)
	{
		$this->load->model('logistica/producto_model','prodm');
		$productos = $this->prodm->get_byoferta($nOferta_id);
		foreach ($productos as $key => $producto) {
			$productos[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
		}
		echo json_encode(array('aaData' => $productos));
	}

	public function getLocales()
	{
		$this->load->model('administracion/local_model','lo');
		$locales = $this->lo->get_locales();
		foreach ($locales as $key => $local) {
			switch ($local["nLocalEst"]) {				
			    case 0:
			        $locales[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $locales[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $locales));
	}

	public function get_trabajadores_sinzona(){
		$this->load->model('administracion/trabajadores_model','tramod');
		$result = $this->tramod->get_trabajadores_sinzona();
		echo json_encode(array('aaData' => $result));
	} 

	public function get_trabajadores_activos(){
		$this->load->model('administracion/trabajadores_model','tramod');
		$result = $this->tramod->get_trabajadores_activos();
		echo json_encode(array('aaData' => $result));
	}

	public function get_trabajadores_nouser(){
		$this->load->model('administracion/trabajadores_model','tramod');
		$result = $this->tramod->get_trabajadores_nouser();
		echo json_encode(array('aaData' => $result));
	}

	public function get_trabajadores_bylocal(){

		$nLocal_id= $this->session->userdata('current_local')["nLocal_id"];

		$this->load->model('administracion/trabajadores_model','tramod');
		$result = $this->tramod->get_trabajadores_bylocal($nLocal_id);
		echo json_encode(array('aaData' => $result));
	}

	public function getOfertas()
	{
		$this->load->model('administracion/oferta_model','ofertm');
		$ofertas = $this->ofertm->get_ofertas();
		foreach ($ofertas as $key => $oferta) {
			switch ($oferta["estado"]) {
			    case 1:
			        $ofertas[$key]["estadolabel"] = '<span class="label label-success">Vigente</span>';
			        break;
			    case 2:
			        $ofertas[$key]["estadolabel"] = '<span class="label label-primary">Programada</span>';
			        break;
			    case 3:
			        $ofertas[$key]["estadolabel"] = '<span class="label label-danger">Terminada</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $ofertas));
	}
	public function get_usuarios(){
		$this->load->model('administracion/usuario_model','us');
		$usuarios = $this->us->get_usuarios();

		foreach ($usuarios as $key => $usuario) {
			switch ($usuario["active"]) {
			    case 0:
			        $usuarios[$key]["estadolabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $usuarios[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $usuarios));
	}

	public function get_groupsbyUser($user_id)
	{
		$result = $this->ion_auth->get_users_groups($user_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result->result_array()));
	}

	public function get_LocalbyUser($user_id)
	{
		$this->load->model('administracion/userlocal_model','ulom');
		$result = $this->ulom->get_byuser($user_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}
	public function obtenerbakcups()
	{
		$servidor="localhost";
		$usuario="dicars_user";
		$pass="123456";
		$bd="dicarsbd";
		
		$this->load->model('administracion/backup_model','bak');
		$result = $this->bak->obtenerbackup($servidor,$usuario,$pass,$bd);
		$ahora=time();
		$texto=gmstrftime("%y-%m-%d",$ahora);
		echo json_encode(array('aaData' => $result));
	}

	public function getMaterial()
	{
		$this->load->model('administracion/material_model','mm');
		$result = $this->mm->get_material();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getMaterial_ByLocal()
	{
		$this->load->model('administracion/material_model','mm');
		$idLocal=$this->session->userdata('current_local')["nLocal_id"];
		$result = $this->mm->get_material_bylocal($idLocal);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getConfDoc()
	{
		$this->load->model('administracion/confdoc_model','cdm');
		$result = $this->cdm->get_confdoc();
		foreach ($result as $key => $config) {
			switch ($config["cDocEstado"]) {				
			    case 0:
			        $result[$key]["estadoLabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $result[$key]["estadoLabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}
	public function get_tipoproducto()
	{
		$this->load->model('administracion/tipo_model','timo');
		$result = $this->timo->get_tipoproductos();
		foreach ($result as $key => $ven_tipoproducto) {
			switch ($ven_tipoproducto["cTipoProductoEst"]) {				
			    case 0:
			        $result[$key]["estadoLabel"] = '<span class="label label-danger">Inhabilitado</span>';
			        break;
			    case 1:
			        $result[$key]["estadoLabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_tipoproducto_bycategoria($nCategoria_id)
	{
		$this->load->model('administracion/tipo_model','timo');
		$result = $this->timo->get_tipoproductos_bycategoria($nCategoria_id);	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


}