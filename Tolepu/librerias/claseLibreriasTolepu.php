<?php
	$directorioLibs = opendir("../Tolepu/librerias");
	
	while (false !== ($archivo = readdir($directorioLibs)))
	{
		if (substr($archivo,0,5)=="clase")
		{
			$archivoClases="../Tolepu/librerias/".$archivo;
			include_once($archivoClases);
		}
	}
?>			
