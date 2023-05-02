<?php
	class claseMessageBox {
		public static function load($backgroundMessage) {
			$background=claseMessageBackGround::show($backgroundMessage);
						
			$mostrar="
				<div id='divMessageBoxBackGround' class='screen-message-background hidden'>
					<div id='divMessageBox' class='screen-message demo-center' >
					</div>
				</div>
					
				<script language='javaScript'>
					function encenderMessageBox(icon,tittle,caption,funcion) {
						var screenScrollTop = window.scrollY;
						var divMessageBoxBackGround = document.getElementById('divMessageBoxBackGround');
						var purl    = '';
						var content = '';
						
						purl = './index.php?action=ejecutarAjax&clase=claseMessageBox&metodo=show&icon='+icon+'&tittle='+tittle+'&caption='+caption+'&funcion='+funcion;
						content = getContent(purl);
						document.getElementById(\"divMessageBox\").innerHTML = content;
						
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';

						divMessageBoxBackGround.classList.remove('hidden');
					}
					
					function apagarMessageBox() {
						var divMessageBoxBackGround = document.getElementById('divMessageBoxBackGround');
						var screenScrollTop = window.scrollY;

						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';						
						divMessageBoxBackGround.classList.add('hidden');
					}
				</script>
					
					
			";	
			return $mostrar;
		}
		
		public static function show() {
			$iconMessage  = $_GET["icon"];
			$tittle 	  = $_GET["tittle"];
			$caption 	  = $_GET["caption"];
			$funcion 	  = $_GET["funcion"];
			
			$onclick     = "
				apagarMessageBox();
				$funcion
			";
			$iconPath     = claseIcons::show($iconMessage);
			$icon         = claseImage::show($iconPath, "icono del mensaje", "icon-message");
			$buttonAccept = claseButton::show("btnOkMessage", "button button-blue screen-message__button", "ACEPTAR", "", $onclick);

			$mostrar     = "
				<div class='screen-message__body-container'>
					{$icon}
					<h1 class='labelFormulario'>{$caption}</h1>
				</div>
				<div class='screen-message__button-container'>
					{$buttonAccept}
				</div>
			";
			return $mostrar;
		}
	}
?>