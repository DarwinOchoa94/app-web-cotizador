<?php
	class claseDivHeader
	{
		public static function show()
		{
			/*
			$presentar="
					<table width='100%'>
						<tr>
							<td	class='headerFormulario'
								 width='50%'
								style='
									text-align:center;
								'
							>
								<font>TOLEPU S.A.</font><br>
								<font style='font-size:20px;'>CONSOLIDADORA DE CARGA INTERNACIONAL</font><br>
							</td>
							<td>
							</td>
						</tr>
					</table>
			";*/		
			$presentar="
					<table width='100%'>
						<tr>
							<td	class='headerFormulario'
								 width='70%'
								style='
									text-align:center;
									color: #142238;
								'
							>
								COTIZADOR DE TARIFAS AL AGENTE DEL EXTERIOR
							</td>
							<td>
							</td>
						</tr>
					</table>
			";			
			return $presentar;
		}
	}
?>
