<?php
	class claseDivMainMovil
	{
		public static function show()
		{
			$divHeader	= claseDivHeader::show();
			$divBody	= claseDivBody::show("");
			$divFooter	= claseDivFooter::show();

			$mostrar="
				<div id='divHeader'>
					".$divHeader."
				</div>
				<div id='divMain' style='background-color:#231F20;overflow:auto;height:440px;'>
					<table cellspacing='0' cellpadding='0' width='100%'>
						<tr>
							<td>
								".$divBody."
							</td>
						</tr>
						<tr>
							<td>
								".$divFooter."
							</td>
						</tr>
					</table>
				</div>
			";
			return $mostrar;
		}
	}
?>