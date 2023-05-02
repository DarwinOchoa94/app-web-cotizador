<?php
	class claseSearchDialog {
		public static function show($backgroundMessage) {
			if (isset($_GET["action"])) {
				$mostrar="";				
			}

			$background=claseMessageBackGround::show($backgroundMessage);
			
			$mostrar="
				<div 
					id='divSearchDialogBackGround'
					class='div-search-dialog-background hidden'
					<!--onclick='apagarSearchDialog();'-->
				>
					<div 
						id='divSearchDialog'
						class='div-search-dialog demo-center'
					>
						<span onclick='apagarSearchDialog();' class='div-search-dialog__close'>x</span>
						<p class='div-search-dialog__combo-container search'>
							<input type='search' 
								id='txtSearch' 
								class='div-search-dialog__combo'
								placeholder='Buscar...' 													
								onfocus='loadSearchDialog(comboBoxId, this.value);'
								onkeydown='loadSearchDialog(comboBoxId, this.value);'
							>
						</p>
						<div class='div-search-dialog__table table'>
							<table id='tblSearchDialog' rowId='' style='cursor:default;'>
							</table>
						</div>
						<div class='div-search-dialog__button-container'>
							".claseButton::show("btnAceptar", "div-search-dialog__button button button-blue", "ACEPTAR", "", "AceptarDialog();")."
							".claseButton::show("btnCancelar", "div-search-dialog__button button button-blue", "CANCELAR", "", "apagarSearchDialog();")."
						</div>
					</div>
				</div>

				<script language='javaScript'>
					function enecenderSearchDialog(comboBoxId) {
						var divSearchDialogBackGround = document.getElementById('divSearchDialogBackGround');
						var txtSearch = document.getElementById('txtSearch');
						var screenScrollTop = window.scrollY;

						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						divSearchDialogBackGround.classList.remove('hidden');
						txtSearch.value='';
						txtSearch.comboBoxId=comboBoxId;
						txtSearch.focus();

					}
					
					function apagarSearchDialog() {
						var divSearchDialogBackGround = document.getElementById('divSearchDialogBackGround');
						var screenScrollTop = window.scrollY;

						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';						
						divSearchDialogBackGround.classList.add('hidden');

					}
					
					function loadSearchDialog(comboBoxId,valor) {
						var empresa = document.body.getAttribute('empresa');
						var cmbViaEmbarque   = document.getElementById('cmbViaEmbarque');
						var viaEmbarqueId = ((cmbViaEmbarque !== null)?cmbViaEmbarque.value:'');
						var purl=\"./index.php?action=cargarGridSearchDialog&comboBoxId=\"+comboBoxId+\"&valor=\"+valor+\"&viaEmbarqueId=\"+viaEmbarqueId+\"&empresa=\"+empresa;
						var content=getContent(purl);
						document.getElementById(\"tblSearchDialog\").innerHTML=content;
					}
				</script>
			";
			
			return $mostrar;
		}
		
		public static function cargarGridSearchDialog()
		{
			$comboBoxId	  = $_GET["comboBoxId"];
			$valor	 	  = $_GET["valor"];
			$viaEmbarqueId= $_GET["viaEmbarqueId"];	
			$empresa	  = $_GET["empresa"];
			$parametro	  = "";
			switch($comboBoxId)
			{
				case "cmbCliente":
					$parametro	  = "CLI";
					break;
				case "txtCliente":
					$parametro	  = "CLINEW";
					break;
				case "cmbPuertoOrigen":
					$parametro	  = "PUORI";
					break;
				case "cmbPuertoDestino":
					$parametro	  = "PUORI";
					break;
				case "cmbCiudad":
					$parametro	  = "PAIS";
					break;
				case "cmbEmbalaje":
					$parametro	  = "EMB";
					break;
				case "cmbNaviera":
					$parametro	  = "NAV";
					break;
			}
			$strSQL="";
			$strSQL = "EXEC $empresa..WEB_COTIZADOR_SELECT_COMBOBOX_DIALOG '$parametro','$valor','$viaEmbarqueId'";
			//global $conn, $class_fn_basic;
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();
			//$rs  =  $conn->db_query( $strSQL );
			$rs =  $baseDatos->db_query( $strSQL );
			$baseDatos->desconectarDB();
			$mostrar="";
			$mostrar="
				<tbody class='table-body' 
					style='
						width:'100%'; 
					'
				>
			";
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				//$codigo = $class_fn_basic->sysGetDataFieldSrv( $row[ 'Codigo' ] );
				//$nombre = $class_fn_basic->sysGetDataFieldSrv( $row[ 'Nombre' ] );
				//$id		= $class_fn_basic->sysGetDataFieldSrv( $row[ 'ID' ] );
				$codigo = $baseDatos->sysGetDataFieldSrv( $row[ 'Codigo' ] );
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ 'Nombre' ] );
				$id		= $baseDatos->sysGetDataFieldSrv( $row[ 'ID' ] );
				$mostrar.="
					<tr id='tr-$id'
						onclick='
							limpiarGrid(\"tblSearchDialog\",\"#FFFFFF\",\"#F6F9FB\");
							this.style.background=\"#7ECADA\";
							document.getElementById(\"txtSearch\").value=\"$nombre\";
							document.getElementById(\"tblSearchDialog\").setAttribute(\"rowId\",\"tr-$id\");
						'
						ondblclick='selectItemComboBox(\"$comboBoxId\",\"$id\");'
					>
					  <td id='thCode-$id' class='div-search-dialog__table__column-1'>$codigo</td>
					  <td id='thName-$id' class='div-search-dialog__table__column-2'>$nombre</td>
					  <td id='thId-$id' class='div-search-dialog__table__column-3'>$id</td>
					</tr>	
				";
			}
			$mostrar.="
				</tbody>
			";
			return $mostrar;
		}
	}
?>