<?php
	class claseButton {
		public static function show($id, $class, $caption, $imagen, $onclick, $tittle = '') {
			$mostrar = "
				<button
					id='$id'
					name='$id'
					class='$class'
					onclick='$onclick'
					tittle='$tittle'
				>
					<div>
						$imagen
					</div>
					$caption
				</button>
			";
			return $mostrar;
		}
	}
?>