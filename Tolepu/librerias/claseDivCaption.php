<?php
	class claseDivCaption
	{
		public static function show()
		{
			$presentar="
				<table cellspacing='0' cellpadding='0' width='100%'>
					<tr>
						<td>
							<div 
								class='subHeaderFormulario'
								style='
									width:90%;
									text-align:right;
									color: #142238;
								'                          	
							>
								Seleccione los datos para solicitar su Cotización.
							</div>
						</td>
					</tr>
				</table>
			";			
			return $presentar;
		}
	}
?>