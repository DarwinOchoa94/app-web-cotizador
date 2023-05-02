<?php
	class claseSearch {
		public static function show($id, $class, $placeholder, $onchange, $onfocus, $oninput, $onblur, $onselect, $listId) {
			$mostrar = "
				<p class='{$class}'>
                    <input 
                        id='{$id}'
                        name='{$id}'
                        type='search'
						data-id=''
                        placeholder='{$placeholder}'
                        onchange='{$onchange}'
						onselect='{$onselect}'
                        onfocus='{$onfocus}'
                        oninput='{$oninput}'
                        onblur='{$onblur}'
                        list='{$listId}'
                    >
					<datalist id='{$listId}'>
					</datalist>
                </p>
			";
			
			return $mostrar;
		}

		public static function loadListBox() {
			$parametro     = $_GET["parametro"];
			$empresa       = $_GET["empresa"];
			$valor         = $_GET["valor"];  
			$viaEmbarqueId = $_GET["viaEmbarqueId"];

			$valor	= str_replace("'","",$valor);
			$valor 	= str_replace("\"","",$valor);

			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();

			$strSQL = "";
			$strSQL = "EXEC TOLEPU.DBO.WEB_COTIZADOR_SELECT_LISTBOX '$parametro','$empresa','$valor','$viaEmbarqueId'";

			$rs =  $baseDatos->db_query( $strSQL );
			$baseDatos->desconectarDB();
			
			$mostrar="";
			$listaComboBox = "";
			//$dialog = (in_array($parametro, array( "CLI","PAIS","PUORI","EMB","NAV"))?"<option value='optDialog'>Buscar...</option>":"");
			$dialog = "";

			while ($row  =  $baseDatos->db_fetch_array( $rs )) {
				$id 	= $baseDatos->sysGetDataFieldSrv( $row[ "ID" ] );
				$codigo = $baseDatos->sysGetDataFieldSrv( $row[ "Codigo" ] );
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ "Nombre" ] );

				$listaComboBox.= "
					<option id='thName-{$id}' value='{$nombre}' data-id='{$id}'></option>
				";
			}

			$listaComboBox.=$dialog;
			$mostrar=$listaComboBox;
			return $mostrar;

		}
	}

?>