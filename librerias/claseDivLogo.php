<?php
	class claseDivLogo
	{
		public static function show($imagen,$width)
		{
			$presentar="
				<div align='center'>
					<img src='$imagen'
						style='
							width:$width;
							vertical-align:middle;
						'
					>
				</div>
			";			
			return $presentar;
		}
	}
?>