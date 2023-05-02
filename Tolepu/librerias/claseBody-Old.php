<?php
	class claseDivBodyOld
	{
		public static function show($class)
		{
			$onfocusCmbCliente="loadComboBox(\"cmbCliente\",\"CLI\");";
			$onchangeCmbCliente="validarComboBox(\"cmbCliente\");";
			$onfocusCmbTipoTramite="loadComboBox(\"cmbTipoTramite\",\"TPTRM\");";
			$onchangeCmbTipoTramite="validarComboBox(\"cmbTipoTramite\");";
			$onfocusCmbPaisOrigen="loadComboBox(\"cmbPaisOrigen\",\"PORI\");";
			$onchangeCmbPaisOrigen="validarComboBox(\"cmbPaisOrigen\");";
			$onfocusCmbPuertoOrigen="loadComboBox(\"cmbPuertoOrigen\",\"PUORI\");";
			$onchangeCmbPuertoOrigen="validarComboBox(\"cmbPuertoOrigen\");";
			$onfocusCmbTipoCotizacion="loadComboBox(\"cmbTipoCotizacion\",\"TPCOT\");";
			$onchangeCmbTipoCotizacion="validarComboBox(\"cmbTipoCotizacion\");";
			$onfocusCmbIncoterms="loadComboBox(\"cmbIncoterms\",\"INC\");";
			$onchangeCmbIncoterms="validarComboBox(\"cmbIncoterms\");";
			$presentar="
				<div class=$class>
				  <table  width='100%'>
					<tr>
						<td>
							".claseLabel::show("lblDatosEmbarque", "detailFormulario", "static", 30, 10, 0, 0, "visible", "white", "Datos del Embarque:")."
							".claseComboBox::show("cmbCliente", "select", "relative", "100%", 10, 0, 0, "visible", "Cliente", $onfocusCmbCliente, $onchangeCmbCliente)."
						</td>
					</tr>
					<tr>
						<td>
							<table width='100%' align='center'>
								<tr>
									<td style='width:30%;'>
										".claseComboBox::show("cmbTipoTramite", "select", "relative", "100%", 10, 0, 0, "visible", "Tipo de Trámite", $onfocusCmbTipoTramite, $onchangeCmbTipoTramite)."
									</td>
									<td style='width:5%;'>
									</td>
									<td style='width:30%;'>
										".claseComboBox::show("cmbPaisOrigen", "select", "relative", "100%", 10, 0, 0, "visible", "Pais de Origen", $onfocusCmbPaisOrigen, $onchangeCmbPaisOrigen)."
									</td>
									<td style='width:5%;'>
									</td>
									<td style='width:30%;'>
										".claseComboBox::show("cmbPuertoOrigen", "select", "relative", "100%", 10, 0, 0, "visible", "Puerto de Origen", $onfocusCmbPuertoOrigen, $onchangeCmbPuertoOrigen)."
									</td>
								</tr>
							</table>
						</td> 
					</tr>
					<tr>
						<td>
							<table width='100%' align='center'>
								<tr>
									<td style='width:48%;'>
										".claseComboBox::show("cmbTipoCotizacion", "select", "relative", "100%", 10, 0, 0, "visible", "Tipo de Cotización", $onfocusCmbTipoCotizacion, $onchangeCmbTipoCotizacion)."
									</td>
									<td style='width:5%;'>
									</td>
									<td style='width:47%;'>
										".claseComboBox::show("cmbIncoterms", "select", "relative", "100%", 10, 0, 0, "visible", "Incoterms", $onfocusCmbIncoterms, $onchangeCmbIncoterms)."
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							".claseButton::show("btnBuscar", "button button-orange", "relative", "100%", 10, 1, 1, "visible","BUSCAR","","cargarGridAgentes();")."
						</td>
					</tr>
					<tr>
						<td>
							<table width='100%'>
								<tr>
									<td width='100%'>
										<p>&nbsp;</p>
										".claseLabel::show("lblAgentesExterior", "detailFormulario", "static", 30, 10, 0, 0, "hidden", "white", "Agentes del Exterior:")."
										".claseGrid::show("grdAgentesExterior", "table", "100%", "hidden")."
										<p>&nbsp;</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style='width:100%;'>
							".claseButton::show("btnSolicitar", "button button-orange", "relative", "20%", 10, 1, 1, "hidden","SOLICITAR","","abrirFrm(\"claseFrmRequisitos\");")."
							<p>&nbsp;</p>
						</td>
					</tr>
				  </table>
				</div>
			";			
			return $presentar;
		}
	}
?>