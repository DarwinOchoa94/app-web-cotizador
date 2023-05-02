<?php
	class claseMessageBoxConfirm {
		public static function load($backgroundMessage) {
			$background=claseMessageBackGround::show($backgroundMessage);
			
			$mostrar="
				<div id='divMessageBoxConfirmBackGround' class='screen-message-confirm-background hidden'>
					<div id='divMessageBoxConfirm' class='screen-message-confirm demo-center' >
					</div>
				</div>
				<script language='javaScript'>
					function encenderMessageBoxConfirm(icon,tittle,caption,funcionSi,funcionNo) {
						var screenScrollTop = window.scrollY;
						var divMessageBoxConfirmBackGround = document.getElementById('divMessageBoxConfirmBackGround');
						var purl    = '';
						var content = '';
						purl = './index.php?action=ejecutarAjax&clase=claseMessageBoxConfirm&metodo=show&icon='+icon+'&tittle='+tittle+'&caption='+caption+'&funcionSi='+funcionSi+'&funcionNo='+funcionNo;
						content = getContent(purl);
						document.getElementById('divMessageBoxConfirm').innerHTML = content;
						
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';

						divMessageBoxConfirmBackGround.classList.remove('hidden');
					}
					
					function apagarMessageBoxConfirm() {
						var divMessageBoxConfirmBackGround = document.getElementById('divMessageBoxConfirmBackGround');
						var screenScrollTop = window.scrollY;

						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';						
						divMessageBoxConfirmBackGround.classList.add('hidden');
					}
				</script>
			";
			
			return $mostrar;
		}
		
		public static function show() {
			$iconMessage   = $_GET["icon"];
			$tittle 	   = $_GET["tittle"];
			$caption 	   = $_GET["caption"];
			$funcionAccept = $_GET["funcionSi"];
			$funcionCancel = $_GET["funcionNo"];
			
			$btnConfirmMessage = "
				apagarMessageBoxConfirm();
				$funcionAccept
			";
			$btnCancelMessage  = "
				apagarMessageBoxConfirm();
				$funcionCancel
			";
			$iconPath = claseIcons::show($iconMessage);
			$icon     = claseImage::show($iconPath, "icono del mensaje", "icon-message");
			$buttonAccept = claseButton::show("btnConfirmMessage", "button button-blue screen-message-confirm__button", "ACEPTAR", "", $btnConfirmMessage);
			$buttonCancel = claseButton::show("btnCancelMessage", "button button-blue screen-message-confirm__button", "CANCELAR", "", $btnCancelMessage);
			
			$mostrar="
				<div class='screen-message-confirm__body-container'>
					{$icon}
					<h1 class='labelFormulario'>{$caption}</h1>
				</div>
				<div class='screen-message-confirm__button-container'>
					{$buttonAccept}{$buttonCancel}
				</div>
			";
			return $mostrar;
		}
	}
?>