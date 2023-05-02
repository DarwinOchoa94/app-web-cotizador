<?php
	class claseDivTipoAgenteDialog
	{
		public static function load()
		{
			$mostrar="
				<div 
					id='divTipoAgenteDialogBackGround'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:800px;
						height:600px;
						background:black;
						opacity:0.7;
						visibility:hidden;
						z-index:100;
					'
				>
				</div>
				<div 
					id='divTipoAgenteDialog' 
					style='
						position:absolute;
						left:0px; 
						top:0px;
						width:800px;
						height:400px;
						visibility:hidden; 
						z-index:110; 
					'
				>
					<div class='container-agente'>
						<div class='pregunta-agente'>
							<h1 class='titulo-agente'>¿con quién vas ha cotizar?</h1>
						</div>
						<div class='button-group-agente'>
							<button id = 'btnAgenteExterior' class='button button-orange button-agente'>Agente Exterior</button>
							<button id = 'btnAgenteLocal' class='button button-orange button-agente'>Agente Local</button>
						</div>
					</div>
				</div>
				<script language='javaScript'>
					function encenderDivTipoAgenteDialog()
					{
						var screenScrollTop = window.scrollY;
						var anchoDocumento = screen.width;
						var altoDocumento  = screen.height;
						var elLeft = (anchoDocumento - parseFloat(divTipoAgenteDialog.style.width))/2;
						var elTop = (altoDocumento - parseFloat(divTipoAgenteDialog.style.height))/2;
						
						var divTipoAgenteDialogBackGround = document.getElementById('divTipoAgenteDialogBackGround');
						var divTipoAgenteDialog = document.getElementById('divTipoAgenteDialog');
						var btnAgenteExterior = document.getElementById('btnAgenteExterior');
						
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						divTipoAgenteDialogBackGround.style.width=anchoDocumento+'px';
						divTipoAgenteDialogBackGround.style.height=document.body.clientHeight+'px';
						divTipoAgenteDialogBackGround.style.visibility='visible';
						divTipoAgenteDialog.style.visibility='visible';
						
						divTipoAgenteDialog.style.left = elLeft+'px';
						divTipoAgenteDialog.style.top = elTop+'px';
						
						btnAgenteExterior.addEventListener('click',apagarDivTipoAgenteDialog);
					}

					function apagarDivTipoAgenteDialog()
					{
						document.body.style.overflow='auto';
						
						var divTipoAgenteDialogBackGround = document.getElementById('divTipoAgenteDialogBackGround');
						var divTipoAgenteDialog = document.getElementById('divTipoAgenteDialog');
						
						divTipoAgenteDialogBackGround.style.width='800px';
						divTipoAgenteDialogBackGround.style.visibility='hidden';
						divTipoAgenteDialog.style.visibility='hidden';
					}
				</script>   
			";
			return $mostrar;
		}
	}
?>