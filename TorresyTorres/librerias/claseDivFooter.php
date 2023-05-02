<?php
	class claseDivFooter {
		public static function show() {
			$year = date("Y");
			$mostrar = "
				<footer class='main-footer'>
					© Copyright {$year} <span style='font-weight: bold; font-size: 1.1em;'>Grupo Torres & Torres</span>
				</footer>
			";			
			return $mostrar;
		}
	}
?>