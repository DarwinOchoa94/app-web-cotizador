<?php
	class claseDivBodyIncotermsDDP {
		public static function show() {
			$variables                 = $_GET["variables"];
			$arrayControl              = json_decode($variables,true);
			$obligatorio               = "<span class='obligatorio'>*</span>";
			$lblMensajeObligatorio     = "Los campos con (*) son obligatorios.";
			$ciudadId			       = $arrayControl["CiudadID"];
			$incotermsId		       = $arrayControl["IncotermsID"];
			$viaEmbarqueId		       = $arrayControl["ViaEmbarqueID"];
			
			$lblPuertoOrigen           = $viaEmbarqueId=="0000000502"?"Aeropuerto de Origen:":($viaEmbarqueId=="0000000493"?"Puerto de Origen:":"Lugar de Origen:");
			$lblPuertoOrigen           = $obligatorio.$lblPuertoOrigen;
			$lblPuertoDestino          = $viaEmbarqueId=="0000000502"?"Aeropuerto de Destino:":($viaEmbarqueId=="0000000493"?"Puerto de Destino:":"Lugar de Destino:");
			$lblPuertoDestino          = $obligatorio.$lblPuertoDestino;
			
			$lblTipoCarga		       = $obligatorio."Tipo de Carga:";
			$lblTipoMercaderia	       = $obligatorio."Tipo de Mercadería:";
			$lblDescMercaderia	       = "Descripción de la Mercadería:";
			$lblValorMercaderia        = $obligatorio."Valor de la Mercadería:";
			$lblValorFlete		       = $obligatorio."Valor del Flete: ( aprox. ) ";
			$lblPartidaArancelaria	   = "Partida Arancelaria Sugerida:";
			$lblSubPartidaArancelaria  = $obligatorio."Subpartida Arancelaria:";
			$lblProvEntregaDir         = "Dirección de Entrega en Destino:";
			$lblProvEntregaDir         = $obligatorio.$lblProvEntregaDir;
			$lblProvRecogidaDir        = "Dirección de Recogida:";
			$lblProvRecogidaDir        = $obligatorio.$lblProvRecogidaDir;
			$lblInfoAdicional	       = "Consideraciones Especiales:";
			$lblNumCotizacion	       = date(Y)."QT####";
			$lblNumRequerimiento       = date(Y)."REQ####";
			$lblCotizacion		       = claseLabel::show("lblCotizacion", "txtCotizacion", "labelFormulario", "Incluir cotización o requerimiento existente.");
			
			$onfocusCmbPuertoOrigen    = "loadComboBox(\"cmbPuertoOrigen\",\"PUORI\");";
			$onfocusCmbPuertoDestino   = "loadComboBox(\"cmbPuertoDestino\",\"PUORI\");";
			$onfocusCmbTipoCarga       = "loadComboBox(\"cmbTipoCarga\",\"TPCAR\");";
			$onfocusCmbTipoMercaderia  = "loadComboBox(\"cmbTipoMercaderia\",\"TPMERC\");";

			$onchangeSchPuertoOrigen   = "loadListBox(\"schPuertoOrigen\", \"PUORI\")";
			$onchangeSchPuertoDestino  = "loadListBox(\"schPuertoDestino\", \"PUORI\")";
			$onblurSchPuertoOrigen     = "selectItemListBox(\"schPuertoOrigen\", \"lstPuertoOrigen\")";
			$onblurSchPuertoDestino    = "selectItemListBox(\"schPuertoDestino\", \"lstPuertoDestino\")";
			$onSelectSchPuertoOrigen   = "";
			$onSelectSchPuertoDestino  = "";
			
			$onchangeCmbPuertoOrigen   = "validarComboBox(\"cmbPuertoOrigen\");";
			$onchangeCmbPuertoDestino  = "validarComboBox(\"cmbPuertoDestino\");";
			$onchangeCmbTipoCarga      = "validarComboBox(\"cmbTipoCarga\");";
			$onchangeCmbTipoMercaderia = "validarComboBox(\"cmbTipoMercaderia\");";
			$onchangeTxtCotizacion     = "validarTextBox(\"txtCotizacion\")";
			$onchangeTxtRequerimiento  = "validarTextBox(\"txtRequerimiento\")";
			
			$onclickBtnUploadFile      = "encenderUploadFileScreen();";

			//".claseComboBox::show("cmbPuertoOrigen", "select", "relative", "100%", 10, 0, 0, "visible", "", $onfocusCmbPuertoOrigen, $onchangeCmbPuertoOrigen)."
			//".claseComboBox::show("cmbPuertoDestino", "select", "relative", "100%", 10, 0, 0, "visible", "", $onfocusCmbPuertoDestino, $onchangeCmbPuertoDestino)."
			
			$txtCotizacion    = claseTextBox::show("txtCotizacion", "text", "select", claseTextBox::$string, 10, $lblNumCotizacion, $onchangeTxtCotizacion);
			$txtRequerimiento = claseTextBox::show("txtRequerimiento", "text", "select", claseTextBox::$string, 11, $lblNumrRequerimiento, $onchangeTxtRequerimiento);
			
			$ddpMaritimo="
				<fieldset class='section-container-body__fieldset--block'>
					".claseLabel::show("lblProvEntregaDir", "edtProvEntregaDir", "labelFormulario section-container-body__label", $lblProvEntregaDir)."
					".claseTextArea::show("edtProvEntregaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
				</fieldset>
				";
				
			$ddpAereo="
				<fieldset class='section-container-body__fieldset--block'>
					".claseLabel::show("lblProvEntregaDir", "edtProvEntregaDir", "labelFormulario section-container-body__label", $lblProvEntregaDir)."
					".claseTextArea::show("edtProvEntregaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
				</fieldset>
			";
			
			$ddpTerrestre="
				<fieldset class='section-container-body__fieldset--block'>
					".claseLabel::show("lblProvRecogidaDir", "edtProvRecogidaDir", "labelFormulario section-container-body__label", $lblProvRecogidaDir)."
					".claseTextArea::show("edtProvRecogidaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
				</fieldset>
				<fieldset class='section-container-body__fieldset--block'>
					".claseLabel::show("lblProvEntregaDir", "edtProvEntregaDir", "labelFormulario section-container-body__label", $lblProvEntregaDir)."
					".claseTextArea::show("edtProvEntregaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
				</fieldset>
			";
			
			$DDP=$viaEmbarqueId=="0000000502"?$ddpAereo:($viaEmbarqueId=="0000000493"?$ddpMaritimo:$ddpTerrestre);
			$lblInformacionNecesaria = claseLabel::show("lblInformacionNecesaria", "", "labelFormulario--title", "Información necesaria para enviar la Solicitud:");

			$mostrar="
				<div class='section-container-header'>
					".claseButtonUploadFile::show("btnUploadFile", "button button-blue", "relative", "50px", "40px", 1, 1, "visible","<i class='fa fa-paperclip'></i>",$onclickBtnUploadFile,"Adjuntar archivo(s)")."
					<fieldset class='section-container-header--section-right'>
						".$lblCotizacion."
						<div>
							".$txtCotizacion."
							".$txtRequerimiento."
						</div>
					</fieldset>
				</div>
				<fieldset class='section-container-body'>
				<legend>".$lblInformacionNecesaria."</legend>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoOrigen", "schPuertoOrigen", "labelFormulario section-container-body__label", $lblPuertoOrigen)."
						".claseSearch::show("schPuertoOrigen", "search section-container-body__search", "Buscar...", $onchangeSchPuertoOrigen, "", "", $onblurSchPuertoOrigen, $onSelectSchPuertoOrigen, "lstPuertoOrigen")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoDestino", "schPuertoDestino", "labelFormulario section-container-body__label", $lblPuertoDestino)."
						".claseSearch::show("schPuertoDestino", "search section-container-body__search", "Buscar...", $onchangeSchPuertoDestino, "", "", $onblurSchPuertoDestino, $onSelectSchPuertoDestino, "lstPuertoDestino")."
					</fieldset>
					<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblTipoCarga","cmbTipoCarga", "labelFormulario section-container-body__label", $lblTipoCarga)."
						".claseComboBox::show("cmbTipoCarga", "select section-container-body__select", "", $onfocusCmbTipoCarga, $onchangeCmbTipoCarga)."
					</fieldset>
					<div id='divControlesTipoCarga' class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
					</div>
					<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblTipoMercaderia", "cmbTipoMercaderia", "labelFormulario section-container-body__label", $lblTipoMercaderia)."
						".claseComboBox::show("cmbTipoMercaderia", "select section-container-body__select", "", $onfocusCmbTipoMercaderia, $onchangeCmbTipoMercaderia)."
					</fieldset>
					<div id='divControltxtClaseIMO' class='section-container-body__fieldset section-container-body__fieldset--tipo-carga'>
					</div>
					<div id='divControltxtUN' class='section-container-body__fieldset section-container-body__fieldset--tipo-carga'>
					</div>
					<div id='divControlFileUpload' class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
					</div>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblValorMercaderia", "txtValorMercaderia", "labelFormulario section-container-body__label", $lblValorMercaderia)."
						".claseTextBox::show("txtValorMercaderia", "text", "select", claseTextBox::$money, 12, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblValorFlete", "txtValorFlete", "labelFormulario section-container-body__label", $lblValorFlete)."
						".claseTextBox::show("txtValorFlete", "text", "select", claseTextBox::$money, 12, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblSubPartidaArancelaria", "txtSubPartidaArancelaria", "labelFormulario section-container-body__label", $lblSubPartidaArancelaria)."
						".claseTextBox::show("txtSubPartidaArancelaria", "text", "select", claseTextBox::$string, 30, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPartidaArancelaria", "txtPartidaArancelaria", "labelFormulario section-container-body__label hidden", $lblPartidaArancelaria)."
						".claseTextBox::show("txtPartidaArancelaria", "text", "select hidden", claseTextBox::$string, 30, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset--block'>
						<div id='divControledtDescMercaderia' style='width: 100%;'>
							".claseLabel::show("lblDescMercaderia", "edtDescMercaderia", "labelFormulario section-container-body__label", $lblDescMercaderia)."
							".claseTextArea::show("edtDescMercaderia", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
						</div>
					</fieldset>
					<fieldset class='section-container-body__fieldset--block'>
						".claseLabel::show("lblInfoAdicional", "edtInfoAdicional", "labelFormulario section-container-body__label", $lblInfoAdicional)."
						".claseTextArea::show("edtInfoAdicional", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
					</fieldset>
					".$DDP."
					".claseLabel::show("lblMensajeObligatorio", "", "obligatorio", $lblMensajeObligatorio)."
				</fieldset>
			";
			return $mostrar;
		}
		
		public static function saveRecord() {
			//Obtener Variables
			$mostrar			 = "Ocurrió un error al tratar de enviar la Solicitud de Cotización.";
			$arrayMail			 = array(); 
			$dataArrayAgentes	 = $_GET["dataArrayAgentes"];
			$dataObjectInicio 	 = $_GET["dataObjectInicio"];
			$dataObjectIncoterms = $_GET["dataObjectIncoterms"];
			$previewMail		 = $_GET["PreviewMail"];
			$previewTarifas		 = $_GET["PreviewTarifas"];
			$userCode			 = strtoupper($_SESSION["userCode"]);
			$userCompany		 = strtolower($_SESSION["empresa"]);
			
			$arrayAgentes = json_decode($dataArrayAgentes,true);
			$arrayInicio = json_decode($dataObjectInicio,true);
			$arrayDDP	 = json_decode($dataObjectIncoterms,true);
			
			$ciudadId			= 	$arrayInicio["CiudadID"];
			$incotermsId		= 	$arrayInicio["IncotermsID"];
			$viaEmbarqueId		= 	$arrayInicio["ViaEmbarqueID"];
			$clienteId			=	$arrayInicio["ClienteID"];
			$cliente			=	$arrayInicio["Cliente"];
			$filePDF			= 	$arrayInicio["FilePDF"];
			$adjunto1			= 	$arrayInicio["Adjunto1"];
			$adjunto2			= 	$arrayInicio["Adjunto2"];
			$adjunto3			= 	$arrayInicio["Adjunto3"];
			$adjunto4			= 	$arrayInicio["Adjunto4"];
			$adjunto5			= 	$arrayInicio["Adjunto5"];
			
			$puertoOrigenId		=	$arrayDDP["PuertoOrigenId"];
			$puertoDestinoId	=	$arrayDDP["PuertoDestinoId"];
			$tipoCargaId		=	$arrayDDP["TipoCargaId"];
			$tipoMercaderiaId	=	$arrayDDP["TipoMercaderiaId"];
			$descMercaderia		=	$arrayDDP["DescMercaderia"];
			$infoAdicional		=	$arrayDDP["InfoAdicional"];
			$cantidadContenedor =	str_replace(",",".",$arrayDDP["CantidadContenedor"]);
			$tipoContenedorId	=	$arrayDDP["TipoContenedorId"];
			$descContenedor		=	$arrayDDP["DescContenedor"];
			$peso				=	str_replace(",",".",$arrayDDP["Peso"]);
			$pesoVolumen		=	str_replace(",",".",$arrayDDP["PesoVolumen"]);
			$volumen			=	str_replace(",",".",$arrayDDP["Volumen"]);
			$bultos				=	str_replace(",",".",$arrayDDP["Bultos"]);
			$unidadId			=	$arrayDDP["UnidadId"];
			$pesoVolumenId		=	$arrayDDP["PesoVolumenId"];
			$volumenId			=	$arrayDDP["VolumenId"];
			$embalajeId			=	$arrayDDP["EmbalajeId"];
			$dimensionBultos	=	$arrayDDP["DimensionBultos"];
			$claseImo			=	$arrayDDP["ClaseImo"];
			$un					=	$arrayDDP["Un"];
			$proveedorName		=	$arrayDDP["ProveedorName"];
			$provRecogidaDir	= 	$arrayDDP["ProvRecogidaDir"];
			$provEntregaDir		= 	$arrayDDP["ProvEntregaDir"];
			$navieraId			= 	$arrayDDP["NavieraId"];
			$valorMercaderia	= 	str_replace(",",".",$arrayDDP["ValorMercaderia"]);
			$valorFlete			= 	str_replace(",",".",$arrayDDP["ValorFlete"]);
			$partidaArancelaria	= 	$arrayDDP["PartidaArancelaria"];
			$subPartidaArancelaria	= 	$arrayDDP["SubPartidaArancelaria"];
			$coloaderDestino	= 	$arrayDDP["ColoaderDestino"];
			$cotizacion			=	$arrayDDP["Cotizacion"];
			$requerimiento		=	$arrayDDP["Requerimiento"];
			$pcid               =   $_SERVER["SERVER_NAME"];
			
			$navieraName	= $viaEmbarqueId == "0000000502"?"la Aereolinea.":($tipoCargaId=="0000000206"?"el Coloader en Origen.":"la Naviera."); 
			
			$dir = "files/filesTemp/";
			$pathDestino = "files/webCotizadorTolepuFilesPDF/";
			
			$arrayMail[0]["error"]=-1;
			$arrayMail[0]["message"]=$mostrar;
			
			//Validaciones
			if ( $cliente == "" )
			{
				$mostrar="
					No ha seleccionado el Cliente de la Solicitud.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $arrayAgentes[0] == "" )
			{
				$mostrar="
					No existen Agentes, o debe seleccionarlos<br> antes de enviar la Solicitud.
				";
				$arrayMail[0]["error"]=2;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $puertoOrigenId == ""  )
			{
				$mostrar="
					No ha seleccionado el ".($viaEmbarqueId=="0000000502"?" Aeropuerto ":($viaEmbarqueId=="0000000493"?" Puerto ":" Lugar "))."de Origen.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $puertoDestinoId == ""  )
			{
				$mostrar="
					No ha seleccionado el ".($viaEmbarqueId=="0000000502"?" Aeropuerto ":($viaEmbarqueId=="0000000493"?" Puerto ":" Lugar "))."de Destino.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $tipoCargaId == ""  )
			{
				$mostrar="
					No ha seleccionado el Tipo de Carga.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $tipoMercaderiaId == ""  )
			{
				$mostrar="
					No ha seleccionado el Tipo de Mercadería.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			else
			{
				if ( $tipoMercaderiaId == "0000001885"  ) //Peligrosa
				{
					if ( ( $claseImo == "" ) || ( $un == "" ) )
					{
						if ( $un == "" ){$message="No ha ingresado el número UN.";}
						if ( $claseImo == "" ){$message="No ha ingresado la Clase IMO.";}						
						$arrayMail[0]["error"]=1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);
						return $stringJson;
					}
					
					if ( $filePDF == "" )
					{
						//$message="Debe adjuntar el archivo MSDS.";
						//$arrayMail[0]["error"]=1;
						//$arrayMail[0]["message"]=$message;
						//$stringJson=json_encode($arrayMail);
						//return $stringJson;
					}
					else
					{
						if ( !file_exists ( $dir.$filePDF ) )
						{
							$message="Primero debe subir el archivo MSDS al servidor.";
							$arrayMail[0]["error"]=1;
							$arrayMail[0]["message"]=$message;
							$stringJson=json_encode($arrayMail);			
							return $stringJson;
						}	
					}
				}
			}
			
			if ( $tipoCargaId == "0000000204" ) // Contenedor
			{
				if ( $cantidadContenedor == 0 && $tipoContenedorId != "0000001880" )
				{
					$mostrar="
						Debe especificar la Cantidad de Contenedores.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
				}
				if ( ( $cantidadContenedor < 0 ) || ( $cantidadContenedor > 20 ) )
				{
					$mostrar="
						La Cantidad de Contenedores debe estar en un rango entre 1 y 20.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
				}
				if ( $tipoContenedorId == "" )
				{
					//terrestre
					$mostrar=$viaEmbarqueId=="0000000499"?"Debe especificar el Tipo de Vehículo.":"Debe especificar el Tipo de Contenedor de la carga.";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
				}else
				{
					if ( ( $tipoContenedorId == "0000001880" ) && ( $descContenedor == "" ) ) //Varios Contenedores
					{
						/*
						$mostrar="
							Especifique la Descripción de los Contenedores.
						";
						$arrayMail[0]["error"]=1;
						$arrayMail[0]["message"]=$mostrar;
						$stringJson=json_encode($arrayMail);
						return $stringJson;	
						*/
					}
				}
			}
			else
			{
				if ( ( $peso > 0 ) && ( $unidadId == "" ) )
				{
					/*
					$mostrar="
						Debe seleccionar la Unidad métrica de la carga.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
					*/
				}
				if ( ( $pesoVolumen > 0 ) && ( $pesoVolumenId == "" ) )
				{
					/*
					$mostrar="
						Debe seleccionar la Unidad de Peso Volúmen de la carga.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;
					*/	
				}
				if ( ( $volumen > 0 ) && ( $volumenId == "" ) )
				{
					/*
					$mostrar="
						Debe seleccionar la Unidad volumétrica de la carga.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
					*/
				}
				if ( ( $bultos > 0 ) && ( $embalajeId == "" ) )
				{
					$mostrar="
						Debe seleccionar el embalaje de la carga.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	
				}
			}
			if ( $navieraId == ""  )
			{
				$mostrar="
					Debe registrar $navieraName
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}

			if ( $valorMercaderia <= 0 ) {
				if ( $valorMercaderia < 0 ) {
					$mostrar="El Valor de la Mercadería es incorrecto.";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;	

				} 
				if ( $viaEmbarqueId == "0000000499") {
					$mostrar="Debe ingresar el Valor de la Mercadería.";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;

				}

			}
			if ( $valorFlete <= 0 )
			{
				if ( $valorFlete < 0 )
				{
					$mostrar="El Valor del Flete es incorrecto.";
				}else
				{
					$mostrar="Debe ingresar el Valor del Flete.";
				}
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;	
			}
			/*
			if ( $partidaArancelaria == ""  )
			{
				$mostrar="
					Debe registrar la Partida Arancelaria Sugerida.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			*/
			if ( $subPartidaArancelaria == ""  )
			{
				$mostrar="
					Debe registrar la Sub Partida Arancelaria.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( ( $provRecogidaDir == "" ) && ( $viaEmbarqueId == "0000000499" ) ) //Terrestre
			{
				$mostrar="
					Debe registrar la Dirección de Recogida.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( $provEntregaDir == ""  )
			{
				$mostrar="
					Debe registrar la Dirección de Entrega en Destino.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			
			if ( $filePDF !== "" )
			{
				$fileOrigen = $dir.$filePDF;
				$fileDestino = $pathDestino.$filePDF;
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo MSDS a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			
			//Adjuntos
			if ( $adjunto1 !== "" )
			{
				$fileOrigen  = $dir.$adjunto1;
				$fileDestino = $pathDestino.$adjunto1;				
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo $adjunto1 a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			if ( $adjunto2 !== "" )
			{
				$fileOrigen  = $dir.$adjunto2;
				$fileDestino = $pathDestino.$adjunto2;
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo $adjunto2 a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			if ( $adjunto3 !== "" )
			{
				$fileOrigen  = $dir.$adjunto3;
				$fileDestino = $pathDestino.$adjunto3;
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo $adjunto3 a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			if ( $adjunto4 !== "" )
			{
				$fileOrigen  = $dir.$adjunto4;
				$fileDestino = $pathDestino.$adjunto4;
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo $adjunto4 a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			if ( $adjunto5 !== "" )
			{
				$fileOrigen  = $dir.$adjunto5;
				$fileDestino = $pathDestino.$adjunto5;
				if ( !file_exists ( $fileDestino ) )
				{
					if ( !copy($fileOrigen, $fileDestino) )
					{
						$message="Ocurrió un error al tratar de adjuntar el archivo $adjunto5 a la solicitud de correo.";
						$arrayMail[0]["error"]=-1;
						$arrayMail[0]["message"]=$message;
						$stringJson=json_encode($arrayMail);			
						return $stringJson; 
					}
				}
			}
			
			if (( $previewMail === "false" ) && ( $previewTarifas === "true" )){
				
				$jSonArrayCargarAgentes	 =	clasePreviewTarifas::cargarAgentes($dataArrayAgentes,$dataObjectInicio,$dataObjectIncoterms);
				$arrayCargarAgentes	 	 =	json_decode($jSonArrayCargarAgentes,true);
				
								
				$error			= 	$arrayCargarAgentes[0]["error"];
				$mostrar		= 	$arrayCargarAgentes[0]["message"];
				$titulo			= 	$arrayCargarAgentes[0]["titulo"];
				
				$arrayMail[0]["error"]	 = $error;
				$arrayMail[0]["message"] = $mostrar;
				$arrayMail[0]["titulo"]	 = $titulo;
				$stringJson				 = json_encode($arrayMail);			
				return $stringJson;	

			}
			
			$strSQL="";
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			
			if (( $previewMail === "true" ) && ( $previewTarifas === "false" )){
				$strSQL="
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Email
					'$ciudadId','$incotermsId','$viaEmbarqueId','$puertoOrigenId','$puertoDestinoId','$tipoCargaId','$tipoMercaderiaId','$descMercaderia', 
					'$infoAdicional',$cantidadContenedor,'$tipoContenedorId','$descContenedor',$peso,$pesoVolumen,$volumen,$bultos,'$unidadId',
					'$pesoVolumenId','$volumenId','$embalajeId','$dimensionBultos','$claseImo','$un','$proveedorName','$provRecogidaDir','$provEntregaDir', 
					'$navieraId',$valorMercaderia,$valorFlete,'$partidaArancelaria','$subPartidaArancelaria','$coloaderDestino','$userCode','$userCompany',
					'$cliente','$cotizacion'
				";
			}else{
				$strSQL="
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_SaveRecord 
					'$ciudadId','$incotermsId','$viaEmbarqueId','$puertoOrigenId','$puertoDestinoId','$tipoCargaId','$tipoMercaderiaId','$descMercaderia', 
					'$infoAdicional',$cantidadContenedor,'$tipoContenedorId','$descContenedor',$peso,$pesoVolumen,$volumen,$bultos,'$unidadId',
					'$pesoVolumenId','$volumenId','$embalajeId','$dimensionBultos','$claseImo','$un','$proveedorName','$provRecogidaDir','$provEntregaDir', 
					'$navieraId',$valorMercaderia,$valorFlete,'$partidaArancelaria','$subPartidaArancelaria','$coloaderDestino','$filePDF','$adjunto1',
					'$adjunto2','$adjunto3','$adjunto4','$adjunto5','$userCode','$userCompany','$clienteId','$cliente','$cotizacion','$pcid','','$requerimiento'
				";
			}
			
			$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayMail)); 
			$baseDatos->desconectarDB();
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$error 	 	= $baseDatos->sysGetDataFieldSrv( $row[ 'NumError' ] );
				$message 	= $baseDatos->sysGetDataFieldSrv( $row[ 'Mensaje' ] );
				$titulo 	= $baseDatos->sysGetDataFieldSrv( $row[ 'Titulo' ] );
			}
			
			$arrayMail[0]["error"]=$error;
			$arrayMail[0]["message"]=$message;
			$arrayMail[0]["titulo"]=$titulo;
			$stringJson=json_encode($arrayMail);			
			return $stringJson;
		}
	}
?>