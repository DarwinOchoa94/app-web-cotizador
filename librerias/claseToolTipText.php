<?php
	class claseToolTipText
	{
		public static function show($color,$foreColor)
		{
			$presentar="
				<div
					id='divToolTipText'    
					class='tooltip tooltip-down'
					style='
						position:absolute;
						width:200px;
						height:20px;
						left:0px;
						top:0px;						
						border:1px solid $color;
						background:$color;
						color:$foreColor;
						opacity:1;
						visibility:hidden;
					'
				>
				</div>
				<script language='javaScript'>
					function encenderDivToolTipText(event,texto)
					{
						var x = event.clientX;
						var y = event.clientY;
						var divToolTipText = document.getElementById('divToolTipText');
						divToolTipText.style.left = x+'px';
						divToolTipText.style.top =  y+'px';	
						divToolTipText.style.visibility='visible';
						divToolTipText.innerHTML=texto;
					}
					function apagarDivToolTipText()
					{
						var divToolTipText = document.getElementById('divToolTipText');
						divToolTipText.innerHTML='';
						divToolTipText.style.visibility='hidden';
					}
				</script>
			";
		return $presentar;
		}
	}
?>