<?php
	class claseFrmTarifas
	{
		public static function show()
		{
			//Datos heredados
			$sJsonDataObject=$_POST["claseFrmTarifas"];
			$arrayDataObject = json_decode($sJsonDataObject,true);
			$clienteId=$arrayDataObject["ClienteID"];
			$tipoTramiteId=$arrayDataObject["TipoTramiteID"];
			$paisOrigenId=$arrayDataObject["PaisOrigenID"];
			$puertoOrigenId=$arrayDataObject["PuertoOrigenID"];
			$tipoCotizacionId=$arrayDataObject["TipoCotizacionID"];
			$incotermsId=$arrayDataObject["IncotermsID"];
			$agenteExteriorId=$arrayDataObject["AgenteExteriorID"];
			$agenteExteriorName=claseFrmTarifas::agenteName($agenteExteriorId);
			
			//Variables de la Pagina
			$lbltitulo="COTIZACIONES DEL AGENTE ".$agenteExteriorName;
			$lblCotizaciones="Cotizaciones:";
			$lblServicios="Detalle de los Servicios:";

			$onClicBtnListo="enviarMail();";
			$onClicBtnCancelar="closeWindows();";
			
			/*$visibilityPartidaArancelaria="hidden";
			if ( in_array($tipoTramiteId,array("0000000016","0000000005","0000000006","0000000003","0000000014"))  ) 
			{
				$visibilityPartidaArancelaria="visible";
			}*/

			$mostrar="
				<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
					<title>Formulario para la Solicitud de Cotizacion</title>
					<link rel='stylesheet' href='../css/main_flat.css'>
					<link rel='stylesheet' href='../css/demo_flat.css'>
					<script type='text/javaScript' src='../js/librerias.js'></script>
					<script type='text/javaScript' src='../Tolepu/js/libreriasTolepu.js'></script>	
					<style type='text/css'>".claseSkin::extraerSkin(claseSkin::$skinNormal)."</style>
				</head>
				<body style='background:url(../../Framework/images/Tolepu/fondoFormularioInformacion.jpg);'>
					".claseLabel::show("lblTitulo", "headerFormulario", "absolute", 1200, 1, 130, 30, "visible", "red", $lbltitulo)."
					".claseDiv::show("divInfoCotizaciones", "", "absolute", 1060, 580, 70, 70, "white")."					
					".claseLabel::show("lblCotizaciones", "detailFormulario", "absolute", 300, 1, 100, 90, "visible", "black", $lblCotizaciones)."
					".claseGridCotizaciones::show("grdCotizaciones", "table", "absolute", 1000, 170, 100, 90, "visible")."
					".claseLabel::show("lblServicios", "detailFormulario", "absolute", 300, 1, 100, 340, "visible", "black", $lblServicios)."
					".claseGridServicios::show("grdServicios", "table", "absolute", 1000, 200, 100, 360, "visible")."
					
				</body>
				<script language='javaScript'>
					window.resizeTo(1220,760);
					window.screenX = 50;
					window.screenY = 50;
					
					//Info General
					var lcClienteId		= '".$clienteId."';
					var lcTipoTramiteId	= '".$tipoTramiteId."';
					var lcPaisOrigenId	= '".$paisOrigenId."';
					var lcPuertoOrigenId	= '".$puertoOrigenId."';
					var lcTipoCotizacionId	= '".$tipoCotizacionId."';
					var lcIncotermsId		= '".$incotermsId."';
					var lcAgenteExteriorId	= '".$agenteExteriorId."';
					
					var array={
						\"ClienteID\":lcClienteId,
						\"TipoTramiteID\":lcTipoTramiteId,
						\"PaisOrigenID\":lcPaisOrigenId,
						\"PuertoOrigenID\":lcPuertoOrigenId,
						\"TipoCotizacionID\":lcTipoCotizacionId,
						\"IncotermsID\":lcIncotermsId,
						\"AgenteExteriorID\":lcAgenteExteriorId
					};
					var stringJson = JSON.stringify(array);
					//alert(stringJson);
					
					var purl = './index.php?action=ejecutarAjax&clase=claseGridCotizaciones&metodo=loadCotizaciones&variables='+stringJson;
					var content=eval(\"(\"+getContent(purl)+\")\");
					if ( content.contadorCotizacion == 0 )
					{
						alert('No hay Cotizaciones para este Agente.');
						window.close();
					}
					else
					{
						document.getElementById('grdCotizaciones').innerHTML=content.mensaje;
					}
				</script>
			";

			return $mostrar;
		}
		public static function agenteName($registroId)
		{
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();
			$strSQL="";
			$strSQL = "EXEC TOLEPU..TRM_AgentesExternos_SeekID '$registroId'";
			$rs =  $baseDatos->db_query( $strSQL );
			$baseDatos->desconectarDB();
			$mostrar="";
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ "Nombre" ] );
				$mostrar= "$nombre";
			}
			return $mostrar;
		}
	}
?>