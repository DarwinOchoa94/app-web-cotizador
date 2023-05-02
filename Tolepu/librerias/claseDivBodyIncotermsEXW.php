<?php
	class claseDivBodyIncotermsEXW {
		public static function show() {
			$variables                 = $_GET["variables"];
			$arrayControl              = json_decode($variables,true);
			$obligatorio               = "<span class='obligatorio'>*</span>";
			$lblMensajeObligatorio     = "Los campos con (*) son obligatorios.";
			$ciudadId			       = $arrayControl["CiudadID"];
			$incotermsId		       = $arrayControl["IncotermsID"];
			$viaEmbarqueId		       = $arrayControl["ViaEmbarqueID"];
			
			$lblFleteAproximado        = "Flete aproximado según lugar de Origen y Destino.";
			$lblPuertoOrigen           = $viaEmbarqueId=="0000000502"?"Aeropuerto de Origen:":($viaEmbarqueId=="0000000493"?"Puerto de Origen:":"Lugar de Origen:");
			$lblPuertoOrigen           = $obligatorio.$lblPuertoOrigen;
			$lblPuertoDestino          = $viaEmbarqueId=="0000000502"?"Aeropuerto de Destino:":($viaEmbarqueId=="0000000493"?"Puerto de Destino:":"Lugar de Destino:");
			$lblPuertoDestino          = $obligatorio.$lblPuertoDestino;
			$lblValorMercaderia        = "Valor de la Mercadería ( aprox. )";
			$lblValorMercaderia        = $obligatorio.$lblValorMercaderia;
			
			$lblTipoCarga		       = $obligatorio."Tipo de Carga:";
			$lblTipoMercaderia	       = $obligatorio."Tipo de Mercadería:";
			$lblDescMercaderia	       = "Descripción de la Mercadería:";
			$lblProvRecogidaDir	       = "Dirección de Recogida:";
			$lblProvEntregaDir         = "Dirección de Entrega en Destino:";
			$lblProveedor		       = "Proveedor:";
			$lblInfoAdicional	       = "Consideraciones Especiales:";
			$lblNumCotizacion	       = date(Y)."QT####";
			$lblNumRequerimiento       = date(Y)."REQ####";
			$lblCotizacion		       = claseLabel::show("lblCotizacion", "txtCotizacion", "labelFormulario", "Incluir cotización o requerimiento existente.");
			$lblNotaEXWTerrestre       = claseLabel::show("lbl-NotaEXW-Terrestre", "", "labelFormulario--title", "");
			
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

			//".claseComboBox::show("cmbPuertoOrigen", "select", "relative", "100%", 10, 0, 0, "hidden", "", $onfocusCmbPuertoOrigen, $onchangeCmbPuertoOrigen)."
			//".claseComboBox::show("cmbPuertoDestino", "select", "relative", "100%", 10, 0, 0, "visible", "", $onfocusCmbPuertoDestino, $onchangeCmbPuertoDestino)."
			
			$txtCotizacion    = claseTextBox::show("txtCotizacion", "text", "select", claseTextBox::$string, 10, $lblNumCotizacion, $onchangeTxtCotizacion);
			$txtRequerimiento = claseTextBox::show("txtRequerimiento", "text", "select", claseTextBox::$string, 11, $lblNumRequerimiento, $onchangeTxtRequerimiento);
			$lblInformacionNecesaria = claseLabel::show("lblInformacionNecesaria", "", "labelFormulario--title", "Información necesaria para enviar la Solicitud:");

			$ewxBody="
				<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
					".claseLabel::show("lblTipoCarga","cmbTipoCarga", "labelFormulario section-container-body__label", $lblTipoCarga)."
					".claseComboBox::show("cmbTipoCarga", "select section-container-body__select", "", $onfocusCmbTipoCarga, $onchangeCmbTipoCarga)."
				</fieldset>
				<div id='divControlesTipoCarga' class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
				</div>
				<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
					".claseLabel::show("lblProveedor", "txtProveedor", "labelFormulario section-container-body__label", $lblProveedor)."
					".claseTextBox::show("txtProveedor", "text", "select section-container-body__select", claseTextBox::$string, 50, "")."
				</fieldset>
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
			";

				
			$exwMaritimo="
				<fieldset class='section-container-body'>
				<legend>".$lblInformacionNecesaria."</legend>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoOrigen", "schPuertoOrigen", "labelFormulario section-container-body__label hidden", $lblPuertoOrigen)."
						".claseSearch::show("schPuertoOrigen", "search section-container-body__search hidden", "Buscar...", $onchangeSchPuertoOrigen, "", "", $onblurSchPuertoOrigen, $onSelectSchPuertoOrigen, "lstPuertoOrigen")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoDestino", "schPuertoDestino", "labelFormulario section-container-body__label", $lblPuertoDestino)."
						".claseSearch::show("schPuertoDestino", "search section-container-body__search", "Buscar...", $onchangeSchPuertoDestino, "", "", $onblurSchPuertoDestino, $onSelectSchPuertoDestino, "lstPuertoDestino")."
					</fieldset>
					".$ewxBody."
					<fieldset class='section-container-body__fieldset--block'>
						".claseLabel::show("lblProvRecogidaDir", "edtProvRecogidaDir", "labelFormulario section-container-body__label", $lblProvRecogidaDir)."
						".claseTextArea::show("edtProvRecogidaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
					</fieldset>
				</fieldset>
			";
			
			$exwAereo="
				<fieldset class='section-container-body'>
				<legend>".$lblInformacionNecesaria."</legend>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoOrigen", "schPuertoOrigen", "labelFormulario section-container-body__label hidden", $lblPuertoOrigen)."
						".claseSearch::show("schPuertoOrigen", "search section-container-body__search hidden", "Buscar...", $onchangeSchPuertoOrigen, "", "", $onblurSchPuertoOrigen, $onSelectSchPuertoOrigen, "lstPuertoOrigen")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoDestino", "schPuertoDestino", "labelFormulario section-container-body__label", $lblPuertoDestino)."
						".claseSearch::show("schPuertoDestino", "search section-container-body__search", "Buscar...", $onchangeSchPuertoDestino, "", "", $onblurSchPuertoDestino, $onSelectSchPuertoDestino, "lstPuertoDestino")."
					</fieldset>
					".$ewxBody."
					<fieldset class='section-container-body__fieldset--block'>
						".claseLabel::show("lblProvRecogidaDir", "edtProvRecogidaDir", "labelFormulario section-container-body__label", $lblProvRecogidaDir)."
						".claseTextArea::show("edtProvRecogidaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
					</fieldset>
				</fieldset>
			";
			
			$exwTerrestre="
				<fieldset class='section-container-body'>
				<legend>".$lblInformacionNecesaria."</legend>
					".claseLabel::show("lblFleteAproximado", "", "labelFormulario section-container-body__label ", $lblFleteAproximado)."
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoOrigen", "schPuertoOrigen", "labelFormulario section-container-body__label", $lblPuertoOrigen)."
						".claseSearch::show("schPuertoOrigen", "search section-container-body__search", "Buscar...", $onchangeSchPuertoOrigen, "", "", $onblurSchPuertoOrigen, $onSelectSchPuertoOrigen, "lstPuertoOrigen")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblPuertoDestino", "schPuertoDestino", "labelFormulario section-container-body__label", $lblPuertoDestino)."
						".claseSearch::show("schPuertoDestino", "search section-container-body__search", "Buscar...", $onchangeSchPuertoDestino, "", "", $onblurSchPuertoDestino, $onSelectSchPuertoDestino, "lstPuertoDestino")."
					</fieldset>
					".$ewxBody."
					<fieldset class='section-container-body__fieldset--block'>
						".claseLabel::show("lblProvRecogidaDir", "edtProvRecogidaDir", "labelFormulario section-container-body__label", $lblProvRecogidaDir)."
						".claseTextArea::show("edtProvRecogidaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset--block'>
						".claseLabel::show("lblProvEntregaDir", "edtProvEntregaDir", "labelFormulario section-container-body__label", $lblProvEntregaDir)."
						".claseTextArea::show("edtProvEntregaDir", "select section-container-body__text-area", claseTextArea::$string, 800, "")."
					</fieldset>
					<fieldset class='section-container-body__fieldset'>
						".claseLabel::show("lblValorMercaderia", "txtValorMercaderia", "labelFormulario section-container-body__label", $lblValorMercaderia)."
						".claseTextBox::show("txtValorMercaderia", "text", "select", claseTextBox::$money, 12, "")."
					</fieldset>
				</fieldset>
			";
			
			$EXW=$viaEmbarqueId=="0000000502"?$exwAereo:($viaEmbarqueId=="0000000493"?$exwMaritimo:$exwTerrestre);
			
			$mostrar="
				<div class='section-container-header'>
					".claseButtonUploadFile::show("btnUploadFile", "button button-blue", "relative", "50px", "40px", 1, 1, "visible","<i class='fa fa-paperclip'></i>",$onclickBtnUploadFile,"Adjuntar archivo(s)")."
					<fieldset class='section-container-header--section-right'>
						".$lblCotizacion."
						<div>
							".$txtCotizacion."
							".$txtRequerimiento."
						</div>
						".$lblNotaEXWTerrestre."
					</fieldset>
				</div>
				".$EXW."
				".claseLabel::show("lblMensajeObligatorio", "", "obligatorio", $lblMensajeObligatorio)."
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
			$arrayEXW	 = json_decode($dataObjectIncoterms,true);
			
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
			
			$puertoOrigenId		=	$arrayEXW["PuertoOrigenId"];
			$puertoDestinoId	=	$arrayEXW["PuertoDestinoId"];
			$tipoCargaId		=	$arrayEXW["TipoCargaId"];
			$tipoMercaderiaId	=	$arrayEXW["TipoMercaderiaId"];
			$descMercaderia		=	$arrayEXW["DescMercaderia"];
			$infoAdicional		=	$arrayEXW["InfoAdicional"];
			$cantidadContenedor =	str_replace(",",".",$arrayEXW["CantidadContenedor"]);
			$tipoContenedorId	=	$arrayEXW["TipoContenedorId"];
			$descContenedor		=	$arrayEXW["DescContenedor"];
			$peso				=	str_replace(",",".",$arrayEXW["Peso"]);
			$pesoVolumen		=	str_replace(",",".",$arrayEXW["PesoVolumen"]);
			$volumen			=	str_replace(",",".",$arrayEXW["Volumen"]);
			$bultos				=	str_replace(",",".",$arrayEXW["Bultos"]);
			$unidadId			=	$arrayEXW["UnidadId"];
			$pesoVolumenId		=	$arrayEXW["PesoVolumenId"];
			$volumenId			=	$arrayEXW["VolumenId"];
			$embalajeId			=	$arrayEXW["EmbalajeId"];
			$dimensionBultos	=	$arrayEXW["DimensionBultos"];
			$claseImo			=	$arrayEXW["ClaseImo"];
			$un					=	$arrayEXW["Un"];
			$proveedorName		=	$arrayEXW["ProveedorName"];
			$provRecogidaDir	= 	$arrayEXW["ProvRecogidaDir"];
			$provEntregaDir		= 	$arrayEXW["ProvEntregaDir"];
			$navieraId			= 	$arrayEXW["NavieraId"];
			$valorMercaderia	= 	str_replace(",",".",$arrayEXW["ValorMercaderia"]);
			$valorFlete			= 	str_replace(",",".",$arrayEXW["ValorFlete"]);
			$partidaArancelaria	= 	$arrayEXW["PartidaArancelaria"];
			$subPartidaArancelaria	= 	$arrayEXW["SubPartidaArancelaria"];
			$coloaderDestino	= 	$arrayEXW["ColoaderDestino"];
			$cotizacion			=	$arrayEXW["Cotizacion"];
			$requerimiento		=	$arrayEXW["Requerimiento"];
			$pcid               =   $_SERVER["SERVER_NAME"];
			
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
			if ( $viaEmbarqueId === "0000000499" ){ //Terrestre
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
			if ( ( $valorMercaderia <= 0 ) && ( $viaEmbarqueId === "0000000499" ) )
			{
				if ( $valorMercaderia < 0 )
				{
					$mostrar="El Valor de la Mercadería es incorrecto.";
				}else
				{
					$mostrar="Debe ingresar el Valor de la Mercadería.";
				}
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;	
			}
			/*
			if ( $proveedorName == ""  )
			{
				$mostrar="
					Debe registrar el Proveedor.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			*/
			/*
			if ( $provRecogidaDir == ""  )
			{
				$mostrar="
					Debe registrar la Dirección de Recogida.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			if ( ( $provEntregaDir == "" )  && ( $viaEmbarqueId == "0000000499" ) )
			{
				$mostrar="
					Debe registrar la Dirección de Entrega en Destino.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}
			*/
			if ( $filePDF !== "" )
			{
				$fileOrigen  = $dir.$filePDF;
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