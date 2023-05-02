<?php
	class claseBitacora
	{
		public static function insert($logMessage)
		{
//			print_r($logMessage,false);
			$archivo = "../logs/login.txt";			
			$gestor = fopen($archivo,"a+");
			fwrite($gestor, "\n".$logMessage);
			fclose($gestor);
		}
	}
?>