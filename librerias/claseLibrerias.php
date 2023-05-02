<?php
	session_start();
	$directorioLibs = opendir("../librerias");
	
	while (false !== ($archivo = readdir($directorioLibs)))
	{
		if (substr($archivo,0,5)=="clase")
		{
			$archivoClases="../librerias/".$archivo;
			include_once($archivoClases);
		}
	}
?>			
