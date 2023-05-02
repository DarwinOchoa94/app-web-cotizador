<?php
	class clasePreviewTarifas {
		public static function load() {
			$mostrar="
				<div id='divPreviewTarifasBackGround' class='container-preview-tarifas-background'>
					<div id='divPreviewTarifas' class='container-preview-tarifas'>
						<div class='header-preview-tarifas'>
							<h1 id='h1TituloPreviewTarifas' class='header-preview-tarifas__title'>Tarifas por Agente del Exterior</h1>
						</div>
						<div id='divVisorTarifas'class='visor-tarifas'>
						</div>
						<div class='button-group-tarifas'>
							<button id='btnGenerarCotizacion' class='button button-blue button-tarifas disabled' onclick='generarCotizacionConfirm();'>Generar Cotizaciones</button>
							<button class='button button-blue button-tarifas' onclick='apagarPreviewTarifas();'>Cerrar</button>
						</div>
					</div>
				</div>
				<div id='divEditTarifasBackGround' class='container-edit-tarifas-background'>
					<div id='divEditTarifas' class='container-edit-tarifas'>
						<div class='header-edit-tarifas'>
							<h1 id='h1TituloEditTarifas' class='header-edit-tarifas__title'>Editar Tarifas.</h1>
						</div>
						<div id='divEditTarifasDetail' class='edit-tarifas-detail'>
						</div>
						<div class='button-group-tarifas'>
							<button id='btnEditTarifas' class='button button-blue button-tarifas' onclick='generarCotizacionTemp();'>Aceptar</button>
							<button class='button button-blue button-tarifas' onclick='apagarEditTarifas();'>Cancelar</button>
						</div>
					</div>
				</div>				
				<script language='javaScript'>
					function encenderPreviewTarifas() {
						var error = 1;
						var icon  = 1;
						var funcion = '';
						var btnGenerarCotizacion = document.getElementById('btnGenerarCotizacion');
						var incotermsId = document.getElementById('cmbIncoterms').value;
						var sJsonArrayAgentes=obtenerAgentes();
						var sJsonDataObjectInicio=getDataObjectInicio();						
						var sJsonDataObjectIncoterms=getDataObjectIncoterms();
						var purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=validarEnvio&incotermsId='+incotermsId;
						var content=getContent(purl);
						content=JSON.parse(content);
						purl = './index.php?action=ejecutarAjax&clase=claseDivBodyIncoterms'+content.Incoterms+'&metodo=saveRecord&dataArrayAgentes='+sJsonArrayAgentes+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms+'&PreviewMail=false&PreviewTarifas=true';
						content	= getContent(purl);
						content	= JSON.parse(content);
						error 	= parseInt(content[0]['error']);
						icon	= (error == -1)?3:((error == 0)?4:1);
						funcion = '';
						if ( ( error == 2 ) && ( estadoToggle == false ) ) {
							encenderMessageBox(icon,'',content[0]['message'],funcion);
							slideToggle('btnListaAgentes','Lista de Agentes del Exterior');
							return;
						}
						if ( error !== 0 ) {
							showObligatorios();
							encenderMessageBox(icon,'',content[0]['message'],funcion);
							return;
						}
						if ( error == 0 ) {
							document.getElementById(\"divVisorTarifas\").innerHTML=content[0]['message'];
							document.getElementById(\"h1TituloPreviewTarifas\").innerHTML=content[0]['titulo'];
						}
						
						var screenScrollTop = window.scrollY;
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
												
						var divPreviewTarifasBackGround = document.getElementById('divPreviewTarifasBackGround');
						divPreviewTarifasBackGround.classList.add('container-preview-tarifas-background-show');

						btnGenerarCotizacion.classList.add('disabled');
						btnGenerarCotizacion.setAttribute('disabled', 'true');
						
					}
					
					function apagarPreviewTarifas() {
						var divPreviewTarifasBackGround = document.getElementById('divPreviewTarifasBackGround');
						var tbodyAgentesComparar        = document.getElementById('tbodyAgentesComparar');
						var cotizacionTempId            = '';
						var purl                        = '';
						var content                     = '';
						
						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';
						divPreviewTarifasBackGround.classList.remove('container-preview-tarifas-background-show');

						for ( var i=0; i<tbodyAgentesComparar.childElementCount; i++ ) {
							cotizacionTempId = tbodyAgentesComparar.children.item(i).getAttribute('data-cotizaciontemp-id');
							if ( cotizacionTempId.trim().length > 0 ) {
								purl = './index.php?action=ejecutarAjax&clase=clasePreviewTarifas&metodo=deleteCotizacionTemp&cotizacionTempId='+cotizacionTempId;
								content = getContent(purl);
							}
						}						
					}

					function encenderEditTarifas(switchAgenteId) {
						var divEditTarifasBackGround = document.getElementById('divEditTarifasBackGround');
						var screenScrollTop          = window.scrollY;
						
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						divEditTarifasBackGround.classList.add('container-edit-tarifas-background-show');
						loadEditTarifas(switchAgenteId);
					}

					function apagarEditTarifas() {
						var divEditTarifasBackGround = document.getElementById('divEditTarifasBackGround');						

						divEditTarifasBackGround.classList.remove('container-edit-tarifas-background-show');
					}

					function calcularTotal(input) {
						var tbEditTarifas = document.getElementById('tb-edit-tarifas');
						var colSubtotal   = document.getElementById('tf-edit-tarifas-subtotal1');
						var colIva        = document.getElementById('tf-edit-tarifas-subtotal2');
						var colTotal      = document.getElementById('tf-edit-tarifas-subtotal3');
						var oldValue      = input.getAttribute('data-old-value');
						var costo         = parseFloat(input.parentElement.previousElementSibling.firstElementChild.value);
						var valor         = parseFloat(input.value);
						var tipoServicio  = '';
						var subtotal      = 0;
						var iva           = 0;
						var total         = 0;
						var caption       = '';
						var metodoSi      = '';
						var icon          = 3;

						if ( valor < 0 ) {
							input.value = oldValue;
							caption  = 'No puede ingresar un precio negativo.';
							metodoSi = 'scrollLock();';
							encenderMessageBox(icon, '', caption, metodoSi);
							return false;

						} else {
							if ( valor < costo ) {
								input.value = oldValue;
								caption     = 'No puede ingresar un precio menor al costo establecido.';
								metodoSi    = 'scrollLock();';
								encenderMessageBox(icon, '', caption, metodoSi);
								return false;
							}
						}

						for ( var i = 0; i < tbEditTarifas.childElementCount; i++ ) {
							tipoServicio = tbEditTarifas.children.item(i).firstElementChild.getAttribute('data-tipo-servicio');
							subtotal = subtotal + parseFloat(tbEditTarifas.children.item(i).lastElementChild.firstElementChild.value);

							if ( tipoServicio === 'L' ) {
								iva = iva + parseFloat(tbEditTarifas.children.item(i).lastElementChild.firstElementChild.value);
							}
						}

						iva = (iva * 0.12);

						input.value           = valor.toFixed(2);
						colSubtotal.innerHTML = subtotal.toFixed(2);
						colIva.innerHTML      = iva.toFixed(2);
						colTotal.innerHTML    = (subtotal + iva).toFixed(2);
					}

					function generarCotizacionConfirm() {
						var icon     = 1;
						var tittle   = '';			
						var caption  = '';
						var metodoSi = '';
						var metodoNo = '';
						var txtCotizacion = document.getElementById('txtCotizacion');
						var tbodyAgentesComparar = document.getElementById('tbodyAgentesComparar');
						var marcados = 0;

						for ( var i = 0; i < tbodyAgentesComparar.childElementCount; i++ ) {
							if ( tbodyAgentesComparar.children.item(i).lastElementChild.firstElementChild.firstElementChild.firstElementChild.checked ) {
								marcados++;
							}
						}

						if ( txtCotizacion.value.trim().length > 0 && marcados > 1 ) {
							caption  = 'No puede generar varias cotizaciones si incluyó una cotización existente.';
							metodoSi = 'scrollLock();';
							encenderMessageBox(icon,tittle,caption,metodoSi);

						} else {
							icon     = 2;
							caption  = '¿Confirma que desea generar las cotizaciones seleccionadas?';
							metodoSi = 'generarCotizacion();';
							metodoNo = 'scrollLock();';
							encenderMessageBoxConfirm(icon,tittle,caption,metodoSi,metodoNo);

						}

					}
				</script>
			";
			return $mostrar;
		}

		public static function cargarAgentes($dataArrayAgentes,$dataObjectInicio,$dataObjectIncoterms) {								
			$arrayAgentes 	         = json_decode($dataArrayAgentes,true);
			$arrayInicio  	         = json_decode($dataObjectInicio,true);
			$arrayIncoterms	         = json_decode($dataObjectIncoterms,true);
			
			$ciudadId			     = $arrayInicio["CiudadID"];
			//$incotermsId		= 	$arrayInicio["IncotermsID"];
			$incotermsId             = "0000000052";
			$viaEmbarqueId		     = $arrayInicio["ViaEmbarqueID"];
			$clienteId			     = $arrayInicio["ClienteID"];
			$cliente			     = $arrayInicio["Cliente"];
			
			$arrayMail[0]["error"]   = -1;
			$arrayMail[0]["message"] = "No se pudieron obtener los Agentes";
			$arrayMail[0]["titulo"]	 = "";
			
			$puertoOrigenId		     = $arrayIncoterms["PuertoOrigenId"];
			$puertoDestinoId	     = $arrayIncoterms["PuertoDestinoId"];
			$tipoCargaId		     = $arrayIncoterms["TipoCargaId"];
			$tipoMercaderiaId	     = $arrayIncoterms["TipoMercaderiaId"];
			$descMercaderia		     = $arrayIncoterms["DescMercaderia"];
			$infoAdicional		     = $arrayIncoterms["InfoAdicional"];
			$cantidadContenedor      = str_replace(",",".",$arrayIncoterms["CantidadContenedor"]);
			$tipoContenedorId	     = $arrayIncoterms["TipoContenedorId"];
			$descContenedor		     = $arrayIncoterms["DescContenedor"];
			$peso				     = str_replace(",",".",$arrayIncoterms["Peso"]);
			$pesoVolumen		     = str_replace(",",".",$arrayIncoterms["PesoVolumen"]);
			$volumen			     = str_replace(",",".",$arrayIncoterms["Volumen"]);
			$bultos				     = str_replace(",",".",$arrayIncoterms["Bultos"]);
			$unidadId			     = $arrayIncoterms["UnidadId"];
			$pesoVolumenId		     = $arrayIncoterms["PesoVolumenId"];
			$volumenId			     = $arrayIncoterms["VolumenId"];
			$embalajeId			     = $arrayIncoterms["EmbalajeId"];
			$dimensionBultos	     = $arrayIncoterms["DimensionBultos"];
			$claseImo			     = $arrayIncoterms["ClaseImo"];
			$un					     = $arrayIncoterms["Un"];
			$proveedorName		     = $arrayIncoterms["ProveedorName"];
			$provRecogidaDir	     = $arrayIncoterms["ProvRecogidaDir"];
			$provEntregaDir		     = $arrayIncoterms["ProvEntregaDir"];
			$navieraId			     = $arrayIncoterms["NavieraId"];
			$valorMercaderia	     = str_replace(",",".",$arrayIncoterms["ValorMercaderia"]);
			$valorFlete			     = str_replace(",",".",$arrayIncoterms["ValorFlete"]);
			$partidaArancelaria	     = $arrayIncoterms["PartidaArancelaria"];
			$subPartidaArancelaria	 = $arrayIncoterms["SubPartidaArancelaria"];
			$coloaderDestino	     = $arrayIncoterms["ColoaderDestino"];
			$cotizacion			     = $arrayIncoterms["Cotizacion"];
			
			$rgb = array();
			
			$mostrar = "";
			$mostrar = "
				<div class='div-table-tarifas-container'>
					<div class='div-table-tarifas-body-agentes'>
						<table id='tblAgentesComparar' class='table'>
							<colgroup>
								<col class='col-numero'>
								<col class='col-nombre'>
								<col class='col-ciudad'>
								<col class='col-comparar'>
								<col class='col-generar'>
								<col class='col-generar'>
							</colgroup>
							<thead>
								<tr class='table-head'>
									<th class='col-numero'>#</th>
									<th class='col-nombre'>Nombre</th>
									<th class='col-ciudad'>Ciudad</th>
									<th class='col-comparar'>Comparar</th>
									<th class='col-email'>e-mail</th>
									<th class='col-generar'>Generar</th>
								</tr>
							</thead>
							<tbody id='tbodyAgentesComparar' class='table-body'>
			";
			
			$a = "a";
			$i = 0;
			$c = 0;
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			
			
			$rgb[0]  = "cyan";
			$rgb[1]  = "coral";
			$rgb[2]  = "aquamarine";
			$rgb[3]  = "chartreuse";
			$rgb[4]  = "darkturquoise";
			$rgb[5]  = "gold";
			$rgb[6]  = "greenyellow";
			$rgb[7]  = "lightblue";
			$rgb[8]  = "mediumpurple";
			$rgb[9]  = "royalblue";
			$rgb[10] = "yellow";
			$rgb[11] = "orange";
			$rgb[12] = "steelblue";
			$rgb[13] = "lawngreen";
			$rgb[14] = "darkcyan";
			$rgb[15] = "darkseagreen";
			$rgb[16] = "lightseagreen";
			$rgb[17] = "tomato";
			$rgb[18] = "yellowgreen";
			$rgb[19] = "skyblue";
			
			$existeTarifas = false;
			foreach( $arrayAgentes as $contactoAgenteId ) {
				$n = 0;
				$arrayLineaTransportes = array();
				$strSQL = "";
				$strSQL = "
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Select_Navieras_por_Agentes '$contactoAgenteId','$viaEmbarqueId','$incotermsId','$ciudadId', 
					'$puertoOrigenId','$puertoDestinoId','$tipoCargaId','$tipoMercaderiaId','$tipoContenedorId'
				";
				$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayMail)); 
				while ($row  =  $baseDatos->db_fetch_array( $rs )) {
					if ( $row['LineaTransporteID'] != "" ) {
						$arrayLineaTransportes[$n] = $baseDatos->sysGetDataFieldSrv( $row['LineaTransporteID'] );
						$existeTarifas = true;
					} 
					$n++;
				}
				
				foreach( $arrayLineaTransportes as $lineaTransporte ) {
					$i++;
					$strSQL="";
					$strSQL="
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Comparar '$contactoAgenteId','$viaEmbarqueId','$incotermsId','$ciudadId',
						'$puertoOrigenId','$puertoDestinoId','$tipoCargaId','$tipoMercaderiaId','$tipoContenedorId','$lineaTransporte'
					";
					$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayMail)); 
					while ($row  =  $baseDatos->db_fetch_array( $rs )) {
						$error 	 			= $baseDatos->sysGetDataFieldSrv( $row[ 'NumError' ] );
						$agenteExteriorName	= $baseDatos->sysGetDataFieldSrv( $row[ 'AgenteExteriorName' ] );
						$ciudadAgente 	    = $baseDatos->sysGetDataFieldSrv( $row[ 'CiudadAgente' ] );
						$autorizado 	    = $baseDatos->sysGetDataFieldSrv( $row[ 'Autorizado' ] );
						$tarifaCaducada 	= $baseDatos->sysGetDataFieldSrv( $row[ 'TarifaCaducada' ] );
						$titulo		 	    = $baseDatos->sysGetDataFieldSrv( $row[ 'Titulo' ] );
						$color			    = ($tarifaCaducada==="1")?"red":"#0478B5";
						$checkedAgente      = ""; //($i==1)?"checked":"";
						//<td><span class='opcionAgente' style='background-color:$rgb[$c];'>$a</span></td>
						//<td>$i</span></td>
						//onclick='agentesComparaSeleccionarAgente(this);'
						if ( $error >= 0 && $agenteExteriorName != '' ) {
							$mostrar.="
								<tr class='seleccionar-agente' 
									id='tr-agente-$a'
									data-contacto-agente-id='$contactoAgenteId' 
									data-linea-transporte='$lineaTransporte' 
									data-letra='$a' 
									data-color='$rgb[$c]' 
									data-tarifa-caducada='$tarifaCaducada'
									data-email-cliente=''
									data-cotizaciontemp-id=''
									data-agente-name='$agenteExteriorName'
								>
									<td style='text-align: center;'>
										<span class='opcionAgente' style='background-color:$rgb[$c];'>$a</span>
										<span class='fa fa-edit edit-tarifa disabled' onclick='editTarifa(this);' title='Editar Tarifa'></span>
										<input id='check-edit-tarifa-$a' type='checkbox' class='hidden' onblur='' onkeyup=''>
									</td>
									<td style='color: $color;'>$agenteExteriorName</td>
									<td class='col-ciudad' style='color: $color; text-align: center;'>$ciudadAgente</td>
									<td style='text-align: center; height: 1em; line-height: 1em;'>
										<span class='switch' onchange='validarSwitch(\"switchAgente$i\");'>
											<input id='switchAgente$i' type='checkbox' $checkedAgente>
											<label for='switchAgente$i' data-on='SI' data-off='NO'></label>
										</span>
									</td>
									<td style='text-align: center; position: relative;'>
										<span class='im-envelope2 disabled' onclick='emailClienteCotizacion(this);'></span>
										<input type='text' class='input-email-cliente' onblur='onBlurInputEmailCliente(this);' onkeyup='onKeyUpInputEmailCliente(this);'>
									</td>
									<td style='color:$color; height: 1em; line-height: 1em;'>
										<p class='demo-options' style='text-align: center;'>
											<label class='option'>
												<input onclick='checkGenerarCotizacionValid(this);' type='checkbox' name='checkbox' disabled>
												<span class='checkbox'></span>
											</label>
										</p>
									</td>
								</tr>
							";
							if ( $a === "z" || $a === "Z" ) {
								$a = "";
		
							} else {
								$a++;
							}
		
							if ( $c === 19 ) {
								$c=0;
		
							} else {
								$c++;
							}
						}
					}
				}
			}
			
			$baseDatos->desconectarDB();
			
			$mostrar.="
							</tbody>
						</table>
					</div>
				</div>
				<div class='div-table-tarifas-container'>
					<div id='divTarifasAgente' class='div-table-tarifas-body'>
					</div>
				</div>
			";
			
			if ( $existeTarifas ) {
				$arrayMail[0]["error"]	 =	$error;
				$arrayMail[0]["message"] =	$error==-1?"No se pudieron obtener los Agentes":$mostrar;
				$arrayMail[0]["titulo"]	 =	$titulo;

			} else {
				$arrayMail[0]["error"]   = $row['NumError'];
				$arrayMail[0]["message"] = "No existen tarifas para los Agentes seleccionados.";

			}			
			$stringJson=json_encode($arrayMail);		
			return $stringJson;	

		}
		
		public static function cargarTarifas() {
			$JSONArray 		  	             = $_GET["sJsonArrayAgentesComparar"];
			$dataObjectInicio 	             = $_GET["dataObjectInicio"];
			$dataObjectIncoterms             = $_GET["dataObjectIncoterms"];
			
			$arrayAgentesComparar            = json_decode($JSONArray,true);
			$arrayInicio  		             = json_decode($dataObjectInicio,true);
			$arrayIncoterms		             = json_decode($dataObjectIncoterms,true);
			
			$ciudadId			             = $arrayInicio["CiudadID"];
			//$incotermsId		             = $arrayInicio["IncotermsID"];
			$incotermsId		             = "0000000052";
			$incotermsIdReal	             = $arrayInicio["IncotermsID"];
			$viaEmbarqueId		             = $arrayInicio["ViaEmbarqueID"];
			$tipoTramiteId		             = $arrayInicio["TipoTramiteID"];
			
			$puertoOrigenId		             = $arrayIncoterms["PuertoOrigenId"];
			$puertoDestinoId	             = $arrayIncoterms["PuertoDestinoId"];
			$tipoCargaId		             = $arrayIncoterms["TipoCargaId"];
			$tipoMercaderiaId	             = $arrayIncoterms["TipoMercaderiaId"];
			$descMercaderia		             = $arrayIncoterms["DescMercaderia"];
			$infoAdicional		             = $arrayIncoterms["InfoAdicional"];
			$cantidadContenedor              = str_replace(",",".",$arrayIncoterms["CantidadContenedor"]);
			$tipoContenedorId	             = $arrayIncoterms["TipoContenedorId"];
			$tipoContenedor20STId	         = $arrayIncoterms["TipoContenedor20STId"];
			$tipoContenedor40STId	         = $arrayIncoterms["TipoContenedor40STId"];
			$tipoContenedor40HCId	         = $arrayIncoterms["TipoContenedor40HCId"];
			$tipoContenedor40FRId	         = $arrayIncoterms["TipoContenedor40FRId"];
			$tipoContenedor20RFId	         = $arrayIncoterms["TipoContenedor20RFId"];
			$tipoContenedor40RFId	         = $arrayIncoterms["TipoContenedor40RFId"];
			$tipoContenedor20OTId	         = $arrayIncoterms["TipoContenedor20OTId"];
			$tipoContenedor40OTId	         = $arrayIncoterms["TipoContenedor40OTId"];
			$tipoContenedor20ITId	         = $arrayIncoterms["TipoContenedor20ITId"];
			$tipoContenedor40NOId	         = $arrayIncoterms["TipoContenedor40NOId"];
			$cantidadTipoContenedor20ST	     = $arrayIncoterms["CantidadTipoContenedor20ST"];
			$cantidadTipoContenedor40ST	     = $arrayIncoterms["CantidadTipoContenedor40ST"];
			$cantidadTipoContenedor40HC	     = $arrayIncoterms["CantidadTipoContenedor40HC"];
			$cantidadTipoContenedor40FR	     = $arrayIncoterms["CantidadTipoContenedor40FR"];
			$cantidadTipoContenedor20RF	     = $arrayIncoterms["CantidadTipoContenedor20RF"];
			$cantidadTipoContenedor40RF	     = $arrayIncoterms["CantidadTipoContenedor40RF"];
			$cantidadTipoContenedor20OT	     = $arrayIncoterms["CantidadTipoContenedor20OT"];
			$cantidadTipoContenedor40OT	     = $arrayIncoterms["CantidadTipoContenedor40OT"];
			$cantidadTipoContenedor20IT	     = $arrayIncoterms["CantidadTipoContenedor20IT"];
			$cantidadTipoContenedor40NO	     = $arrayIncoterms["CantidadTipoContenedor40NO"];
			$tipoContenedor20Id		         = $tipoContenedor20STId;
			$tipoContenedor40Id		         = $tipoContenedor40STId;
			$tipoContenedor40HCId		     = $tipoContenedor40HCId;
			$tipoVehiculoTurboId		     = $tipoContenedor40FRId;
			$tipoVehiculoSencilloId		     = $tipoContenedor20RFId;
			$tipoVehiculoDobleTroqueId	     = $tipoContenedor40RFId;
			$tipoVehiculoTractomulaId	     = $tipoContenedor20OTId;
			$tipoVehiculoCamaBajaId		     = $tipoContenedor40OTId;
			$cantidadTipoContenedor20		 = $cantidadTipoContenedor20ST;
			$cantidadTipoContenedor40		 = $cantidadTipoContenedor40ST;
			$cantidadTipoContenedor40HC		 = $cantidadTipoContenedor40HC;
			$cantidadTipoVehiculoTurbo		 = $cantidadTipoContenedor40FR;
			$cantidadTipoVehiculoSencillo	 = $cantidadTipoContenedor20RF;
			$cantidadTipoVehiculoDobleTroque = $cantidadTipoContenedor40RF;
			$cantidadTipoVehiculoTractomula	 = $cantidadTipoContenedor20OT;
			$cantidadTipoVehiculoCamaBaja	 = $cantidadTipoContenedor40OT;
			$descContenedor		             = $arrayIncoterms["DescContenedor"];
			$peso				             = str_replace(",",".",$arrayIncoterms["Peso"]);
			$pesoVolumen		             = str_replace(",",".",$arrayIncoterms["PesoVolumen"]);
			$volumen			             = str_replace(",",".",$arrayIncoterms["Volumen"]);
			$bultos				             = str_replace(",",".",$arrayIncoterms["Bultos"]);
			$unidadId			             = $arrayIncoterms["UnidadId"];
			$pesoVolumenId		             = $arrayIncoterms["PesoVolumenId"];
			$volumenId			             = $arrayIncoterms["VolumenId"];
			$embalajeId			             = $arrayIncoterms["EmbalajeId"];
			$dimensionBultos	             = $arrayIncoterms["DimensionBultos"];
			$claseImo			             = $arrayIncoterms["ClaseImo"];
			$un					             = $arrayIncoterms["Un"];
			$proveedorName		             = $arrayIncoterms["ProveedorName"];
			$provRecogidaDir	             = $arrayIncoterms["ProvRecogidaDir"];
			$provEntregaDir		             = $arrayIncoterms["ProvEntregaDir"];
			$navieraId			             = $arrayIncoterms["NavieraId"];
			$valorMercaderia	             = str_replace(",",".",$arrayIncoterms["ValorMercaderia"]);
			$valorFlete			             = str_replace(",",".",$arrayIncoterms["ValorFlete"]);
			$partidaArancelaria	             = $arrayIncoterms["PartidaArancelaria"];
			$subPartidaArancelaria	         = $arrayIncoterms["SubPartidaArancelaria"];
			$coloaderDestino	             = $arrayIncoterms["ColoaderDestino"];
			$cotizacion			             = $arrayIncoterms["Cotizacion"];
			
			$strSQL             = "";
			$mostrar            = "";
			$headerTable        = "";
			$footerTable        = "";
			$detailTable        = "";
					
			$arrayTarifas		= array();
			$arrayTarifasTemp	= array();
			$arrayTarifasList   = array();
			$arrayTarifasFooter	= array();
			$arrayAgentesTemp	= array();
			$rgb				= array();	
			
			$arrayTarifas[0][0] = "Servicios Cotizados";
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();	

			$i=0;
			foreach( $arrayAgentesComparar as $agenteComparar ) {
				$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
				$lineaTransporteId = $agenteComparar["lineaTransporteId"];
				$cotizacionTempId  = $agenteComparar["cotizacionTempId"];
				$i++;
				$strSQL="
					EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Select_AgenteName '$contactoAgenteId'
				";
				$rs =  $baseDatos->db_query( $strSQL  ) or die ("No se pudieron obtener los Agentes");
				
				while ( $row  =  $baseDatos->db_fetch_array( $rs ) ){
					$arrayTarifas[0][$i] = $baseDatos->sysGetDataFieldSrv( $row[ 'AgenteName' ] );
				}				 
			}
			
			foreach( $arrayAgentesComparar as $agenteComparar ) {
				$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
				$lineaTransporteId = $agenteComparar["lineaTransporteId"];
				$cotizacionTempId  = $agenteComparar["cotizacionTempId"];

				if ( strlen(trim($cotizacionTempId)) === 0 ) {					
					if ( $viaEmbarqueId === "0000000502" ) { //Aereo
						$strSQL="
							EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Aerea_Carga_Suelta
								'$contactoAgenteId', 
								'$tipoTramiteId', 
								'$incotermsId', 
								'$viaEmbarqueId',
								'$puertoOrigenId',
								'$puertoDestinoId',
								'$tipoCargaId',
								$bultos,
								$peso,
								$volumen,
								$pesoVolumen,
								'$tipoMercaderiaId',
								'$lineaTransporteId'
						";

					} elseif ( ( $viaEmbarqueId === "0000000493" ) && ( $tipoCargaId === "0000000206" ) ) { //Maritimo, Carga Suelta Consolidada
						$strSQL="
							EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Maritima_Carga_Suelta
								'$contactoAgenteId', 
								'$tipoTramiteId', 
								'$incotermsId', 
								'$viaEmbarqueId',
								'$puertoOrigenId',
								'$puertoDestinoId',
								'$tipoCargaId',
								$bultos,
								$peso,
								$volumen,
								'$tipoMercaderiaId',
								'$lineaTransporteId'
						";

					} elseif ( ( $viaEmbarqueId === "0000000493" ) && ( $tipoCargaId === "0000000204" ) ) { //Maritimo Contenedor
						$strSQL="
							EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Contenedores 
								'$contactoAgenteId', 
								'$tipoTramiteId', 
								'$incotermsId', 
								'$viaEmbarqueId',
								'$puertoOrigenId',
								'$puertoDestinoId',
								'$tipoCargaId',
								'$tipoContenedorId',
								'$cantidadContenedor',
								'$tipoContenedor20STId',
								'$tipoContenedor40STId',
								'$tipoContenedor40HCId',
								'$tipoContenedor40FRId',
								'$tipoContenedor20RFId',
								'$tipoContenedor40RFId',
								'$tipoContenedor20OTId',
								'$tipoContenedor40OTId',
								'$tipoContenedor20ITId',
								'$tipoContenedor40NOId',
								'$cantidadTipoContenedor20ST',
								'$cantidadTipoContenedor40ST',
								'$cantidadTipoContenedor40HC',
								'$cantidadTipoContenedor40FR',
								'$cantidadTipoContenedor20RF',
								'$cantidadTipoContenedor40RF',
								'$cantidadTipoContenedor20OT',
								'$cantidadTipoContenedor40OT',
								'$cantidadTipoContenedor20IT',
								'$cantidadTipoContenedor40NO',
								'$tipoMercaderiaId',
								'$lineaTransporteId'
						";

					} else { //Terrestre
						$strSQL="
							EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Terrestres_Contenedores
								'$contactoAgenteId', 
								'$tipoTramiteId', 
								'$incotermsId', 
								'$viaEmbarqueId',
								'$puertoOrigenId',
								'$puertoDestinoId',
								'$tipoCargaId',
								'$tipoContenedorId',
								'$cantidadContenedor',
								'$tipoContenedor20Id',
								'$tipoContenedor40Id',
								'$tipoContenedor40HCId',
								'$tipoVehiculoTurboId',
								'$tipoVehiculoSencilloId',
								'$tipoVehiculoDobleTroqueId',
								'$tipoVehiculoTractomulaId',
								'$tipoVehiculoCamaBajaId',
								'$cantidadTipoContenedor20',
								'$cantidadTipoContenedor40',
								'$cantidadTipoContenedor40HC',
								'$cantidadTipoVehiculoTurbo',
								'$cantidadTipoVehiculoSencillo',
								'$cantidadTipoVehiculoDobleTroque',
								'$cantidadTipoVehiculoTractomula',
								'$cantidadTipoVehiculoCamaBaja',
								'$tipoMercaderiaId',
								'$valorMercaderia',
								'$lineaTransporteId'
						";
					}

				} else {
					$strSQL = "
							EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_EditTarifas
								'$cotizacionTempId',
								'$tipoTramiteId',
								'$viaEmbarqueId',
								'$tipoMercaderiaId',
								'$tipoContenedorId'
						";
				}


				$rs =  $baseDatos->db_query( $strSQL  ) or die ("No se pudieron obtener las tarifas"); 
				
				while ( $row  =  $baseDatos->db_fetch_array( $rs ) ){
					$productoId		  = $baseDatos->sysGetDataFieldSrv( $row[ 'ProductoID' ] );
					$productoName	  = $baseDatos->sysGetDataFieldSrv( $row[ 'ProductoName' ] );
					$precio			  = $baseDatos->sysGetDataFieldSrv( $row[ 'Precio' ] );
					$tipoRegristro	  = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoRegistro' ] );
					$tipoServicio	  = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoServicio' ] );
					$sortOrder		  = $baseDatos->sysGetDataFieldSrv( $row[ 'SortOrder' ] );
					//$tipoContenedorId = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoContenedorID' ] );
					
					/************** Lleno un arreglo asociativo que contiene el Id contacto del Agente, y los datos de la tarifa ****************/					
					$arrayValores	=	array(
											'ContactoAgenteID'	=> $contactoAgenteId,
											'LineaTransporteID' => $lineaTransporteId,
											'ProductoID'		=> $productoId, 
											'ProductoName'		=> $productoName, 
											'Precio'			=> $precio, 
											'TipoRegistro'		=> $tipoRegristro,
											'TipoServicio'		=> $tipoServicio,
											'SortOrder'			=> $sortOrder,
											'TipoContenedorID'  => $tipoContenedorId, 
										);					
					array_push( $arrayAgentesTemp, $arrayValores );
					/****************************************************************************************************************************/
					
				}
			}			
			$baseDatos->desconectarDB();
			
			
			/********************** Creo otro arreglo que contiene la información que se mostrará como footer de la tabla. **********************/
			$arrayTarifasFooter[0]	=	"SUBTOTAL";
			$arrayTarifasFooter[1]	=	"I.V.A. ( 12 % )";
			$arrayTarifasFooter[2]	=	"TOTAL COTIZACION";
			$arrayTarifasFooter[3]	=	"Condicion de Pago";
			$arrayTarifasFooter[4]	=	"Frecuencia";
			$arrayTarifasFooter[5]	=	"Vigencia";
			$arrayTarifasFooter[6]	=	"Tiempo Transito Aproximado";
			if ( $incotermsIdReal != "0000000091" || $viaEmbarqueId != "0000000499" ) { //EXW Terrestre
				if ( $tipoCargaId != "0000000206" && $viaEmbarqueId != "0000000502" ) { //Carga Suelta Consolidada, Aereo
					$arrayTarifasFooter[7]	=	"Dias Libres";

				}
				$arrayTarifasFooter[8]	=	"Exoneración de Garantía";
				$arrayTarifasFooter[9]	=	"Trasbordo";
				$arrayTarifasFooter[10]	=	"Linea de Transporte";

			}
			if ( $viaEmbarqueId === "0000000499" ) {//Terrestre
				array_push( $arrayTarifasFooter,"Stand By" );
			}
			/************************************************************************************************************************************/
			
			/*********************** Lleno el arreglo que va contener todas las tarfifas de todos los Agentes a comparar ***********************/
			/**
			* SERVICIOS DEL EXTERIOR
			*/
			
			foreach( $arrayAgentesTemp as $arrayValores ) {
				if ( ( $arrayValores["TipoRegistro"] === "DETAIL" ) && ( $arrayValores["TipoServicio"] === "E" ) ) {
					if ( !in_array($arrayValores["ProductoName"], $arrayTarifasList) ) {
						$arrayProducto = array(
										 	'ProductoID'       => $arrayValores["ProductoID"], 
											'ProductoName'     => $arrayValores["ProductoName"], 
											'TipoServicio'     => $arrayValores["TipoServicio"], 
											'TipoContenedorID' => $arrayValores["TipoContenedorID"], 
										 );
						array_push( $arrayTarifasTemp, $arrayProducto );
						array_push( $arrayTarifasList, $arrayProducto["ProductoName"]);
					}
				}
			}
			/**
			* SERVICIOS LOCALES
			*/
			foreach( $arrayAgentesTemp as $arrayValores ) {
				if ( ( $arrayValores["TipoRegistro"] === "DETAIL" ) && ( $arrayValores["TipoServicio"] === "L" ) && ( $arrayValores["ProductoName"] != "Collect Fee" ) ) {
					if ( !in_array($arrayValores["ProductoName"], $arrayTarifasList) ) {
						$arrayProducto = array(
											'ProductoID'       => $arrayValores["ProductoID"], 
											'ProductoName'     => $arrayValores["ProductoName"], 
											'TipoServicio'     => $arrayValores["TipoServicio"],
											'TipoContenedorID' => $arrayValores["TipoContenedorID"], 
										 );					
						array_push( $arrayTarifasTemp, $arrayProducto );
						array_push( $arrayTarifasList, $arrayProducto["ProductoName"]);
					}
				}
			}			
			/**
			* TOTALES
			*/
			foreach( $arrayTarifasFooter as $tarifaNameFooter ) {
				$arrayProducto = array(
								 	'ProductoID'       => "", 
									'ProductoName'     => $tarifaNameFooter,
									'TipoServicio'     => "Z", 
									'TipoContenedorID' => "",
								 );					
				array_push( $arrayTarifasTemp, $arrayProducto );
			}
			/************************************************************************************************************************************/

			$headerTable="
				<table class='table'>
					<colgroup>
						<col class='col-tarifas'>
			";
			$i=0;
			foreach( $arrayAgentesComparar as $agenteComparar ) {
				$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
				$lineaTransporteId = $agenteComparar["lineaTransporteId"];
				$i++;
				$headerTable.="
						<col class='col-valores'>
				";
			}
			$headerTable.="
					</colgroup>
					<thead class='table-head'>
						<tr>
							<th class='th-rubro'>".$arrayTarifas[0][0]."</th>
			";
			$i=0;

			foreach( $arrayAgentesComparar as $agenteComparar ) {
				$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
				$lineaTransporteId = $agenteComparar["lineaTransporteId"];
				$letra             = $agenteComparar["letra"];
				$colorLetra        = $agenteComparar["color"];
				$i++;
				$headerTable.="
							<th class='th-agente'><span id='spanColor$contactoAgenteId' class='opcionAgente' style='background-color:$colorLetra; float:right;'>$letra</span></th>
				";				
			}
			
			$headerTable.="
						</tr>
					</thead>
			";
			$bodyTable="
					<tbody id='tb-tarifas' class='table-body'>
			";

			foreach( $arrayTarifasTemp as $tarifaName ) {
				if ( !in_array( $tarifaName["ProductoName"], $arrayTarifasFooter ) ) {
					$bodyTable.="					
							<tr data-producto-id='".$tarifaName["ProductoID"]."' data-tipo-servicio='".$tarifaName["TipoServicio"]."' data-tipo-contenedor-id='".$tarifaName["TipoContenedorID"]."'>
								<td>".$tarifaName["ProductoName"]."</td>
					";
					$agenteId = "";
					$i=0;
					foreach ( $arrayAgentesComparar as $agenteComparar ) {
						$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
						$lineaTransporteId = $agenteComparar["lineaTransporteId"];
						$tarifaCaducada    = $agenteComparar["tarifaCaducada"];
						$cotizacionTempId  = $agenteComparar["cotizacionTempId"];  
						$colorTarifa       = $tarifaCaducada === "1"? "red": "#0478B5";
						$colorTarifa       = strlen(trim($cotizacionTempId)) === 0? $colorTarifa: "#00BB00";
						$inserto           = false;

						for ( $f=0; $f<count($arrayAgentesTemp); $f++ ) {
							if (($tarifaName["ProductoName"] === $arrayAgentesTemp[$f]['ProductoName']) && ($contactoAgenteId === $arrayAgentesTemp[$f]['ContactoAgenteID']) && ($lineaTransporteId === $arrayAgentesTemp[$f]['LineaTransporteID']) ) {
								$bodyTable.= "<td class='td-valor' style='color:$colorTarifa;'>" . $arrayAgentesTemp[$f]['Precio'] . "</td>";
								$inserto=true;
							}
						}
						if( !$inserto ) {
							$bodyTable.= "<td class='td-valor' style='color:$colorTarifa;'>N/A</td>";	
						}					
					}
					
					$bodyTable.="
							</tr>
					";
				}
			}
			
			$bodyTable.="
					</tbody>
				</table>
			";
			$footerTable="
					<tfoot class='table-footer'>
			";
						
			foreach( $arrayTarifasTemp as $tarifaName ){
				if ( in_array( $tarifaName["ProductoName"], $arrayTarifasFooter ) ) {
					if ( ( $tarifaName["ProductoName"] === $arrayTarifasFooter[0] ) || ( $tarifaName["ProductoName"] === $arrayTarifasFooter[1] ) || ( $tarifaName["ProductoName"] === $arrayTarifasFooter[2] ) ) {
						$classRubro = "tf-rubro-totales";
						$classValor = "tf-valor-totales";

					} else {
						$classRubro = "tf-rubro";
						$classValor = "tf-valor";

					}

					$footerTable.="					
						<tr>
							<td class='$classRubro'>".$tarifaName["ProductoName"]."</td>
					";
					$agenteId = "";
					$i=0;

					foreach ( $arrayAgentesComparar as $agenteComparar ) {
						$contactoAgenteId  = $agenteComparar["contactoAgenteId"];
						$lineaTransporteId = $agenteComparar["lineaTransporteId"];
						$inserto           = false;
						$attributoId       = $tarifaName["ProductoName"] === "SUBTOTAL"? "id='colSubTotal$contactoAgenteId'": "";

						for ( $f=0; $f<count($arrayAgentesTemp); $f++ ) {
							if ( ( $tarifaName["ProductoName"] === $arrayAgentesTemp[$f]['ProductoName'] ) && ( $contactoAgenteId === $arrayAgentesTemp[$f]['ContactoAgenteID'] ) && ( $lineaTransporteId === $arrayAgentesTemp[$f]['LineaTransporteID'] ) ) {
								$footerTable .= "<td $attributoId class='$classValor'>".$arrayAgentesTemp[$f]['Precio']."</td>";
								$inserto     = true;
							}
						}
						if(!$inserto){
							$footerTable.= "<td $attributoId class='$classValor'>N/A</td>";	
						}					
					}
					
					$footerTable.="
						</tr>
					";
				}
			}
			$footerTable.="
					</tfoot>
			";
			
			$mostrar = $headerTable . $footerTable . $bodyTable;
			return $mostrar;

		}

		public static function loadEditTarifas() {
			$dataObjectInicio 	  = $_GET["dataObjectInicio"];
			$dataObjectIncoterms  = $_GET["dataObjectIncoterms"];
			$dataObjectAgente     = $_GET["dataObjectAgente"];

			$arrayInicio  		  = json_decode($dataObjectInicio, true);
			$arrayIncoterms		  = json_decode($dataObjectIncoterms, true);
			$arrayAgente          = json_decode($dataObjectAgente, true);

			$incotermsId		  = "0000000052";
			$incotermsIdReal	  = $arrayInicio["IncotermsID"];
			$viaEmbarqueId		  = $arrayInicio["ViaEmbarqueID"];
			$tipoTramiteId		  = $arrayInicio["TipoTramiteID"];
			$ciudadId			  = $arrayInicio["CiudadID"];
			  
			$puertoOrigenId		        = $arrayIncoterms["PuertoOrigenId"];
			$puertoDestinoId	        = $arrayIncoterms["PuertoDestinoId"];
			$tipoCargaId		        = $arrayIncoterms["TipoCargaId"];
			$tipoMercaderiaId	        = $arrayIncoterms["TipoMercaderiaId"];
			$descMercaderia		        = $arrayIncoterms["DescMercaderia"];
			$infoAdicional		        = $arrayIncoterms["InfoAdicional"];
			$cantidadContenedor         = str_replace(",",".",$arrayIncoterms["CantidadContenedor"]);
			$tipoContenedorId	        = $arrayIncoterms["TipoContenedorId"];
			$tipoContenedor20STId	    = $arrayIncoterms["TipoContenedor20STId"];
			$tipoContenedor40STId	    = $arrayIncoterms["TipoContenedor40STId"];
			$tipoContenedor40HCId	    = $arrayIncoterms["TipoContenedor40HCId"];
			$tipoContenedor40FRId	    = $arrayIncoterms["TipoContenedor40FRId"];
			$tipoContenedor20RFId	    = $arrayIncoterms["TipoContenedor20RFId"];
			$tipoContenedor40RFId	    = $arrayIncoterms["TipoContenedor40RFId"];
			$tipoContenedor20OTId	    = $arrayIncoterms["TipoContenedor20OTId"];
			$tipoContenedor40OTId	    = $arrayIncoterms["TipoContenedor40OTId"];
			$tipoContenedor20ITId	    = $arrayIncoterms["TipoContenedor20ITId"];
			$tipoContenedor40NOId	    = $arrayIncoterms["TipoContenedor40NOId"];
			$cantidadTipoContenedor20ST	= $arrayIncoterms["CantidadTipoContenedor20ST"];
			$cantidadTipoContenedor40ST	= $arrayIncoterms["CantidadTipoContenedor40ST"];
			$cantidadTipoContenedor40HC	= $arrayIncoterms["CantidadTipoContenedor40HC"];
			$cantidadTipoContenedor40FR	= $arrayIncoterms["CantidadTipoContenedor40FR"];
			$cantidadTipoContenedor20RF	= $arrayIncoterms["CantidadTipoContenedor20RF"];
			$cantidadTipoContenedor40RF	= $arrayIncoterms["CantidadTipoContenedor40RF"];
			$cantidadTipoContenedor20OT	= $arrayIncoterms["CantidadTipoContenedor20OT"];
			$cantidadTipoContenedor40OT	= $arrayIncoterms["CantidadTipoContenedor40OT"];
			$cantidadTipoContenedor20IT	= $arrayIncoterms["CantidadTipoContenedor20IT"];
			$cantidadTipoContenedor40NO	= $arrayIncoterms["CantidadTipoContenedor40NO"];
			$tipoContenedor20Id		         = $tipoContenedor20STId;
			$tipoContenedor40Id		         = $tipoContenedor40STId;
			$tipoContenedor40HCId		     = $tipoContenedor40HCId;
			$tipoVehiculoTurboId		     = $tipoContenedor40FRId;
			$tipoVehiculoSencilloId		     = $tipoContenedor20RFId;
			$tipoVehiculoDobleTroqueId	     = $tipoContenedor40RFId;
			$tipoVehiculoTractomulaId	     = $tipoContenedor20OTId;
			$tipoVehiculoCamaBajaId		     = $tipoContenedor40OTId;
			$cantidadTipoContenedor20		 = $cantidadTipoContenedor20ST;
			$cantidadTipoContenedor40		 = $cantidadTipoContenedor40ST;
			$cantidadTipoContenedor40HC		 = $cantidadTipoContenedor40HC;
			$cantidadTipoVehiculoTurbo		 = $cantidadTipoContenedor40FR;
			$cantidadTipoVehiculoSencillo	 = $cantidadTipoContenedor20RF;
			$cantidadTipoVehiculoDobleTroque = $cantidadTipoContenedor40RF;
			$cantidadTipoVehiculoTractomula	 = $cantidadTipoContenedor20OT;
			$cantidadTipoVehiculoCamaBaja	 = $cantidadTipoContenedor40OT;
			$descContenedor		    = $arrayIncoterms["DescContenedor"];
			$peso				    = str_replace(",",".",$arrayIncoterms["Peso"]);
			$pesoVolumen		    = str_replace(",",".",$arrayIncoterms["PesoVolumen"]);
			$volumen			    = str_replace(",",".",$arrayIncoterms["Volumen"]);
			$bultos				    = str_replace(",",".",$arrayIncoterms["Bultos"]);
			$unidadId			    = $arrayIncoterms["UnidadId"];
			$pesoVolumenId		    = $arrayIncoterms["PesoVolumenId"];
			$volumenId			    = $arrayIncoterms["VolumenId"];
			$embalajeId			    = $arrayIncoterms["EmbalajeId"];
			$dimensionBultos	    = $arrayIncoterms["DimensionBultos"];
			$claseImo			    = $arrayIncoterms["ClaseImo"];
			$un					    = $arrayIncoterms["Un"];
			$proveedorName		    = $arrayIncoterms["ProveedorName"];
			$provRecogidaDir	    = $arrayIncoterms["ProvRecogidaDir"];
			$provEntregaDir		    = $arrayIncoterms["ProvEntregaDir"];
			$navieraId			    = $arrayIncoterms["NavieraId"];
			$valorMercaderia	    = str_replace(",",".",$arrayIncoterms["ValorMercaderia"]);
			$valorFlete			    = str_replace(",",".",$arrayIncoterms["ValorFlete"]);
			$partidaArancelaria	    = $arrayIncoterms["PartidaArancelaria"];
			$subPartidaArancelaria	= $arrayIncoterms["SubPartidaArancelaria"];
			$coloaderDestino	    = $arrayIncoterms["ColoaderDestino"];
			$cotizacion			    = $arrayIncoterms["Cotizacion"];

			$contactoAgenteId       = $arrayAgente["contactoAgenteId"];
			$lineaTransporteId      = $arrayAgente["lineaTransporteId"];
			$letra                  = $arrayAgente["letra"];
			$color                  = $arrayAgente["color"];
			$tarifaCaducada         = $arrayAgente["tarifaCaducada"];
			$cotizacionTempId       = $arrayAgente["cotizacionTempId"];
			$arrayProductoList      = $arrayAgente["arrayProductoList"];
			
			$arrayTarifas		    = array();
			$arrayTarifasDetail     = array();
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			
			//$strSQL = "EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Select_AgenteName '$contactoAgenteId'";
			//$rs     =  $baseDatos->db_query( $strSQL  ) or die ("No se pudieron obtener el Agente.");
				
			//while ( $row  =  $baseDatos->db_fetch_array( $rs ) ) {
				//$agenteName = $baseDatos->sysGetDataFieldSrv( $row[ 'AgenteName' ] );

			$arrayValores =	array(
								'ContactoAgenteID'	=> '',
								'LineaTransporteID' => '',
								'ProductoID'		=> '',
								'ProductoName'		=> 'Servicios Cotizados',
								'Costo'		    	=> 'Costo', 
								'Precio'  			=> 'Venta', 
								'TipoRegistro'		=> '',
								'TipoServicio'		=> '',
								'SortOrder'			=> '0',
							);
			array_push( $arrayTarifas, $arrayValores );
			//}
			
			if ( strlen(trim($cotizacionTempId)) === 0 ) {
				if ( $viaEmbarqueId === "0000000502" ) { //Aereo
					$strSQL="
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Aerea_Carga_Suelta
							'$contactoAgenteId', 
							'$tipoTramiteId', 
							'$incotermsId', 
							'$viaEmbarqueId',
							'$puertoOrigenId',
							'$puertoDestinoId',
							'$tipoCargaId',
							$bultos,
							$peso,
							$volumen,
							$pesoVolumen,
							'$tipoMercaderiaId',
							'$lineaTransporteId'
					";

				} elseif ( ( $viaEmbarqueId === "0000000493" ) && ( $tipoCargaId === "0000000206" ) ) { //Maritimo, Carga Suelta Consolidada
					$strSQL="
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Maritima_Carga_Suelta
							'$contactoAgenteId', 
							'$tipoTramiteId', 
							'$incotermsId', 
							'$viaEmbarqueId',
							'$puertoOrigenId',
							'$puertoDestinoId',
							'$tipoCargaId',
							$bultos,
							$peso,
							$volumen,
							'$tipoMercaderiaId',
							'$lineaTransporteId'
					";

				} elseif ( ( $viaEmbarqueId === "0000000493" ) && ( $tipoCargaId === "0000000204" ) ){ //Maritimo Contenedor
					$strSQL="
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_EditTarifas_Contenedores 
							'$contactoAgenteId', 
							'$tipoTramiteId', 
							'$incotermsId', 
							'$viaEmbarqueId',
							'$puertoOrigenId',
							'$puertoDestinoId',
							'$tipoCargaId',
							'$tipoContenedorId',
							'$cantidadContenedor',
							'$tipoContenedor20STId',
							'$tipoContenedor40STId',
							'$tipoContenedor40HCId',
							'$tipoContenedor40FRId',
							'$tipoContenedor20RFId',
							'$tipoContenedor40RFId',
							'$tipoContenedor20OTId',
							'$tipoContenedor40OTId',
							'$tipoContenedor20ITId',
							'$tipoContenedor40NOId',
							'$cantidadTipoContenedor20ST',
							'$cantidadTipoContenedor40ST',
							'$cantidadTipoContenedor40HC',
							'$cantidadTipoContenedor40FR',
							'$cantidadTipoContenedor20RF',
							'$cantidadTipoContenedor40RF',
							'$cantidadTipoContenedor20OT',
							'$cantidadTipoContenedor40OT',
							'$cantidadTipoContenedor20IT',
							'$cantidadTipoContenedor40NO',
							'$tipoMercaderiaId',
							'$lineaTransporteId'
					";

				} else { //Terrestre
					$strSQL="
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_Tarifas_Terrestres_Contenedores
							'$contactoAgenteId', 
							'$tipoTramiteId', 
							'$incotermsId', 
							'$viaEmbarqueId',
							'$puertoOrigenId',
							'$puertoDestinoId',
							'$tipoCargaId',
							'$tipoContenedorId',
							'$cantidadContenedor',
							'$tipoContenedor20Id',
							'$tipoContenedor40Id',
							'$tipoContenedor40HCId',
							'$tipoVehiculoTurboId',
							'$tipoVehiculoSencilloId',
							'$tipoVehiculoDobleTroqueId',
							'$tipoVehiculoTractomulaId',
							'$tipoVehiculoCamaBajaId',
							'$cantidadTipoContenedor20',
							'$cantidadTipoContenedor40',
							'$cantidadTipoContenedor40HC',
							'$cantidadTipoVehiculoTurbo',
							'$cantidadTipoVehiculoSencillo',
							'$cantidadTipoVehiculoDobleTroque',
							'$cantidadTipoVehiculoTractomula',
							'$cantidadTipoVehiculoCamaBaja',
							'$tipoMercaderiaId',
							'$valorMercaderia',
							'$lineaTransporteId'
					";
				}
			} else {
					$strSQL = "
						EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Preview_Agentes_EditTarifas
							'$cotizacionTempId',
							'$tipoTramiteId',
							'$viaEmbarqueId',
							'$tipoMercaderiaId',
							'$tipoContenedorId'
					";
			}

			$rs        =  $baseDatos->db_query( $strSQL  ) or die ("No se pudieron obtener las tarifas"); 
			$rowTarifa = 1;
			
			while ( $row  =  $baseDatos->db_fetch_array( $rs ) ) {
				$productoId		    = $baseDatos->sysGetDataFieldSrv( $row[ 'ProductoID' ] );
				$productoName	    = $baseDatos->sysGetDataFieldSrv( $row[ 'ProductoName' ] );
				$costo			    = $baseDatos->sysGetDataFieldSrv( $row[ 'Costo' ] );
				$precio			    = $baseDatos->sysGetDataFieldSrv( $row[ 'Precio' ] );
				$tipoRegristro	    = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoRegistro' ] );
				$tipoServicio	    = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoServicio' ] );
				$sortOrder		    = $baseDatos->sysGetDataFieldSrv( $row[ 'SortOrder' ] );
				$tipoContenedorId   = $baseDatos->sysGetDataFieldSrv( $row[ 'TipoContenedorID' ] );
				$cantidadContenedor = $baseDatos->sysGetDataFieldSrv( $row[ 'CantidadContenedor' ] );

				$arrayTarifas[$rowTarifa][0] = $productoName;
				$arrayTarifas[$rowTarifa][1] = $costo;
				$arrayTarifas[$rowTarifa][2] = $precio;
				$rowTarifa++;

				/******************* Lleno un arreglo asociativo que contiene los datos de la tarifa que se va a editar **********************/					
				$arrayValores	=	array(
										'ContactoAgenteID'	 => $contactoAgenteId,
										'LineaTransporteID'  => $lineaTransporteId,
										'ProductoID'		 => $productoId, 
										'ProductoName'		 => $productoName, 
										'Costo'		    	 => $costo,
										'Precio' 			 => $precio,
										'TipoRegistro'		 => $tipoRegristro,
										'TipoServicio'		 => $tipoServicio,
										'SortOrder'			 => $sortOrder,
										'TipoContenedorID'	 => $tipoContenedorId,
										'CantidadContenedor' => $cantidadContenedor,
									);
				/****************************************************************************************************************************/
				array_push( $arrayTarifas, $arrayValores );
			}

			$baseDatos->desconectarDB();

			$headerTable = "
				<table class='table'>
					<colgroup>
						<col class='col-tarifas-edit'>
						<col class='col-valores-edit'>
						<col class='col-valores-edit'>
					</colgroup>
					<thead class='table-head'>
						<tr>
							<th>".$arrayTarifas[0]['ProductoName']."</th>
							<!--<th><span class='opcionAgente' style='background-color:$color; margin-right: 1em;'>$letra</span>".$arrayTarifas[0]['Costo']."</th>-->
							<th style='text-align: center;'>".$arrayTarifas[0]['Costo']."</th>
							<th style='text-align: center;'>".$arrayTarifas[0]['Precio']."</th>
						</tr>
					</thead>
			";

			$bodyTable = "
					<tbody id='tb-edit-tarifas' class='table-body' data-contactoagenteid='$contactoAgenteId' data-lineatransporteid='$lineaTransporteId' data-agente-letra='tr-agente-$letra' >
			";
				
			
			foreach ( $arrayTarifas as $tarifa ) {
				if ( $tarifa['TipoRegistro'] === "DETAIL" ) {
					array_push( $arrayTarifasDetail, $tarifa["ProductoID"]);
				}
			}
			
			for ( $i=1; $i<count($arrayTarifas); $i++ ) {
				if ( $arrayTarifas[$i]['TipoRegistro'] === "DETAIL" ) {
			
					$bodyTable.="
							<tr>
								<td data-productoid='".$arrayTarifas[$i]['ProductoID']."' 
									data-tipo-servicio='".$arrayTarifas[$i]['TipoServicio']."' 
									data-tipo-contenedor-id='".$arrayTarifas[$i]['TipoContenedorID']."'
									data-cantidad-contenedor='".$arrayTarifas[$i]['CantidadContenedor']."'
								>".$arrayTarifas[$i]['ProductoName']."</td>
								<td><input type='text' class='disabled' style='text-align: right; width: 120px;' value='".$arrayTarifas[$i]['Costo']."' disabled></td>
								<td><input type='text' style='text-align: right; width: 120px;' onblur='calcularTotal(this);' data-old-value='".$arrayTarifas[$i]['Precio']."' value='".$arrayTarifas[$i]['Precio']."'></td>
							</tr>
					";
				}
			}

			foreach ( $arrayProductoList as $producto ) {
				if ( !in_array( $producto["productoId"], $arrayTarifasDetail ) ) {
					$bodyTable.="
							<tr>
								<td data-productoid='".$producto["productoId"]."' 
									data-tipo-servicio='".$producto['tipoServicio']."' 
									data-tipo-contenedor-id='".$arrayTarifas[$i]['TipoContenedorID']."'
									data-cantidad-contenedor='".$arrayTarifas[$i]['CantidadContenedor']."'
								>".$producto["productoName"]."</td>
								<td><input type='text' class='disabled' style='text-align: right; width: 120px;' value='0.00' disabled></td>
								<td><input type='text' style='text-align: right; width: 120px;' onblur='calcularTotal(this);' data-old-value='0.00' value='0.00'></td>
							</tr>
					";
				}
			}

			$bodyTable.="
					</tbody>
				</table>
			";

			$footerTable="
					<tfoot class='table-footer'>
			";

			$i = 1;
			foreach( $arrayTarifas as $tarifaFooter ) {
				if ( $tarifaFooter['TipoRegistro'] === "FOOTER" && in_array( $tarifaFooter['SortOrder'], array("1","2","3")) ) {

					$footerTable.="
							<tr>
								<td class='tf-rubro-totales--dialog'>".$tarifaFooter['ProductoName']."</td>
								<td id='tf-edit-tarifas-subtotal$i' class='tf-valor-totales--dialog' colspan='2'>".$tarifaFooter['Precio']."</td>
							</tr>
					";
					$i++;
				}
			}

			$footerTable.="
					</tfoot>
			";

			$mostrar = $headerTable . $footerTable . $bodyTable;
			return $mostrar;
		}

		public static function deleteCotizacionTemp() {
			$cotizacionTempId = $_GET["cotizacionTempId"];

			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();
			
			$strSQL = "EXEC TOLEPU..WEB_COTIZADOR_BITACORA_Delete_CotizacionTemp '$cotizacionTempId'";
			$rs     =  $baseDatos->db_query( $strSQL  ) or die ("Error al borrar las tarifas temporales.");

			while ( $row  =  $baseDatos->db_fetch_array( $rs ) ) {
				$error = $baseDatos->sysGetDataFieldSrv( $row[ 'numError' ] );
			}
				
			$baseDatos->desconectarDB();
			return $error;
		}
	}
?>