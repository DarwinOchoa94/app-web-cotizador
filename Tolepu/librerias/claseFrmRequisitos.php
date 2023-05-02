<?php
	class claseFrmRequisitos
	{
		public static function show()
		{
			//Datos heredados
			$sJsonDataObject=$_POST["claseFrmRequisitos"];
			//print_r($_POST);
			$arrayDataObject = json_decode($sJsonDataObject,true);
			//print_r($arrayDataObject);
			$clienteId=$arrayDataObject["ClienteID"];
			$tipoTramiteId=$arrayDataObject["TipoTramiteID"];
			$paisOrigenId=$arrayDataObject["PaisOrigenID"];
			$puertoOrigenId=$arrayDataObject["PuertoOrigenID"];
			$tipoCotizacionId=$arrayDataObject["TipoCotizacionID"];
			$incotermsId=$arrayDataObject["IncotermsID"];
			
			//Variables de la Pagina
			$lbltitulo="INFORMACION REQUERIDA PARA COTIZACION DE TRANSPORTE INTERNACIONAL DE CARGA";
			$lblInfoCarga="INFORMACION DE LA CARGA";
			$lblPrvDatosGeneral="DATOS GENERALES";
			$lblPrvServiciosOrigen="DIRECCION RECOGIDA Y SERVICIOS EN ORIGEN";
			$lblInfoSolicitud="INFORMACION QUE SE DEBE INCLUIR EN LA COTIZACION";
			$lblBultos="Cantidad de Bultos:";
			$lblPeso="Peso Bruto de la Carga:";
			$lblVolumen="Volumen de la Carga:";
			$lblDimensionBultos="Dimensiones de los Bultos:";
			$lblTipoContenedor="Tipo de Contenedor y Capacidad:";
			$lblDescMercaderia="Descripcion de la Mercaderia:";
			$lblPartidaArancelaria="Partida Arancelaria";
			$lblValorMercaderia="Valor de la Mercaderia:";
			$lblObservaciones="Observaciones: ( Manejo de Carga, Indicaciones especiales varias)";
			$lblProveedorName="Nombre / Razon Social:";
			$lblProveedorContact="Persona / Contacto:";
			$lblProveedorDatosAdicionales="Datos Adicionales:";
			$lblProveedorEmail="eMail:";
			$lblProveedorEmail2="Otro eMail:";
			$lblProveedorTelefono="Telefono:";
			$lblProveedorExt="Ext:";
			$lblProvRecogidaDir="Direccion de Recogida:";
			$lblServiciosOrigen="Servicios en Origen:";
			$lblProvDetalleServicios="Detalle de Servicios a cotizar en Origen:";
			$lblNavieraName="Nombre de la Naviera / Coloader.";
			$lblTransitoInternacional="Transito Internacional.";
			$lblTransitoInterno="Transito Interno.";
			$lblFrecuencia="Frecuencia de Salida.";
			$lblRutaVia="Ruta / Via o Transbordos.";
			$lblDiasLibres="Dias Libres en Destino.";
			$lblMblCollect="Aceptan MBL Collect?";
			$lblMblEmisionDestino="Aceptan MBL con Emision en Destino?";
			$lblDatosAdicionales="Datos Adicionales que desee agregar a la Solicitud:";
			
			$onfocusCmbProvPagosTipo="loadComboBox(\"cmbProvPagosTipo\",\"TPPAGO\");";
			$onfocusCmbEmbalaje="loadComboBox(\"cmbEmbalaje\",\"EMB\");";
			$onfocusCmbUnidad="loadComboBox(\"cmbUnidad\",\"UNI\");";
			$onfocusCmbVolumen="loadComboBox(\"cmbVolumen\",\"VOL\");";
			$onfocusCmbTipoMercaderia="loadComboBox(\"cmbTipoMercaderia\",\"TPMERC\");";
			$onchangeCmbTipoMercaderia="validarComboBox(\"cmbTipoMercaderia\");";
			$onfocusCmbTipoContenedor="loadComboBox(\"cmbTipoContenedor\",\"TPCONT\");";
			$onchangeSpnPartidaArancelaria="validarSpan(\"spnPartidaArancelaria\");";
			$onchangeSpnServiciosOrigen="validarSpan(\"spnServiciosOrigen\");";
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
					<script src='http://code.jquery.com/jquery-1.9.1.js' type='text/javascript'></script>
				    <script src='jquery.maskedinput.min.js' type='text/javascript'></script>	
					<style type='text/css'>".claseSkin::extraerSkin(claseSkin::$skinNormal)."</style>
				</head>
				<body style='background:url(../../Framework/images/Tolepu/fondoFormularioInformacion.jpg);'>
					".claseLabel::show("lblTitulo", "headerFormulario", "absolute", 1200, 1, 130, 30, "visible", "blue", $lbltitulo)."
					".claseButtonGroup::show("grpBtnFichas", "button-group", "absolute", 0, 0, 100, 70)."
					".claseDiv::show("divInfoCarga", "", "absolute", 1100, 500, 70, 120, "white")."
					
					".claseLabel::show("lblBultos", "detailFormulario", "absolute", 300, 1, 100, 130, "visible", "black", $lblBultos)."
					".claseTextBox::show("txtBultos", "select", "absolute", 300, 30, 100, 150, "visible", claseTextBox::$numeric)."
					".claseComboBox::show("cmbEmbalaje", "select", "absolute", 300, 33, 450, 150, "visible", "Seleccione...", $onfocusCmbEmbalaje, "")."
					".claseLabel::show("lblDimensionBultos", "detailFormulario", "absolute", 300, 1, 800, 130, "visible", "black", $lblDimensionBultos)."
					".claseTextArea::show("edtDimensionBultos", "select", "absolute", 300, 90, 800, 150, "visible", claseTextArea::$string)."
					".claseLabel::show("lblPeso", "detailFormulario", "absolute", 300, 1, 100, 190, "visible", "black", $lblPeso)."
					".claseTextBox::show("txtPeso", "select", "absolute", 300, 30, 100, 210, "visible", claseTextBox::$numeric)."
					".claseComboBox::show("cmbUnidad", "select", "absolute", 300, 33, 450, 210, "visible", "Seleccione...", $onfocusCmbUnidad, "")."
					".claseLabel::show("lblVolumen", "detailFormulario", "absolute", 300, 1, 100, 250, "visible", "black", $lblVolumen)."
					".claseTextBox::show("txtVolumen", "select", "absolute", 300, 30, 100, 270, "visible", claseTextBox::$numeric)."
					".claseComboBox::show("cmbVolumen", "select", "absolute", 300, 33, 450, 270, "visible", "Seleccione...", $onfocusCmbVolumen, "")."
					".claseLabel::show("lblValorMercaderia", "detailFormulario", "absolute", 300, 1, 800, 250, "visible", "black", $lblValorMercaderia)."
					".claseTextBox::show("txtValorMercaderia", "select", "absolute", 300, 30, 800, 270, "visible", claseTextBox::$money)."				
					".claseLabel::show("lblTipoContenedor", "detailFormulario", "absolute", 300, 1, 100, 310, "visible", "black", $lblTipoContenedor)."
					".claseComboBox::show("cmbTipoContenedor", "select", "absolute", 300, 33, 100, 330, "visible", "Seleccione...", $onfocusCmbTipoContenedor, "")."
					".claseComboBox::show("cmbTipoMercaderia", "select", "absolute", 300, 33, 450, 330, "visible", "Seleccione...", $onfocusCmbTipoMercaderia, $onchangeCmbTipoMercaderia)."
					".claseTextBox::show("txtClaseIMO", "select", "absolute", 150, 30, 800, 330, "hidden", claseTextBox::$string,"Clase IMO")."
					".claseLabel::show("lblClaseIMOObl", "detailFormulario", "absolute", 1, 1, 790, 330, "hidden", "red","*")."
					".claseTextBox::show("txtUN", "select", "absolute", 140, 30, 960, 330, "hidden", claseTextBox::$string,"UN")."
					".claseLabel::show("lblUNObl", "detailFormulario", "absolute", 1, 1, 950, 330, "hidden", "red","*")."
					".claseLabel::show("lblDescMercaderia", "detailFormulario", "absolute", 300, 1, 100, 370, "visible", "black", $lblDescMercaderia)."
					".claseTextArea::show("edtDescMercaderia", "select", "absolute", 650, 90, 100, 390, "visible", claseTextArea::$string)."
					".claseLabel::show("lblObservaciones", "detailFormulario", "absolute", 600, 1, 100, 490, "visible", "black", $lblObservaciones)."
					".claseTextArea::show("edtObservaciones", "select", "absolute", 650, 90, 100, 510, "visible", claseTextArea::$string)."

					".claseLabel::show("lblProveedorName", "detailFormulario", "absolute", 600, 1, 100, 180, "hidden", "black", $lblProveedorName)."
					".claseTextBox::show("txtProveedorName", "select", "absolute", 420, 30, 100, 200, "hidden", claseTextBox::$string)."
					".claseLabel::show("lblProveedorContact", "detailFormulario", "absolute", 600, 1, 100, 240, "hidden", "black", $lblProveedorContact)."
					".claseTextBox::show("txtProveedorContact", "select", "absolute", 420, 30, 100, 260, "hidden", claseTextBox::$string)."
					".claseLabel::show("lblProveedorEmail", "detailFormulario", "absolute", 600, 1, 100, 300, "hidden", "black", $lblProveedorEmail)."
					".claseTextBoxEMail::show("txtProveedorEmail", "select", "absolute", 300, 30, 100, 320, "hidden", claseTextBoxEmail::$string)."
					".claseLabel::show("lblProveedorEmail2", "detailFormulario", "absolute", 600, 1, 100, 360, "hidden", "black", $lblProveedorEmail2)."
					".claseTextBoxEMail::show("txtProveedorEmail2", "select", "absolute", 300, 30, 100, 380, "hidden", claseTextBoxEmail::$string)."
					".claseLabel::show("lblProveedorTelefono", "detailFormulario", "absolute", 600, 1, 100, 420, "hidden", "black", $lblProveedorTelefono)."
					".claseTextBox::show("txtProveedorTelefono", "select", "absolute", 300, 30, 100, 440, "hidden", claseTextBox::$numeric)."
					".claseLabel::show("lblProveedorExt", "detailFormulario", "absolute", 600, 1, 450, 420, "hidden", "black", $lblProveedorExt)."
					".claseTextBox::show("txtProveedorExt", "select", "absolute", 70, 30, 450, 440, "hidden", claseTextBox::$numeric,"99999")."
					".claseLabel::show("lblProveedorDatosAdicionales", "detailFormulario", "absolute", 600, 1, 100, 480, "hidden", "black", $lblProveedorDatosAdicionales)."
					".claseTextArea::show("edtProveedorDatosAdicionales", "select", "absolute", 420, 80, 100, 500, "hidden", claseTextArea::$string)."
					".claseLabel::show("lblProvRecogidaDir", "detailFormulario", "absolute", 600, 1, 620, 180, "hidden", "black", $lblProvRecogidaDir)."
					".claseLabel::show("lblProvRecogidaDirObl", "detailFormulario", "absolute", 1, 1, 610, 180, "hidden", "red", "*")."
					".claseTextArea::show("edtProvRecogidaDir", "select", "absolute", 490, 80, 620, 200, "hidden", claseTextArea::$string)."
					".claseLabel::show("lblPartidaArancelaria", "detailFormulario", "absolute", 300, 1, 620, 320, "hidden", "black", $lblPartidaArancelaria)."
					".claseLabel::show("lblPartidaArancelariaObl", "detailFormulario", "absolute", 1, 1, 610, 360, "hidden", "red", "*")."
					".claseSwitch::show("spnPartidaArancelaria", "switch", "absolute", 58, 10, 900, 320, "hidden", "SI", "NO", $onchangeSpnPartidaArancelaria)."
					".claseTextBox::show("txtPartidaArancelaria", "select", "absolute", 250, 30, 620, 360, "hidden", claseTextBox::$string,"Numero de Partida Arancelaria")."
					".claseLabel::show("lblServiciosOrigen", "detailFormulario", "absolute", 300, 1, 620, 440, "hidden", "black", $lblServiciosOrigen)."
					".claseSwitch::show("spnServiciosOrigen", "switch", "absolute", 58, 10, 900, 440, "hidden", "SI", "NO", $onchangeSpnServiciosOrigen)."
					".claseLabel::show("lblProvDetalleServicios", "detailFormulario", "absolute", 600, 1, 620, 480, "hidden", "black", $lblProvDetalleServicios)."
					".claseLabel::show("lblProvDetalleServiciosObl", "detailFormulario", "absolute", 1, 1, 610, 480, "hidden", "red", "*")."
					".claseTextArea::show("edtProvDetalleServicios", "select", "absolute", 490, 80, 620, 500, "hidden", claseTextArea::$string)."
					".claseLabel::show("lblPrvDatosGeneral", "subHeaderFormulario", "absolute", 400, 1, 100, 150, "hidden", "red", $lblPrvDatosGeneral)."
					".claseLabel::show("lblPrvServiciosOrigen", "subHeaderFormulario", "absolute", 400, 1, 620, 150, "hidden", "red", $lblPrvServiciosOrigen)."	
										
					".claseLabel::show("lblInfoSolicitud", "subHeaderFormulario", "absolute", 500, 1, 150, 160, "hidden", "red", $lblInfoSolicitud)."
					".claseLabel::show("lblNavieraName", "detailFormulario", "absolute", 300, 1, 150, 220, "hidden", "black", $lblNavieraName)."
					".claseLabel::show("lblTransitoInternacional", "detailFormulario", "absolute", 300, 1, 690, 220,"hidden","black",$lblTransitoInternacional)."
					".claseLabel::show("lblTransitoInterno", "detailFormulario", "absolute", 300, 1, 690, 400,"hidden", "black",$lblTransitoInterno)."
					".claseLabel::show("lblFrecuencia", "detailFormulario", "absolute", 300, 1, 150, 280, "hidden", "black", $lblFrecuencia)."
					".claseLabel::show("lblRutaVia", "detailFormulario", "absolute", 300, 1, 150, 400, "hidden", "black", $lblRutaVia)."
					".claseLabel::show("lblDiasLibres", "detailFormulario", "absolute", 300, 1, 150, 340, "hidden", "black", $lblDiasLibres)."
					".claseLabel::show("lblMblCollect", "detailFormulario", "absolute", 300, 1, 690, 280, "hidden", "black", $lblMblCollect)."
					".claseLabel::show("lblMblEmisionDestino", "detailFormulario", "absolute", 300, 1, 690, 340, "hidden", "black", $lblMblEmisionDestino)."
					".claseLabel::show("lblDatosAdicionales", "detailFormulario", "absolute", 400, 1, 150, 460, "hidden", "black", $lblDatosAdicionales)."
					".claseTextArea::show("edtDatosAdicionales", "select", "absolute", 490, 80, 150, 480, "hidden", claseTextArea::$string)."
					
					".claseButton::show("btnEnviar", "button button-orange", "absolute", 130, 30, 900, 640, "visible","ENVIAR","",$onClicBtnListo)."
					".claseButton::show("btnCancelar", "button button-orange", "absolute", 130, 30, 1040, 640, "visible","CANCELAR","",$onClicBtnCancelar)."
				</body>
				<script language='javaScript'>
					window.resizeTo(1260,760);
					window.screenX = 50;
					window.screenY = 50;
					
					//Info Carga
					var txtBultos 	= document.getElementById('txtBultos');
					var cmbEmbalaje = document.getElementById('cmbEmbalaje');
					var edtDimensionBultos = document.getElementById('edtDimensionBultos');
					var txtPeso	  	= document.getElementById('txtPeso');
					var cmbUnidad	= document.getElementById('cmbUnidad');
					var txtVolumen	= document.getElementById('txtVolumen');
					var cmbVolumen	= document.getElementById('cmbVolumen');
					var cmbTipoContenedor	= document.getElementById('cmbTipoContenedor');
					var cmbTipoMercaderia	= document.getElementById('cmbTipoMercaderia');
					var txtClaseIMO			= document.getElementById('txtClaseIMO');
					var txtUN				= document.getElementById('txtUN');
					var txtValorMercaderia	= document.getElementById('txtValorMercaderia');
					var edtDescMercaderia 	= document.getElementById('edtDescMercaderia');
					var spnPartidaArancelaria	= document.getElementById('spnPartidaArancelaria');
					var spnServiciosOrigen	= document.getElementById('spnServiciosOrigen');
					var edtObservaciones	= document.getElementById('edtObservaciones');
					
					//Info Proveedor
					var txtProveedorName		= document.getElementById('txtProveedorName');
					var	txtProveedorContact		= document.getElementById('txtProveedorContact');
					var	txtProveedorEmail		= document.getElementById('txtProveedorEmail');
					var	txtProveedorEmail2		= document.getElementById('txtProveedorEmail2');
					var	txtProveedorTelefono	= document.getElementById('txtProveedorTelefono');	
					var	txtProveedorExt			= document.getElementById('txtProveedorExt');
					var txtPartidaArancelaria	= document.getElementById('txtPartidaArancelaria');
					var	edtProveedorDatosAdicionales = document.getElementById('edtProveedorDatosAdicionales');
					var	edtProvDetalleServicios	= document.getElementById('edtProvDetalleServicios');
					var	edtProvRecogidaDir		= document.getElementById('edtProvRecogidaDir');
					
					//Info Adicional
					var edtDatosAdicionales = document.getElementById('edtDatosAdicionales');
					
					
					function enviarMail()
					{
						//Info General
						var lcClienteId		= '".$clienteId."';
						var lcTipoTramiteId	= '".$tipoTramiteId."';
						var lcPaisOrigenId	= '".$paisOrigenId."';
						var lcPuertoOrigenId	= '".$puertoOrigenId."';
						var lcTipoCotizacionId	= '".$tipoCotizacionId."';
						var lcIncotermsId		= '".$incotermsId."';

						
						//Info de la Carga
						var lnBultos 	 	= txtBultos.value;
						var lcEmbalajeID 	= cmbEmbalaje.value;
						var lcDimensionBultos 	= edtDimensionBultos.value;
						//var lcEmbalajeName 	= (cmbEmbalaje.options[cmbEmbalaje.selectedIndex].text).replace('[] ','');
						var lnPeso	 	 	= txtPeso.value;
						var lcUnidadID		= cmbUnidad.value;
						//var lcUnidadName	= (cmbUnidad.options[cmbUnidad.selectedIndex].text).replace('[] ','');
						var lnVolumen		= txtVolumen.value;
						var lcVolumenID		= cmbVolumen.value;
						var lcDescMercaderia = edtDescMercaderia.value;
						var lcTipoMercaderiaID		= cmbTipoMercaderia.value;
						var lcClaseIMO				= txtClaseIMO.value;
						var lcUN					= txtUN.value;
						//var lcTipoMercaderiaName	= (cmbTipoMercaderia.options[cmbTipoMercaderia.selectedIndex].text).replace('[] ','');
						var lnValorMercaderia		= txtValorMercaderia.value;
						var lcTipoContenedorID		= cmbTipoContenedor.value;
						//var lcTipoContenedorName	= (cmbTipoContenedor.options[cmbTipoContenedor.selectedIndex].text).replace('[] ','');
						var lcObservaciones			= edtObservaciones.value;
						
						//Info del Proveedor
						var lcProveedorName		=	txtProveedorName.value;
						var	lcProveedorContact	=	txtProveedorContact.value;
						var	lcProveedorEmail	=	txtProveedorEmail.value;
						var	lcProveedorEmail2	=	txtProveedorEmail2.value;
						var	lcProveedorTelefono	=	txtProveedorTelefono.value;
						var	lcProveedorExt		=	txtProveedorExt.value;
						var lbPartidaArancelaria	= 	spnPartidaArancelaria.checked;
						var lcPartidaArancelaria	=	txtPartidaArancelaria.value;
						var	lcProveedorDatosAdicionales	=	edtProveedorDatosAdicionales.value;
						var lbspnServiciosOrigen		= spnServiciosOrigen.checked;
						var	lcProvDetalleServicios		=	edtProvDetalleServicios.value;
						var	lcProvRecogidaDir			=	edtProvRecogidaDir.value;
						
						//Info Adicional
						var lcDatosAdicionales		= edtDatosAdicionales.value;
						
						
						if ( lcTipoMercaderiaID == '0000001885' ) //Carga Peligrosa
						{
							if ( lcClaseIMO == '' ) 
							{
								alert('No ha registrado la Clase IMO');
								mostarInfoCarga();
								txtClaseIMO.focus();
								document.getElementById('lblClaseIMOObl').style.visibility='visible';
								return false;
							}
							if ( lcUN == '' )
							{
								alert('No ha registrado el Numero UN');
								mostarInfoCarga();
								txtUN.focus();
								document.getElementById('lblUNObl').style.visibility='visible';
								return false;
							}
						}
						
						//Incoterms EXW, y Tipo Tramites Terrestres
						if (  ( lcIncotermsId == '0000000091' ) || ( lcTipoTramiteId == '0000000011' ) || ( lcTipoTramiteId == '0000000012' ) )
						{
							if	( lcProvRecogidaDir == '' ) 
							{
								alert('La informacion de Direccion de Recogida es obligatoria');
								mostarInfoProveedor();
								document.getElementById('edtProvRecogidaDir').focus();
								document.getElementById('lblProvRecogidaDirObl').style.visibility='visible';
								return false;
							}
						}
						
						if	( ( lcTipoTramiteId == '0000000013') || ( lcTipoTramiteId == '0000000003' ) || ( lcTipoTramiteId == '0000000004' ) || ( lcTipoTramiteId == '0000000009' ) || ( lcTipoTramiteId == '0000000011' ) ) //CE,EA,EM,FE,TE
						{
							if ( ( lcIncotermsId == '0000000101' ) && ( lbPartidaArancelaria == false || lcPartidaArancelaria == '' ) ) //DDP
							{
								alert('Debe registrar el numero de la Partida Arancelaria.');
								spnPartidaArancelaria.checked='checked';
								mostarInfoProveedor();
								document.getElementById('txtPartidaArancelaria').focus();
								document.getElementById('lblPartidaArancelariaObl').style.visibility='visible';
								return false;
							}
							if ( lbPartidaArancelaria == true && lcPartidaArancelaria == '' )
							{
								alert('Debe registrar el numero de la Partida Arancelaria.');
								spnPartidaArancelaria.checked='checked';
								mostarInfoProveedor();
								document.getElementById('txtPartidaArancelaria').focus();
								document.getElementById('lblPartidaArancelariaObl').style.visibility='visible';
								return false;
							}
						}
						
						if	( ( lcTipoTramiteId == '0000000013') || ( lcTipoTramiteId == '0000000003' ) || ( lcTipoTramiteId == '0000000004' ) || ( lcTipoTramiteId == '0000000009' ) ) //CE,EA,EM,FE
						{
							if ( ( lcIncotermsId == '0000002401' ) || ( lcIncotermsId == '0000002400' ) || ( lcIncotermsId == '0000000097' ) || (  lcIncotermsId == '0000000100' ) || ( lcIncotermsId == '0000000101' ) || ( lcIncotermsId == '0000000099' ) || ( lcIncotermsId == '0000000098' ) ) //DAP,DAT,DAF,DDU,DDP,DEQ,DES
							{
								if ( lcProvRecogidaDir == '' )
								{
									alert('La informacion de Direccion de Entrega es obligatoria');
									mostarInfoProveedor();
									document.getElementById('edtProvRecogidaDir').focus();
									document.getElementById('lblProvRecogidaDirObl').style.visibility='visible';
									return false;
								}
							}
						}
						
						
						if ( lcIncotermsId == '0000000092' ) //FCA
						{
							if ( lbspnServiciosOrigen == true )
							{
								if ( lcProvDetalleServicios == '' )
								{
									alert('Debe registrar el Detalle de los Servicios a cotizar en Origen.');
									spnServiciosOrigen.checked='checked';
									mostarInfoProveedor();
									document.getElementById('edtProvDetalleServicios').focus();
									document.getElementById('lblProvDetalleServiciosObl').style.visibility='visible';
									return false;
								}
							}
						}
						
						//return false;
						var array={
							\"ClienteID\":lcClienteId,
							\"TipoTramiteID\":lcTipoTramiteId,
							\"PaisOrigenID\":lcPaisOrigenId,
							\"PuertoOrigenID\":lcPuertoOrigenId,
							\"TipoCotizacionID\":lcTipoCotizacionId,
							\"IncotermsID\":lcIncotermsId,
							\"Bultos\":lnBultos,
							\"EmbalajeID\":lcEmbalajeID,
							\"DimensionBultos\":lcDimensionBultos,
							\"Peso\":lnPeso,
							\"UnidadID\":lcUnidadID,
							\"Volumen\":lnVolumen,
							\"VolumenID\":lcVolumenID,
							\"TipoContenedorID\":lcTipoContenedorID,
							\"TipoMercaderiaID\":lcTipoMercaderiaID,
							\"ValorMercaderia\":lnValorMercaderia,
							\"DescMercaderia\":lcDescMercaderia,							
							\"PartidaArancelaria\":lbPartidaArancelaria,
							\"Observaciones\":lcObservaciones,
							\"ProveedorName\":lcProveedorName,
							\"ProveedorContact\":lcProveedorContact,
							\"ProveedorEmail\":lcProveedorEmail,
							\"ProveedorEmail2\":lcProveedorEmail2,
							\"ProveedorTelefono\":lcProveedorTelefono,
							\"ProveedorExt\":lcProveedorExt,
							\"ProveedorDatosAdicionales\":lcProveedorDatosAdicionales,
							\"ProvDetalleServicios\":lcProvDetalleServicios,
							\"ProvRecogidaDir\":lcProvRecogidaDir,
							\"DatosAdicionales\":lcDatosAdicionales
						};

						var stringJson = JSON.stringify(array);
						var purl = './index.php?action=ejecutarAjax&clase=claseFrmRequisitos&metodo=saveRecord&variables='+stringJson;
						var content = getContent(purl);
						var arrayMailJson=JSON.parse(content);
						var error=parseInt(arrayMailJson[0]['error']);
						var message=arrayMailJson[0]['message'];
						if ( error == 0 )
						{
							alert(message);
							window.close();
						}
						else
						{
							alert(message);
						}
					}
				</script>
			";

			return $mostrar;
		}
		
		public static function saveRecord()
		{
			
			$variables = $_GET["variables"];
			$array = json_decode($variables,true);
			
			$clienteId			= $array["ClienteID"];
			$tipoTramiteId		= $array["TipoTramiteID"];
			$paisOrigenId		= $array["PaisOrigenID"];
			$puertoOrigenId		= $array["PuertoOrigenID"];
			$tipoCotizacionId	= $array["TipoCotizacionID"];
			$incotermsId		= $array["IncotermsID"];
			$bultos 	 		= $array["Bultos"];
			$embalajeId 		= $array["EmbalajeID"];
			$dimensionBultos	= $array["DimensionBultos"];
			$peso	 	 		= $array["Peso"];
			$unidadId			= $array["UnidadID"];
			$volumen			= $array["Volumen"];
			$volumenId			= $array["VolumenID"];
			$tipoContenedorId	= $array["TipoContenedorID"];
			$tipoMercaderiaId	= $array["TipoMercaderiaID"];
			$valorMercaderia	= $array["ValorMercaderia"];
			$descMercaderia 	= $array["DescMercaderia"];
			$partidaArancelaria	= ($array["PartidaArancelaria"]==true?"1":"0"); 
			$observaciones		= $array["Observaciones"];
			$proveedorName		= $array["ProveedorName"];
			$proveedorContact	= $array["ProveedorContact"];
			$proveedorEmail		= $array["ProveedorEmail"];
			$proveedorEmail2	= $array["ProveedorEmail2"];
			$proveedorTelefono	= $array["ProveedorTelefono"];
			$proveedorExt		= $array["ProveedorExt"];
			$proveedorDatosAdicionales	= $array["ProveedorDatosAdicionales"];
			$provDetalleServicios		= $array["ProvDetalleServicios"];
			$provRecogidaDir			= $array["ProvRecogidaDir"];
			$datosAdicionales			= $array["DatosAdicionales"];
						
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			$strSQL="
				EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveRecord '$clienteId',	'$tipoTramiteId','$paisOrigenId','$puertoOrigenId','$tipoCotizacionId','$incotermsId',$bultos,'$embalajeId','$dimensionBultos',$peso,'$unidadId',$volumen,'$volumenId','$tipoContenedorId','$tipoMercaderiaId',$valorMercaderia,'$descMercaderia',$partidaArancelaria,'$observaciones','$proveedorName','$proveedorContact','$proveedorEmail','$proveedorEmail2','$proveedorTelefono','$proveedorExt','$proveedorDatosAdicionales','$provDetalleServicios','$provRecogidaDir','$datosAdicionales'
			";
			$rs =  $baseDatos->db_query( $strSQL  ) or die ("Ocurrio un error al tratar de enviar la Solicitud de Cotizacion."); 
			$baseDatos->desconectarDB();
			$registroId="";
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$error 	 	= $baseDatos->sysGetDataFieldSrv( $row[ 'NumError' ] );
				$message 	= $baseDatos->sysGetDataFieldSrv( $row[ 'Mensaje' ] );
				//$registroId = $baseDatos->sysGetDataFieldSrv( $row[ 'RegistroID' ] );
			}
			
			$arrayMail=array(); 
			$arrayMail[0]["error"]=$error;
			$arrayMail[0]["message"]=$message;
			$stringJson=json_encode($arrayMail);
			
			$mostrar=$stringJson; 
			return $mostrar;	
		}
	}
?>