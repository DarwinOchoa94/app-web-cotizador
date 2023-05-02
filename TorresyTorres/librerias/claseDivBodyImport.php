<?php
	class claseDivBodyImport {
		public static function show() {
			$captionCliente              = "<font style=color:red;>* </font>Cliente que solicita el requerimiento:";
			$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
			$captionNota                 = "Los campos con <font style=color:red;>(*)</font> son obligatorios.";
			
			$onclickBtnEnviar            = "validarButton(\"btnEnviar\");";
			$onclickOptTarifa            = "validarOption(\"optTarifa\");";
			$onclickOptCotizacion        = "validarOption(\"optCotizacion\");";

			$lblTarifa                   = "Modificar / Agregar Tarifa / Cotización";
			$lblCotizacion               = "Cotización Cliente Nuevo";
			$lblTipoRequerimiento        = claseLabel::show("lblTipoRequerimiento", "", "labelFormulario", "Tipo de requerimiento:");
			$lblNota                     = claseLabel::show("lblNota", "", "detailFormulario", $captionNota);
			
			$optTarifa                   = claseOption::show("optTarifa","radio1","option","relative",18,18,0,0,"visible",$lblTarifa,"labelFormulario","#14ABE2",$onclickOptTarifa);
			$optCotizacion               = claseOption::show("optCotizacion","radio1","option","relative",18,18,0,0,"visible",$lblCotizacion,"labelFormulario","#14ABE2",$onclickOptCotizacion);
			
			$onfocusCmbCliente           = "loadComboBox(\"cmbCliente\",\"CLI\");";			
			$onchangeCmbCliente          = "validarComboBox(\"cmbCliente\");";
			
			$lblCliente                  = claseLabel::show("lblCliente", "", "labelFormulario", $captionCliente);
			$lblDetalleRequerimiento     = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);
			
			$cmbCliente                  = claseComboBox::show("cmbCliente", "select main_body__select", "Seleccione...", $onfocusCmbCliente, $onchangeCmbCliente );
			
			$edtDetalleRequerimiento     = claseTextArea::show("edtDetalleRequerimiento", "select main_body__text-area", claseTextArea::$string, 800, "");
			
			$iconImport                  = claseImage::show("../../Framework/images/iconMenuImportacion.png", "Background Body", "main-body__background");

			$lblTipoServicio        = claseLabel::show("lblTipoServicio", "", "labelFormulario", "<font style=color:red;>* </font>Tipo de servicio:");	

	

			$mostrar="
				<table width='100%  id='tblintegral'>
					<tr>
						<td width='30%'>
							{$iconImport}
						</td>
						<td width='70%'>
							<table width='100%'>
								<tr>
									<td>
										<table width='100%'>
											<tr id='label_servicio'  class='tipo-serviciocheck'>
												<td>
													".$lblTipoServicio."
												</td>
											</tr>
											<tr>	
											    <td></td>			
												<td width='50%'>
														<ul id='check_servicios' class='tipo-serviciocheck'>
															<li class='item-servicio' data-servicio='import'>
															<input type='checkbox' name='tiposerv' value='REQ-TYT-IM'> Importación
															</li>
															<li class='item-servicio' data-servicio='export'>
															<input type='checkbox' name='tiposerv' value='REQ-TYT-EX'> Exportación
															</li>
															<li class='item-servicio' data-servicio='seg'>
															<input type='checkbox' name='tiposerv' value='REQ-TOL'> Internacional
															</li>
															<li class='item-servicio' data-servicio='transp'>
															<input type='checkbox' name='tiposerv' value='REQ-CIA'> Transporte
															</li>
															<li class='item-servicio' data-servicio='inter'>
															<input type='checkbox' name='tiposerv' value='REQ-EST'> Estiba
															</li>
															<li class='item-servicio' data-servicio='estiba'>
															<input type='checkbox' name='tiposerv' value='REQ-SEG'> Seguros
															</li>
															<li class='item-servicio' data-servicio='cia4pl'>
															<input type='checkbox' name='tiposerv' value='REQ-4PL'> 4PL
															</li>		
														</ul>
												   </td>
											   </tr>


										 </table>
									</td>
								</tr>	 
								<tr>
									<td width='100%'>
										".$lblTipoRequerimiento."
									</td>
								</tr>
								<tr>
									<td>											
										<table width='100%'>
											<tr>
												<td width='10%'>
												</td>
												<td width='35%'>
													<p>&nbsp;</p>
													".$optCotizacion."
													<p>&nbsp;</p>
												</td>
												<td width='50%'>
													<p>&nbsp;</p>
													".$optTarifa."
													<p>&nbsp;</p>
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
														".$lblCliente."
													</td>
													<td width='50%'>
														<p>&nbsp;</p>
														".$cmbCliente."
														<p>&nbsp;</p>
													</td>
												</tr>
												<tr>
													<td colspan='2'>
														".$lblDetalleRequerimiento."																	
													</td>
												</tr>
												<tr>
													<td colspan='2'>
														".$edtDetalleRequerimiento."
													</td>
												</tr>
											</table>
										</div>
									</td>
								</tr>
								<tr>
									<td width='100%' align='right'>
										<p>&nbsp;</p>
										".claseButton::show("btnEnviar", "button button-blue", "ENVIAR", "", $onclickBtnEnviar)."
										<p>&nbsp;</p>
										<div style='border: 1px dotted #C5CDDF;'></div>
									</td>
								</tr>
								<tr>
									<td width='100%' align='left'>
										".$lblNota."
										<p>&nbsp;</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			";
			return $mostrar; 
		}
	}
?>
