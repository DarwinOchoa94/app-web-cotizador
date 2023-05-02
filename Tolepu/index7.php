<?php

// 	if  (isset($_POST["archivo"]))
//  	{
//  		move_uploaded_file($_FILES['archivo']['tmp_name'],'imagenes/'.$_FILES['archivo']['name']);
//  		return;
//  	}

	$idDocumento = $_GET["id"];
	$numero = $_GET["numero"];
	$tipoDocumento = $_GET["tipo"];
	$proveedor = $_GET["proveedor"];
	$factura = $_GET["factura"];
	$secDocumento = $_GET["secDocumento"];
	$empresa = $_GET["empresa"];
	$creadoPor = $_GET["creadoPor"];
	$formulario = $_GET["formulario"];
	
	$cadena = "
		$idDocumento <br>
		$numero <br>
		$tipoDocumento <br>
		$proveedor <br>
		$factura <br>
		$secDocumento <br>
		$empresa <br>
		$creadoPor <br>
		$formulario <br>
	";
	echo $cadena;
	
	if (isset($_GET["secDocumento"]))
	{
		switch ($secDocumento)
		{
			case "1":
				$tipoDocSubir = "RIDE";
				break;
			case "2":
				$tipoDocSubir = "XML";
				break;
			case "3":
				$tipoDocSubir = "SOPORTES VARIOS";
				break;
			default:
				$tipoDocSubir = "";
		}
	}
	
	
	$pagina ="
		<html>
			<head>
				<title>
					Cargar documentos adjuntos 
				</title>	
			</head>
			<body bgcolor='#e5e5e5'>
				<form action='./copiarArchivo.php' method='POST' enctype='multipart/form-data'>
					<div
						style='
							border:0px;
							width:800px;
							height:50px;
							position:absolute;
							left:10px;
							top:10px;
							text-align:center;
							font-weight:bold;
							font-family:Tahoma;
							font-size:7;
							'
					>
						<table width='100%' height='100%'>
							<tr>
								<td align='center'>
									Cargar documentos adjuntos
								</td>
							</tr>
							<tr>
								<td align='center'>
									$tipoDocSubir
								</td>
							</tr>
							<tr>
								<td align='center'>
									$formulario $numero
								</td>
							</tr>
							<tr>
								<td align='center'>
									$proveedor
								</td>
							</tr>
														
						</table>		
					</div>
					<div
						style='
							border:01px solid #c7c7c7;
							width:800px;
							height:100px;
							position:absolute;
							left:10px;
							top:120px;
							'
					>
						<br>
						$tipoDocSubir <input type='file' name='archivo' id='archivo'>
						<br>
						<br>
						<input type='submit' value='Grabar'>
					</div>
				</form>
				
				<script language='javaScript'>
				</script>
			</body>
		</html>
	";
	
	echo $pagina;
	

?>