<?php
	class claseDivBodyTarifa {
		public static function show() {
			$captionCliente              = "<font style=color:red;>* </font>Cliente que solicita el requerimiento:";
			$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
			
			$onfocusCmbCliente           = "loadComboBox(\"cmbCliente\",\"CLI\");";			
			$onchangeCmbCliente          = "validarComboBox(\"cmbCliente\");";
			
			$lblCliente                  = claseLabel::show("lblCliente", "", "labelFormulario", $captionCliente);
			$lblDetalleRequerimiento     = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);
			
			$cmbCliente                  = claseComboBox::show("cmbCliente", "select main_body__select", "Seleccione...", $onfocusCmbCliente, $onchangeCmbCliente );			
			$edtDetalleRequerimiento     = claseTextArea::show("edtDetalleRequerimiento", "select main_body__text-area", claseTextArea::$string, 800, "");

			$captionFechaDispCarga		= "Fecha de disponibilidad de la carga:";
			$captionFechaMaxCotiz		= "Fecha máxima para cierre de cotización:";
			$lblFechaDispCarga			= claseLabel::show("lblFechaDispCarga", "", "labelFormulario date", $captionFechaDispCarga);
			$lblFechaMaxCotiz			= claseLabel::show("lblFechaMaxCotiz", "", "labelFormulario date", $captionFechaMaxCotiz);
			$dateFechaDispCarga			= claseDatePicker::show("dateFechaDispCarga", "'select select-custom'", "", "", "2000-01-01", "2099-12-31");
			$dateFechaMaxCotiz			= claseDatePicker::show("dateFechaMaxCotiz", "'select select-custom'", "", "", "2000-01-01", "2099-12-31");
			
			$mostrar="
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
					</tr>
						<td width='50%'>
							".$lblFechaDispCarga."
							".$dateFechaDispCarga."
							<p>&nbsp;</p>
						</td>
						<td width='50%'>
							".$lblFechaMaxCotiz."
							".$dateFechaMaxCotiz."
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
			";
		
			return $mostrar; 
		}
	}
?>