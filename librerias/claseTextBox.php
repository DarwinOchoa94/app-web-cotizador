<?php
	class claseTextBox {
		public static $string  = 1;
		public static $numeric = 2;
		public static $money   = 3;
		
		public static function show($id, $type, $class, $tipoDato, $maxlength, $placeholder='', $onchange='', $onfocus='', $oninput='') {
			if ( $tipoDato == claseTextBox::$string ) {
				$inputMask = "";
			}

			if ( $tipoDato == claseTextBox::$numeric ) {
				$inputMask = 0;
			}

			if ( $tipoDato == claseTextBox::$money ) {
				$inputMask = 0;
			}
				
			$mostrar = "
				<input 
					id='{$id}'
					name='{$id}'
					type='{$type}'
					class='{$class}'
					placeholder='{$placeholder}'
					onchange='{$onchange}'
					onfocus='{$onfocus}'
					oninput='{$oninput}'
					maxlength='{$maxlength}'
					value='{$inputMask}'
				>
			";
			
			return $mostrar;
		}
	}
?>