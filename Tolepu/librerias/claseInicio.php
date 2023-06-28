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

			if ($_GET["action"] == "generarCotizacion") {
				$mostrar = claseInicio::generarCotizacion();
				return $mostrar;
			}

			if ($_GET["action"] == "loadComboBox") {
				$mostrar = claseComboBox::loadComboBox();
				return $mostrar;
			}

			if ($_GET["action"] == "loadListBox") {
				$mostrar = claseSearch::loadListBox();
				return $mostrar;
			}

			if ($_GET["action"] == "cargarGridSearchDialog") {
				$mostrar = claseSearchDialog::cargarGridSearchDialog();
				return $mostrar;
			}

			if ($_GET["action"] == "cargarAgentesExterior") {
				$mostrar = claseGrid::cargarAgentesExterior();
				return $mostrar;
			}

			if ($_GET["action"] == "claseUnderConstruction") {
				$mostrar = claseUnderConstruction::show();
				return $mostrar;
			}

			if ($_GET["action"] == "claseDivLogo") {
				$imagen = $_GET["imagen"];
				$ancho = $_GET["ancho"];
				$mostrar = claseDivLogo::show($imagen, $ancho);
				return $mostrar;
			}

			if ($_GET["action"] == "logout") {
				$mostrar = claseUsuario::logoutUsuario();
				return $mostrar;
			}

			if ($_GET["action"] == "existeCotizacion") {
				$mostrar = claseDivBody::existeCotizacion();
				return $mostrar;
			}

			if ($_GET["action"] == "existeRequerimiento") {
				$mostrar = claseDivBody::existeRequerimiento();
				return $mostrar;
			}
		}

		$divMain = claseDivMain::show();

		$mostrar = "
				<!DOCTYPE html>
				<html lang='es'>
					<head>
						<meta charset='UTF-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
						<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
						<title>Cotizador Tolepu</title>
						<!--<link rel='stylesheet' href='../css/normalize.css'>-->
						<!--<link rel='stylesheet' href='../css/materialize.min.css'  media='screen,projection' type='text/css'>-->
						<link rel='stylesheet' href='http://" . $_SERVER["HTTP_HOST"] . "/Framework/devoops/css/font-awesome.css'>
						<link rel='stylesheet' href='http://" . $_SERVER["HTTP_HOST"] . "/Framework/devoops/css/icon-moons.css'>
						<link rel='stylesheet' href='../css/main_flat.css'>
						<link rel='stylesheet' href='../css/demo_flat.css'>
						<link rel='stylesheet' href='../css/message_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/message_confirm_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/search_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/modules.css?v1.0.10'>
						<link rel='stylesheet' href='../css/login.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estiloBodyDocument.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estiloPreviewDocument.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estiloPreviewTarifas.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estiloTipoAgenteDialog.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estiloTablaContenedor.css?v1.0.10'>
						<!--<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>-->
     					<!--<script type='text/javascript' src='../js/materialize.min.js'></script>-->
						<style type='text/css'>" . claseSkin::extraerSkin(claseSkin::$skinNormal) . "</style>
					</head>
					<body
						empresa = 'tolepu'
						style='
							//background:url(../../Framework/images/Tolepu/fondoFormularioBody.png) center center fixed;
							//background-color:#000204;
							//background-size:contain;
							//background-repeat:no-repeat;
							//background: linear-gradient(to left, #001427 0%,#06639E 36%,#001427 100%);
							background: linear-gradient(to left, #D6E1E8 0%,#F9FBFC 36%,#D6E1E8 100%);
						'
					>
						" . $divMain . "
						" . claseDivListaAgentes::show(claseMessageBackGround::$backgroundWebCotizadorTolepu) . "
						" . claseDivTipoAgenteDialog::load() . "
						" . clasePreviewDocument::load() . "
						" . clasePreviewTarifas::load() . "
						" . claseSearchDialog::show(claseMessageBackGround::$backgroundWebCotizadorTolepu) . "
						" . claseMessageBox::load(claseMessageBackGround::$backgroundWebCotizadorTolepu) . "
						" . claseMessageBoxConfirm::load(claseMessageBackGround::$backgroundWebCotizadorTolepu) . "
						" . claseLoadingScreen::show() . "
						" . claseToolTipText::show("#FCF0B0", "blue") . "

						<script type='text/javaScript' src='../js/eventos.js'></script>
						<script language='javaScript'>
							var screenWidht  = screen.width;
							var screenHeight = 1100;
							var screenScrollTop = 0;
							var documentoId	 = '';
							var optIncoterms = '';
							var optViaEmbarque = '';
							document.body.style.backgroundSize=screenWidht+'px '+screenHeight+'px';
							showMenu();
							loadEvents();
							//encenderDivTipoAgenteDialog();
							function enviarMail() {
								var error   = 1;
								var icon    = 1;
								var funcion = '';
								var sJsonArrayAgentes=obtenerAgentes();
								var sJsonDataObjectInicio=getDataObjectInicio();
								var incotermsId = document.getElementById('cmbIncoterms').value;
								var purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=validarEnvio&incotermsId='+incotermsId;
								var content = getContent(purl);
								var sJsonDataObjectIncoterms = getDataObjectIncoterms();

								enecenderLoadingScreen();
								content=JSON.parse(content);
								purl = './index.php?action=ejecutarAjax&clase=claseDivBodyIncoterms'+content.Incoterms+'&metodo=saveRecord&dataArrayAgentes='+sJsonArrayAgentes+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms+'&PreviewMail=false&PreviewTarifas=false';
								content	= getContent(purl);
								content	= JSON.parse(content);
								error 	= parseInt(content[0]['error']);
								icon	= (error == -1)?3:((error == 0)?4:1);
								funcion = '';
								apagarLoadingScreen();

								if ( ( error == 2 ) && ( estadoToggle == false ) ) {
									encenderMessageBox(icon,'',content[0]['message'],funcion);
									slideToggle('btnListaAgentes','Lista de Agentes del Exterior');
									return;

								}

								if ( error !== 0 ) {
									showObligatorios();
									encenderMessageBox(icon,'',content[0]['message'],funcion);
									return;

								}

								if ( error == 0 ) {
									documentoId = content[0]['message'];
									enviarCorreo(sJsonArrayAgentes,documentoId);

								}
							}
							function showMenu(){}
							function enviarCorreo(sJsonArrayAgentes,documentoId) {
								var statusFailCorreo = false;
								var purl = './index.php?action=ejecutarAjax&clase=claseDivListaAgentes&metodo=cargarGridListaAgentes&dataArrayAgentes='+sJsonArrayAgentes;
								var content	= getContent(purl);
								var tblListaAgentes = document.getElementById('tblListaAgentes');
								var lblListaAgentesDialog = document.getElementById('lblListaAgentesDialog');
								var divImageLoadingH = document.getElementById('divImageLoadingH');
								var btnOKAgente = document.getElementById('btnOKAgente');
								var agenteId = '';
								var sJsonAgenteId = '';
								var imgAgente = '';
								var error = 1;
								var message = '';

								tblListaAgentes.innerHTML=content;
								enecenderListaAgentesDialog();

								for (var i=0; i<=arrayAgentes.length -1;i++) {
									agenteId = arrayAgentes[i];
									imgAgente = document.getElementById('img-'+agenteId);
									linkReenviar = document.getElementById('link-'+agenteId);
									purl = './index.php?action=ejecutarAjax&clase=claseDivListaAgentes&metodo=enviarMailAgente&sContactoAgenteId='+agenteId+'&documentoId='+documentoId;
									content	= getContent(purl);
									error 	= parseInt(content);

									if ( error != 0 ) {
										statusFailCorreo = true;
										imgAgente.src='../../Framework/images/Tolepu/warning-mark.png';
										linkReenviar.style.visibility='visible';

									} else {
										imgAgente.src='../../Framework/images/Tolepu/check-mark.png';
										imgAgente.setAttribute('statusmail','true');

									}

								}

								divImageLoadingH.style.visibility='hidden';
								btnOKAgente.style.visibility='visible';

								if ( statusFailCorreo ) {
									lblListaAgentesDialog.innerHTML='No se enviaron todas las Solicitudes.';
									lblListaAgentesDialog.style.color='red';

								} else {
									purl='./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=quitarAdjuntos&documentoId='+documentoId;
									getContent(purl);
									lblListaAgentesDialog.innerHTML='Solicitudes enviadas correctamente.';
									lblListaAgentesDialog.style.color='#00365A';

								}
							}
						</script>
						<script type='text/javaScript' src='../Tolepu/js/jquery-1.11.3.min.js'></script>
						<script type='text/javaScript' src='../js/librerias.js?v1.0.10'></script>
						<script type='text/javaScript' src='../js/login.js?v1.0.10'></script>
						<script type='text/javaScript' src='../Tolepu/js/libreriasTolepu.js?v1.0.10'></script>
					</body>
				</html>
			";
		return $mostrar;
	}

	private static function ejecutarAjax()
	{
		$clase = $_GET["clase"];
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

	private static function generarCotizacion()
	{
		$JSONArray 		  	              = $_GET["sJsonArrayAgentesGenerar"];
		$dataObjectInicio 	              = $_GET["dataObjectInicio"];
		$dataObjectIncoterms              = $_GET["dataObjectIncoterms"];
		$userCode			              = strtoupper($_SESSION["userCode"]);
		$userCompany		              = strtolower($_SESSION["empresa"]);

		$arrayAgentesGenerar              = json_decode($JSONArray, true);
		$arrayInicio  		              = json_decode($dataObjectInicio, true);
		$arrayIncoterms		              = json_decode($dataObjectIncoterms, true);

		$ciudadId			              =	$arrayInicio["CiudadID"];
		$tipoTramiteId		              =	$arrayInicio["TipoTramiteID"];
		$incotermsId		              =	$arrayInicio["IncotermsID"];
		$viaEmbarqueId		              =	$arrayInicio["ViaEmbarqueID"];
		$clienteId			              =	$arrayInicio["ClienteID"];
		$cliente			              =	$arrayInicio["Cliente"];
		$filePDF			              =	$arrayInicio["FilePDF"];
		$adjunto1			              =	$arrayInicio["Adjunto1"];
		$adjunto2			              =	$arrayInicio["Adjunto2"];
		$adjunto3			              =	$arrayInicio["Adjunto3"];
		$adjunto4			              =	$arrayInicio["Adjunto4"];
		$adjunto5			              =	$arrayInicio["Adjunto5"];

		$puertoOrigenId		              =	$arrayIncoterms["PuertoOrigenId"];
		$puertoDestinoId	              =	$arrayIncoterms["PuertoDestinoId"];
		$tipoCargaId		              =	$arrayIncoterms["TipoCargaId"];
		$tipoMercaderiaId	              =	$arrayIncoterms["TipoMercaderiaId"];
		$descMercaderia		              =	$arrayIncoterms["DescMercaderia"];
		$infoAdicional		              =	$arrayIncoterms["InfoAdicional"];
		$cantidadContenedor               =	str_replace(",", ".", $arrayIncoterms["CantidadContenedor"]);
		$tipoContenedorId	              =	$arrayIncoterms["TipoContenedorId"];
		$tipoContenedor20STId	          =	$arrayIncoterms["TipoContenedor20STId"];
		$tipoContenedor40STId	          =	$arrayIncoterms["TipoContenedor40STId"];
		$tipoContenedor40HCId	          =	$arrayIncoterms["TipoContenedor40HCId"];
		$tipoContenedor40FRId	          =	$arrayIncoterms["TipoContenedor40FRId"];
		$tipoContenedor20RFId	          =	$arrayIncoterms["TipoContenedor20RFId"];
		$tipoContenedor40RFId	          =	$arrayIncoterms["TipoContenedor40RFId"];
		$tipoContenedor20OTId	          =	$arrayIncoterms["TipoContenedor20OTId"];
		$tipoContenedor40OTId	          =	$arrayIncoterms["TipoContenedor40OTId"];
		$tipoContenedor20ITId	          =	$arrayIncoterms["TipoContenedor20ITId"];
		$tipoContenedor40NOId	          =	$arrayIncoterms["TipoContenedor40NOId"];
		$cantidadTipoContenedor20ST	      =	$arrayIncoterms["CantidadTipoContenedor20ST"];
		$cantidadTipoContenedor40ST	      =	$arrayIncoterms["CantidadTipoContenedor40ST"];
		$cantidadTipoContenedor40HC	      =	$arrayIncoterms["CantidadTipoContenedor40HC"];
		$cantidadTipoContenedor40FR	      =	$arrayIncoterms["CantidadTipoContenedor40FR"];
		$cantidadTipoContenedor20RF	      =	$arrayIncoterms["CantidadTipoContenedor20RF"];
		$cantidadTipoContenedor40RF	      =	$arrayIncoterms["CantidadTipoContenedor40RF"];
		$cantidadTipoContenedor20OT	      =	$arrayIncoterms["CantidadTipoContenedor20OT"];
		$cantidadTipoContenedor40OT	      =	$arrayIncoterms["CantidadTipoContenedor40OT"];
		$cantidadTipoContenedor20IT	      =	$arrayIncoterms["CantidadTipoContenedor20IT"];
		$cantidadTipoContenedor40NO	      =	$arrayIncoterms["CantidadTipoContenedor40NO"];
		$tipoContenedor20Id		          =	$tipoContenedor20STId;
		$tipoContenedor40Id		          =	$tipoContenedor40STId;
		$tipoContenedor40HCId		      =	$tipoContenedor40HCId;
		$tipoVehiculoTurboId		      =	$tipoContenedor40FRId;
		$tipoVehiculoSencilloId		      =	$tipoContenedor20RFId;
		$tipoVehiculoDobleTroqueId	      =	$tipoContenedor40RFId;
		$tipoVehiculoTractomulaId	      =	$tipoContenedor20OTId;
		$tipoVehiculoCamaBajaId		      =	$tipoContenedor40OTId;
		$cantidadTipoContenedor20		  =	$cantidadTipoContenedor20ST;
		$cantidadTipoContenedor40		  =	$cantidadTipoContenedor40ST;
		$cantidadTipoContenedor40HC		  =	$cantidadTipoContenedor40HC;
		$cantidadTipoVehiculoTurbo		  =	$cantidadTipoContenedor40FR;
		$cantidadTipoVehiculoSencillo	  =	$cantidadTipoContenedor20RF;
		$cantidadTipoVehiculoDobleTroque  =	$cantidadTipoContenedor40RF;
		$cantidadTipoVehiculoTractomula	  =	$cantidadTipoContenedor20OT;
		$cantidadTipoVehiculoCamaBaja	  =	$cantidadTipoContenedor40OT;
		$descContenedor		              =	$arrayIncoterms["DescContenedor"];
		$peso				              =	str_replace(",", ".", $arrayIncoterms["Peso"]);
		$pesoVolumen		              =	str_replace(",", ".", $arrayIncoterms["PesoVolumen"]);
		$volumen			              =	str_replace(",", ".", $arrayIncoterms["Volumen"]);
		$bultos				              =	str_replace(",", ".", $arrayIncoterms["Bultos"]);
		$unidadId			              =	$arrayIncoterms["UnidadId"];
		$pesoVolumenId		              =	$arrayIncoterms["PesoVolumenId"];
		$volumenId			              =	$arrayIncoterms["VolumenId"];
		$embalajeId			              =	$arrayIncoterms["EmbalajeId"];
		$dimensionBultos	              =	$arrayIncoterms["DimensionBultos"];
		$claseImo			              =	$arrayIncoterms["ClaseImo"];
		$un					              =	$arrayIncoterms["Un"];
		$proveedorName		              =	$arrayIncoterms["ProveedorName"];
		$provRecogidaDir	              =	$arrayIncoterms["ProvRecogidaDir"];
		$provEntregaDir		              =	$arrayIncoterms["ProvEntregaDir"];
		$navieraId			              =	$arrayIncoterms["NavieraId"];
		$valorMercaderia	              =	str_replace(",", ".", $arrayIncoterms["ValorMercaderia"]);
		$valorFlete			              =	str_replace(",", ".", $arrayIncoterms["ValorFlete"]);
		$partidaArancelaria	              =	$arrayIncoterms["PartidaArancelaria"];
		$subPartidaArancelaria	          =	$arrayIncoterms["SubPartidaArancelaria"];
		$coloaderDestino                  = $arrayIncoterms["ColoaderDestino"];
		$cotizacion		                  =	$arrayIncoterms["Cotizacion"];
		$requerimiento	                  =	$arrayIncoterms["Requerimiento"];
		$pcid               			  = $_SERVER["SERVER_NAME"];

		$strSQL    = "";
		$arrayStatus[0]["error"]   = -1;
		$arrayStatus[0]["message"] = "Ocurrió un error al generar la(s) Cotizacion(es).";

		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();

		$i = 0;
		foreach ($arrayAgentesGenerar as $agenteGenerar) {
			$contactoAgenteId       = $agenteGenerar["contactoAgenteId"];
			$lineaTransporteId      = $agenteGenerar["lineaTransporteId"];
			$emailClienteCotizacion = $agenteGenerar["emailClienteCotizacion"];
			$cotizacionTempId       = $agenteGenerar["cotizacionTempId"];
			$strSQL = "
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacion
					'$ciudadId','$tipoTramiteId','$incotermsId','$viaEmbarqueId','$puertoOrigenId','$puertoDestinoId','$tipoCargaId',
					'$tipoMercaderiaId','$descMercaderia','$infoAdicional',$cantidadContenedor,'$tipoContenedorId','$descContenedor',
					$peso,$pesoVolumen,$volumen,$bultos,'$unidadId','$pesoVolumenId','$volumenId','$embalajeId','$dimensionBultos',
					'$claseImo','$un','$proveedorName','$provRecogidaDir','$provEntregaDir','$navieraId',$valorMercaderia,$valorFlete,
					'$partidaArancelaria','$subPartidaArancelaria','$coloaderDestino','$filePDF','$adjunto1','$adjunto2','$adjunto3',
					'$adjunto4','$adjunto5','$userCode','$userCompany','$clienteId','$cliente','$cotizacion','$contactoAgenteId',
					'$lineaTransporteId','$emailClienteCotizacion','$pcid','$requerimiento',
					'$tipoContenedor20STId', '$tipoContenedor40STId', '$tipoContenedor40HCId', '$tipoContenedor40FRId', '$tipoContenedor20RFId',
					'$tipoContenedor40RFId', '$tipoContenedor20OTId', '$tipoContenedor40OTId', '$tipoContenedor20ITId', '$tipoContenedor40NOId',
					'$cantidadTipoContenedor20ST', '$cantidadTipoContenedor40ST', '$cantidadTipoContenedor40HC', '$cantidadTipoContenedor40FR', '$cantidadTipoContenedor20RF',
					'$cantidadTipoContenedor40RF', '$cantidadTipoContenedor20OT', '$cantidadTipoContenedor40OT', '$cantidadTipoContenedor20IT', '$cantidadTipoContenedor40NO',
					'$cotizacionTempId'
				";
			$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayStatus));

			while ($row  =  $baseDatos->db_fetch_array($rs)) {
				$error 	 = $baseDatos->sysGetDataFieldSrv($row['NumError']);
				$message = $baseDatos->sysGetDataFieldSrv($row['Mensaje']);
			}

			$arrayCotizaciones[$i]["error"]   = $error;
			$arrayCotizaciones[$i]["message"] = $message;
			$i++;
		}

		$baseDatos->desconectarDB();
		$error = 0;
		$messageSuccess = "";
		$messageFailure = "";
		foreach ($arrayCotizaciones as $statusCotizacion) {
			if ($statusCotizacion["error"] == 0) {
				$messageSuccess .= $statusCotizacion["message"] . "<br>";
			} else {
				$error           = 2;
				$messageFailure .= $statusCotizacion["message"] . "<br>";
			}
		}

		$message = "Se generaron las Cotizaciones: <br>" . $messageSuccess . $messageFailure;

		$arrayStatus[0]["error"]   = $error;
		$arrayStatus[0]["message"] = $message;
		$stringJson                = json_encode($arrayStatus);
		return $stringJson;
	}

	private static function generarCotizacionTemp()
	{
		$dataObjectInicio 	                = $_GET["dataObjectInicio"];
		$dataObjectIncoterms                = $_GET["dataObjectIncoterms"];
		$dataObjectEditTarifas              = $_GET["dataObjectEditTarifas"];
		$contactoAgenteId                   = $_GET["contactoAgenteId"];
		$lineaTransporteId                  = $_GET["lineaTransporteId"];
		$cotizacionTempId                   = $_GET["cotizacionTempId"];

		$userCode			                = strtoupper($_SESSION["userCode"]);
		$userCompany		                = strtolower($_SESSION["empresa"]);

		$arrayInicio  		                = json_decode($dataObjectInicio, true);
		$arrayIncoterms		                = json_decode($dataObjectIncoterms, true);
		$arrayEditTarifas                   = json_decode($dataObjectEditTarifas, true);

		$ciudadId			                = $arrayInicio["CiudadID"];
		$tipoTramiteId		                = $arrayInicio["TipoTramiteID"];
		$incotermsId		                = $arrayInicio["IncotermsID"];
		$viaEmbarqueId		                = $arrayInicio["ViaEmbarqueID"];
		$clienteId			                = $arrayInicio["ClienteID"];
		$cliente			                = $arrayInicio["Cliente"];

		$puertoOrigenId		                = $arrayIncoterms["PuertoOrigenId"];
		$puertoDestinoId	                = $arrayIncoterms["PuertoDestinoId"];
		$tipoCargaId		                = $arrayIncoterms["TipoCargaId"];
		$tipoMercaderiaId	                = $arrayIncoterms["TipoMercaderiaId"];
		$descMercaderia		                = $arrayIncoterms["DescMercaderia"];
		$infoAdicional		                = $arrayIncoterms["InfoAdicional"];
		$cantidadContenedor                 = str_replace(",", ".", $arrayIncoterms["CantidadContenedor"]);
		$tipoContenedorId	                = $arrayIncoterms["TipoContenedorId"];
		$tipoContenedor20STId	            = $arrayIncoterms["TipoContenedor20STId"];
		$tipoContenedor40STId	            = $arrayIncoterms["TipoContenedor40STId"];
		$tipoContenedor40HCId	            = $arrayIncoterms["TipoContenedor40HCId"];
		$tipoContenedor40FRId	            = $arrayIncoterms["TipoContenedor40FRId"];
		$tipoContenedor20RFId	            = $arrayIncoterms["TipoContenedor20RFId"];
		$tipoContenedor40RFId	            = $arrayIncoterms["TipoContenedor40RFId"];
		$tipoContenedor20OTId	            = $arrayIncoterms["TipoContenedor20OTId"];
		$tipoContenedor40OTId	            = $arrayIncoterms["TipoContenedor40OTId"];
		$tipoContenedor20ITId	            = $arrayIncoterms["TipoContenedor20ITId"];
		$tipoContenedor40NOId	            = $arrayIncoterms["TipoContenedor40NOId"];
		$cantidadTipoContenedor20ST	        = $arrayIncoterms["CantidadTipoContenedor20ST"];
		$cantidadTipoContenedor40ST	        = $arrayIncoterms["CantidadTipoContenedor40ST"];
		$cantidadTipoContenedor40HC	        = $arrayIncoterms["CantidadTipoContenedor40HC"];
		$cantidadTipoContenedor40FR	        = $arrayIncoterms["CantidadTipoContenedor40FR"];
		$cantidadTipoContenedor20RF	        = $arrayIncoterms["CantidadTipoContenedor20RF"];
		$cantidadTipoContenedor40RF	        = $arrayIncoterms["CantidadTipoContenedor40RF"];
		$cantidadTipoContenedor20OT	        = $arrayIncoterms["CantidadTipoContenedor20OT"];
		$cantidadTipoContenedor40OT	        = $arrayIncoterms["CantidadTipoContenedor40OT"];
		$cantidadTipoContenedor20IT	        = $arrayIncoterms["CantidadTipoContenedor20IT"];
		$cantidadTipoContenedor40NO	        = $arrayIncoterms["CantidadTipoContenedor40NO"];
		$tipoContenedor20Id		            = $tipoContenedor20STId;
		$tipoContenedor40Id		            = $tipoContenedor40STId;
		$tipoContenedor40HCId		        = $tipoContenedor40HCId;
		$tipoVehiculoTurboId		        = $tipoContenedor40FRId;
		$tipoVehiculoSencilloId		        = $tipoContenedor20RFId;
		$tipoVehiculoDobleTroqueId	        = $tipoContenedor40RFId;
		$tipoVehiculoTractomulaId	        = $tipoContenedor20OTId;
		$tipoVehiculoCamaBajaId		        = $tipoContenedor40OTId;
		$cantidadTipoContenedor20		    = $cantidadTipoContenedor20ST;
		$cantidadTipoContenedor40		    = $cantidadTipoContenedor40ST;
		$cantidadTipoContenedor40HC		    = $cantidadTipoContenedor40HC;
		$cantidadTipoVehiculoTurbo		    = $cantidadTipoContenedor40FR;
		$cantidadTipoVehiculoSencillo	    = $cantidadTipoContenedor20RF;
		$cantidadTipoVehiculoDobleTroque    = $cantidadTipoContenedor40RF;
		$cantidadTipoVehiculoTractomula	    = $cantidadTipoContenedor20OT;
		$cantidadTipoVehiculoCamaBaja	    = $cantidadTipoContenedor40OT;
		$descContenedor		                = $arrayIncoterms["DescContenedor"];
		$peso				                = str_replace(",", ".", $arrayIncoterms["Peso"]);
		$pesoVolumen		                = str_replace(",", ".", $arrayIncoterms["PesoVolumen"]);
		$volumen			                = str_replace(",", ".", $arrayIncoterms["Volumen"]);
		$bultos				                = str_replace(",", ".", $arrayIncoterms["Bultos"]);
		$unidadId			                = $arrayIncoterms["UnidadId"];
		$pesoVolumenId		                = $arrayIncoterms["PesoVolumenId"];
		$volumenId			                = $arrayIncoterms["VolumenId"];
		$embalajeId			                = $arrayIncoterms["EmbalajeId"];
		$dimensionBultos	                = $arrayIncoterms["DimensionBultos"];
		$claseImo			                = $arrayIncoterms["ClaseImo"];
		$un					                = $arrayIncoterms["Un"];
		$proveedorName		                = $arrayIncoterms["ProveedorName"];
		$provRecogidaDir	                = $arrayIncoterms["ProvRecogidaDir"];
		$provEntregaDir		                = $arrayIncoterms["ProvEntregaDir"];
		$navieraId			                = $arrayIncoterms["NavieraId"];
		$valorMercaderia	                = str_replace(",", ".", $arrayIncoterms["ValorMercaderia"]);
		$valorFlete			                = str_replace(",", ".", $arrayIncoterms["ValorFlete"]);
		$partidaArancelaria	                = $arrayIncoterms["PartidaArancelaria"];
		$subPartidaArancelaria	            = $arrayIncoterms["SubPartidaArancelaria"];
		$coloaderDestino                    = $arrayIncoterms["ColoaderDestino"];
		$cotizacion		                    = $arrayIncoterms["Cotizacion"];
		$requerimiento	                    = $arrayIncoterms["Requerimiento"];
		$pcid               			    = $_SERVER["SERVER_NAME"];

		$strSQL                             = "";
		$arrayStatus[0]["error"]            = -1;
		$arrayStatus[0]["message"]          = "Ocurrió un error al editar la tarifa seleccionada.";
		$arrayStatus[0]["cotizacionTempId"] = "";

		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();

		if (strlen(trim($cotizacionTempId)) === 0) {
			$strSQL = "
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacionTemp
					'$ciudadId','$tipoTramiteId','$incotermsId','$viaEmbarqueId','$puertoOrigenId','$puertoDestinoId','$tipoCargaId',
					'$tipoMercaderiaId','$descMercaderia','$infoAdicional',$cantidadContenedor,'$tipoContenedorId','$descContenedor',
					$peso,$pesoVolumen,$volumen,$bultos,'$unidadId','$pesoVolumenId','$volumenId','$embalajeId','$dimensionBultos',
					'$claseImo','$un','$proveedorName','$provRecogidaDir','$provEntregaDir','$navieraId',$valorMercaderia,$valorFlete,
					'$partidaArancelaria','$subPartidaArancelaria','$coloaderDestino','$userCode','$userCompany','$clienteId','$cliente',
					'$cotizacion','$contactoAgenteId','$lineaTransporteId','$pcid','$requerimiento'
				";
			$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayStatus));

			while ($row  =  $baseDatos->db_fetch_array($rs)) {
				$error            = $baseDatos->sysGetDataFieldSrv($row['numError']);
				$message          = $baseDatos->sysGetDataFieldSrv($row['mensaje']);
				$cotizacionTempId = $baseDatos->sysGetDataFieldSrv($row['cotizacionTempId']);
			}

			if ($error == 0) {
				foreach ($arrayEditTarifas as $editTarifa) {
					$productoId                 = $editTarifa["productoId"];
					$valor                      = $editTarifa["valor"];
					$tipoVariosContenedoresId   = $editTarifa["tipoContenedorId"];
					$cantidadVariosContenedores = $editTarifa["cantidadContenedor"];

					if ($tipoContenedorId == "0000001880") { //Varios Contenedores
						$strSQL = "
								EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacionTemp_Detail
								'$cotizacionTempId',
								'$tipoTramiteId',
								'$viaEmbarqueId',
								'$tipoMercaderiaId',
								'$tipoVariosContenedoresId',
								$cantidadVariosContenedores,
								'$productoId',
								$valor,
								'$userCode',
								'$pcid'
							";
					} else {
						$strSQL = "
								EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacionTemp_Detail
								'$cotizacionTempId',
								'$tipoTramiteId',
								'$viaEmbarqueId',
								'$tipoMercaderiaId',
								'$tipoContenedorId',
								$cantidadContenedor,
								'$productoId',
								$valor,
								'$userCode',
								'$pcid'
							";
					}

					$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayStatus));
				}
			} else {

				$arrayStatus[0]["error"]            = -1;
				$arrayStatus[0]["message"]          = "Ocurrió un error al editar la tarifa seleccionada.";
				$arrayStatus[0]["cotizacionTempId"] = "";
			}
		} else {
			$strSQL = "
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Delete_CotizacionTemp_DT '$cotizacionTempId'
				";
			$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayStatus));

			while ($row  =  $baseDatos->db_fetch_array($rs)) {
				$error            = $baseDatos->sysGetDataFieldSrv($row['numError']);
				$message          = $baseDatos->sysGetDataFieldSrv($row['mensaje']);
			}

			if ($error == 0) {
				foreach ($arrayEditTarifas as $editTarifa) {
					$productoId                 = $editTarifa["productoId"];
					$valor                      = $editTarifa["valor"];
					$tipoVariosContenedoresId   = $editTarifa["tipoContenedorId"];
					$cantidadVariosContenedores = $editTarifa["cantidadContenedor"];

					if ($tipoContenedorId == "0000001880") { //Varios Contenedores
						$strSQL = "
								EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacionTemp_Detail
								'$cotizacionTempId',
								'$tipoTramiteId',
								'$viaEmbarqueId',
								'$tipoMercaderiaId',
								'$tipoVariosContenedoresId',
								$cantidadVariosContenedores,
								'$productoId',
								$valor,
								'$userCode',
								'$pcid'
							";
					} else {
						$strSQL = "
								EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveCotizacionTemp_Detail
								'$cotizacionTempId',
								'$tipoTramiteId',
								'$viaEmbarqueId',
								'$tipoMercaderiaId',
								'$tipoContenedorId',
								$cantidadContenedor,
								'$productoId',
								$valor,
								'$userCode',
								'$pcid'
							";
					}

					$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayStatus));
				}
			} else {

				$arrayStatus[0]["error"]            = -1;
				$arrayStatus[0]["message"]          = "Ocurrió un error al editar la tarifa seleccionada.";
				$arrayStatus[0]["cotizacionTempId"] = "";
			}
		}

		$baseDatos->desconectarDB();

		$arrayStatus[0]["error"]            = $error;
		$arrayStatus[0]["message"]          = $message;
		$arrayStatus[0]["cotizacionTempId"] = $cotizacionTempId;
		$stringJson                         = json_encode($arrayStatus);
		return $stringJson;
	}
}
