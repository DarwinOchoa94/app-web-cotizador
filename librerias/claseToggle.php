<?php
	class claseToggle {
		public static function show($id, $class, $buttonId, $buttonText) {
			$onclickButton = "validarButton(\"$buttonId\");";
			$mostrar = "
				<div id='$id'>
					<section class='$class'>
						<div id='divWrap' class='wrap'></div>
					</section>
					<a href='#' id='$buttonId' class='button button-white hidden button-toggle' onclick='$onclickButton'>$buttonText</a>
				</div>
			";
			return $mostrar;
		}
	}
?>