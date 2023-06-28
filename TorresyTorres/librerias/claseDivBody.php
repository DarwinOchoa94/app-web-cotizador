<?php
class claseDivBody
{
	public static function show($class)
	{
		$onclickBtnEnviar = "validarButton(\"btnEnviar\");";
		$onclickOptTarifa = "validarOption(\"optTarifa\");";
		$onclickOptCotizacion = "validarOption(\"optCotizacion\");";

		$onmouseoverCmbCiudad = ""; //"encenderDivToolTipText(event,\"Ciudad del Agente del Exterior\");";
		$onmouseoutCmbCiudad = ""; //"apagarDivToolTipText();";
		$onmousemoveCmbCiudad = $onmouseoverCmbCiudad;

		$lblTipoRequerimiento = claseLabel::show("lblTipoRequerimiento", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "Tipo de requerimiento:");
		$lblTarifa = "Modificar / Agregar Tarifa";
		$lblCotizacion = "Cotización";

		$optTarifa = claseOption::show("optTarifa", "radio1", "option", "relative", 18, 18, 0, 0, "visible", $lblTarifa, "labelFormulario", "#14ABE2", $onclickOptTarifa);
		$optCotizacion = claseOption::show("optCotizacion", "radio1", "option", "relative", 18, 18, 0, 0, "visible", $lblCotizacion, "labelFormulario", "#14ABE2", $onclickOptCotizacion);

		$lblRazonSocial = claseLabel::show("lblRazonSocial", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "Nombre o Razón Social:");
		$lblRuc = claseLabel::show("lblRuc", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "RUC / Cédula:");
		$lblContacto = claseLabel::show("lblContacto", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "Persona Contacto:");
		$lblEmail = claseLabel::show("lblEmail", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "Email:");
		$lblTelefono = claseLabel::show("lblTelefono", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", "Teléfonos / fax:");

		$captionCliente = "<font style=color:red;>* </font>Cliente que solicita el requerimiento:";
		$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
		$captionNota = "Los campos con <font style=color:red;>(*)</font> son obligatorios.";

		$onclickBtnEnviar = "validarButton(\"btnEnviar\");";
		$onclickOptTarifa = "validarOption(\"optTarifa\");";
		$onclickOptCotizacion = "validarOption(\"optCotizacion\");";

		$lblTarifa = "Modificar / Agregar Tarifa / Cotización";
		$lblCotizacion = "Cotización Cliente Nuevo";
		$lblTipoRequerimiento = claseLabel::show("lblTipoRequerimiento", "", "labelFormulario", "Tipo de requerimiento:");
		$lblNota = claseLabel::show("lblNota", "", "detailFormulario", $captionNota);

		$optTarifa = claseOption::show("optTarifa", "radio1", "option", "relative", 18, 18, 0, 0, "visible", $lblTarifa, "labelFormulario", "#14ABE2", $onclickOptTarifa);
		$optCotizacion = claseOption::show("optCotizacion", "radio1", "option", "relative", 18, 18, 0, 0, "visible", $lblCotizacion, "labelFormulario", "#14ABE2", $onclickOptCotizacion);

		$lblCliente = claseLabel::show("lblCliente", "", "labelFormulario", $captionCliente);
		$lblDetalleRequerimiento = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);

		$edtDetalleRequerimiento = claseTextArea::show("edtDetalleRequerimiento", "select main_body__text-area", claseTextArea::$string, 254, "");

		$lblTipoServicio = claseLabel::show("lblTipoServicio", "", "labelFormulario", "<font style=color:red;>* </font>Tipo de servicio:");

		// Imagen Lateral
		$iconImport = claseImage::show("../../Framework/images/iconMenuImportacionV2.png", "Background Body", "main-body__background-V2");

		// Tipo de Servicio

		// Tipo de Requerimiento

		// Cliente
		$onfocusCmbCliente = "loadComboBox(\"cmbCliente\",\"CLI\");";
		$onchangeCmbCliente = "validarComboBox(\"cmbCliente\");";
		$cmbCliente = claseComboBox::show("cmbCliente", "select main_body__select", "Seleccione...", $onfocusCmbCliente, $onchangeCmbCliente);

		// Fecha disponibilidad de la carga
		$captionFechaAsignacion = "Fecha de disponibilidad de la carga:";
		$lblFechaAsignacion = claseLabel::show("lblFechaDispCarga", "", "labelFormulario date", $captionFechaAsignacion);
		$dateFechaAsignacion = claseDatePicker::show("dateFechaAsignacion", "'select datepicker-fecha-carga'", "", "", "2000-01-01", "2099-12-31", "");

		// Fecha maxima cierre de cotización
		$captionFechaExpiracion = "<font style=color:red;>* </font>Fecha máxima para cierre de cotización:";
		$lblFechaExpiracion = claseLabel::show("lblFechaMaxCotiz", "", "labelFormulario date", $captionFechaExpiracion);
		$dateFechaExpiracion = claseDatePicker::show("dateFechaExpiracion", "'select datepicker-fecha-cierre'", "", "", "2000-01-01", "2099-12-31", "");

		// Tipo de Cotización
		$captionTipoCotizacion = "<font style=color:red;>* </font>Tipo de Cotización:";
		$lblTipoCotizacion = claseLabel::show("lblTipoCotizacion", "", "labelFormulario", $captionTipoCotizacion);
		$onfocusCmbTipoCotizacion = "loadComboBoxV2(\"cmbTipoCotizacion\",\"TCO\");";
		$onchangeCmbTipoCotizacion = "validarComboBox(\"cmbTipoCotizacion\");";
		$cmbTipoCotizacion = claseComboBox::show("cmbTipoCotizacion", "select select-custom", "Seleccione...", $onfocusCmbTipoCotizacion, $onchangeCmbTipoCotizacion);

		// Tipo de Tansporte
		$captionTipoTransporte 	= "<font style=color:red;>* </font>Tipo de Transporte:";
		$lblTipoTransporte = claseLabel::show("lblTipoTransporte", "", "labelFormulario", $captionTipoTransporte);
		$cmbTipoTransporte = claseComboBox::showSearch("cmbTipoTransporte", "select select-custom", "Seleccione...", "", $onchangeCmbCliente);

		// Modo de Transportación
		$captionIModoTrasportacion = "<font style=color:red;>* </font>Modo de Trasportación:";
		$lblModoTrasportacion = claseLabel::show("lblCliente", "", "labelFormulario", $captionIModoTrasportacion);
		$onfocusCmbModoTrasportacion = "loadComboBoxV2(\"cmbModoTrasportacion\",\"MTR\",\"true\");";
		$cmbModoTrasportacion = claseComboBox::show("cmbModoTrasportacion", "select select-custom", "Seleccione...", $onfocusCmbModoTrasportacion, $onchangeCmbCliente);

		// Incoterms
		$captionIncoterms = "<font style=color:red;>* </font>Incoterms:";
		$lblIncoterms = claseLabel::show("lblCliente", "", "labelFormulario", $captionIncoterms);
		$onfocusCmbIncoterms = "loadComboBoxV2(\"cmbIncoterms\",\"INC\",\"true\");";
		$cmbIncoterms = claseComboBox::show("cmbIncoterms", "select select-custom", "Seleccione...", $onfocusCmbIncoterms, $onchangeCmbCliente);

		// Origen
		$captionOrigen = "<font style=color:red;>* </font>Origen:";
		$lblOrigen = claseLabel::show("lblOrigen", "", "labelFormulario", $captionOrigen);
		$cmbOrigen = claseComboBox::showSearch("cmbOrigen", "select select-custom", "Seleccione...", "", $onchangeCmbCliente);

		// Destino
		$captionDestino = "<font style=color:red;>* </font>Destino:";
		$lblDestino = claseLabel::show("lblDestino", "", "labelFormulario", $captionDestino);
		$cmbDestino = claseComboBox::showSearch("cmbDestino", "select select-custom", "Seleccione...", "", $onchangeCmbCliente);

		// Zona Horaria
		$captionZonaHoraria = "<font style=color:red;>* </font>Zona Horaria:";
		$lblZonaHoraria = claseLabel::show("lblCliente", "", "labelFormulario", $captionZonaHoraria);
		$onfocusCmbZonaHoraria = "loadComboBoxV2(\"cmbZonaHoraria\",\"ZHO\");";
		$cmbZonaHoraria = claseComboBox::show("cmbZonaHoraria", "select select-custom", "Seleccione...", $onfocusCmbZonaHoraria, $onchangeCmbCliente);

		// Comentarios
		$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
		$lblDetalleRequerimiento = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);

		// Botón Enviar

		$lblInfoCarga = claseLabel::show("lblInfoCarga", "", "labelFormulario", "Información de la carga:");

		$mostrar = "
			<div id='divBody' class='$class'>
				<table width='100% id='tblintegral'>
					<tr>
						<td width='25%'>
							{$iconImport}
						</td>
						<td width='75%'>
							<table width='100%'>
								<tr id='label_servicio' class='tipo-serviciocheck'>
									<td>
										" . $lblTipoServicio . "
									</td>
								</tr>
								<tr>
									<td>
										<table width='100%'>
											<tr>
												<td width='5%'>
												</td>
												<td>
													<ul id='check_servicios' class='tipo-serviciocheck'>
														<li class='item-servicio' data-servicio='tolepu'>
															<input type='checkbox' style='margin-right: 0.5rem; vertical-align:middle;' name='tiposerv' value='REQ-TOLEPU' checked>TOLEPU
														</li>
													</ul>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td width='100%'>
										" . $lblTipoRequerimiento . "
									</td>
								</tr>
								<tr>
									<td>
										<table width='100%'>
											<tr>
												<td width='5%'>
												</td>
												<td width='45%'>
													" . $optCotizacion . "
												</td>
												<td width='50%'>
													" . $optTarifa . "
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<div id='divDetalleRequerimiento'>
											<table width='100%' height='100%'>
												<tr>
													<td width='50%'>
														" . $lblCliente . "
													</td>
													<td width='50%'>
														<p>&nbsp;</p>
														" . $cmbCliente . "
														<p>&nbsp;</p>
													</td>
												</tr>
												<tr>
													<td width='50%'>
														" . $lblInfoCarga . "
													</td>
												</tr>
												<tr>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='5%'>
																</td>
																<td width='25%'>
																	<input type='checkbox' id='checkComparativas' style='margin-right: 0.5rem; vertical-align:middle;'>Cotizaciones comparativas
																	<p>&nbsp;</p>
																</td>
																<td width='15%'>
																	<input type='checkbox' id='checkUrgente' data-toggle='modal' data-target='#myModal' style='margin-right: 0.5rem; vertical-align:middle;'>Urgente
																	<p>&nbsp;</p>
																</td>
																<!-- Modal -->
																<div class='modal fade' id='urgenteModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
																	<div class='modal-dialog modal-dialog-centered' role='document'>
																		<div class='modal-content'>
																			<div class='modal-header'>
																				<h5 class='modal-title' id='exampleModalLabel'>Motivo de Urgencia</h5>
																				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
																					<span aria-hidden='true'>&times;</span>
																				</button>
																			</div>
																			<div class='modal-body'>
																				<form>
																					<div class='form-group'>
																						<textarea class='form-control' id='txtMotivoUrgente'></textarea>
																					</div>
																				</form>
																			</div>
																			<div class='modal-footer'>
																				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
																				<button type='button' class='btn btn-primary' data-dismiss='modal'>Aceptar</button>
																			</div>
																		</div>
																	</div>
																</div>
															</tr>
														</table>
													</td>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='25%'>
																	<input type='checkbox' id='checkPeligrosa' style='margin-right: 0.5rem; vertical-align:middle;'>Peligrosa
																	<p>&nbsp;</p>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td width='50%'>
														" . $lblFechaAsignacion . "
														" . $dateFechaAsignacion . "
														<p>&nbsp;</p>
													</td>
													<td width='50%'>
														" . $lblFechaExpiracion . "
														" . $dateFechaExpiracion . "
														<p>&nbsp;</p>
													</td>
												</tr>
												<tr>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='50%'>
																	" . $lblTipoCotizacion . "
																</td>
															</tr>
															<tr>
																<td width='50%' style='padding-right: 1.5rem;'>
																	" . $cmbTipoCotizacion . "
																	<p>&nbsp;</p>
																</td>
															</tr>
														</table>
													</td>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='65%'>
																	" . $lblTipoTransporte . "
																</td>
																<td width='35%'>
																	" . $lblModoTrasportacion . "
																</td>
															</tr>
															<tr>
																<td width='65%' style='padding-right: 1.5rem;'>
																	" . $cmbTipoTransporte . "
																	<p>&nbsp;</p>
																</td>
																<td width='35%'>
																	" . $cmbModoTrasportacion . "
																	<p>&nbsp;</p>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='35%'>
																	" . $lblIncoterms . "
																</td>
																<td width='65%'>
																	" . $lblOrigen . "
																</td>
															</tr>
															<tr>
																<td width='35%' style='padding-right: 1.5rem;'>
																	" . $cmbIncoterms . "
																	<p>&nbsp;</p>
																</td>
																<td width='65%' style='padding-right: 1.5rem;'>
																	" . $cmbOrigen . "
																	<p>&nbsp;</p>
																</td>
															</tr>
														</table>
													</td>
													<td>
														<table width='100%' height='100%'>
															<tr>
																<td width='65%'>
																	" . $lblDestino . "
																</td>
																<td width='35%'>
																	" . $lblZonaHoraria . "
																</td>
															</tr>
															<tr>
																<td width='65%' style='padding-right: 1.5rem;'>
																	" . $cmbDestino . "
																	<p>&nbsp;</p>
																</td>
																<td width='35%'>
																	" . $cmbZonaHoraria . "
																	<p>&nbsp;</p>
																</td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td colspan='2'>
														" . $lblDetalleRequerimiento . "
													</td>
												</tr>
												<tr>
													<td colspan='2'>
														" . $edtDetalleRequerimiento . "
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
								<tr>
									<td width='100%' align='right'>
										<p>&nbsp;</p>
											" . claseButton::show("btnEnviar", "button button-blue", "ENVIAR", "", $onclickBtnEnviar) . "
										<p>&nbsp;</p>
										<div style='border: 1px dotted #C5CDDF;'></div>
									</td>
								</tr>
								<tr>
									<td width='100%' align='left'>
										" . $lblNota . "
										<p>&nbsp;</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			";
		return $mostrar;
	}

	public static function addControl()
	{
		$variables = $_GET["variables"];
		$arrayControl = json_decode($variables, true);
		$controlId = $arrayControl["controlId"];
		$mostrar = "<p>&nbsp;</p>";

		switch ($controlId) {
			case "edtDescContenedor":
				$mostrar .= claseTextArea::show($controlId, "select", "relative", "100%", "90px", 0, 0, "visible", claseTextArea::$string, "Descripción de los Contenedores");
				break;

			case "txtClaseIMO":
				$mostrar .= claseTextBox::show($controlId, "text", "select", "relative", "100%", 30, 0, 0, "visible", claseTextBox::$string, "Clase IMO");
				break;

			case "txtUN":
				$mostrar .= claseTextBox::show($controlId, "text", "select", "relative", "100%", 30, 0, 0, "visible", claseTextBox::$string, "UN");
				break;

			case "divFileUpload":
				$onclickBtnUpload = "validarButton(\"btnUpload\");";
				$onchangeBtnUpload = "";
				$onchangeTxtFile = "displayHiddenLabels();";
				$tittleBtnUpload = "Subir archivo";
				$mensaje = "<i class='fa fa-file-o'></i> Adjuntar archivo MSDS:";
				$iconUpload = "<i class='fa fa-upload'></i>";
				$lblFile = claseLabel::show("lblFile", "labelFormulario", "static", 30, 10, 0, 0, "visible", "#00365A", $mensaje);
				$lblPreviewPDF = claseLabel::show("lblPreviewPDF", "labelFormulario", "static", 30, 10, 0, 0, "hidden", "blue", "<i class='fa fa-search'></i> Visualizar");
				$lblRemovePDF = claseLabel::show("lblRemovePDF", "labelFormulario", "static", 30, 10, 0, 0, "hidden", "red", "<i class='fa fa-trash-o'></i> Quitar");
				$txtFile = claseTextBox::show("txtFile", "file", "breadcrumbs", "relative", "88%", 10, 0, 0, "visible", claseTextBox::$string, "", $onchangeTxtFile);
				$btnUpload = claseButton::show("btnUpload", "button button-gray", "relative", "10%", 10, 0, 0, "visible", $iconUpload, "", $onclickBtnUpload, $tittleBtnUpload);
				//$btnUpload = claseTextBox::show("btnUpload", "button", "button button-orange", "relative", "10%", 10, 0, 0, "visible", claseTextBox::$string,"",$onchangeBtnUpload,$onclickBtnUpload);
				$mostrar = "
						<form method='POST'
							enctype='multipart/form-data'
							action='./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=uploadFile'
							target='iframeUpload'
							onsubmit=''
						>
							<table width='100%'>
								<tr>
									<td width='55%'>
										$lblFile
									</td>
									<td width='5%'>
									</td>
									<td align='right' width='20%'>
										<a href='#' onclick='previewPDF(\"txtFile\");' style='color:blue;visibility:hidden;'>$lblPreviewPDF<a>
									</td>
									<td width='5%'>
									</td>
									<td align='left' width='15%'>
										<a href='#' onclick='removePDF(\"txtFile\");' style='color:red;visibility:hidden;'>$lblRemovePDF<a>
									</td>
								</tr>
								<tr>
									<td colspan='5' width='100%'>
										$txtFile
										$btnUpload
										<iframe name='iframeUpload' style='display:none'>
										</iframe>
									</td>
								</tr>
								<tr>
									<td colspan='5' width='100%'>
										<div id='divFileUploadMessage'>
										</div>
										<p>&nbsp;</p>
									</td>
								</tr>
							</table>
						</form>
					";
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

	public static function existeFile()
	{
		$mostrar = false;
		$arrayFilePDF = array();
		$arrayObjectFilePDF = $_GET["stringJsonFilePDF"];
		$arrayFilePDF = json_decode($arrayObjectFilePDF, true);
		$filePDF = $arrayFilePDF["FilePDF"];
		$dir = "files/filesTemp/";
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
				$maxSize = 1000000; //1mb
				if ($size > $maxSize) {
					return "<script> alert(\"El archivo debe ser un tamaño máximo de 1MB.\");</script>";
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
		$mensaje = "";
		$arrayFilePDF = array();
		$arrayObjectFilePDF = $_GET["stringJsonFilePDF"];
		$arrayFilePDF = json_decode($arrayObjectFilePDF, true);
		$filePDF = $arrayFilePDF["FilePDF"];
		$dir = "files/filesTemp/";
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
}
