<?php
	class claseComboBox {
		public static function show($comboId, $class, $caption, $onfocus, $onchange, $onmouseover="", $onmouseout="", $onmousemove="") {
			$mostrar = "
				<div class='$class'>						
					<select
						id='$comboId'
						name='$comboId'
						focusinicial='0'
						onfocus='$onfocus'
						onchange='$onchange'
						onmousemove='$onmousemove'
						onmouseover='$onmouseover'
						onmouseout='$onmouseout'
					>
						<option value=\"\">$caption</option>
					</select>
				</div>
			";
			
			return $mostrar;
		}
		
		public static function loadComboBox() {
			$parametro     = $_GET["parametro"];
			$viaEmbarqueId = $_GET["viaEmbarqueId"];
			$empresa       = $_GET["empresa"];
			$baseDatos     = new claseDataBase();
			$baseDatos->conectarDB();
			
			$strSQL = "";
			$strSQL = "EXEC $empresa..WEB_COTIZADOR_SELECT_COMBOBOX '$parametro','$viaEmbarqueId'";
			$rs     =  $baseDatos->db_query( $strSQL );
			$baseDatos->desconectarDB();
			
			$mostrar       = "";
			$listaComboBox = "";
			$dialog        = (in_array($parametro,array( "CLI","PAIS","PUORI","EMB","NAV"))?"<option value='optDialog'>Buscar...</option>":""); 
			while ($row  =  $baseDatos->db_fetch_array( $rs )) 	{
				$id 	= $baseDatos->sysGetDataFieldSrv( $row[ "ID" ] );
				$codigo = $baseDatos->sysGetDataFieldSrv( $row[ "Codigo" ] );
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ "Nombre" ] );
				$listaComboBox.= "
					<option id='thName-$id' value='$id'>[$codigo] $nombre</option>
				";
			}
			$listaComboBox.=$dialog;
			$mostrar=$listaComboBox;
			return $mostrar;
		}
	}
?>