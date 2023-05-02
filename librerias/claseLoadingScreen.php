<?php
	class claseLoadingScreen
	{
		public static function show()
		{
			$presentar="
				<div
					id='divLoadingScreen'
					style='
						background:url(../../Framework/images/Tolepu/w8loading.gif);
						background-color:white;
						background-size:70px 70px;
						background-repeat:no-repeat;
						background-position:center center;
						position:absolute;
						left:0px;
						top:0px;
						width:125px;
						height:125px;
						opacity:0.8;
						visibility:hidden;
						z-index:1;
						--border-bottom-left-radius:50%;
					'
				>
					
				</div>
				
				<script language='javaScript'>
					function enecenderLoadingScreen()
					{
						var screenScrollTop = window.scrollY;
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						var anchoDocumento = screen.width;
						var altoDocumento = screen.height;
						var elLeft = ( anchoDocumento / 2 );
						var elTop = ( altoDocumento / 2 );
						var divLoadingScreen 	= document.getElementById('divLoadingScreen');

						divLoadingScreen.style.width	= anchoDocumento +'px';
						divLoadingScreen.style.height	= altoDocumento +'px';
						//divLoadingScreen.style.left = elLeft+'px';
						//divLoadingScreen.style.top 	= elTop+'px';
						divLoadingScreen.style.visibility='visible';
					}
					function apagarLoadingScreen()
					{
						document.body.style.overflow='auto';
						var divLoadingScreen = document.getElementById('divLoadingScreen');
						divLoadingScreen.style.width='800px';
						divLoadingScreen.style.height='600px';
						divLoadingScreen.style.visibility='hidden';
					}
				</script>
			";
			
			return $presentar;
		}
	}
?>
