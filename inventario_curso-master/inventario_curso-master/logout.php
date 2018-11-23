<?php

 require_once("class/config.php");

   session_destroy();

   header("Location:".Conectar::ruta()."index.php");
?>