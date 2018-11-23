<?php
$title = $_POST['title'];
$table_ingresos = $_POST['table_ingresos'];
$table_egresos = $_POST['table_egresos'];
$table_total = $_POST['table_total']; 

header('Content-type: application/x-msdownload; charset=utf-16');
header('Content-Disposition: attachment; filename=reporte_ingresoegreso'.date("d-m-Y").'.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
    <html>
    <head>
    <meta charset="utf-8">
     <style type="text/css">
	<!--
	table{
		width: 100%;
	}
	th{
		background: #e7e6e6;
	}
	#divh3{
		background: #ff0;
		border-radius: 5px;
		text-align: center;
		text-transform: uppercase;
		width: 100%;
	}

	#treporte{
		border-collapse: collapse;
		text-align: center;
	}
	#treporte td.head{
		background: #e7e6e6;
		text-transform: uppercase;
	}
	#treporte th, #treporte td{
		border: black 1px solid;
	}
	#treporte td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	</head>
	<body>
		Fecha Emision: <?php echo date('d/m/Y'); ?><br>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		
			<h3><p>INGRESOS</p></h3>
			<?php echo $table_ingresos ?><br>
			<h3><p>EGRESOS</p></h3>	
			<?php echo $table_egresos ?><br>
			<h3><p>GENERAL</p></h3>
			<?php echo $table_total ?><br>
		<br>
		
    </body>
  </html>