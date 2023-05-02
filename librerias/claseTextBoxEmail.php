<?php
	class claseTextBoxEmail
	{
		public static $string=1;
		
		public static function show($id,$class,$position,$width,$height,$left,$top,$visibility,$tipoDato,$maxlength)
		{
			$presentar="
				<p class='$class'
					style='
						position:$position;
						left:$left;
						top:$top;
						visibility:$visibility;
					'
				>
					<input 
						id='$id'
						type='email'
						class='$class'
						placeholder='usuario@dominio.com'
						maxlength='$maxlength'
						style='
							width:$width;
							height:$height;
						'
						onblur='validarEmail(this.id)'
					>
				</p>
			";
			
			return $presentar;
		}
	}

?>