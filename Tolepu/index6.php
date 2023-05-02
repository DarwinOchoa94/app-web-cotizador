<?php
$dir = 'files/filesTemp/';
$filePDF=$dir."archivo.pdf";
$file2PDF=$dir."archivo2.pdf";

if ( !copy($filePDF,$file2PDF) )
{
	echo "<script> alert(\"Error al intentar subir el archivo ".$dir."D:\Filtros.doc"."\");</script>";
}
else
{
	echo "<script> alert(\"El archivo "."Filtros.doc"." se ha subido al servidor correctamente.\");</script>";
}
?>