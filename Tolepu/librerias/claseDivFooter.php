<?php
	class claseDivFooter
	{
		public static function show()
		{
			$presentar="
				<footer>
					<table cellspacing='0' cellpadding='0' width='100%'>
						<tr>
							<td	
								style='
									width:100%;
									background-color:#001427;
									text-align:center;
									color:white;
									font-size:.8em;
								'
							>
								© Copyright 2017 <span style='font-weight: bold; font-size: 1.1em;'>Grupo Torres & Torres</span>
							</td>
						</tr>
					</table>
				</footer>
			";			
			return $presentar;
		}
	}
?>
