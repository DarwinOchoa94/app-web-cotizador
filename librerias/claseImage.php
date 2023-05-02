<?php
	class claseImage {
		public static function show($url,$alt,$class) {
			$mostrar="
				<img src='$url' alt='$alt' class='$class'>
			";			
			return $mostrar;
		}
	}
?>