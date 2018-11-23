<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class productos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logistica/producto_model','pro');
		$this->load->model('logistica/localproducto_model','locpro');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		
		if ($form!=null){			
			$Serie = "";
			$Talla = "";
			$Marca = $form["marca"];
			$Tipo = $form["tipprod"];
			$Categoria = $form["categoria"];
			$Descripcion = $form["descripcion"];
			$Imagen = null;
			$PContado = 0;
			$PCredito = 0;
			//$PCosto = $form["preciocosto"];
			$PCosto = 0.00;
			$StockMin = $form["stockmin"];
			$StockMax = $form["stockmax"];	
			$Stock = 0;
			$PorcUti = 0;
			$UtiBruta = 0; 
			$Estado="1";
			$idLocal=$form["idLocal"];	
			$PrecioVenta=$form["precioventa"];
			$UnidadMedia=$form["unimedida"];
			$afecto=$form["tipo_impuesto"];

			$Producto = array(
				'cProductoSerie' => $Serie,'cProductoTalla' =>$Talla,
				'nProductoMarca'=>$Marca,'nProductoTipo'=> $Tipo,
				'nCategoria_id' => $Categoria,'cProductoDesc' => $Descripcion,
				'cProductoImage' => $Imagen,'nProductoPContado' => $PContado,
				'nProductoPCredito'=>$PCredito,'nProductoPCosto'=>$PCosto,
				'nProductoStockMin'=>$StockMin,'nProductoStockMax'=>$StockMax,
				'nProductoStock'=>$Stock,'nProductoPorcUti'=>$PorcUti,
				'nProductoUtiBruta'=>$UtiBruta,'cProductoEst'=>$Estado,
				'nProductoPVenta'=>$PrecioVenta,
				'nProductoUnidMedida'=>$UnidadMedia,
				'nProductoAfectoImpuesto'=>$afecto);

			$band = true;
			$this->db->trans_begin();
			$Producto_id = $this->pro->insert($Producto);
			if($Producto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				$detalle=array('nLocal_id'=>$idLocal,
					'nProducto_id'=>$Producto_id,
					'clocalProducto_Estado'=>$Estado);
				
				if(!$this->locpro->insert_batch($detalle))
					$band = false;

			}

			if($band)
				$this->db->trans_commit();
			else
			{
				$this->db->trans_rollback();
				$this->output->set_status_header('400');
			} 
		}
		else 
		{
			$this->output->set_status_header('400');
			$return = "bad";
		} 
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
}



	public function editar(){
		$form = $this->input->post('formulario',null);
	
		$Serie = null;
		$Talla = null;
		$Marca = null;
		$Tipo = null; 
		$Categoria = null;
		$Descripcion = null;
		$Imagen = null;
		$PContado = null; 
		$PCredito = null;
		$PCosto = null;
		$StockMin = null;
		$StockMax = null;
		//$CodBarra = null;
		$Stock = 0;
		$PorcUti = 0;
		$UtiBruta = 0; 
		$Estado=null;
		$afectos=null;

		
		if ($form!=null){
			$Productoid=$form["codigo"];
			$Serie = "";
			$Talla = "";
			$Marca = $form["marca"];
			$Tipo = $form["tipprod"];
			$Categoria = $form["categoria"];
			$Descripcion = $form["descripcion"];
			$PContado = 0;
			$PCredito = 0;
			//$PCosto = $form["preciocosto"];
			$PCosto = 0.00;
			$StockMin = $form["stockmin"];
			$StockMax = $form["stockmax"];
			$Estado=$form["estado"];
			$PrecioVenta=$form["precioventa"];
			$UnidadMedia=$form["unimedida"];
			$afectos=$form["tipo_impuesto"];
							
			$data = array(
				'cProductoSerie' => $Serie,'cProductoTalla' =>$Talla,
				'nProductoMarca'=>$Marca,'nProductoTipo'=> $Tipo,
				'nCategoria_id' => $Categoria,'cProductoDesc' => $Descripcion,
				'cProductoImage' => $Imagen,'nProductoPContado' => $PContado,
				'nProductoPCredito'=>$PCredito,'nProductoPCosto'=>$PCosto ,
				'nProductoStockMin'=>$StockMin ,'nProductoStockMax'=>$StockMax,
				'nProductoStock'=>$Stock,'nProductoPorcUti'=>$PorcUti,
				'nProductoUtiBruta'=>$UtiBruta,'cProductoEst'=>$Estado,
				'nProductoPVenta'=>$PrecioVenta,'nProductoUnidMedida'=>$UnidadMedia,'nProductoAfectoImpuesto'=>$afectos);		
			
			if(!$this->pro->update($Productoid,$data))
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	} 
}

?>