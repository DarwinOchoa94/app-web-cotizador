<?php
class claseLabel
{
	public static function show($id, $forId, $class, $caption)
	{
		$mostrar = "
				<label id='$id' class='$class'>$caption</label>
			";

		return $mostrar;
	}
}
