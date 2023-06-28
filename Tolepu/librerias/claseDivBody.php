<?php
class claseDivBody
{
	public static function show()
	{
		$lblCiudad 		        = "País del Agente Exterior";
		$lblIncoterms	        = "Incoterms";
		$lblViaEmbarque	        = "Vía de Embarque";
		$lblTipoTramite         = "Tipo de Trámite";
		$lblCliente 	        = claseLabel::show("lblCliente", "", "labelCabecera", "Cliente Existente ");
		$onfocusCmbCiudad       = "loadComboBox(\"cmbCiudad\",\"PAIS\");";
		$onfocusCmbIncoterms    = "loadComboBox(\"cmbIncoterms\",\"INC\");";
		$onfocusCmbViaEmbarque  = "loadComboBox(\"cmbViaEmbarque\",\"VIA\");";
		$onfocusCmbTipoTramite  = "loadComboBox(\"cmbTipoTramite\",\"TPTRM\");";
		$onfocusCmbCliente      = "loadComboBox(\"cmbCliente\",\"CLI\");";
		$onchangeTxtCliente     = "loadListBox(\"txtCliente\", \"CLI\");";
		$onchangeSchCiudad      = "loadListBox(\"schCiudad\", \"PAIS\");";
		$onSelectTxtCliente     = "";
		$onSelectSchCiudad      = "";

		$onblurTxtCliente       = "selectItemListBox(\"txtCliente\", \"lstCliente\");";
		$onblurSchCiudad        = "selectItemListBox(\"schCiudad\", \"lstCiudad\"); validarSearchBox(\"schCiudad\");";

		$onchangeCmbCiudad      = "validarComboBox(\"cmbCiudad\");";
		$onchangeCmbIncoterms   = "validarComboBox(\"cmbIncoterms\");";
		$onchangeCmbViaEmbarque = "validarComboBox(\"cmbViaEmbarque\");";
		$onchangeCmbTipoTramite = "validarComboBox(\"cmbTipoTramite\");";
		$onchangeCmbCliente     = "validarComboBox(\"cmbCliente\");";

		$onclickBtnSolicitar    = "validarButton(\"btnSolicitar\");";
		$onclickBtnEnviar       = "validarButton(\"btnEnviar\");";
		$onclickBtnVerTarifas   = "validarButton(\"btnVerTarifas\");";

		$onmouseoverCmbCiudad   = ""; //"encenderDivToolTipText(event,\"Ciudad del Agente del Exterior\");";
		$onmouseoutCmbCiudad    = ""; //"apagarDivToolTipText();";
		$onmousemoveCmbCiudad   = $onmouseoverCmbCiudad;

		$switchCliente = claseSwitch::show("switchCliente", "switch", "relative", 30, 10, 0, 0, "visible", "", "", "validarSwitch(\"switchCliente\");", "");

		//".claseComboBox::show("cmbCliente", "select", "relative", "100%", 10, 0, 0, "visible", "Seleccione...", $onfocusCmbCliente, $onchangeCmbCliente,"","")."
		//".claseComboBox::show("cmbCiudad", "select", "relative", "100%", 10, 0, 0, "visible", "Seleccione...", $onfocusCmbCiudad, $onchangeCmbCiudad,$onmouseoverCmbCiudad,$onmouseoutCmbCiudad)."

		$mostrar = "
				<div id='' class='demo body-header'>
					<div class='body-header__items'>
						<div class='body-header__fields'>
							" . claseLabel::show("lblTipoTramite", "cmbTipoTramite", "labelCabecera", $lblTipoTramite) . "
							" . claseComboBox::show("cmbTipoTramite", "select body-header__field-one", "Seleccione...", $onfocusCmbTipoTramite, $onchangeCmbTipoTramite, "", "") . "
						</div>
						<div class='body-header__fields'>
							" . claseLabel::show("lblIncoterms", "cmbIncoterms", "labelCabecera", $lblIncoterms) . "
							" . claseComboBox::show("cmbIncoterms", "select body-header__field-two", "Seleccione...", $onfocusCmbIncoterms, $onchangeCmbIncoterms, "", "") . "
						</div>
						<div class='body-header__fields'>
							" . claseLabel::show("lblViaEmbarque", "cmbViaEmbarque", "labelCabecera", $lblViaEmbarque) . "
							" . claseComboBox::show("cmbViaEmbarque", "select body-header__field-three", "Seleccione...", $onfocusCmbViaEmbarque, $onchangeCmbViaEmbarque, "", "") . "
						</div>
					</div>
					<div class='body-header__items'>
						<div class='body-header__fields--switch'>
							" . $lblCliente . "
							" . $switchCliente . "
						</div>
						<div id='divCliente' class='body-header__fields body-header__fields--cliente'>
							" . claseSearch::show("txtCliente", "search body-header__field-five", "Buscar...", $onchangeTxtCliente, "", "", $onblurTxtCliente, $onSelectTxtCliente, "lstCliente") . "
						</div>
						<div class='body-header__fields body-header__fields--pais'>
							" . claseLabel::show("lblCiudad", "schCiudad", "labelCabecera", $lblCiudad) . "
							" . claseSearch::show("schCiudad", "search body-header__field-six", "Buscar...", $onchangeSchCiudad, "", "", $onblurSchCiudad, $onSelectSchCiudad, "lstCiudad") . "
						</div>
					</div>
					" . claseButton::show("btnBuscar", "button button-blue body-header__field-seven", "SOLICITAR", "", $onclickBtnSolicitar) . "
				</div>
				<div id='divBody' class='demo body-incoterms'>
					" . claseToggle::show("divBodyToggle", "sectionToggle", "btnListaAgentes", "<i class='fa fa-chevron-down'></i> Abrir Lista de Agentes del Exterior") . "
					<div id='divBodyIncoterms'>
						" . claseImage::show("../../Framework/images/isologoGrupoTyT-vertical.png", "Logo Grupo Torres y Torres", "main-logo") . "
					</div>
				</div>
				<footer id='divBodyFooter' class='demo body-footer'>
					" . claseButton::show("btnVerTarifas", "button button-blue button-main hidden", "<p class='im-bar-chart'></p>VER TARIFAS", "", $onclickBtnVerTarifas) . "
					" . claseButton::show("btnEnviar", "button button-blue button-main hidden", "<p class='im-paper-plane2'></p>ENVIAR SOLICITUD", "", $onclickBtnEnviar) . "
				</footer>
			";
		return $mostrar;
	}

	public static function addControl()
	{
		$variables    = $_GET["variables"];
		$arrayControl = json_decode($variables, true);
		$controlId	  = $arrayControl["controlId"];
		$obligatorio  = "<span class='obligatorio'>*</span>";
		$mostrar	  = "";

		switch ($controlId) {
			case "edtDescContenedor":
				$mostrar .= claseTable::show("tblContenedor", "tableContenedor", 1, 3);
				break;

			case "txtClaseIMO":
				$mostrar .= claseLabel::show("lblClaseIMO", $controlId, "labelFormulario section-container-body__label", "Clase IMO:") .
					claseTextBox::show($controlId, "text", "select", claseTextBox::$string, 50, "", "", "");
				break;

			case "txtUN":
				$mostrar .= claseLabel::show("lblUN", $controlId, "labelFormulario section-container-body__label", "UN:") .
					claseTextBox::show($controlId, "text", "select", claseTextBox::$string, 50, "", "", "");
				break;

			case "grdGridAgentes":
				$mostrar .= claseGrid::show($controlId, "table", "100%", "visible");
				break;

			case "divFileUpload":
				$onclickBtnUpload  = "validarButton(\"btnUpload\");";
				$onchangeBtnUpload = "";
				$onchangeTxtFile   = "displayHiddenLabels();";
				$tittleBtnUpload   = "Subir archivo";
				$mensaje           = $obligatorio . "<i class='fa fa-file-o'></i> Adjuntar archivo MSDS:";
				$iconUpload        = "<i class='fa fa-upload'></i>";
				$lblFile           = claseLabel::show("lblFile", "txtFile", "labelFormulario section-container-body__label", $mensaje);
				$lblPreviewPDF     = claseLabel::show("lblPreviewPDF", "", "label-preview", "<i class='fa fa-search'></i> Visualizar");
				$lblRemovePDF      = claseLabel::show("lblRemovePDF", "", "label-remove", "<i class='fa fa-trash-o'></i> Quitar");
				$txtFile           = claseTextBox::show("txtFile", "file", "breadcrumbs section-container-body__select", claseTextBox::$string, 150, "", $onchangeTxtFile, "");
				$btnUpload         = claseButton::show("btnUpload", "button button-file-upload disabled", $iconUpload, "", $onclickBtnUpload, $tittleBtnUpload);
				//$btnUpload = claseTextBox::show("btnUpload", "button", "button button-orange", "relative", "10%", 10, 0, 0, "visible", claseTextBox::$string,"",$onchangeBtnUpload,$onclickBtnUpload);
				$mostrar = "
						<form method='POST'
							class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'
							enctype='multipart/form-data'
							action='./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=uploadFile'
							target='iframeUpload'
							onsubmit=''
						>
							$lblFile
							<fieldset class='section-container-body__fieldset section-container-body__fieldset--tipo-carga'>
								$txtFile
								$btnUpload
							</fieldset>
							<fieldset class='section-container-body__fieldset--flex-end section-container-body__fieldset--tipo-carga'>
								<a href='#' class='label-preview hidden' onclick='previewPDF(\"txtFile\");'>$lblPreviewPDF</a>
								<a href='#' class='label-remove hidden' onclick='removePDF(\"txtFile\"); displayHiddenLabels();'>$lblRemovePDF</a>
							</fieldset>
							<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
								<iframe name='iframeUpload' style='display:none'></iframe>
								<div id='divFileUploadMessage'>
								</div>
							</fieldset>
						</form>
					";
				break;

			case "searchCliente":
				$onchangeTxtCliente = "loadListBox(\"txtCliente\", \"CLI\");";
				$onblurTxtCliente   = "";
				$txtCliente         = claseSearch::show("txtCliente", "search body-header__field-five", "Buscar...", $onchangeTxtCliente, "", "", $onblurTxtCliente, "", "lstCliente");
				$mostrar            = $txtCliente;
				break;

			case "txtCliente":
				$txtCliente = claseTextBox::show("txtCliente", "text", "select body-header__field-five", claseTextBox::$string, 100, "Ingrese el nombre del Cliente", "", "");
				$mostrar    = $txtCliente;
				break;
		}
		return $mostrar;
	}

	public static function validarEnvio()
	{
		$incotermsId = $_GET["incotermsId"];
		$incoterms = "";
		$metodo = "";

		switch ($incotermsId) {
			case "0000002401": //DAP
				$incoterms = "DAP";
				$metodo = "getDataObjectIncotermsDAP();";
				break;

			case "0000000101": //DDP
				$incoterms = "DDP";
				$metodo = "getDataObjectIncotermsDDP();";
				break;

			case "0000000100": //DDU
				$incoterms = "DDU";
				$metodo = "getDataObjectIncotermsDDU();";
				break;

			case "0000000091": //EXW
				$incoterms = "EXW";
				$metodo = "getDataObjectIncotermsEXW();";
				break;

			case "0000000092": //FCA
				$incoterms = "FCA";
				$metodo = "getDataObjectIncotermsFCA();";
				break;

			case "0000000052": //FOB
				$incoterms = "FOB";
				$metodo = "getDataObjectIncotermsFOB();";
				break;
		}
		return '{"Metodo":"' . $metodo . '","Incoterms":"' . $incoterms . '"}';
	}

	public static function existeCotizacion()
	{
		$cotizacion	= $_GET["cotizacion"];
		$cotizacion = str_replace("'", "", $cotizacion);
		$cotizacion = str_replace("\"", "", $cotizacion);
		$id	= "";
		$mostrar = false;
		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();
		$strSQL = "";
		$strSQL = "
				SELECT ID = LTRIM(RTRIM(ISNULL(ID,'')))
				FROM TOLEPU..CLI_COTIZACIONES WITH(NOLOCK)
				WHERE Anulado = 0 AND Secuencia = '$cotizacion'
			";

		$rs =  $baseDatos->db_query($strSQL);
		$baseDatos->desconectarDB();

		while ($row = $baseDatos->db_fetch_array($rs)) {
			$id 	= $baseDatos->sysGetDataFieldSrv($row["ID"]);
		}
		$mostrar = (strlen($id) > 0) ? true : false;
		return $mostrar;
	}

	public static function existeRequerimiento()
	{
		$requerimiento = $_GET["requerimiento"];
		$requerimiento = str_replace("'", "", $requerimiento);
		$requerimiento = str_replace("\"", "", $requerimiento);
		$id	= "";
		$mostrar = false;
		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();
		$strSQL = "";
		$strSQL = "
				SELECT ID = LTRIM(RTRIM(ISNULL(ID,'')))
				FROM TYT..AST_REQUERIMIENTOS WITH(NOLOCK)
				WHERE Anulado = 0 AND Requerimiento = '$requerimiento'
			";

		$rs =  $baseDatos->db_query($strSQL);
		$baseDatos->desconectarDB();

		while ($row = $baseDatos->db_fetch_array($rs)) {
			$id 	= $baseDatos->sysGetDataFieldSrv($row["ID"]);
		}
		$mostrar = (strlen($id) > 0) ? true : false;
		return $mostrar;
	}

	public static function existeFile()
	{
		$mostrar			= false;
		$arrayFilePDF	 	= array();
		$arrayObjectFilePDF	= $_GET["stringJsonFilePDF"];
		$arrayFilePDF = json_decode($arrayObjectFilePDF, true);
		$filePDF	  = $arrayFilePDF["FilePDF"];
		$dir 		  = "files/filesTemp/";

		if (file_exists($dir . $filePDF)) {
			$mostrar = true;
			return $mostrar;
		} else {
			return $mostrar;
		}
	}

	public static function uploadFile()
	{
		$tipoFile = strtoupper(substr($_FILES["txtFile"]["type"], 0, 15));
		$dir = 'files/filesTemp/';
		if (isset($_FILES["txtFile"]["tmp_name"])) {
			//$array=json_encode($_FILES);
			//print_r ($array);
			if ($tipoFile == "APPLICATION/PDF") {
				$size = $_FILES["txtFile"]["size"];
				$maxSize  = 2000000; //2mb
				if ($size > $maxSize) {
					return "<script> alert(\"El archivo debe ser un tamaño máximo de 2MB.\");</script>";
				}

				$filePDF = $dir . $_FILES["txtFile"]["name"];

				if (!copy($_FILES["txtFile"]["tmp_name"], $filePDF)) {
					return "<script> alert(\"Error al intentar subir el archivo " . $dir . $_FILES["txtFile"]["name"] . "\");</script>";
				} else {
					return "<script> alert(\"El archivo " . $_FILES["txtFile"]["name"] . " se ha subido al servidor correctamente.\");</script>";
				}
			} else {
				return "<script> alert(\"El archivo que se intenta subir debe ser un archivo PDF.\");</script>";
				return "<script> document.getElementById(\"divFileUploadMessage\").innerHTML=\"El archivo que se intenta subir debe ser un archivo PDF.\";alert();</script>";
			}
		} else {
			return "<script> alert(\"El archivo no ha llegado al Servidor.\");</script>";
		}
	}

	public static function removeFile()
	{
		$mensaje			= "";
		$arrayFilePDF	 	= array();
		$arrayObjectFilePDF	= $_GET["stringJsonFilePDF"];
		$arrayFilePDF = json_decode($arrayObjectFilePDF, true);
		$filePDF	  = $arrayFilePDF["FilePDF"];
		$dir 		  = "files/filesTemp/";
		if (unlink($dir . $filePDF)) {
			$mensaje = "Archivo quitado del servidor correctamente.";
			$arrayStatus[0]["deleted"] = 1;
			$arrayStatus[0]["message"] = $mensaje;
			$stringJson = json_encode($arrayStatus);
		} else {
			$mensaje = "Ocurrió un error al tratar de quitar el archivo del servidor.";
			$arrayStatus[0]["deleted"] = 0;
			$arrayStatus[0]["message"] = $mensaje;
			$stringJson = json_encode($arrayStatus);
		}
		return $stringJson;
	}

	public static function quitarAdjuntos()
	{
		$documentoId = $_GET["documentoId"];
		$error 	= 0;

		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();
		$strSQL = "
				EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Select_Adjuntos '$documentoId'
			";
		$rs =  $baseDatos->db_query($strSQL) or die(json_encode($arrayMail));
		$baseDatos->desconectarDB();
		while ($row  =  $baseDatos->db_fetch_array($rs)) {
			$filePDF 	= $baseDatos->sysGetDataFieldSrv($row['FilePDF']);
			$adjunto1 	= $baseDatos->sysGetDataFieldSrv($row['Adjunto1']);
			$adjunto2 	= $baseDatos->sysGetDataFieldSrv($row['Adjunto2']);
			$adjunto3 	= $baseDatos->sysGetDataFieldSrv($row['Adjunto3']);
			$adjunto4 	= $baseDatos->sysGetDataFieldSrv($row['Adjunto4']);
			$adjunto5 	= $baseDatos->sysGetDataFieldSrv($row['Adjunto5']);
			//$message 	= $baseDatos->sysGetDataFieldSrv( $row[ 'Mensaje' ] );
		}
		$pathTemporal = "files/filesTemp/";
		$pathDestino  = "files/webCotizadorTolepuFilesPDF/";

		$existePDF 	  =  strlen($filePDF) > 0 ? $pathDestino . $filePDF : "";
		$existeFile1  =  strlen($adjunto1) > 0 ? $pathDestino . $adjunto1 : "";
		$existeFile2  =  strlen($adjunto2) > 0 ? $pathDestino . $adjunto2 : "";
		$existeFile3  =  strlen($adjunto3) > 0 ? $pathDestino . $adjunto3 : "";
		$existeFile4  =  strlen($adjunto4) > 0 ? $pathDestino . $adjunto4 : "";
		$existeFile5  =  strlen($adjunto5) > 0 ? $pathDestino . $adjunto5 : "";

		if (file_exists($existePDF)) {
			unlink($pathTemporal . $filePDF);
			unlink($pathDestino . $filePDF);
		}
		if (file_exists($existeFile1)) {
			unlink($pathTemporal . $adjunto1);
			unlink($pathDestino . $adjunto1);
		}
		if (file_exists($existeFile2)) {
			unlink($pathTemporal . $adjunto2);
			unlink($pathDestino . $adjunto2);
		}
		if (file_exists($existeFile3)) {
			unlink($pathTemporal . $adjunto3);
			unlink($pathDestino . $adjunto3);
		}
		if (file_exists($existeFile4)) {
			unlink($pathTemporal . $adjunto4);
			unlink($pathDestino . $adjunto4);
		}
		if (file_exists($existeFile5)) {
			unlink($pathTemporal . $adjunto5);
			unlink($pathDestino . $adjunto5);
		}
		return 	$error;
	}
}
