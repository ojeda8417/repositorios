<?php

   require_once("class/config.php");

   if(isset($_SESSION["backend_id"])){
     
     require_once("class/clientesModulo.php");

     $clientes=new Clientes();

     $clientes->eliminar_cliente($_GET["id_cliente"]);

     header("Location:".Conectar::ruta()."clientes.php");
     exit();
  
   } else {

   	  header("Location:".Conectar::ruta()."index.php");
   	  exit();
   }

?>