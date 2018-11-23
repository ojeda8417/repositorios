<?php
	$host = 'localhost';
	$user = 'root';
	$pw	  = '';
	$db   = 'escolarespi_db';
			$conn = mysqli_connect($host,$user,$pw,$db);
			$conn->set_charset("utf8");
			date_default_timezone_set('America/Tijuana');
		//	if (mysqli_connect_errno()){
		//		echo "No se pudo conectar a la base de datos" . mysqli_connect_error();
		//	}else{
			//	echo "conexión exitosamente realizada";
		//	}

?> 