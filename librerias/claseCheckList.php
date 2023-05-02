<?php
	class claseCheckList
	{
		public static function show($id,$name,$class,$position,$width,$height,$left,$top,$visibility,$labelCaption,$labelClass,$labelColor,$onclick,$valuecheck)
		{
			$mostrar="
				<label><input type='checkbox' class='' id='$id' name='chk_servicio' value='$valuecheck' onclick='js_checkServicios(this.id);'></input>
				</label>
				<label for='$id'
					style='
						color:$labelColor;
					'
					class='$labelClass'
				>
					$labelCaption
				</label>
			";
			return $mostrar;
		}
	}
?>