<?php
class claseDivBodyCotizacion
{
	public static function show()
	{
		$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
		$captionRazonSocial          = "<font style=color:red;>* </font>Nombre o Razón Social:";
		$captionContacto             = "<font style=color:red;>* </font>Persona Contacto:";
		$captionEmail                = "<font style=color:red;>* </font>Email:";

		$onchangeTxtRuc              = "validarTextBox(\"txtRuc\")";
		$onchangeCmbCliente          = "validarComboBox(\"cmbCliente\");";

		$lblRazonSocial              = claseLabel::show("lblRazonSocial", "", "labelFormulario", $captionRazonSocial);
		$lblRuc                      = claseLabel::show("lblRuc", "", "labelFormulario", "RUC / Cédula:");
		$lblContacto                 = claseLabel::show("lblContacto", "", "labelFormulario", $captionContacto);
		$lblEmail                    = claseLabel::show("lblEmail", "", "labelFormulario", $captionEmail);
		$lblTelefono                 = claseLabel::show("lblTelefono", "", "labelFormulario", "Teléfonos / fax:");
		$lblDetalleRequerimiento     = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);

		$txtRazonSocial              = claseTextBox::show("txtRazonSocial", "text", "select main_body__select", claseTextBox::$string, 30, "", "");
		$txtRuc                      = claseTextBox::show("txtRuc", "text", "select", claseTextBox::$string, 13, "", $onchangeTxtRuc);
		$txtContacto                 = claseTextBox::show("txtContacto", "text", "select main_body__select", claseTextBox::$string, 50, "", "");
		$txtEmail                    = claseTextBoxEmail::show("txtEmail", "email", claseTextBoxEmail::$string, 100, "", "");
		$txtTelefono                 = claseTextBox::show("txtTelefono", "text", "select", claseTextBox::$string, 20, "", "");
		$edtDetalleRequerimiento     = claseTextArea::show("edtDetalleRequerimiento", "select main_body__text-area", claseTextArea::$string, 800, "");

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
			<table width='100%' height='100%'>
				<tr>
					<td width='68%'>
						" . $lblRazonSocial . "
					</td>
					<td width='2%'>
					</td>
					<td width='30%'>
						" . $lblRuc . "
					</td>
				</tr>
				<tr>
					<td>
						" . $txtRazonSocial . "
					</td>
					<td>
					</td>
					<td>
						" . $txtRuc . "
					</td>
				</tr>
			</table>
			<tr>
				<td>
					<table width='100%'>
						<tr>
							<td width='40%'>
								" . $lblContacto . "
							</td>
							<td width='2%'>
							</td>
							<td width='26%'>
								" . $lblEmail . "
							</td>
							<td width='2%'>
							</td>
							<td width='30%'>
								" . $lblTelefono . "
							</td>
						</tr>
						<tr>
							<td>
								" . $txtContacto . "
								<p>&nbsp;</p>
							</td>
							<td>
							</td>
							<td>
								" . $txtEmail . "
								<p>&nbsp;</p>
							</td>
							<td>
							</td>
							<td>
								" . $txtTelefono . "
								<p>&nbsp;</p>
							</td>
						</tr>
						<table width='100%' height='100%'>
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
					</table>
				</td>
			</tr>
			";
		return $mostrar;
	}
}
