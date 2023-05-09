<?php
class claseDatePicker
{
	public static function show($id, $class, $name, $value, $min, $max, $onclick)
	{
		$mostrar = "<input type='date' class=$class style='z-index: 1; position: relative' id=$id name=$name value=$value min=$min max=$max>";
		return $mostrar;
	}
}
