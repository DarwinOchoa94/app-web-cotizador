<?php
	class claseTextArea {
		public static $string=1;
		
		public static function show($id, $class, $tipoDato, $maxlength, $placeholder) {
			$mostrar = "
				<textArea 
					id='$id'
					class='$class'
					maxlength='$maxlength'
					placeholder='$placeholder'
				></textarea>
			";
			
			return $mostrar;
		}
	}
?>