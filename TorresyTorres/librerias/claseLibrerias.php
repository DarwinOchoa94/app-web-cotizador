<?php
	$directorioLibs = opendir("../TorresyTorres/librerias");
	
	while (false !== ($archivo = readdir($directorioLibs)))
	{
		if (substr($archivo,0,5)=="clase")
		{
			$archivoClases="../TorresyTorres/librerias/".$archivo;
			include_once($archivoClases);
		}
	}
?>			
