<?php

  class Entradas extends Conectar{


  	  public function get_entradas(){


  	  	 $conectar=parent::conexion();
  	  	 parent::set_names();

  	  	 $sql="select * from orden_compras;";

  	  	 $sql=$conectar->prepare($sql);

  	  	 $sql->execute();

  	  	 return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  	  }

  	  public function agregar_entrada(){

  	  	  $conectar=parent::conexion();
  	  	  parent::set_names();

  	  	  if(empty($_POST["cod_material"]) or empty($_POST["material"]) or empty($_POST["precio_orden"]) or empty($_POST["cantidad"]) or empty($_POST["rif_proveedor"])){
             
             header("Location:".Conectar::ruta()."agregar_entrada.php?m=1");
             exit();
  	  	  }

  	  	  $sql="insert into orden_compras
  	  	  values(null,?,?,?,?,?,now());";

  	  	  $sql=$conectar->prepare($sql);

  	  	  $sql->bindValue(1,$_POST["cod_material"]);
  	  	  $sql->bindValue(2,$_POST["material"]);
  	  	  $sql->bindValue(3,$_POST["precio_orden"]);
  	  	  $sql->bindValue(4,$_POST["cantidad"]);
  	  	  $sql->bindValue(5,$_POST["rif_proveedor"]); 
  	  	  $sql->execute();

  	  	  $resultado=$sql->fetch(PDO::FETCH_ASSOC);

  	  	  header("Location:".Conectar::ruta()."agregar_entrada.php?m=2");
  	  	  exit();
  	  }

  	  public function get_entrada_por_id($id_entrada){

  	  	    $conectar=parent::conexion();
  	  	    parent::set_names();

  	  	   $sql="select * from orden_compras where id_orden_compras=?";

  	  	   $sql=$conectar->prepare($sql);

  	  	   $sql->bindValue(1, $id_entrada);

  	  	   $sql->execute();

  	  	   return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  	  }

  	  public function editar_entrada(){


  	  	   $conectar=parent::conexion();
  	  	   parent::set_names();

  	  	    if(empty($_POST["cod_material"]) or empty($_POST["material"]) or empty($_POST["precio_orden"]) or empty($_POST["cantidad"]) or empty($_POST["rif_proveedor"])){
             
             header("Location:".Conectar::ruta()."editar_entrada.php?id_entrada=".$_POST["id"]."&m=1");
             exit();
  	  	  }

  	  	  $sql="update orden_compras set 

          cod_material=?,
          material=?,
          precio_orden=?,
          cantidad=?,
          rif_proveedor=?,
          fecha_ingreso=now()
          where 
          id_orden_compras=?
  	  	  ";

  	  	  $sql=$conectar->prepare($sql);

  	  	  $sql->bindValue(1,$_POST["cod_material"]);
  	  	  $sql->bindValue(2,$_POST["material"]);
  	  	  $sql->bindValue(3,$_POST["precio_orden"]);
  	  	  $sql->bindValue(4,$_POST["cantidad"]);
  	  	  $sql->bindValue(5,$_POST["rif_proveedor"]);
  	  	  $sql->bindValue(6,$_POST["id"]);
  	  	  $sql->execute();

  	  	  $resultado=$sql->fetch(PDO::FETCH_ASSOC);

  	  	  header("Location:".Conectar::ruta()."editar_entrada.php?id_entrada=".$_POST["id"]."&m=2");
  	  	  exit();
  	  }

  	  public function eliminar_entrada($id_entrada){

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from orden_compras where id_orden_compras=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_entrada);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  	  }

  	   public function get_orden_compras_por_fecha(){


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

        $sql="select * from orden_compras where rif_proveedor=? and fecha_ingreso>=? and fecha_ingreso<=?;";
    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["rif_proveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 


     public function get_cant_productos_por_fecha(){

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

        $sql="select sum(cantidad) as total from orden_compras where rif_proveedor=? and fecha_ingreso >=? and fecha_ingreso <=?;";

    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["rif_proveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
    } 



  } 

?>