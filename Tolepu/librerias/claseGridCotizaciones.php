<?php
	class claseGridCotizaciones
	{
		public static function show($id,$class,$position,$width,$height,$left,$top,$visibility)
		{
			$presentar="
				<div
					class='$class'
					style='
						position:$position;
						width:$width;
						height:40px;
						left:$left;
						top:$top;							
						background:#d7ebf8;
					'
				>
					<table class='$class' style='width:100%;'>
						<thead class='table-head'>
							<tr>
							  <th style='width:10%' align='center'>#</th>
							  <th style='width:50%' align='center'>Cliente</th>
							  <th style='width:20%' align='center'>Numero</th>
							  <th style='width:20%' align='center'>Validez</th>
							</tr>
						</thead>
					</table>
				</div>
				<div
					class='$class'
					style='
						position:$position;
						overflow:auto;
						width:$width;
						height:$height;
						left:$left;
						top:".($top+40).";
					'
				>
					<table id='$id' 
						style='
							width:100%; 
						'
					>
					</table>
				</div>	
				
				<script language='javaScript'>
					function loadServicios(cotizacionId)
					{
						var purl = './index.php?action=ejecutarAjax&clase=claseGridServicios&metodo=loadServicios&cotizacionId='+cotizacionId;
						var content=eval(\"(\"+getContent(purl)+\")\");
						if ( content.contadorServicios == 0 )
						{
							alert('No hay Cotizaciones para este Agente.');
						}
						else
						{
							document.getElementById('grdServicios').innerHTML=content.mensaje;
						}
					}
				</script>
			";
			return $presentar;
		}
		
		public static function loadCotizaciones()
		{
			$variables = $_GET["variables"];
			$array = json_decode($variables,true);
			
			$clienteId			= $array["ClienteID"];
			$tipoTramiteId		= $array["TipoTramiteID"];
			$paisOrigenId		= $array["PaisOrigenID"];
			$puertoOrigenId		= $array["PuertoOrigenID"];
			$tipoCotizacionId	= $array["TipoCotizacionID"];
			$incotermsId		= $array["IncotermsID"];
			$agenteExteriorId		= $array["AgenteExteriorID"];
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();				
			$str_SQL 		  = "";
			$str_SQL = "
				TOLEPU..WEB_COTIZADOR_SELECT_COTIZACIONES '$clienteId', '$paisOrigenId','$puertoOrigenId','$tipoTramiteId','$tipoCotizacionId','$incotermsId','$agenteExteriorId'
			";
			$rs  =  $baseDatos->db_query( $str_SQL );
			$baseDatos->desconectarDB();
			$contadorCotizacion = 0;
			$mostrar="";
			$mostrar="".
				"<tbody class='table-body'". 
					"style='".
						"width:100%;".
					"'".
				">".
			"";
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$contadorCotizacion++;
				$cotizacionId = $baseDatos->sysGetDataFieldSrv( $row[ 'ID' ] );
				$numero = $baseDatos->sysGetDataFieldSrv( $row[ 'Numero' ] );
				$cliente = $baseDatos->sysGetDataFieldSrv( $row[ 'Cliente' ] );
				$vigencia = $baseDatos->sysGetDataFieldSrv( $row[ 'Vigencia' ] );
				$caducada = $baseDatos->sysGetDataFieldSrv( $row[ 'Caducada' ] );
				$colorFont=($caducada=="SI"?"red":"green");
				$mostrar.="".
					"<tr style='cursor:default;' onClick='loadServicios(&quot;$cotizacionId&quot;);'>".
					  "<th style='width:10%;color:black;' align='center'>$contadorCotizacion</th>".
					  "<th style='width:50%;color:black;' align='left'>$cliente</th>".
					  "<th style='width:20%;color:black;' align='center'>$numero</th>".
					  "<th style='width:20%;color:$colorFont;' align='center'>$vigencia</th>".
					"</tr>".	
				"";
			}
			$mostrar.="".
				"</tbody>".
			"";
			return "{'mensaje':\"".$mostrar."\",'success':'true','contadorCotizacion':".$contadorCotizacion."}";// ltrim(rtrim($presentar));
		}
	}
?>