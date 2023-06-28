<?php
class claseInicio
{
	public static function show()
	{
		if (isset($_GET["action"])) {
			$mostrar = "";

			if ($_GET["action"] == "ejecutarAjax") {
				$mostrar = claseInicio::ejecutarAjax();
				return $mostrar;
			}

			if ($_GET["action"] == "abrirFrm") {
				$mostrar = claseInicio::abrirFrm();
				return $mostrar;
			}

			if ($_GET["action"] == "loadComboBox") {
				$mostrar = claseComboBox::loadComboBox();
				return $mostrar;
			}

			if ($_GET["action"] == "loadComboBoxV2") {
				$mostrar = claseComboBox::loadComboBoxV2();
				return $mostrar;
			}

			if ($_GET["action"] == "loadComboBoxSearch") {
				$mostrar = claseComboBox::loadComboBoxSearch();
				return $mostrar;
			}

			if ($_GET["action"] == "cargarGridSearchDialog") {
				$mostrar = claseSearchDialog::cargarGridSearchDialog();
				return $mostrar;
			}

			if ($_GET["action"] == "logout") {
				$mostrar = claseUsuario::logoutUsuario();
				return $mostrar;
			}
		}

		$divMain = claseDivMain::show();



		//$divBodyImport = claseDivBodyImport::show();
		$mostrar = "
				<!DOCTYPE html>
					<head>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
						<title>Portal Comercial</title>
						<link rel='stylesheet' href='../css/normalize.css'>
						<link rel='stylesheet' href='http://" . $_SERVER["HTTP_HOST"] . "/Framework/devoops/css/font-awesome.css'>
						<link rel='stylesheet' href='../css/main_flat.css'>
						<link rel='stylesheet' href='../css/demo_flat.css'>
						<link rel='stylesheet' href='../css/message_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/message_confirm_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/search_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/modules.css?v1.0.10'>
						<link rel='stylesheet' href='../css/login.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estilos.css?v1.0.10'>
						<link rel='stylesheet' type='text/css' href='../TorresyTorres/files/slider/engine1/style.css'/>
						<link href='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' rel='stylesheet'/>
						<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' integrity='sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N' crossorigin='anonymous'>
						<style type='text/css'>" . claseSkin::extraerSkin(claseSkin::$skinNormal) . "</style>
					</head>
					<body
						empresa = 'tyt'
					>
						" . $divMain . "

						<script language='javaScript'>
							var screenWidht  = screen.width;
							var screenHeight = 1100;
							var screenScrollTop = 0;
							document.body.style.backgroundSize=screenWidht+'px '+screenHeight+'px' ;
							window.moveTo(0,0);
							window.resizeTo(screen.availWidth, screen.availHeight);

							function enviarMail() {
								enecenderLoadingScreen();
								var error = 1;
								var icon  = 1;
								var funcion = '';
								var sJsonDataObjectInicio=getDataObjectInicio();
								var isOK = validaciones();

								if ( isOK ) {
									purl = './index.php?action=ejecutarAjax&clase=claseInicio&metodo=saveRecord&dataObjectInicio='+sJsonDataObjectInicio;
									content	= getContent(purl);
									content	= JSON.parse(content);
									console.log(content);
									error 	= parseInt(content[0]['error']);
									console.log(error);
									icon	= (error == -1)?3:((error == 0)?4:1);
									console.log(icon);
									funcion = (error == 0)?'location.href=\"./\";':'';
									apagarLoadingScreen();
									encenderMessageBox(icon,'',content[0]['message'],funcion);
								}
							}
						</script>

						" . claseSearchDialog::show(claseMessageBackGround::$backgroundWebCotizadorTyT) . "
						" . claseMessageBox::load(claseMessageBackGround::$backgroundWebCotizadorTyT) . "
						" . claseMessageBoxConfirm::load(claseMessageBackGround::$backgroundWebCotizadorTyT) . "
						" . claseLoadingScreen::show() . "
						" . claseToolTipText::show("#FCF0B0", "blue") . "
						<script type='text/javascript' src='../TorresyTorres/files/slider/engine1/jquery.js'></script>
						<script type='text/javaScript' src='../js/librerias.js?v1.0.10'></script>
						<script type='text/javaScript' src='../TorresyTorres/js/libreriasTorres.js?v1.0.10'></script>
						<script type='text/javaScript' src='../js/login.js?v1.0.10'></script>
						<script src='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'></script>
						<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js' integrity='sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+' crossorigin='anonymous'></script>
					</body>
				</html>
			";
		return $mostrar;
	}

	private static function ejecutarAjax()
	{
		$clase  = $_GET["clase"];
		$metodo = $_GET["metodo"];
		eval("\$mostrar = " . $clase . "::" . $metodo . "();");
		return $mostrar;
	}

	private static function abrirFrm()
	{
		$frm = $_GET["frm"];
		eval("\$mostrar = " . $frm . "::show();");
		return $mostrar;
	}

	public static function saveRecord()
	{
		// var_dump($_SESSION);
		// Obtener Variables
		$mostrar			  	= "Ocurrió un error al tratar de enviar la Solicitud.";
		$dataObjectInicio 	  	= $_GET["dataObjectInicio"];
		$arrayInicio          	= json_decode($dataObjectInicio, true);
		$arrayMail			 	= array();
		$userCode			  	= strtoupper($_SESSION["userCode"]);
		$userCompany		  	= strtolower($_SESSION["empresa"]);
		$equipoPc				= strtoupper($_SERVER["REMOTE_ADDR"]);
		$creadoPor				= strtoupper($_SESSION["userCode"]);

		$tipoRequerimiento		= $arrayInicio["tipoRequerimiento"];
		$clienteExistenteId		= $arrayInicio["clienteId"];
		$detalleRequerimiento 	= $arrayInicio["detalleRequerimiento"];
		$razonSocial			= $arrayInicio["razonSocial"];
		$ruc				  	= $arrayInicio["ruc"];
		$contacto			  	= $arrayInicio["contacto"];
		$email				  	= $arrayInicio["email"];
		$telefono			  	= $arrayInicio["telefono"];
		$tipoSolicitud  	  	= $arrayInicio["tipoSolicitud"];
		$tipoServicio    	  	= $arrayInicio["tipoServicio"];

		$clienteNuevoId			= NULL;
		$cotizacionComparativa	= $arrayInicio["cotizacion_comparativa"];
		$urgente				= $arrayInicio["urgente"];
		$peligrosa				= $arrayInicio["peligrosa"];
		$motivoUrgente			= $arrayInicio["motivoUrgente"];
		$comentario				= $arrayInicio["comentario"];
		$fechaDisponibilidad	= $arrayInicio["fechaAsignacion"];
		$fechaMaximaCierre		= $arrayInicio["fechaExpiracion"];
		$tipoCotizacionId		= $arrayInicio["tipoCotizacionId"];
		$tipoTransporteId		= $arrayInicio["tipoTransporteId"];
		$modoTransportacionId	= $arrayInicio["modoTransportacionId"];
		$incotermId				= $arrayInicio["incotermId"];
		$origenId				= $arrayInicio["origenId"];
		$destinoId				= $arrayInicio["destinoId"];
		$zonaHorariaId			= $arrayInicio["zonaHorariaId"];

		$arrayMail[0]["error"]	= -1;
		$arrayMail[0]["message"] = $mostrar;
		// var_dump($tipoTransporteId);
		//Validaciones
		//Validacioón al menos debe seleccionar un tipo de servicio
		$arr_lengthServicio = count($tipoServicio);
		if ($arr_lengthServicio == 0) {
			$mostrar = "Debe seleccionar un tipo de servicio.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		} else {
			if ($arr_lengthServicio == 1) {
				$tipoSolicitud = $tipoServicio[0];
			} else {
				$tipoSolicitud = 'REQ-INTEG';
			}
			//	echo $tipoSolicitud;
		}

		if ($tipoRequerimiento == "2") {
			if (strlen(ltrim(rtrim($razonSocial))) === 0 || ltrim(rtrim($razonSocial)) === "Seleccione...") {
				$mostrar = "No ha seleccionado el Cliente.";
				$arrayMail[0]["error"] = 1;
				$arrayMail[0]["message"] = $mostrar;
				$stringJson = json_encode($arrayMail);
				return $stringJson;
			}
		} else {
			if (strlen(ltrim(rtrim($razonSocial))) === 0 || ltrim(rtrim($razonSocial)) === "Seleccione...") {
				$mostrar = "No ha ingresado la razón Social.";
				$arrayMail[0]["error"] = 1;
				$arrayMail[0]["message"] = $mostrar;
				$stringJson = json_encode($arrayMail);
				return $stringJson;
			}

			if (strlen(ltrim(rtrim($contacto))) == 0) {
				$mostrar = "No ha ingresado la Persona de Contacto.";
				$arrayMail[0]["error"] = 1;
				$arrayMail[0]["message"] = $mostrar;
				$stringJson = json_encode($arrayMail);
				return $stringJson;
			}

			if (strlen(ltrim(rtrim($email))) == 0) {
				$mostrar = "No ha ingresado el email del Contacto.";
				$arrayMail[0]["error"] = 1;
				$arrayMail[0]["message"] = $mostrar;
				$stringJson = json_encode($arrayMail);
				return $stringJson;
			}
		}

		// Nuevas validaciones de campos del formulario
		if ($fechaMaximaCierre == '') {
			$mostrar = "No ha seleccionado la Fecha máxima para cierre de cotización.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($tipoCotizacionId == '') {
			$mostrar = "No ha seleccionado el Tipo de Cotización.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($tipoTransporteId == '') {
			$mostrar = "No ha seleccionado el Tipo de Transporte.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($cotizacionComparativa == 1 && count($tipoTransporteId) < 2) {
			$mostrar = "Debe seleccionar 2 tipos de Transporte.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($modoTransportacionId == '') {
			$mostrar = "No ha seleccionado el Modo de Transportación.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($incotermId == '') {
			$mostrar = "No ha seleccionado el Incoterm.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($origenId == '') {
			$mostrar = "No ha seleccionado el Origen.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($destinoId == '') {
			$mostrar = "No ha seleccionado el Destino.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if ($zonaHorariaId == '') {
			$mostrar = "No ha seleccionado la Zona Horaria.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		if (strlen(ltrim(rtrim($detalleRequerimiento))) == 0) {
			$mostrar = "No ha ingresado el Detalle de su requerimiento.";
			$arrayMail[0]["error"] = 1;
			$arrayMail[0]["message"] = $mostrar;
			$stringJson = json_encode($arrayMail);
			return $stringJson;
		}

		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();

		if (count($tipoTransporteId) > 1) {
			$array_num = count($tipoTransporteId);
			for ($i=0; $i < $array_num; $i++) { 
				$strSQLTolepu = "
						Tolepu.dbo.FDC_COTIZACION_INSERT
						'$clienteExistenteId',
						'$clienteNuevoId',
						'$tipoCotizacionId',
						'$tipoTransporteId[$i]',
						'$modoTransportacionId',
						'$incotermId',
						'$zonaHorariaId',
						'$origenId',
						'$destinoId',
						'$tipoRequerimiento',
						'$razonSocial',
						'$ruc',
						'$contacto',
						'$email',
						'$telefono',
						'$cotizacionComparativa',
						'$urgente',
						'$peligrosa',
						'$motivoUrgente',
						'$comentario',
						'$fechaDisponibilidad',
						'$fechaMaximaCierre',
						'$equipoPc',
						'$creadoPor'
					";
				$strSQL = $strSQLTolepu;
				// echo $strSQL;
				$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayMail));

				while ($row = $baseDatos->db_fetch_array($rs)) {
					$error 	 		= $baseDatos->sysGetDataFieldSrv($row['numError']);
					$message 		= $baseDatos->sysGetDataFieldSrv($row['mensaje']);
					$cotizacionId	= $baseDatos->sysGetDataFieldSrv($row['cotizacionId']);
				}
			}
		} else {
			$strSQLTolepu = "
						Tolepu.dbo.FDC_COTIZACION_INSERT
						'$clienteExistenteId',
						'$clienteNuevoId',
						'$tipoCotizacionId',
						'$tipoTransporteId',
						'$modoTransportacionId',
						'$incotermId',
						'$zonaHorariaId',
						'$origenId',
						'$destinoId',
						'$tipoRequerimiento',
						'$razonSocial',
						'$ruc',
						'$contacto',
						'$email',
						'$telefono',
						'$cotizacionComparativa',
						'$urgente',
						'$peligrosa',
						'$motivoUrgente',
						'$comentario',
						'$fechaDisponibilidad',
						'$fechaMaximaCierre',
						'$equipoPc',
						'$creadoPor'
					";
				$strSQL = $strSQLTolepu;

				$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayMail));

				while ($row = $baseDatos->db_fetch_array($rs)) {
					$error 	 		= $baseDatos->sysGetDataFieldSrv($row['numError']);
					$message 		= $baseDatos->sysGetDataFieldSrv($row['mensaje']);
					$cotizacionId	= $baseDatos->sysGetDataFieldSrv($row['cotizacionId']);
				}
		}

		$baseDatos->desconectarDB();
		$arrayMail[0]["error"] = $error;
		$arrayMail[0]["message"] = $message;
		$stringJson = json_encode($arrayMail);
		return $stringJson;
	}
}
