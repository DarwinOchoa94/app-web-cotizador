<?php
require("../../Framework/include/connectPHP.php");
include_once("./librerias/claseLibrerias.php");	
if (!$conn->valid_connect())
{
	echo "ERROR EN CONEXION";
}
$mostrar=claseInicioCMS::show();
echo $mostrar;


//$baseDatos=new claseDataBase();
//$baseDatos->conectarDB();
//$presentar="OK";
$presentar="";
$presentar=claseDataBase::conectarDB();
//if ( !$presentar )
//{
	//$messageBox="Error Conexion";
//}

$tipocmb = "";
echo $presentar;


function combo($tipo)
{
	global $conn, $class_fn_basic;
	$str_SQL = "EXEC TOLEPU..WEB_COTIZADOR_SELECT_COMBOBOX '$tipo'";
	$rs  =  $conn->db_query( $str_SQL );
	$selectCombo = "";
	while ($row  =  $conn->db_fetch_array( $rs ))
	{
		$ID = $class_fn_basic->sysGetDataFieldSrv( $row[ "ID" ] );
		$Codigo = $class_fn_basic->sysGetDataFieldSrv( $row[ "Codigo" ] );
		$Nombre = $class_fn_basic->sysGetDataFieldSrv( $row[ "Nombre" ] );
		$selectCombo.= "<option value='$ID'>[$Codigo] $Nombre</option>";
	}
	return $selectCombo;
}
function cargarGrid()
{
	/*$mostrarGrid= "
			<tr>
			  <td style=\"width:5%\";>1</td>
			  <td style=\"width:20%\";>EUR</td>
			  <td style=\"width:70%\";>EUROPARTNERS MEXICO, S.A. DE CV</td>
			  <td style=\"width:5%\";>SI</td>
			  <td style=\"width:10%\";>
			  	<input type=\"checkbox\" name=\"checkbox\" id=\"checkbox\">
			  </td>
			</tr>	
		";*/
	global $conn, $class_fn_basic;
	$str_SQL = "";
	$paisOrigenId = $_GET["paisOrigenId"];
	$tipoTramiteId = $_GET["tipoTramiteId"];
	$tipoCotizacionId = $_GET["tipoCotizacionId"];
	$incotermsId = $_GET["incotermsId"];
	
	$str_SQL = "TOLEPU..WEB_COTIZADOR_SELECT_AGENTES '$paisOrigenId','$tipoTramiteId','$tipoCotizacionId','$incotermsId' ";
	$rs  =  $conn->db_query( $str_SQL );
	$mostrarGrid ="";
	$contadorAgente = 0;
	while ($row  =  $conn->db_fetch_array( $rs ))
	{
		$contadorAgente++;
		$codigo = $class_fn_basic->sysGetDataFieldSrv( $row[ "Codigo" ] );
		$nombre = $class_fn_basic->sysGetDataFieldSrv( $row[ "Nombre" ] );
		$autorizado = $class_fn_basic->sysGetDataFieldSrv( $row[ "Autorizado" ] );
		$mostrarGrid.= "
			<tr>
			  <td style=\"width:5%\";>$contadorAgente</td>
			  <td style=\"width:20%\";>$codigo</td>
			  <td style=\"width:60%\";>$nombre</td>
			  <td style=\"width:5%\";>$autorizado</td>
			  <td style=\"width:10%\";>
			  	<input type=\"checkbox\" name=\"checkbox\" id=\"checkbox\">
			  </td>
			</tr>	
		";
	}
	return $mostrarGrid;
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Flat UI</title>
  <link rel="stylesheet" href="../css/main_flat.css">
  <link rel="stylesheet" href="../css/demo_flat.css">
  <script language='javaScript'>
	function getContent(sURL)
	{
		var xmlhttp;
		if(window.XMLHttpRequest) 
		{
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", sURL, false);
			xmlhttp.send(null);
		} 
		else if (window.ActiveXObject) 
		{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			if(xmlhttp) 
			{
				xmlhttp.open("GET", sURL, false);
				xmlhttp.send();
			}
		}
		var content=xmlhttp.responseText;
		return content;
	}
	function cargarGridAgentes()
	{
		var paisOrigenId = document.getElementById("cmbPaisOrigen").value
		var tipoTramiteId = document.getElementById("cmbTipoTramite").value
		var tipoCotizacionId = document.getElementById("cmbTipoCotizacion").value
		var incotermsId = document.getElementById("cmbIncoterms").value
		var purl="consulta.php?paisOrigenId="+paisOrigenId+"&tipoTramiteId="+tipoTramiteId+"&tipoCotizacionId="+tipoCotizacionId+"&incotermsId="+incotermsId;
		var content=getContent(purl);
		document.getElementById("divTabla").innerHTML=content;	
	}
</script>
</head>
<body style="
		background:url(../../images/fondoCotizadorTolepu.jpg);
        "
       >
	<div id="divMain">
	<table width='100%' >
    	<tr>
            <td>
                <table width='100%'>
                    <tr>
                        <td width='30%' align='center'>
                            <img 
                            	src='../../images/logoTolepu.png'
                                style='
                                    width:50%;
                                '
                            >
                        </td>
                        <td style='
                            	text-align:center;
                                color:white;
                                font-weight:bold;
                                font-size:30px;
                            '
                        >
                            COTIZADOR TOLEPU
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    	<tr>
        	<td align='center'
            >
            	<div 
                    style='
                        width:90%;
                        text-align:right;
                    '                          	
                >
                    <font
                    	style='
                            color:white;
                            font-size:20px;
                        ' 
                    >
                    	COTIZAR
                    </font><br>
                    <font
                    	style='
                            color:white;
                            font-size:12px;
                        ' 
                    >
                    	________________________________________________<br>
                        SELECCIONE LOS DATOS PARA BUSCAR LAS TARIFAS DE AGENTES DEL EXTERIOR
                    </font>
                </div>
            </td>
        </tr>
        <tr>
            <td>
            	<div class="demo">
                  <table  width='100%'>
                    <tr>
                        <td>
                            <label style='color:white; font-weight:bold;'>
                                Cliente: </br>
                            </label>
                            <div class="select"
                            	style="
                                	width:100%;
                                    border:1px solid #c7c7c7;
                                "                          	
                            >
                                <select name="cmbCliente">
                                    <?php echo combo('CLI');?>
                                </select>
                            </div>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width='100%' align='center'>
                                <tr>
                                    <td
                                    	style="
                                            width:50%; 
                                        "
                                    >
                                        <label style='color:white; font-weight:bold;'>
                                            Pais de Origen: </br>
                                        </label>
                                        <div class="select"
                                        	style="
                                                width:90%;
                                            " 
                                        >
                                            <select id="cmbPaisOrigen"><?php echo combo('PORI');?></select>
                                        </div>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td
                                    	style="
                                            width:50%; 
                                        "
                                    >
                                        <label style='color:white; font-weight:bold;'>
                                            Tipo de Trámite: </br>
                                        </label>
                                        <div class="select"
                                        	style="
                                                width:100%;
                                            "
                                        >
                                            <select id="cmbTipoTramite"><?php echo combo('TPTRM');?></select>
                                        </div>
                                        <p>&nbsp;</p>
                                    </td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td>
                            <table 
                            	style="
                                	width:100%; 
                                "
                            >
                                <tr>
                                    <td
                                    	style="
                                            width:50%; 
                                        "
                                    >
                                        <label style='color:white; font-weight:bold;'>
                                            Tipo de Cotización: </br>
                                        </label>
                                        <div class="select"
                                        	style="
                                                width:90%;
                                            "
                                        >
                                            <select id="cmbTipoCotizacion"><?php echo combo('TPCOT');?></select>
                                        </div>
                                        <p>&nbsp;</p>
                                    </td>
                                    <td
                                    	style="
                                            width:50%; 
                                        "
                                    >
                                        <label style='color:white; font-weight:bold;'>
                                            Incoterms: </br>
                                        </label>
                                        <div class="select"
                                        	style="
                                                width:100%;
                                            "
                                        >
                                            <select id="cmbIncoterms"><?php echo combo('INC');?></select>
                                        </div>
                                        <p>&nbsp;</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           	<a href="#" 
                            	class="button button-orange"
                            	style="
									width:100%
                                "
                                onClick="
                                	cargarGridAgentes()
                                "
                            >
                            	Buscar
                            </a>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        	<div
                            	id="divTabla"
                                style="
                                    width:100%;
                                "
                            >
                                
                            </div>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td
                        	style="
                                width:100%;
                            "
                        >
                           	<a href="#" class="button button-orange"
                                style="
									width:20%;
                                "
                            >Enviar</a>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                  </table>
              	</div>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>





















