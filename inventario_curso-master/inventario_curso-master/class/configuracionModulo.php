
<?php
  
  Class Configuracion extends Conectar{

      
      public function get_configuracion(){

      	 $conectar=parent::conexion();
      	 parent::set_names();

      	 $sql="select * from configuracion;";

      	 $sql=$conectar->prepare($sql);

      	 $sql->execute();

      	 return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function agregar_configuracion(){


      	   $conectar=parent::conexion();
      	   parent::set_names();

      	   if(empty($_POST["rif_empresa"]) or empty($_POST["nom_empresa"]) or empty($_POST["direc_empresa"]) or empty($_POST["tlf_empresa"]) or empty($_POST["ced_gerente"]) or empty($_POST["nom_gerente"]) or empty($_POST["ape_gerente"]) or empty($_POST["correo_gerente"]) or empty($_POST["tlf_gerente"]) or empty($_POST["iva"])){
              
              header("Location:".Conectar::ruta()."agregar_configuracion.php?m=1");
              exit();
      	   }

      	   $sql="insert into configuracion 
      	   values(null,?,?,?,?,?,?,?,?,?,?);";

      	   $sql=$conectar->prepare($sql);

      	   $sql->bindValue(1, $_POST["rif_empresa"]);
      	   $sql->bindValue(2, $_POST["nom_empresa"]);
      	   $sql->bindValue(3, $_POST["direc_empresa"]);
      	   $sql->bindValue(4, $_POST["tlf_empresa"]);
      	   $sql->bindValue(5, $_POST["ced_gerente"]);
      	   $sql->bindValue(6, $_POST["nom_gerente"]);
      	   $sql->bindValue(7, $_POST["ape_gerente"]);
      	   $sql->bindValue(8, $_POST["correo_gerente"]);
      	   $sql->bindValue(9, $_POST["tlf_gerente"]);
      	   $sql->bindValue(10, $_POST["iva"]);
      	   $sql->execute();

      	   $resultado=$sql->fetch(PDO::FETCH_ASSOC);

      	   header("Location:".Conectar::ruta()."agregar_configuracion.php?m=2");
      	   exit();
      }

      public function get_configuracion_por_id($id_configuracion){

      	  $conectar=parent::conexion();
      	  parent::set_names();

      	  $sql="select * from configuracion where codigo=?";

      	  $sql=$conectar->prepare($sql);

      	  $sql->bindValue(1, $id_configuracion);

      	  $sql->execute();

      	  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function editar_configuracion(){

      	    $conectar=parent::conexion();
      	    parent::set_names();


          if(empty($_POST["rif_empresa"]) or empty($_POST["nom_empresa"]) or empty($_POST["direc_empresa"]) or empty($_POST["tlf_empresa"]) or empty($_POST["ced_gerente"]) or empty($_POST["nom_gerente"]) or empty($_POST["ape_gerente"]) or empty($_POST["correo_gerente"]) or empty($_POST["tlf_gerente"]) or empty($_POST["iva"])){
              
              header("Location:".Conectar::ruta()."editar_configuracion.php?id_configuracion=".$_POST["id"]."&m=1");
              exit();
      	   }

      	   $sql="update configuracion set 

           rif_empresa=?,
           nom_empresa=?,
           direc_empresa=?,
           tlf_empresa=?,
           ced_gerente=?,
           nom_gerente=?,
           ape_gerente=?,
           correo_gerente=?,
           tlf_gerente=?,
           iva=?
           where 
           codigo=?
           ";

           $sql=$conectar->prepare($sql);

           $sql->bindValue(1,$_POST["rif_empresa"]);
           $sql->bindValue(2,$_POST["nom_empresa"]);
           $sql->bindValue(3,$_POST["direc_empresa"]);
           $sql->bindValue(4,$_POST["tlf_empresa"]);
           $sql->bindValue(5,$_POST["ced_gerente"]);
           $sql->bindValue(6,$_POST["nom_gerente"]);
           $sql->bindValue(7,$_POST["ape_gerente"]);
           $sql->bindValue(8,$_POST["correo_gerente"]);
           $sql->bindValue(9,$_POST["tlf_gerente"]);
           $sql->bindValue(10,$_POST["iva"]);
           $sql->bindValue(11,$_POST["id"]);
           $sql->execute();

           $resultado=$sql->fetch(PDO::FETCH_ASSOC);

           header("Location:".Conectar::ruta()."editar_configuracion.php?id_configuracion=".$_POST["id"]."&m=2");
           exit();

       
      }

      public function eliminar_configuracion($id_configuracion){

      	  $conectar=parent::conexion();
      	  parent::set_names();

      	  $sql="delete from configuracion where codigo=?";

      	  $sql=$conectar->prepare($sql);

      	  $sql->bindValue(1, $id_configuracion);

      	  $sql->execute();

      	  return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
      }
  }

?>