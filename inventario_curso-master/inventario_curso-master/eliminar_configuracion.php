<?php

  require_once("class/config.php");

   if(isset($_SESSION["backend_id"])){

        
        require_once("class/configuracionModulo.php");

        $config=new Configuracion();

        $config->eliminar_configuracion($_GET["id_configuracion"]);

        header("Location:".Conectar::ruta()."configuracion.php");
        exit();
   
   } else {

   	   header("Location:".Conectar::ruta()."index.php");
   	   exit();
   }


?>