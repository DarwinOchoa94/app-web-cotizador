<?php
	class claseOption
	{
		public static function show($id,$name,$class,$position,$width,$height,$left,$top,$visibility,$labelCaption,$labelClass,$labelColor,$onclick)
		{
			$mostrar="
				<label
					class='$class'
					onclick='$onclick'
					style='
						position:$position;
						width:$width;
						height:$height;
						left:$left;
						top:$top;
						visibility:$visibility;
					'
				>
					<input id='$id' name='$name' class='focus' type='radio' checked='' style='cursor:pointer;'>
					</input>
					<span class='radio'>
					<span>
				</label>
				<label for='$id'
					style='
						color:$labelColor;
						cursor:pointer;
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