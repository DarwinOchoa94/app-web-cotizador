<?php
class claseComboBox
{
	public static function show($comboId, $class, $caption, $onfocus, $onchange, $onmouseover = "", $onmouseout = "", $onmousemove = "")
	{
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

	public static function showSearch($comboId, $class, $caption, $onfocus, $onchange)
	{
		$mostrar = "
				<div class='$class'>
					<select
						id='$comboId'
						focusinicial='0'
						onfocus='$onfocus'
						onchange='$onchange'>
					</select>
				</div>
			";

		return $mostrar;
	}

	public static function loadComboBox()
	{
		$parametro = $_GET["parametro"];
		$viaEmbarqueId = $_GET["viaEmbarqueId"];
		$empresa = $_GET["empresa"];
		$baseDatos = new claseDataBase();
		$baseDatos->conectarDB();

		$strSQL = "";
		$strSQL = "EXEC $empresa..WEB_COTIZADOR_SELECT_COMBOBOX '$parametro','$viaEmbarqueId'";
		$rs = $baseDatos->db_query($strSQL);
		$baseDatos->desconectarDB();

		$mostrar = "";
		$listaComboBox = "";
		$dialog = (in_array($parametro, array("CLI", "PAIS", "PUORI", "EMB", "NAV")) ? "<option value='optDialog'>Buscar...</option>" : "");
		while ($row = $baseDatos->db_fetch_array($rs)) {
			$id = $baseDatos->sysGetDataFieldSrv($row["ID"]);
			$codigo = $baseDatos->sysGetDataFieldSrv($row["Codigo"]);
			$nombre = $baseDatos->sysGetDataFieldSrv($row["Nombre"]);
			$listaComboBox .= "
					<option id='thName-$id' value='$id'>[$codigo] $nombre</option>
				";
		}
		$listaComboBox .= $dialog;
		$mostrar = $listaComboBox;
		return $mostrar;
	}

	public static function loadComboBoxV2()
	{
		$parametro 		= $_GET["parametro"];
		$isCode 		= filter_var($_GET["isCode"], FILTER_VALIDATE_BOOLEAN);
		$empresa 		= $_GET["empresa"];
		$baseDatos 		= new claseDataBase();
		$baseDatos->conectarDB();

		$strSQL = "";
		$strSQL = "EXEC $empresa..FDC_WEB_COTIZADOR_COMBOBOX_SELECT '$parametro'";
		$rs 	= $baseDatos->db_query($strSQL);
		$baseDatos->desconectarDB();

		$mostrar 		= "";
		$listaComboBox 	= "";
		while ($row = $baseDatos->db_fetch_array($rs)) {
			$id 		= $baseDatos->sysGetDataFieldSrv($row["ID"]);
			$codigo 	= $baseDatos->sysGetDataFieldSrv($row["Código"]);
			$nombre 	= $baseDatos->sysGetDataFieldSrv($row["Nombre"]);
			$extraData	= $baseDatos->sysGetDataFieldSrv($row["ExtraData"]);
			$name 		= $isCode ? $codigo : $nombre;
			$listaComboBox .= "
					<option id='thName-$id' value='$id'>$name</option>
				";
		}
		$mostrar = $listaComboBox;
		return $mostrar;
	}

	public static function loadComboBoxSearch()
	{
		$parametro 		= $_GET["parametro"];
		$isCode 		= filter_var($_GET["isCode"], FILTER_VALIDATE_BOOLEAN);
		$empresa 		= 'Tolepu';
		$numRegistros	= 5;
		$listaComboBox	= array();
		$baseDatos 		= new claseDataBase();
		$baseDatos->conectarDB();

		if (!isset($_POST['searchTerm'])) {
			$strSQL = "";
			$strSQL = "EXEC $empresa..FDC_WEB_COTIZADOR_COMBOBOX_SELECT '$parametro'";
			$rs 	= $baseDatos->db_query($strSQL);
			while ($row = $baseDatos->db_fetch_array($rs)) {
				$item		= [
					"id"		=> $row["ID"],
					"codigo"	=> $row["Código"],
					"nombre"	=> $row["Nombre"],
					"extraData"	=> $row["ExtraData"],
					"text"		=> $isCode ? $row["Código"] : $row["Nombre"]
				];
				array_push($listaComboBox, $item);
			}
		} else {
			$search = $_POST['searchTerm'];// Search text
			$strSQL = "";
			$strSQL = "EXEC $empresa..FDC_WEB_COTIZADOR_COMBOBOX_SELECT '$parametro', '', '%$search%'";
			$rs 	= $baseDatos->db_query($strSQL);
			while ($row = $baseDatos->db_fetch_array($rs)) {
				$item		= [
					"id"		=> $row["ID"],
					"codigo"	=> $row["Código"],
					"nombre"	=> $row["Nombre"],
					"extraData"	=> $row["ExtraData"],
					"text"		=> $isCode ? $row["Código"] : $row["Nombre"]
				];
				array_push($listaComboBox, $item);
			}
		}

		return json_encode($listaComboBox);
	}
}
?>