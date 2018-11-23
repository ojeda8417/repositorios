<?php
/*
	Include principal para la conexión a la base de datos
*/
include("conexion.php");

/*
	Definición de las variables que se envian mediante la función get
	Las variables 
	@Nombre [Es el nombre completo concatenado  string]
	@Ficha 	[Es la ficha de inscripción del aspirant a alumno Int]
	@Carrera [El identificador de la carrera seleccionada  Int]
*/
$FullName = $_GET["Nombre"];
$Ficha = $_GET["Ficha"];
$Carrera = $_GET["Carrera"];


$Date = date("Y-m-d H:i:s");// Fecha actual, ejemplo 2015-12-31 23:59:59
$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
$promedioTiempo=0; //Declaración de la variable del tiempo estimado

//Scrips sql
$sqlCoutn = "SELECT COUNT(turno) as atendidos FROM alumnos where estado = 2 and indice ='".$Indice."'"; //Query para contar a los alumnos atendidos
$sqlGetprom = "SELECT * FROM alumnos where indice ='".$Indice."'"; //Query para selecionar a todos los alumnos atendidos
$sqlGetTurno = "SELECT count(id) as turno FROM alumnos WHERE  indice ='".$Indice."'";
// ir por cantidad de alumnos
	$result = $conn->query($sqlGetTurno); //ir por los aspirantes del día en curso
	    while($row = $result->fetch_assoc()) {
	    	$turnos = $row["turno"] + 1;
	    }
	

// Verificar el tiempo promedio para el alumno
	$result = $conn->query($sqlCoutn); //Ejecutar Query $sqlCoutn
    while($row = $result->fetch_assoc()) {
    	// si existen como minimo dos alumnos atendidos hoy
        if ($row["atendidos"] >= 2){
        	//si hay más de dos se genera una suma de los minutos que tardaron en ser atendidos
        	// mediante el query de seleccion todos lo atnedidos hoy
        	$sumaProm =0;
        	$resultProm = $conn->query($sqlGetprom);
		    while($rowAtendidos = $resultProm->fetch_assoc()){
				if($rowAtendidos['hora_fin'] != '0000-00-00 00:00:00'){	    	
			    	$time1 =  new DateTime($rowAtendidos['hora_inicio']);
			    	$time2 =  new DateTime($rowAtendidos['hora_fin']);
			        $suma = $time1->diff($time2); // tiempo que tardó en ser atendido x alumno
			        $sumaProm += (int)$suma->format('%i'); //Acumolador de tiempo estimado.
			    }
			    else{
			        $sumaProm += (int)$rowAtendidos['tiempo_estimado']; 
			    }
		    }
		    $promedioTiempo=ceil( $sumaProm  / $resultProm->num_rows) ; //promedio de todos los tiempos, se redondea a su entero más proximo
        }
        else{
        	//sino se asigna un tiempo default, en este caso 11 minutos
        	$promedioTiempo = 11;
        }
    }

	$sql = "INSERT INTO alumnos (nombre,turno,hora_inicio,estado,carrera,ficha_inscripcion,indice, tiempo_estimado) 
	VALUES ('".$FullName."',".$turnos.",'".$Date."',1,".$Carrera.",".$Ficha.",'".$Indice."', ".$promedioTiempo." );";
	if ($conn->query($sql) === TRUE) {
		$bandera =1;
	} 
	else {
		$bandera = 0;
	}
	$conn->close();


	$json = array("key1" => $bandera,"tiempo" =>$promedioTiempo,"turno" =>$turnos );
	echo json_encode($json);
?>