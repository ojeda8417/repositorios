<?php

 class Proveedores extends Conectar{


 	  public function get_proveedores(){

 	  	  $conectar=parent::conexion();
 	  	  parent::set_names();

 	  	  $sql="select * from proveedores;";

 	  	  $sql=$conectar->prepare($sql);

 	  	  $sql->execute();

 	  	  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 	  }

 	  public function agregar_proveedor(){

 	  	$conectar=parent::conexion();
 	  	parent::set_names();

 	  	if(empty($_POST["rif_proveedor"]) or empty($_POST["nombre_proveedor"]) or empty($_POST["tlf_proveedor"]) or empty($_POST["direc_proveedor"]) or empty($_POST["email_proveedor"]) or empty($_POST["nom_contacto"])){
           
           header("Location:".Conectar::ruta()."agregar_proveedor.php?m=1");
           exit();
 	  	}

 	  	$sql="insert into proveedores 
 	  	values(null,?,?,?,?,?,?,now());";

 	  	$sql=$conectar->prepare($sql);

 	  	$sql->bindValue(1,$_POST["rif_proveedor"]);
 	  	$sql->bindValue(2,$_POST["nombre_proveedor"]);
 	  	$sql->bindValue(3,$_POST["tlf_proveedor"]);
 	  	$sql->bindValue(4,$_POST["direc_proveedor"]);
        $sql->bindValue(5,$_POST["email_proveedor"]);
        $sql->bindValue(6,$_POST["nom_contacto"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."agregar_proveedor.php?m=2");
        exit();
 	  }

 	  public function get_proveedor_por_id($id_proveedor){

 	  	   $conectar=parent::conexion();
 	  	   parent::set_names();

           $sql="select * from proveedores where cod_proveedor=?";

           $sql=$conectar->prepare($sql);

           $sql->bindValue(1,$id_proveedor);

           $sql->execute();

           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 	  }

 	  public function editar_proveedor(){

 	  	 $conectar=parent::conexion();
 	  	 parent::set_names();

 	  	  if(empty($_POST["rif_proveedor"]) or empty($_POST["nombre_proveedor"]) or empty($_POST["tlf_proveedor"]) or empty($_POST["direc_proveedor"]) or empty($_POST["email_proveedor"]) or empty($_POST["nom_contacto"])){
           
           header("Location:".Conectar::ruta()."editar_proveedor.php?id_proveedor=".$_POST["id"]."&m=1");
           exit();
 	  	}

 	  	$sql="update proveedores set 
        
        rif_proveedor=?,
        nombre_proveedor=?,
        tlf_proveedor=?,
        direc_proveedor=?,
        email_proveedor=?,
        nom_contacto=?,
        fecha=now()
        where 
        cod_proveedor=?
         ";

         $sql=$conectar->prepare($sql);

         $sql->bindValue(1,$_POST["rif_proveedor"]);
         $sql->bindValue(2,$_POST["nombre_proveedor"]);
         $sql->bindValue(3,$_POST["tlf_proveedor"]);
         $sql->bindValue(4,$_POST["direc_proveedor"]);
         $sql->bindValue(5,$_POST["email_proveedor"]);
         $sql->bindValue(6,$_POST["nom_contacto"]);
         $sql->bindValue(7,$_POST["id"]);
         $sql->execute();

         $resultado=$sql->fetch(PDO::FETCH_ASSOC);

         header("Location:".Conectar::ruta()."editar_proveedor.php?id_proveedor=".$_POST["id"]."&m=2");
         exit();
 	  }


 	  public function eliminar_proveedor($id_proveedor){

 	  	  $conectar=parent::conexion();
 	  	  parent::set_names();

 	  	  $sql="delete  from proveedores where cod_proveedor=?";

 	  	  $sql=$conectar->prepare($sql);

 	  	  $sql->bindValue(1,$id_proveedor);
 	  	  $sql->execute();

 	  	  return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
 	  }

    public function get_pedidos(){

       $conectar=parent::conexion();
       parent::set_names();

       $sql="select * from pedidos;";

       $sql=$conectar->prepare($sql);

       $sql->execute();

       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function agregar_pedido(){

        $conectar=parent::conexion();
        parent::set_names();

        if(empty($_POST["cod_material"]) or empty($_POST["material_pedido"]) or empty($_POST["cantidad_pedido"]) or empty($_POST["producto"])){
            
            header("Location:".Conectar::ruta()."agregar_pedido.php?m=1");
            exit();
        }

        $sql="insert into pedidos 
        values(null,?,?,?,now(),?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["cod_material"]);
        $sql->bindValue(2, $_POST["material_pedido"]);
        $sql->bindValue(3, $_POST["cantidad_pedido"]);
        $sql->bindValue(4, $_POST["producto"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."agregar_pedido.php?m=2");
        exit();
    }

    public function get_pedido_por_id($id_pedido){


         $conectar=parent::conexion();
         parent::set_names();

         $sql="select * from pedidos where cod_pedido=?";

         $sql=$conectar->prepare($sql);

         $sql->bindValue(1,$id_pedido);

         $sql->execute();

         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function editar_pedido(){



        $conectar=parent::conexion();
        parent::set_names();

         if(empty($_POST["cod_material"]) or empty($_POST["material_pedido"]) or empty($_POST["cantidad_pedido"]) or empty($_POST["producto"])){
            
            header("Location:".Conectar::ruta()."editar_pedido.php?id_pedido=".$_POST["id"]."&m=1");
            exit();
        }

        $sql="update pedidos set 

          cod_material=?,
          material_pedido=?,
          cantidad_pedido=?,
          fecha_pedido=now(),
          rif_proveedor=?
          where 
          cod_pedido=?

        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["cod_material"]);
        $sql->bindValue(2, $_POST["material_pedido"]);
        $sql->bindValue(3, $_POST["cantidad_pedido"]);
        $sql->bindValue(4, $_POST["producto"]);
        $sql->bindValue(5, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        header("Location:".Conectar::ruta()."editar_pedido.php?id_pedido=".$_POST["id"]."&m=2");
        exit();
    }

    public function eliminar_pedido($id_pedido){

       $conectar=parent::conexion();
       parent::set_names();

        $sql="delete from pedidos where cod_pedido=?;";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$id_pedido);

        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
    }

    public function get_proveedores_por_rif(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="select * from proveedores where rif_proveedor=?";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["rif_proveedor"]);

        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
    }


    public function get_pedido_por_fecha(){

        $conectar=parent::conexion();
        parent::set_names();

        $dia= $_POST["dia"];
        $mes= $_POST["mes"];
        $ano= $_POST["ano"];

        $dia1= $_POST["dia1"];
        $mes1= $_POST["mes1"];
        $ano1= $_POST["ano1"];

        $fecha_desde= ($ano."-".$mes."-".$dia);
        $fecha_hasta= ($ano1."-".$mes1."-".$dia1);

        $sql="select * from pedidos where rif_proveedor=? and fecha_pedido>=? and fecha_pedido<=?;";
    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["rif_proveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //se usó para llamar al nombre del proveedor en reporte de materiales en pdf
  public function get_proveedor_por_rif_directo($proveedor){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select * from proveedores where rif_proveedor=?;";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$proveedor);
    $sql->execute();
    return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  }

 }



?>