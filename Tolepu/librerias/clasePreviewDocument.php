<?php
	class clasePreviewDocument
	{
		public static function load()
		{
			$mostrar="
				<div id='divPreviewDocumentBackGround' class='container-preview-background'>
					<div id='divPreviewDocument' class='container-preview'>
						<div class='header-preview'>
							<h1 id='h1TituloPreview' class='titulo-preview'>Vista Previa del Email</h1>
						</div>
						<div id='divVisorEmail'class='visor-email'>
						</div>
						<div class='button-group-enviar-mail'>
							<button class='button button-blue button-email' onclick='apagarPreviewDocument();enviarMail();'>Enviar Email</button>
							<button class='button button-blue button-email' onclick='apagarPreviewDocument();'>Cancelar</button>
						</div>
					</div>
				</div>				
				<script language='javaScript'>
					function encenderPreviewDocument() {
						var error = 1;
						var icon  = 1;
						var funcion = '';
						var incotermsId = document.getElementById('cmbIncoterms').value;
						var sJsonArrayAgentes=obtenerAgentes();
						var sJsonDataObjectInicio=getDataObjectInicio();						
						var sJsonDataObjectIncoterms=getDataObjectIncoterms();
						var purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=validarEnvio&incotermsId='+incotermsId;
						var content=getContent(purl);
						content=JSON.parse(content);
						purl = './index.php?action=ejecutarAjax&clase=claseDivBodyIncoterms'+content.Incoterms+'&metodo=saveRecord&dataArrayAgentes='+sJsonArrayAgentes+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms+'&PreviewMail=true&PreviewTarifas=false';
						content	= getContent(purl);
						content	= JSON.parse(content);
						error 	= parseInt(content[0]['error']);
						icon	= (error == -1)?3:((error == 0)?4:1);
						funcion = '';
						if ( ( error == 2 ) && ( estadoToggle == false ) ) {
							encenderMessageBox(icon,'',content[0]['message'],funcion);
							slideToggle('btnListaAgentes','Lista de Agentes del Exterior');
							return;
						}
						if ( error !== 0 ) {
							showObligatorios();
							encenderMessageBox(icon,'',content[0]['message'],funcion);
							return;
						}
						if ( error == 0 ) {
							document.getElementById(\"divVisorEmail\").innerHTML=content[0]['message'];
							document.getElementById(\"h1TituloPreview\").innerHTML=content[0]['titulo'];
						}
						
						var screenScrollTop = window.scrollY;
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						var divPreviewDocumentBackGround = document.getElementById('divPreviewDocumentBackGround');
						divPreviewDocumentBackGround.classList.add('container-preview-background-show');
						
					}
					
					function apagarPreviewDocument() {
						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';
						
						var divPreviewDocumentBackGround = document.getElementById('divPreviewDocumentBackGround');
						divPreviewDocumentBackGround.classList.remove('container-preview-background-show');
					}
				</script>
			";
			
			return $mostrar;
		}
	}
?>