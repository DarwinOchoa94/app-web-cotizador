<?php
	class claseDivBodyCotizacion {
		public static function show() {
			$captionDetalleRequerimiento = "<font style=color:red;>* </font>Detalle su requerimiento:";
			$captionRazonSocial          = "<font style=color:red;>* </font>Nombre o Razón Social:";
			$captionContacto             = "<font style=color:red;>* </font>Persona Contacto:";
			$captionEmail                = "<font style=color:red;>* </font>Email:";
			
			$onchangeTxtRuc              = "validarTextBox(\"txtRuc\")";
			
			$lblRazonSocial              = claseLabel::show("lblRazonSocial", "", "labelFormulario", $captionRazonSocial);
			$lblRuc                      = claseLabel::show("lblRuc", "", "labelFormulario", "RUC / Cédula:");
			$lblContacto                 = claseLabel::show("lblContacto", "", "labelFormulario", $captionContacto);
			$lblEmail                    = claseLabel::show("lblEmail", "", "labelFormulario", $captionEmail);
			$lblTelefono                 = claseLabel::show("lblTelefono", "", "labelFormulario", "Teléfonos / fax:");
			$lblDetalleRequerimiento     = claseLabel::show("lblDetalleRequerimiento", "", "labelFormulario", $captionDetalleRequerimiento);

			$txtRazonSocial              = claseTextBox::show("txtRazonSocial", "text", "select main_body__select", claseTextBox::$string, 50, "", "");
			$txtRuc                      = claseTextBox::show("txtRuc", "text", "select", claseTextBox::$string, 13, "", $onchangeTxtRuc);
			$txtContacto                 = claseTextBox::show("txtContacto", "text", "select main_body__select", claseTextBox::$string, 50, "", "");
			$txtEmail                    = claseTextBoxEmail::show("txtEmail", "email", claseTextBoxEmail::$string, 100, "", "");
			$txtTelefono                 = claseTextBox::show("txtTelefono", "text", "select", claseTextBox::$string, 20, "", "");
			$edtDetalleRequerimiento     = claseTextArea::show("edtDetalleRequerimiento", "select main_body__text-area", claseTextArea::$string, 800, "");
						
			$mostrar="
				<table width='100%' height='100%'>
					<tr>
						<td width='68%'>
							<p>&nbsp;</p>
							".$lblRazonSocial."																	
						</td>
						<td width='2%'>
						</td>
						<td width='30%'>
							<p>&nbsp;</p>
							".$lblRuc."	
						</td>
					</tr>
					<tr>
						<td>
							".$txtRazonSocial."																	
						</td>
						<td>
						</td>
						<td>
							".$txtRuc."	
						</td>
					</tr>
				</table>
				<tr>
					<td>
						<table width='100%'>
							<tr>
								<td width='40%'>
									".$lblContacto."
								</td>
								<td width='2%'>
								</td>
								<td width='26%'>
									".$lblEmail."
								</td>
								<td width='2%'>
								</td>
								<td width='30%'>
									".$lblTelefono."
								</td>
							</tr>
							<tr>
								<td>
									".$txtContacto."																	
									<p>&nbsp;</p>
								</td>
								<td>
								</td>
								<td>
									".$txtEmail."																	
									<p>&nbsp;</p>
								</td>
								<td>
								</td>
								<td>
									".$txtTelefono."	
									<p>&nbsp;</p>
								</td>
							</tr>
						</table>													
					</td>
				</tr>
				<tr>
					<td>
						".$lblDetalleRequerimiento."
					</td>
				</tr>
				<tr>
					<td>
						".$edtDetalleRequerimiento."																	
					</td>
				</tr>
			";
		
			return $mostrar; 
		}
	}
?>
