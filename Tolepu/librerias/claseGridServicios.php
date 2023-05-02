<?php
	class claseGridServicios
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
							  <th style='width:10%' align='center'>Codigo</th>
							  <th style='width:30%' align='center'>Servicio</th>
							  <th style='width:5%' align='center'>Cant.</th>
							  <th style='width:10%' align='right'>Costo Unit</th>
							  <th style='width:10%' align='right'>Costo Min</th>
							  <th style='width:35%' align='center'>Observaciones</th>
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
			";
			return $presentar;
		}
		
		public static function loadServicios()
		{
			$cotizacionId = $_GET["cotizacionId"];
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();				
			$str_SQL 		  = "";
			$str_SQL = "
				TOLEPU..WEB_COTIZADOR_SELECT_SERVICIOS '$cotizacionId'
			";
			$rs  =  $baseDatos->db_query( $str_SQL );
			$baseDatos->desconectarDB();
			$contadorServicios=0;
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
				$contadorServicios++;
				$codigo = $baseDatos->sysGetDataFieldSrv( $row[ 'Codigo' ] );
				$servicio = $baseDatos->sysGetDataFieldSrv( $row[ 'Servicio' ] );
				$cantidad = $baseDatos->sysGetDataFieldSrv( $row[ 'Cantidad' ] );
				$costoUnitario = $baseDatos->sysGetDataFieldSrv( $row[ 'CostoUnitario' ] );
				$costoMinimo = $baseDatos->sysGetDataFieldSrv( $row[ 'CostoMinimo' ] );
				$observaciones = $baseDatos->sysGetDataFieldSrv( $row[ 'Observaciones' ] );
				$mostrar.="".
					"<tr>".
					  "<th style='width:10%;color:blue;font-size:9px;' align='left'>$codigo</th>".
					  "<th style='width:30%;color:blue;font-size:9px;' align='left'>$servicio</th>".
					  "<th style='width:5%;color:blue;font-size:9px;' align='right'>$cantidad</th>".
					  "<th style='width:10%;color:blue;font-size:9px;' align='right'>$costoUnitario</th>".
					  "<th style='width:10%;color:blue;font-size:9px;' align='right'>$costoMinimo</th>".
					  "<th style='width:35%;color:blue;font-size:9px;' align='left'>$observaciones</th>".
					"</tr>".	
				"";
			}
			$mostrar.="".
				"</tbody>".
			"";
			return "{'mensaje':\"".$mostrar."\",'success':'true','contadorServicios':".$contadorServicios."}";
		}
	}
?>