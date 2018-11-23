
<?php

  session_start();

   class Conectar{

   	   protected $dbh;

   	   protected function conexion(){

   	   	$conectar= $this->dbh= new PDO("mysql:local=localhost; dbname=inventario_curso","root","");
   	    return $conectar;
   	   }

   	   public function set_names(){

   	   	 return $this->dbh->query("SET NAMES 'utf8'");
   	   }

   	  
   	  public function ruta(){

   	  	return "http://localhost/inventario_curso/";
   	  }

   	  //Función para invertir fecha
      public static function invierte_fecha($fecha){
      $dia=substr($fecha,8,2);
      $mes=substr($fecha,5,2);
      $anio=substr($fecha,0,4);
      $correcta=$dia."-".$mes."-".$anio;
      return $correcta;
      }

      //Función para convertir fecha del mes de numero al nombre, ejemplo de 01 a enero
      public static function convertir($string)
       {

       $string = str_replace(
       array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
       array('ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', ' DICIEMBRE'),
       $string
      );        
      return $string;
    }
   
   

   }



?>