<?php
	class claseSwitch
	{
		public static function show($id,$class,$position,$width,$height,$left,$top,$visibility,$captionTrue,$captionFalse,$onchange,$title)
		{
			$mostrar="
					<span
						class='$class'
						title='$title'
						style='
							position:$position;
							width:$width;
							height:$height;
							left:$left;
							top:$top;
							visibility:$visibility;
							font-weight:bold;
						'
						onchange='$onchange'
					>
						<input id='$id' 
							type='checkbox'
							checked='true'
						>
						<label for='$id' 
							data-on='$captionTrue' 
							data-off='$captionFalse'
							style='cursor:pointer;'
						>
						</label>					
					</span>
			";
			return $mostrar;
		}
	}
?>