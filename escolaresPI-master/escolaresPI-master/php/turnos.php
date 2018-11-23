<?php 
	include("conexion.php");
		if($_GET['Get']==1){
			echo getCurrentInning($conn);
		}
		else if($_GET['Get']==2){
			echo checkNextInning($conn,$_GET['Turno']);
		}
		else if($_GET['Get']==3){
			echo checkInning($conn,$_GET['Turno']);
		}
	function getCurrentInning($conexion){ 
		$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
		$sqlGetTurno = "SELECT turno, ficha_inscripcion as ficha, tiempo_estimado as tiempo FROM `alumnos` WHERE estado = 1 and indice = '".$Indice."' order by id asc limit 2";
		$estado = $i=0;
		$datos =  array();
		$result = $conexion->query($sqlGetTurno);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	if($i == 0){
			    		if( $result->num_rows == 2){
			    	   		$datos =  array('turno' => $row['turno'], 'tiempo' => $row['tiempo'] );
			    	   	}
			    	   	else{
			    	   		$datos =  array('turno' => $row['turno'], 'tiempo' => $row['tiempo'],'ficha'=>0 );
			    	   	}
			    	}
			    	if($i ==1){
			    		$datos ['ficha']= $row['ficha'];
			    	}
			    	$i++;
			    }
			}
			else {
			    $estado = 1;
			}
		//$conexion->close();
		$arrayName = array('estado' => $estado ,'Alumno' => $datos);
	return json_encode($arrayName);
	} 

function checkNextInning($conexion,$turno){ 
		if($_GET['Turno']!=1){
			$turno = (int)$_GET['Turno'] - 1;
		}
		else{
			$turno = (int)$_GET['Turno'];
		}
		$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
		$sqlGetTurno = "SELECT * FROM alumnos WHERE estado = 1 and indice ='".$Indice ."' and turno !=".(int)$_GET['Turno']." order by turno asc limit 1";
		$estado =1;
		$result = $conexion->query($sqlGetTurno);
			if ($result->num_rows != 0) {
				 while($row = $result->fetch_assoc()) {
				 		if($row['ficha_inscripcion']==$_GET['Ficha']){
							$fin = date("Y-m-d H:i:s");// Fecha actual, ejemplo 2015-12-31 23:59:59
							$sqlUpdate = "UPDATE alumnos SET estado=2, hora_fin='".$fin."' WHERE turno=".((int)$_GET['Turno'])." and indice='".$Indice."'";
							$conexion->query($sqlUpdate);
			   				return getCurrentInning($conexion);
			   			}
			   		}
			}
		//$conexion->close();
		$arrayName = array('estado' => $estado );
		return json_encode($arrayName);
	} 

function checkInning($conexion,$turno){ 
		$estado = null;
		$Indice = date("Y-m-d");// Fecha actual, ejemplo 2015-12-31 23:59:59
		$sqlGetTurno = "SELECT * FROM alumnos WHERE indice = '".$Indice."' and turno=".((int)$turno);
		$estado =1;
		$result = $conexion->query($sqlGetTurno);
			if ($result->num_rows != 0) {
				while($row = $result->fetch_assoc()) {
			    	$estado =   $row['estado'];
			    }
			}
		//$conexion->close();
		$arrayName = array('estado' => $estado );
		return json_encode($arrayName);
	} 

?>