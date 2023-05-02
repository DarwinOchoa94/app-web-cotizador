<?php
	class claseUnderConstruction
	{
		public static function show()
		{
			$imagen="../../Framework/images/Tolepu/underConstruction.png";
			$width="50%";
			$lnlPronto = "Este Término de Negociación no se encuentra disponible por el momento, si desea cotizar con este Término comuniquese con el Dpto. Comercial o envíe su requerimiento a: [ <a href='mailto:sales@torresytorres.com'>sales@torresytorres.com</a> ]";
			$mostrar="
				<tr>
					<td width='100%'>
						".claseDivLogo::show($imagen,$width)."
						<p>&nbsp;</p>
					</td>
				</tr>
				<tr>
					<td width='100%'>
						".claseLabel::show("lblPronto", "detailFormulario", "static", 100, 10, 0, 0, "visible", "red", $lnlPronto)."
					</td>
				</tr>
			";		
			return $mostrar;
		}
	}
?>