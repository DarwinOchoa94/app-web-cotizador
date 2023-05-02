<?php
	class claseDiv
	{
		public static function show($id,$class,$position,$width,$height,$left,$top,$color)
		{
			$presentar="
				<div
					
					id=$id
					style='
						position:$position;
						width:$width;
						height:$height;
						left:$left;
						top:$top;						
						border:1px solid #c7c7c7;
						background:$color;
						opacity:0.5;
					'
				>
				</div>
			";
		return $presentar;
		}
	}
?>