var arrayAgentes = [""];

function getDataObjectInicio() {
	var schCiudad			= document.getElementById("schCiudad");
	var cmbIncoterms		= document.getElementById("cmbIncoterms");
	var cmbViaEmbarque		= document.getElementById("cmbViaEmbarque");
	var cmbTipoTramite		= document.getElementById("cmbTipoTramite");
	var switchCliente		= document.getElementById("switchCliente");
	var txtCliente          = document.getElementById("txtCliente");
	var lcTipoMercaderiaId	= "";
	var lcCliente			= "";
	var lcClienteId			= "";
	var lcAdjunto1			= "";
	var lcAdjunto2			= "";
	var lcAdjunto3			= "";
	var lcAdjunto4			= "";
	var lcAdjunto5			= "";
	
	if ( switchCliente.checked == true ) {
		var txtCliente = document.getElementById("txtCliente");

		lcClienteId	   = txtCliente.getAttribute("data-id");
		
	} else {
		lcClienteId	   = "";

	}

	lcCliente	   = txtCliente.value;
		
	try {
		var arrayFiles 		  = document.getElementById("txtUploadFile").files;
		var cmbTipoMercaderia = document.getElementById("cmbTipoMercaderia");
		lcTipoMercaderiaId	  = cmbTipoMercaderia.value;
		lcAdjunto1			  = ((typeof(arrayFiles[0].name) === "undefined")?"":arrayFiles[0].name); 
		lcAdjunto2			  = ((typeof(arrayFiles[1].name) === "undefined")?"":arrayFiles[1].name); 
		lcAdjunto3			  = ((typeof(arrayFiles[2].name) === "undefined")?"":arrayFiles[2].name); 
		lcAdjunto4			  = ((typeof(arrayFiles[3].name) === "undefined")?"":arrayFiles[3].name); 
		lcAdjunto5			  = ((typeof(arrayFiles[4].name) === "undefined")?"":arrayFiles[4].name); 
	} catch(i) {}
	
	var lcCiudadId			  = schCiudad.getAttribute("data-id");
	var lcIncotermsId		  = cmbIncoterms.value;
	var lcViaEmbarqueId		  = cmbViaEmbarque.value;
	var lcTipoTramiteId		  = cmbTipoTramite.value;
	var lcFilePDF			  = "";
	
	
	if ( lcTipoMercaderiaId == "0000001885" ) {//Peligrosa
		var txtFile	= document.getElementById("txtFile");

		lcFilePDF	= txtFile.value;
	}

	var arrayDataObject = {
		"CiudadID"      : lcCiudadId,
		"IncotermsID"   : lcIncotermsId,
		"ViaEmbarqueID" : lcViaEmbarqueId,
		"TipoTramiteID" : lcTipoTramiteId,
		"ClienteID"     : lcClienteId,
		"Cliente"       : lcCliente,
		"FilePDF"       : lcFilePDF,
		"Adjunto1"      : lcAdjunto1,
		"Adjunto2"      : lcAdjunto2,
		"Adjunto3"      : lcAdjunto3,
		"Adjunto4"      : lcAdjunto4,
		"Adjunto5"      : lcAdjunto5
	};

	var stringJson = JSON.stringify(arrayDataObject);
	return stringJson;
}

function getDataObjectIncoterms() {
	var lcViaEmbarqueId			        = "";
	var lcIncotermsId			        = "";
	var lcPuertoOrigenId		        = "";
	var lcPuertoDestinoId		        = "";
	var	lcTipoCargaId			        = "";
	var	lcTipoMercaderiaId		        = "";
	var	lcDescMercaderia		        = "";
	var	lcInfoAdicional			        = "";
	var lnCantidadContenedor	        = "0";
	var lcTipoContenedorId		        = "";	
	var lcTipoContenedor20STId	        = "";	
	var lcTipoContenedor40STId	        = "";	
	var lcTipoContenedor40HCId	        = "";	
	var lcTipoContenedor40FRId	        = "";	
	var lcTipoContenedor20RFId	        = "";	
	var lcTipoContenedor40RFId	        = "";	
	var lcTipoContenedor20OTId	        = "";	
	var lcTipoContenedor40OTId	        = "";	
	var lcTipoContenedor20ITId	        = "";	
	var lcTipoContenedor40NOId	        = "";	
	var lnCantidadTipoContenedor20ST	= "0";	
	var lnCantidadTipoContenedor40ST	= "0";	
	var lnCantidadTipoContenedor40HC	= "0";	
	var lnCantidadTipoContenedor40FR	= "0";	
	var lnCantidadTipoContenedor20RF	= "0";	
	var lnCantidadTipoContenedor40RF	= "0";	
	var lnCantidadTipoContenedor20OT	= "0";	
	var lnCantidadTipoContenedor40OT	= "0";	
	var lnCantidadTipoContenedor20IT	= "0";	
	var lnCantidadTipoContenedor40NO	= "0";	
	var lcDescContenedor		        = "";
	var lnPeso					        = "0";
	var lnPesoVolumen			        = "0";
	var lnVolumen				        = "0";
	var lnBultos				        = "0";
	var lcUnidadId				        = "";
	var lcPesoVolumenId			        = "";
	var lcVolumenId				        = "";
	var lcEmbalajeId			        = "";
	var lcDimensionBultos		        = "";
	var lcClaseImo				        = "";
	var lcUn					        = "";
	var lcProveedorName			        = "";
	var lcProvRecogidaDir		        = "";
	var lcProvEntregaDir		        = "";
	var lcNavieraId				        = "";
	var lnValorMercaderia		        = "0";
	var lnValorFlete			        = "0";
	var lcPartidaArancelaria	        = "";
	var lcSubPartidaArancelaria	        = "";
	var lcColoaderDestino		        = "";
	var lcCotizacion			        = "";
	
	var cmbViaEmbarque		            = document.getElementById("cmbViaEmbarque");	
	var cmbIncoterms		            = document.getElementById("cmbIncoterms");
	var schPuertoOrigen		            = document.getElementById("schPuertoOrigen");
	var schPuertoDestino	            = document.getElementById("schPuertoDestino");
	var cmbTipoCarga		            = document.getElementById("cmbTipoCarga");
	var cmbTipoMercaderia	            = document.getElementById("cmbTipoMercaderia");
	var edtDescMercaderia	            = document.getElementById("edtDescMercaderia");
	var edtInfoAdicional	            = document.getElementById("edtInfoAdicional");
	var txtCotizacion 		            = document.getElementById("txtCotizacion");
	var txtRequerimiento	            = document.getElementById("txtRequerimiento");
	
	lcViaEmbarqueId			            = cmbViaEmbarque.value;
	lcIncotermsId			            = cmbIncoterms.value;
	lcPuertoOrigenId		            = schPuertoOrigen.getAttribute("data-id");
	lcPuertoDestinoId		            = schPuertoDestino.getAttribute("data-id");
	lcTipoCargaId			            = cmbTipoCarga.value;
	lcTipoMercaderiaId		            = cmbTipoMercaderia.value;
	lcDescMercaderia		            = edtDescMercaderia.value;
	lcInfoAdicional			            = edtInfoAdicional.value;
	lcCotizacion			            = txtCotizacion.value;
	lcRequerimiento			            = txtRequerimiento.value;
	
	if ( lcTipoCargaId == "0000000204" )  //Contenedor
	{
		var txtCantidadContenedor	= 	document.getElementById("txtCantidadContenedor");
		var cmbTipoContenedor	= 	document.getElementById("cmbTipoContenedor");		
		lnCantidadContenedor	=	txtCantidadContenedor.value;
		lcTipoContenedorId		=	cmbTipoContenedor.value;

		if ( lcTipoContenedorId === "0000001880" || lcTipoContenedorId === "0000001952") //Varios Contenedores | Varios Vehiculos
		{
			//var edtDescContenedor	=	document.getElementById("edtDescContenedor");
			//lcDescContenedor		=	edtDescContenedor.value;
			var tblContenedor	=	document.getElementById("tblContenedor");
			var tbodyContenedor = 	tblContenedor.lastElementChild;
			var trContenedor	= "";
			var idFila			= "";
			var cantidad		= "0";
			var contenedorId	= "";
			
			for ( var i=0; i<tbodyContenedor.childElementCount; i++ ){
				if ( i === 0 ){
					trContenedor = tbodyContenedor.firstElementChild;
				}
				else{
					trContenedor = trContenedor.nextElementSibling;
				}
				idFila			= 	trContenedor.getAttribute("id");
				cantidad		=	document.getElementById(idFila+"-td1").firstElementChild.value;
				contenedorId	=	document.getElementById(idFila+"-td2").firstElementChild.value;
				
				switch(i){
					case 0:	
						lnCantidadTipoContenedor20ST	=	cantidad;	
						lcTipoContenedor20STId			=	contenedorId;							
						break;
					case 1:	
						lnCantidadTipoContenedor40ST	=	cantidad;	
						lcTipoContenedor40STId			=	contenedorId;	
						break;
					case 2:	
						lnCantidadTipoContenedor40HC	=	cantidad;	
						lcTipoContenedor40HCId			=	contenedorId;	
						break;
					case 3:	
						lnCantidadTipoContenedor40FR	=	cantidad;	
						lcTipoContenedor40FRId			=	contenedorId;	
						break;
					case 4:	
						lnCantidadTipoContenedor20RF	=	cantidad;	
						lcTipoContenedor20RFId			=	contenedorId;	
						break;
					case 5:	
						lnCantidadTipoContenedor40RF	=	cantidad;	
						lcTipoContenedor40RFId			=	contenedorId;	
						break;
					case 6:	
						lnCantidadTipoContenedor20OT	=	cantidad;	
						lcTipoContenedor20OTId			=	contenedorId;	
						break;
					case 7:	
						lnCantidadTipoContenedor40OT	=	cantidad;
						lcTipoContenedor40OTId			=	contenedorId;	
						break;
					case 8:	
						lnCantidadTipoContenedor20IT	=	cantidad;	
						lcTipoContenedor20ITId			=	contenedorId;	
						break;
					case 9:	
						lnCantidadTipoContenedor40NO	=	cantidad;	
						lcTipoContenedor40NOId			=	contenedorId;						
						break;
				}
			}			
		}
	}
	else
	{
		if ( lcTipoCargaId !== "" )
		{
			var txtPeso			=	document.getElementById("txtPeso");
			var txtPesoVolumen	=	document.getElementById("txtPesoVolumen");
			var txtVolumen		=	document.getElementById("txtVolumen");
			var txtBultos		=	document.getElementById("txtBultos");
			//var cmbUnidad		=	document.getElementById("cmbUnidad");
			//var cmbPesoVolumen	=	document.getElementById("cmbPesoVolumen");
			//var cmbVolumen		=	document.getElementById("cmbVolumen");
			var cmbEmbalaje		=	document.getElementById("cmbEmbalaje");
			var edtDimensionBultos	=	document.getElementById("edtDimensionBultos");
			
			lnPeso				=	txtPeso.value;
			lnPesoVolumen		= 	txtPesoVolumen.value;
			lnVolumen			=	txtVolumen.value;
			lnBultos			=	txtBultos.value;
			//lcUnidadId			=	cmbUnidad.value;
			//lcPesoVolumenId		=	cmbPesoVolumen.value;
			//lcVolumenId			=	cmbVolumen.value;
			lcEmbalajeId			=	cmbEmbalaje.value;
			lcDimensionBultos	=	edtDimensionBultos.value;
			
			if ( lcTipoCargaId == "0000000206" ) //Carga Suelta Consolidada
			{
				var txtColoaderDestino = document.getElementById("txtColoaderDestino");
				lcColoaderDestino = txtColoaderDestino.value;
			}
		}	
	}
	if ( lcTipoMercaderiaId == "0000001885" ) //Peligrosa
	{
		var txtClaseIMO	= document.getElementById("txtClaseIMO");	
		var txtUN		= document.getElementById("txtUN");	
		
		lcClaseImo		= txtClaseIMO.value;
		lcUn			= txtUN.value;
	}	
	if ( lcIncotermsId === "0000000091" ) //EXW
	{
		var txtProveedor		= document.getElementById("txtProveedor");
		var edtProvRecogidaDir	= document.getElementById("edtProvRecogidaDir");
		lcProveedorName			= txtProveedor.value;
		lcProvRecogidaDir		= edtProvRecogidaDir.value;
	}	
	if ( lcViaEmbarqueId === "0000000499" )//Si es terrestre
	{
		var edtProvRecogidaDir	= document.getElementById("edtProvRecogidaDir");
		var edtProvEntregaDir	= document.getElementById("edtProvEntregaDir");
		var txtValorMercaderia	= document.getElementById("txtValorMercaderia");
		
		lcProvRecogidaDir		= edtProvRecogidaDir.value;
		lcProvEntregaDir		= edtProvEntregaDir.value;
		lnValorMercaderia		= txtValorMercaderia.value;
	}
	//DDP,DDU,DAP y no es Terrestre
	if ( ( (lcIncotermsId === "0000000101") || (lcIncotermsId === "0000000100") || (lcIncotermsId === "0000002401") ) && (lcViaEmbarqueId != "0000000499") ) 
	{
		var edtProvEntregaDir	=   document.getElementById("edtProvEntregaDir");
		lcProvEntregaDir		= 	edtProvEntregaDir.value;
	}
	if ( ( lcIncotermsId === "0000000101" ) || ( lcIncotermsId === "0000000100" ) || ( lcIncotermsId === "0000002401" ) ) //DDP,DDU,DAP
	{
		if ( lcTipoCargaId != "" )
		{
			var cmbNaviera			=   document.getElementById("cmbNaviera");		
			lcNavieraId				=	cmbNaviera.value;
		}
	}	
	if ( lcIncotermsId === "0000000101" ) //DDP
	{
		var txtValorFlete				=	document.getElementById("txtValorFlete");
		var txtPartidaArancelaria		=	document.getElementById("txtPartidaArancelaria");
		var	txtSubPartidaArancelaria	=	document.getElementById("txtSubPartidaArancelaria");
		lnValorFlete			=	txtValorFlete.value;
		lcPartidaArancelaria	=	txtPartidaArancelaria.value;
		lcSubPartidaArancelaria	=	txtSubPartidaArancelaria.value;
	}

		
	var arrayDataObject=
	{
		"PuertoOrigenId":lcPuertoOrigenId,
		"PuertoDestinoId":lcPuertoDestinoId,
		"TipoCargaId":lcTipoCargaId,
		"TipoMercaderiaId":lcTipoMercaderiaId,
		"DescMercaderia":limpiarCadena(lcDescMercaderia),
		"InfoAdicional":limpiarCadena(lcInfoAdicional),
		"CantidadContenedor":lnCantidadContenedor,
		"TipoContenedorId":lcTipoContenedorId,
		"TipoContenedor20STId":lcTipoContenedor20STId,
		"TipoContenedor40STId":lcTipoContenedor40STId,
		"TipoContenedor40HCId":lcTipoContenedor40HCId,
		"TipoContenedor40FRId":lcTipoContenedor40FRId,
		"TipoContenedor20RFId":lcTipoContenedor20RFId,
		"TipoContenedor40RFId":lcTipoContenedor40RFId,
		"TipoContenedor20OTId":lcTipoContenedor20OTId,
		"TipoContenedor40OTId":lcTipoContenedor40OTId,
		"TipoContenedor20ITId":lcTipoContenedor20ITId,
		"TipoContenedor40NOId":lcTipoContenedor40NOId,
		"CantidadTipoContenedor20ST":lnCantidadTipoContenedor20ST,
		"CantidadTipoContenedor40ST":lnCantidadTipoContenedor40ST,
		"CantidadTipoContenedor40HC":lnCantidadTipoContenedor40HC,
		"CantidadTipoContenedor40FR":lnCantidadTipoContenedor40FR,
		"CantidadTipoContenedor20RF":lnCantidadTipoContenedor20RF,
		"CantidadTipoContenedor40RF":lnCantidadTipoContenedor40RF,
		"CantidadTipoContenedor20OT":lnCantidadTipoContenedor20OT,
		"CantidadTipoContenedor40OT":lnCantidadTipoContenedor40OT,
		"CantidadTipoContenedor20IT":lnCantidadTipoContenedor20IT,
		"CantidadTipoContenedor40NO":lnCantidadTipoContenedor40NO,
		"DescContenedor":limpiarCadena(lcDescContenedor),
		"Peso":lnPeso,
		"PesoVolumen":lnPesoVolumen,
		"Volumen":lnVolumen,
		"Bultos":lnBultos,
		"UnidadId":lcUnidadId,
		"PesoVolumenId":lcPesoVolumenId,
		"VolumenId":lcVolumenId,
		"EmbalajeId":lcEmbalajeId,
		"DimensionBultos":limpiarCadena(lcDimensionBultos),
		"ClaseImo":limpiarCadena(lcClaseImo),
		"Un":limpiarCadena(lcUn),
		"ProveedorName":limpiarCadena(lcProveedorName),
		"ProvRecogidaDir":limpiarCadena(lcProvRecogidaDir),
		"ProvEntregaDir":limpiarCadena(lcProvEntregaDir),
		"NavieraId":lcNavieraId,
		"ValorMercaderia":lnValorMercaderia,
		"ValorFlete":lnValorFlete,
		"PartidaArancelaria":limpiarCadena(lcPartidaArancelaria),
		"SubPartidaArancelaria":limpiarCadena(lcSubPartidaArancelaria),
		"ColoaderDestino":limpiarCadena(lcColoaderDestino),
		"Cotizacion":lcCotizacion,
		"Requerimiento":lcRequerimiento
	};
	var stringJson = JSON.stringify(arrayDataObject);
	return stringJson;
}

function getDataObjectEditTarifas() {
	var tbEditTarifas = document.getElementById('tb-edit-tarifas');
	var productoId    = "";
	var valor         = "0.00";
	var objectTarifa  = {};
	var arrayTarifas  = [];
	var stringJson    = "";
	
	for ( var i = 0; i < tbEditTarifas.childElementCount; i++ ) {
		productoId         = tbEditTarifas.children.item(i).firstElementChild.getAttribute("data-productoid");
		tipoContenedorId   = tbEditTarifas.children.item(i).firstElementChild.getAttribute("data-tipo-contenedor-id");
		cantidadContenedor = tbEditTarifas.children.item(i).firstElementChild.getAttribute("data-cantidad-contenedor");
		valor              = tbEditTarifas.children.item(i).children.item(2).firstElementChild.value; 
		objectTarifa = {
			"productoId"         : productoId,
			"valor"              : valor,
			"tipoContenedorId"   : tipoContenedorId,
			"cantidadContenedor" : cantidadContenedor
		};
		arrayTarifas.push(objectTarifa);
	}

	stringJson = JSON.stringify(arrayTarifas);
	return stringJson;
}

function cargarBodyIncoterms() {
	var btnListaAgentes	= document.getElementById("btnListaAgentes");
	var sJsonDataObject	= getDataObjectInicio();	
	var optIncoterms	= document.getElementById("cmbIncoterms").value;
	var optViaEmbarque	= document.getElementById("cmbViaEmbarque").value;
	var btnEnviar		= document.getElementById("btnEnviar");
	var btnVerTarifas	= document.getElementById("btnVerTarifas");	

	btnListaAgentes.classList.remove("hidden");
	
	
	if ( optIncoterms === "0000000052" ) { //FOB
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsFOB&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		return;

	}
	if ( optIncoterms === "0000000091" ) { //EXW
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsEXW&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML=content;
		var lblNotaEXWTerrestre	= document.getElementById("lbl-NotaEXW-Terrestre");		
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		
		if ( optViaEmbarque === "0000000499" ) { //Terrestre
			purl    = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=extraerEmpresaEnSesion";
			content = getContent(purl).trim();

			if ( content != "TOLEPU" ) {
				document.getElementById("lblProvRecogidaDir").style.display = "none";
				document.getElementById("lblProvEntregaDir").style.display  = "none";
				document.getElementById("edtProvRecogidaDir").style.display = "none";
				document.getElementById("edtProvEntregaDir").style.display  = "none";
				lblNotaEXWTerrestre.innerHTML = "<p style='font-size:0.8em; color:#00365A;'> <mark>En el caso de contar con dirección exacta de recogida y de entrega, favor enviar su requerimiento a: <a href='sales@torresytorres.com' style='color: #2594E9;'>sales@torresytorres.com</a></mark></p>"
			}
		}
		return;

	}
	if ( optIncoterms === "0000000092" ) { //FCA
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsFCA&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		return;

	}
	if ( optIncoterms === "0000000100" ) { //DDU
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsDDU&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		return;

	}
	if ( optIncoterms === "0000000101" ) { //DDP
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsDDP&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		return;

	}
	if ( optIncoterms === "0000002401" ) {//DAP
		var purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyIncotermsDAP&metodo=show&variables='+sJsonDataObject;
		var content = getContent(purl);
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
		return;

	} else {
		var purl    = './index.php?action=claseUnderConstruction';
		var content = getContent(purl);		
		document.getElementById("divBodyIncoterms").innerHTML = content;
		btnEnviar.classList.remove("hidden");
		btnVerTarifas.classList.remove("hidden");
		btnEnviar.disabled     = false;
		btnVerTarifas.disabled = false;
	}
}

function validarAgente(chkAgenteId) {
	chkAgente = document.getElementById(chkAgenteId);
	var lcContactoAgenteId = chkAgente.value
	var arrayControl  = {'ContactoAgenteId':lcContactoAgenteId};
	var stringJson    = JSON.stringify(arrayControl);
	var purl = "./index.php?action=ejecutarAjax&clase=claseGrid&metodo=validarAgente&stringJsonAgenteId="+stringJson;
	var content = getContent(purl);
	if ( content == false ){
		var icon    = 1;
		var caption = "No puede seleccionar este Agente, porque no tiene email registrado.<br>Comuniquese con el Dpto. de Sistemas.";
		var tittle	= "";
		var funcion = "chkAgente.checked = false;";
		encenderMessageBox(icon,tittle,caption,funcion);
	}
}

function agentesComparaSeleccionarAgente(tr) {
	var btnGenerarCotizacion = document.getElementById("btnGenerarCotizacion");
	var colSubTotalId        = tr.getAttribute("data-contacto-agente-id");
	var colSubTotal          = "";

	colSubTotalId 	         = "colSubTotal"+colSubTotalId;
	colSubTotal		         = document.getElementById("colSubTotalId");
	limpiarGrid("tblAgentesComparar","#FFFFFF","#F6F9FB");								
	tr.style.background      = "#C0E7F9";
	
	if( tr.lastElementChild.firstElementChild.firstElementChild.checked && colSubTotal.value > 0 ) {
		btnGenerarCotizacion.setAttribute("class","button button-blue button-tarifas");

	} else {
		btnGenerarCotizacion.setAttribute("class","button button-blue button-tarifas disabled");
	}
}

function existeFileUpload() {
	if ( typeof document.getElementById("txtFile") == "object" ) 
	{
		var txtFile   = document.getElementById("txtFile");
		var lcFilePDF =	"none.xxx";
		if ( txtFile !== null )
		{
			if ( txtFile.value !== "" ) 
			{
				lcFilePDF =	txtFile.value;
			}
		}
		var arrayControl  = {'FilePDF':lcFilePDF};
		var stringJson    = JSON.stringify(arrayControl);
		var purl = "./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=existeFile&stringJsonFilePDF="+stringJson;
		var content = getContent(purl);
		if ( content == true )
		{
			var icon    = 1;
			var caption = "El archivo MSDS fué subido al servidor, si desea realizar esta acción debe primero quitar el archivo MSDS.";
			var tittle	= "";
			var funcion = "";
			encenderMessageBox(icon,tittle,caption,funcion);
			var cmbTipoMercaderia 	= document.getElementById("cmbTipoMercaderia");
			cmbTipoMercaderia.value	= "0000001885"; //Peligrosa
			displayHiddenLabels();
		}
		return content;
	}
	return false;
}

function displayHiddenLabels() {
	var txtFile = document.getElementById('txtFile');
	var btnUpload = document.getElementById('btnUpload');

	if ( txtFile.value == '' ) {
		btnUpload.className="button button-file-upload disabled";
		btnUpload.disabled=true;
		document.getElementById('lblPreviewPDF').parentNode.classList.add("hidden");
		document.getElementById('lblRemovePDF').parentNode.classList.add("hidden");

	} else {
		btnUpload.className="button button-blue button-file-upload";
		btnUpload.disabled=false;
		document.getElementById('lblPreviewPDF').parentNode.classList.remove("hidden");
		document.getElementById('lblRemovePDF').parentNode.classList.remove("hidden");

	}
}

function cargarGridAgentes() {
	var paisId          = document.getElementById("schCiudad").getAttribute("data-id");
	var viaEmbarqueId   = document.getElementById("cmbViaEmbarque").value;
	var viaEmbarque     = document.getElementById("chkViaEmbarque").checked;
	var autorizadoSENAE = document.getElementById("chkAutorizadoSENAE").checked;
	var btnEnviar       = document.getElementById("btnEnviar");
	var purl            = "./index.php?action=cargarAgentesExterior&paisId="+paisId+"&viaEmbarqueId="+viaEmbarqueId+"&viaEmbarque="+viaEmbarque+"&autorizadoSENAE="+autorizadoSENAE;
	var content         = eval("("+getContent(purl)+")");

	if ( content.contadorAgente == 0 ) {
		var msj ="No existen Agentes del Pais o Vía de Embarque seleccionado.";
		encenderMessageBox(1,'',msj,'');

	}
	document.getElementById("grdGridAgentes").innerHTML = content.mensaje;

}

function validarCotizacion() {
	var txtCotizacion = document.getElementById("txtCotizacion");
	var purl = "./index.php?action=existeCotizacion&cotizacion="+txtCotizacion.value;
	var content = getContent(purl);
	var caption = "";

	if ( content == false && txtCotizacion.value != "" ) {
		caption="No existe la cotización ingresada, por favor ingrese una cotización válida.";
		encenderMessageBox(1,'',caption,'txtCotizacion.value = "";');

	}
}

function validarRequerimiento() {
	var txtRequerimiento = document.getElementById("txtRequerimiento");
	var purl = "./index.php?action=existeRequerimiento&requerimiento="+txtRequerimiento.value;
	var content = getContent(purl);
	var caption = "";

	if ( content == false && txtRequerimiento.value != "" ) {
		caption="No existe el requerimiento ingresado, por favor ingrese un requerimiento válido.";
		encenderMessageBox(1,'',caption,'txtRequerimiento.value = "";');

	}
}

function llenarSelectContenedorMaritimo(selectTipoContenedor) {
	var optionCont20ST 		= document.createElement("option");
	var optionCont40ST 		= document.createElement("option");
	var optionCont40HC 		= document.createElement("option");
	var optionCont40FR 		= document.createElement("option");
	var optionCont20REEF	= document.createElement("option");
	var optionCont40REEF	= document.createElement("option");
	var optionCont20OP 		= document.createElement("option");
	var optionCont40OP 		= document.createElement("option");
	var optionCont20IT 		= document.createElement("option");
	var optionCont40NOR		= document.createElement("option");
	
	optionCont20ST.value		= "0000001870";
	optionCont40ST.value		= "0000001871";
	optionCont40HC.value		= "0000001872";
	optionCont40FR.value		= "0000001873";
	optionCont20REEF.value		= "0000001874";
	optionCont40REEF.value		= "0000001875";
	optionCont20OP.value		= "0000001876";
	optionCont40OP.value		= "0000001877";
	optionCont20IT.value		= "0000001878";
	optionCont40NOR.value		= "0000001879";
	
	optionCont20ST.textContent	= "Contenedor 20 ST";
	optionCont40ST.textContent	= "Contenedor 40 ST";
	optionCont40HC.textContent	= "Contenedor 40 HC";
	optionCont40FR.textContent	= "Contenedor 40 FR";
	optionCont20REEF.textContent = "Contenedor 20 REEF";
	optionCont40REEF.textContent = "Contenedor 40 REEF";
	optionCont20OP.textContent	= "Contenedor 20 OPEN TOP";
	optionCont40OP.textContent	= "Contenedor 40 OPEN TOP";
	optionCont20IT.textContent	= "Contenedor 20 ISO TANK";
	optionCont40NOR.textContent	= "Contenedor 40 NOR";
	
	selectTipoContenedor.appendChild(optionCont20ST);
	selectTipoContenedor.appendChild(optionCont40ST);
	selectTipoContenedor.appendChild(optionCont40HC);
	selectTipoContenedor.appendChild(optionCont40FR);
	selectTipoContenedor.appendChild(optionCont20REEF);
	selectTipoContenedor.appendChild(optionCont40REEF);
	selectTipoContenedor.appendChild(optionCont20OP);
	selectTipoContenedor.appendChild(optionCont40OP);
	selectTipoContenedor.appendChild(optionCont20IT);
	selectTipoContenedor.appendChild(optionCont40NOR);
}

function llenarSelectContenedorTerrestre(selectTipoContenedor) {
	var optionCont20 		= document.createElement("option");
	var optionCont40 		= document.createElement("option");
	var optionCont40HC 		= document.createElement("option");
	var optionTurbo 		= document.createElement("option");
	var optionSencillo		= document.createElement("option");
	var optionDobleTroque	= document.createElement("option");
	var optionTractomula 	= document.createElement("option");
	var optionCamaBaja 		= document.createElement("option");
	
	optionCont20.value		= "0000001946";
	optionCont40.value		= "0000001947";
	optionCont40HC.value	= "0000001948";
	optionTurbo.value		= "0000001975";
	optionSencillo.value	= "0000001953";
	optionDobleTroque.value	= "0000001976";
	optionTractomula.value	= "0000001977";
	optionCamaBaja.value	= "0000001951";

	
	optionCont20.textContent	= "Contenedor 20";
	optionCont40.textContent	= "Contenedor 40";
	optionCont40HC.textContent	= "Contenedor 40 HC";
	optionTurbo.textContent		= "Turbo ( 4,5 Ton | 4,5 L x2 W x 2 H | 18 m3 )";
	optionSencillo.textContent	= "Sencillo ( 8 Ton | 7x2 L ,2 W x 2,2 H | 34 m3 )";
	optionDobleTroque.textContent	= "Doble Troque ( 15,5 Ton | 7,50 L x 2,2 W x 2,2 H | 36 m3 )";
	optionTractomula.textContent	= "Tractomula  ( 30 Ton | 12,6 L x 2,4 W x 2,3 H | 70 m3 )";
	optionCamaBaja.textContent		= "Cama Baja";
	
	selectTipoContenedor.appendChild(optionCont20);
	selectTipoContenedor.appendChild(optionCont40);
	selectTipoContenedor.appendChild(optionCont40HC);
	selectTipoContenedor.appendChild(optionTurbo);
	selectTipoContenedor.appendChild(optionSencillo);
	selectTipoContenedor.appendChild(optionDobleTroque);
	selectTipoContenedor.appendChild(optionTractomula);
	selectTipoContenedor.appendChild(optionCamaBaja);
}

function addTablaContenedores() {
	var thCantidad 		 	= document.getElementById("tblContenedor-th-1");
	var thTipoContenedor 	= document.getElementById("tblContenedor-th-2");
	
	var tdCantidad 		 	= document.getElementById("tblContenedor-tr1-td1");
	var tdTipoContenedor 	= document.getElementById("tblContenedor-tr1-td2");
	var tdControlRegistro 	= document.getElementById("tblContenedor-tr1-td3");
	
	var inputCantidad			= document.createElement("input");
	var selectTipoContenedor	= document.createElement("select");
	
	var spanAdd					= document.createElement("span");
	var spanRemove				= document.createElement("span");
				
	var viaEmbarqueId			= document.getElementById("cmbViaEmbarque").value;
		
	thCantidad.innerHTML 	   	= "Cantidad"
	thTipoContenedor.innerHTML 	= "Tipo";
	
	inputCantidad.type="number";
	inputCantidad.setAttribute("max","10");
	inputCantidad.setAttribute("min","1");
	inputCantidad.value=1;	
	
	if ( viaEmbarqueId === "0000000493" ){ //Maritimo
		llenarSelectContenedorMaritimo(selectTipoContenedor);
	}else{ //Terrestre
		llenarSelectContenedorTerrestre(selectTipoContenedor);
	}
		
	spanAdd.className="button-add";
	spanAdd.innerHTML="+";
	spanAdd.addEventListener("click",function(){
		addFilaContenedor(this);
	});
	
	spanRemove.className="button-remove";
	spanRemove.innerHTML="-";
	spanRemove.addEventListener("click",function(){
		removeFilaContenedor(this);
	});

	tdCantidad.appendChild(inputCantidad);
	tdTipoContenedor.appendChild(selectTipoContenedor);
	tdControlRegistro.appendChild(spanAdd);
	tdControlRegistro.appendChild(spanRemove);	
}

function addFilaContenedor(span){
	var td		= span.parentNode;
	var	tr 		= td.parentNode
	var tbody	= tr.parentNode;
	var trNext	= tr.nextElementSibling;
	
	var icon     = 1;
	var	caption  = "Solo puede agregar hasta 10 Tipos."	
	var tittle	 = "";
	var funcion  = "";
	
	if ( tbody.childElementCount === 10 ) {
		encenderMessageBox(icon,tittle,caption,funcion);
		return;
	}
	
	var i = tbody.children.length + 1; 
	
	var tdCantidad			 = document.createElement("td");
	var tdTipoContenedor 	 = document.createElement("td");
	var tdControlRegistro	 = document.createElement("td");
	
	var trContenedor		 = document.createElement("tr");
	
	var inputCantidad		 = document.createElement("input");
	var selectTipoContenedor = document.createElement("select");
	var spanAdd				 = document.createElement("span");
	var spanRemove			 = document.createElement("span");
	
	var viaEmbarqueId		 = document.getElementById("cmbViaEmbarque").value;

	inputCantidad.type="number";
	inputCantidad.setAttribute("max","10");
	inputCantidad.setAttribute("min","1");
	inputCantidad.value=1;
	
	if ( viaEmbarqueId === "0000000493" ){ //Maritimo
		llenarSelectContenedorMaritimo(selectTipoContenedor);
	}else{ //Terrestre
		llenarSelectContenedorTerrestre(selectTipoContenedor);
	}
	
	spanAdd.className="button-add";
	spanAdd.innerHTML="+";
	spanAdd.addEventListener("click",function(){
		addFilaContenedor(this);
	});
	
	spanRemove.className="button-remove";
	spanRemove.innerHTML="-";
	spanRemove.addEventListener("click",function(){
		removeFilaContenedor(this);
	});
	
	
	tdCantidad.setAttribute("id","tblContenedor-tr"+i+"-td1");
	tdCantidad.appendChild(inputCantidad);

	tdTipoContenedor.setAttribute("id","tblContenedor-tr"+i+"-td2");
	tdTipoContenedor.appendChild(selectTipoContenedor);
	
	tdControlRegistro.setAttribute("id","tblContenedor-tr"+i+"-td3");
	tdControlRegistro.appendChild(spanAdd);
	tdControlRegistro.appendChild(spanRemove);
	
	trContenedor.setAttribute("id","tblContenedor-tr"+i)
	
	trContenedor.appendChild(tdCantidad);
	trContenedor.appendChild(tdTipoContenedor);
	trContenedor.appendChild(tdControlRegistro);
	
	if ( trNext != null ){
		tbody.insertBefore(trContenedor,trNext);
	}else{
		tbody.appendChild(trContenedor);
	}
}

function removeFilaContenedor(span){
	var td		= span.parentNode;
	var	tr 		= td.parentNode
	
	tr.remove();	
}

function mostarInfoCarga() {
	//<!-- Fichas -->
	document.getElementById("btn1").className="button active";
	document.getElementById("btn2").className="button";

	document.getElementById("btn3").className="button";
	//<!-- Ocultar etiquetas de Obligatorio -->
	ocultarObligatorios();
	//<!-- Ocultar Informacion del Proveedor -->
	document.getElementById("lblProveedorName").style.visibility="hidden";
	document.getElementById("txtProveedorName").style.visibility="hidden";
	document.getElementById("lblProveedorContact").style.visibility="hidden";
	document.getElementById("txtProveedorContact").style.visibility="hidden";
	document.getElementById("lblProveedorEmail").style.visibility="hidden";
	document.getElementById("txtProveedorEmail").style.visibility="hidden";
	document.getElementById("lblProveedorEmail2").style.visibility="hidden";
	document.getElementById("txtProveedorEmail2").style.visibility="hidden";
	document.getElementById("lblProveedorDatosAdicionales").style.visibility="hidden";
	document.getElementById("edtProveedorDatosAdicionales").style.visibility="hidden";
	document.getElementById("lblProveedorTelefono").style.visibility="hidden";
	document.getElementById("txtProveedorTelefono").style.visibility="hidden";
	document.getElementById("lblProveedorExt").style.visibility="hidden";
	document.getElementById("txtProveedorExt").style.visibility="hidden";
	document.getElementById("lblProvRecogidaDir").style.visibility="hidden";
	document.getElementById("edtProvRecogidaDir").style.visibility="hidden";
	document.getElementById("lblPartidaArancelaria").style.visibility="hidden";
	document.getElementById("spnPartidaArancelaria").parentNode.style.visibility="hidden";
	document.getElementById("txtPartidaArancelaria").style.visibility="hidden";
	document.getElementById("lblServiciosOrigen").style.visibility="hidden";
	document.getElementById("spnServiciosOrigen").parentNode.style.visibility="hidden";
	document.getElementById("lblProvDetalleServicios").style.visibility="hidden";
	document.getElementById("edtProvDetalleServicios").style.visibility="hidden";
	document.getElementById("lblPrvDatosGeneral").style.visibility="hidden";
	document.getElementById("lblPrvServiciosOrigen").style.visibility="hidden";
	//<!-- Ocultar Informacion Adicional -->
	document.getElementById("lblInfoSolicitud").style.visibility="hidden";
	document.getElementById("lblNavieraName").style.visibility="hidden";
	document.getElementById("lblTransitoInternacional").style.visibility="hidden";
	document.getElementById("lblTransitoInterno").style.visibility="hidden";
	document.getElementById("lblFrecuencia").style.visibility="hidden";
	document.getElementById("lblRutaVia").style.visibility="hidden";
	document.getElementById("lblDiasLibres").style.visibility="hidden";
	document.getElementById("lblMblCollect").style.visibility="hidden";
	document.getElementById("lblMblEmisionDestino").style.visibility="hidden";
	document.getElementById("lblDatosAdicionales").style.visibility="hidden";
	document.getElementById("edtDatosAdicionales").style.visibility="hidden";
	
	//<!-- Mostrar Informacion de la Carga -->
	document.getElementById("lblBultos").style.visibility="visible";
	document.getElementById("txtBultos").style.visibility="visible";
	document.getElementById("cmbEmbalaje").parentNode.style.visibility="visible";
	document.getElementById("lblDimensionBultos").style.visibility="visible";
	document.getElementById("edtDimensionBultos").style.visibility="visible";
	document.getElementById("lblPeso").style.visibility="visible";
	document.getElementById("txtPeso").style.visibility="visible";
	document.getElementById("cmbUnidad").parentNode.style.visibility="visible";
	document.getElementById("lblVolumen").style.visibility="visible";
	document.getElementById("txtVolumen").style.visibility="visible";
	document.getElementById("cmbVolumen").parentNode.style.visibility="visible";
	document.getElementById("lblDescMercaderia").style.visibility="visible";
	document.getElementById("edtDescMercaderia").style.visibility="visible";
	document.getElementById("cmbTipoMercaderia").parentNode.style.visibility="visible";
	validarComboBox("cmbTipoMercaderia");
	document.getElementById("lblValorMercaderia").style.visibility="visible";
	document.getElementById("txtValorMercaderia").style.visibility="visible";
	document.getElementById("lblTipoContenedor").style.visibility="visible";
	document.getElementById("cmbTipoContenedor").parentNode.style.visibility="visible";
	document.getElementById("lblObservaciones").style.visibility="visible";
	document.getElementById("edtObservaciones").style.visibility="visible";
}

function mostarInfoProveedor() {
	//<!-- Fichas -->
	document.getElementById("btn1").className="button";
	document.getElementById("btn2").className="button active";
	document.getElementById("btn3").className="button";
	//<!-- Ocultar etiquetas de Obligatorio -->
	ocultarObligatorios();
	//<!-- Ocultar Informacion de la Carga -->
	document.getElementById("lblBultos").style.visibility="hidden";
	document.getElementById("txtBultos").style.visibility="hidden";
	document.getElementById("cmbEmbalaje").parentNode.style.visibility="hidden";
	document.getElementById("lblDimensionBultos").style.visibility="hidden";
	document.getElementById("edtDimensionBultos").style.visibility="hidden";
	document.getElementById("lblPeso").style.visibility="hidden";
	document.getElementById("txtPeso").style.visibility="hidden";
	document.getElementById("cmbUnidad").parentNode.style.visibility="hidden";
	document.getElementById("lblVolumen").style.visibility="hidden";
	document.getElementById("txtVolumen").style.visibility="hidden";
	document.getElementById("cmbVolumen").parentNode.style.visibility="hidden";
	document.getElementById("lblDescMercaderia").style.visibility="hidden";
	document.getElementById("edtDescMercaderia").style.visibility="hidden";
	document.getElementById("cmbTipoMercaderia").parentNode.style.visibility="hidden";
	document.getElementById("txtClaseIMO").style.visibility="hidden";
	document.getElementById("txtUN").style.visibility="hidden";
	document.getElementById("lblValorMercaderia").style.visibility="hidden";
	document.getElementById("txtValorMercaderia").style.visibility="hidden";
	document.getElementById("lblTipoContenedor").style.visibility="hidden";
	document.getElementById("cmbTipoContenedor").parentNode.style.visibility="hidden";
	document.getElementById("lblPartidaArancelaria").style.visibility="hidden";
	document.getElementById("spnPartidaArancelaria").parentNode.style.visibility="hidden";
	document.getElementById("lblObservaciones").style.visibility="hidden";
	document.getElementById("edtObservaciones").style.visibility="hidden";
	//<!-- Ocultar Informacion Adicional -->
	document.getElementById("lblInfoSolicitud").style.visibility="hidden";
	document.getElementById("lblNavieraName").style.visibility="hidden";
	document.getElementById("lblTransitoInternacional").style.visibility="hidden";
	document.getElementById("lblTransitoInterno").style.visibility="hidden";
	document.getElementById("lblFrecuencia").style.visibility="hidden";
	document.getElementById("lblRutaVia").style.visibility="hidden";
	document.getElementById("lblDiasLibres").style.visibility="hidden";
	document.getElementById("lblMblCollect").style.visibility="hidden";
	document.getElementById("lblMblEmisionDestino").style.visibility="hidden";
	document.getElementById("lblDatosAdicionales").style.visibility="hidden";
	document.getElementById("edtDatosAdicionales").style.visibility="hidden";
	//<!-- Mostrar Informacion del Proveedor -->
	document.getElementById("lblProveedorName").style.visibility="visible";
	document.getElementById("txtProveedorName").style.visibility="visible";
	document.getElementById("lblProveedorContact").style.visibility="visible";
	document.getElementById("txtProveedorContact").style.visibility="visible";
	document.getElementById("lblProveedorEmail").style.visibility="visible";
	document.getElementById("txtProveedorEmail").style.visibility="visible";
	document.getElementById("lblProveedorEmail2").style.visibility="visible";
	document.getElementById("txtProveedorEmail2").style.visibility="visible";
	document.getElementById("lblProveedorDatosAdicionales").style.visibility="visible";
	document.getElementById("edtProveedorDatosAdicionales").style.visibility="visible";
	document.getElementById("lblProveedorTelefono").style.visibility="visible";
	document.getElementById("txtProveedorTelefono").style.visibility="visible";
	document.getElementById("lblProveedorExt").style.visibility="visible";
	document.getElementById("txtProveedorExt").style.visibility="visible";
	document.getElementById("lblProvRecogidaDir").style.visibility="visible";
	document.getElementById("edtProvRecogidaDir").style.visibility="visible";
	document.getElementById("lblPartidaArancelaria").style.visibility="visible";
	document.getElementById("spnPartidaArancelaria").parentNode.style.visibility="visible";
	document.getElementById("txtPartidaArancelaria").style.visibility="visible";
	spnPartidaArancelariaValid(document.getElementById("spnPartidaArancelaria").checked);
	document.getElementById("lblServiciosOrigen").style.visibility="visible";
	document.getElementById("spnServiciosOrigen").parentNode.style.visibility="visible";
	document.getElementById("lblProvDetalleServicios").style.visibility="visible";
	document.getElementById("edtProvDetalleServicios").style.visibility="visible";
	spnServiciosOrigenValid(document.getElementById("spnServiciosOrigen").checked);
	document.getElementById("lblPrvDatosGeneral").style.visibility="visible";
	document.getElementById("lblPrvServiciosOrigen").style.visibility="visible";
}

function mostarInfoAdicional()
{
	//<!-- Fichas -->
	document.getElementById("btn1").className="button";
	document.getElementById("btn2").className="button";
	document.getElementById("btn3").className="button active";
	//<!-- Ocultar etiquetas de Obligatorio -->
	ocultarObligatorios();
	//<!-- Ocultar Informacion de la Carga -->
	document.getElementById("lblBultos").style.visibility="hidden";
	document.getElementById("txtBultos").style.visibility="hidden";
	document.getElementById("cmbEmbalaje").parentNode.style.visibility="hidden";
	document.getElementById("lblDimensionBultos").style.visibility="hidden";
	document.getElementById("edtDimensionBultos").style.visibility="hidden";
	document.getElementById("lblPeso").style.visibility="hidden";
	document.getElementById("txtPeso").style.visibility="hidden";
	document.getElementById("cmbUnidad").parentNode.style.visibility="hidden";
	document.getElementById("lblVolumen").style.visibility="hidden";
	document.getElementById("txtVolumen").style.visibility="hidden";
	document.getElementById("cmbVolumen").parentNode.style.visibility="hidden";
	document.getElementById("lblDescMercaderia").style.visibility="hidden";
	document.getElementById("edtDescMercaderia").style.visibility="hidden";
	document.getElementById("cmbTipoMercaderia").parentNode.style.visibility="hidden";
	document.getElementById("txtClaseIMO").style.visibility="hidden";
	document.getElementById("txtUN").style.visibility="hidden";
	document.getElementById("lblValorMercaderia").style.visibility="hidden";
	document.getElementById("txtValorMercaderia").style.visibility="hidden";
	document.getElementById("lblTipoContenedor").style.visibility="hidden";
	document.getElementById("cmbTipoContenedor").parentNode.style.visibility="hidden";
	document.getElementById("lblPartidaArancelaria").style.visibility="hidden";
	document.getElementById("spnPartidaArancelaria").parentNode.style.visibility="hidden";
	document.getElementById("lblObservaciones").style.visibility="hidden";
	document.getElementById("edtObservaciones").style.visibility="hidden";
	//<!-- Ocultar Informacion del Proveedor -->
	document.getElementById("lblProveedorName").style.visibility="hidden";
	document.getElementById("txtProveedorName").style.visibility="hidden";
	document.getElementById("lblProveedorContact").style.visibility="hidden";
	document.getElementById("txtProveedorContact").style.visibility="hidden";
	document.getElementById("lblProveedorEmail").style.visibility="hidden";
	document.getElementById("txtProveedorEmail").style.visibility="hidden";
	document.getElementById("lblProveedorEmail2").style.visibility="hidden";
	document.getElementById("txtProveedorEmail2").style.visibility="hidden";
	document.getElementById("lblProveedorDatosAdicionales").style.visibility="hidden";
	document.getElementById("edtProveedorDatosAdicionales").style.visibility="hidden";
	document.getElementById("lblProveedorTelefono").style.visibility="hidden";
	document.getElementById("txtProveedorTelefono").style.visibility="hidden";
	document.getElementById("lblProveedorExt").style.visibility="hidden";
	document.getElementById("txtProveedorExt").style.visibility="hidden";
	document.getElementById("lblProvRecogidaDir").style.visibility="hidden";
	document.getElementById("edtProvRecogidaDir").style.visibility="hidden";
	document.getElementById("lblPartidaArancelaria").style.visibility="hidden";
	document.getElementById("spnPartidaArancelaria").parentNode.style.visibility="hidden";
	document.getElementById("txtPartidaArancelaria").style.visibility="hidden";
	document.getElementById("lblServiciosOrigen").style.visibility="hidden";
	document.getElementById("spnServiciosOrigen").parentNode.style.visibility="hidden";
	document.getElementById("lblProvDetalleServicios").style.visibility="hidden";
	document.getElementById("edtProvDetalleServicios").style.visibility="hidden";
	document.getElementById("lblPrvDatosGeneral").style.visibility="hidden";
	document.getElementById("lblPrvServiciosOrigen").style.visibility="hidden";
	//<!-- Mostrar Informacion Adicional -->
	document.getElementById("lblInfoSolicitud").style.visibility="visible";
	document.getElementById("lblNavieraName").style.visibility="visible";
	document.getElementById("lblTransitoInternacional").style.visibility="visible";
	document.getElementById("lblTransitoInterno").style.visibility="visible";
	document.getElementById("lblFrecuencia").style.visibility="visible";
	document.getElementById("lblRutaVia").style.visibility="visible";
	document.getElementById("lblDiasLibres").style.visibility="visible";
	document.getElementById("lblMblCollect").style.visibility="visible";
	document.getElementById("lblMblEmisionDestino").style.visibility="visible";
	document.getElementById("lblDatosAdicionales").style.visibility="visible";
	document.getElementById("edtDatosAdicionales").style.visibility="visible";
}

function ocultarObligatorios()
{
	document.getElementById("lblProvRecogidaDirObl").style.visibility="hidden";
	document.getElementById("lblProvDetalleServiciosObl").style.visibility="hidden";
	document.getElementById("lblPartidaArancelariaObl").style.visibility="hidden";
	document.getElementById("lblClaseIMOObl").style.visibility="hidden";
	document.getElementById("lblUNObl").style.visibility="hidden";	
}

function spnServiciosOrigenValid(spanValue)
{
	if ( spanValue == true )
	{
		document.getElementById("lblProvDetalleServicios").style.visibility="visible";
		document.getElementById("edtProvDetalleServicios").style.visibility="visible";
	}
	else
	{
		document.getElementById("lblProvDetalleServiciosObl").style.visibility="hidden";
		document.getElementById("lblProvDetalleServicios").style.visibility="hidden";
		document.getElementById("edtProvDetalleServicios").style.visibility="hidden";
	}
}

function spnPartidaArancelariaValid(spanValue)
{
	
	if ( spanValue == true )
	{
		document.getElementById("txtPartidaArancelaria").style.visibility="visible";
	}
	else
	{
		document.getElementById("lblPartidaArancelariaObl").style.visibility="hidden";
		document.getElementById("txtPartidaArancelaria").style.visibility="hidden";
	}
}

function switchClienteValid() {
	var switchCliente = document.getElementById("switchCliente");
	var arrayControl  = "";
	var	stringJson 	  = "";
	var purl 	= "";
	var content = "";

	if ( switchCliente.checked == true ) {
		arrayControl={'controlId':'searchCliente'};
		document.getElementById("lblCliente").textContent="Cliente Existente";

	} else {
		arrayControl={'controlId':'txtCliente'};
		document.getElementById("lblCliente").textContent="Cliente Nuevo";

	}

	stringJson = JSON.stringify(arrayControl);			
	purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables='+stringJson;
	content = getContent(purl);
	document.getElementById("divCliente").innerHTML=content;

}

function switchAgenteValid(switchId) {
	var sJsonDataObjectInicio		= getDataObjectInicio();
	var sJsonDataObjectIncoterms	= getDataObjectIncoterms();
	var sJsonArrayAgentesComparar 	= "";
	var arrayAgentesObject          = {};
	var arrayAgentesComparar 		= [];
	var switchAgenteId 		 		= document.getElementById(switchId);
	var contactoAgenteId	 		= switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-contacto-agente-id");
	var lineaTransporteId           = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-linea-transporte");
	var letra                       = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-letra");
	var color                       = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-color");
	var tarifaCaducada              = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-tarifa-caducada");
	var emailCliente                = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-email-cliente");
	var cotizacionTempId            = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-cotizaciontemp-id");
	var spanEditar					= switchAgenteId.parentNode.parentNode.parentNode.children.item(0).children.item(1);
	var spanEmail					= switchAgenteId.parentNode.parentNode.parentNode.children.item(4).children.item(0);
	var chkAgenteId					= switchAgenteId.parentNode.parentNode.parentNode.children.item(5).children.item(0).children.item(0).children.item(0);
	var tbodyAgentesComparar 		= document.getElementById("tbodyAgentesComparar");
	var switchValue 		 		= false
	var purl 						= "";
	var content						= "";

	/*********** Bloquear el checkbox de selección cuando el switch este apagado ***********/
	
	if ( switchAgenteId.checked === true ) {	
		chkAgenteId.className = "focus";
		chkAgenteId.removeAttribute("disabled");
		spanEditar.classList.remove("disabled");
		if ( tarifaCaducada === "0" ) {
			spanEmail.classList.remove("disabled");
		}

	} else {
		chkAgenteId.className = "";
		chkAgenteId.setAttribute("disabled","true");
		chkAgenteId.checked = false;
		spanEditar.classList.add("disabled");
		if ( tarifaCaducada === "0" ) {
			spanEmail.classList.add("disabled");
		}
	}	
	activateButtonCotizacionValid();
	/***************************************************************************************/

	for ( var i = 0; i < tbodyAgentesComparar.children.length; i++ ) {
		switchValue = tbodyAgentesComparar.children.item(i).children.item(3).children.item(0).children.item(0).checked;	

		if ( switchValue === true ) {
			contactoAgenteId   = tbodyAgentesComparar.children.item(i).getAttribute("data-contacto-agente-id");
			lineaTransporteId  = tbodyAgentesComparar.children.item(i).getAttribute("data-linea-transporte");
			letra              = tbodyAgentesComparar.children.item(i).getAttribute("data-letra");
			color              = tbodyAgentesComparar.children.item(i).getAttribute("data-color");
			tarifaCaducada     = tbodyAgentesComparar.children.item(i).getAttribute("data-tarifa-caducada");
			cotizacionTempId   = tbodyAgentesComparar.children.item(i).getAttribute("data-cotizaciontemp-id");


			arrayAgentesObject = {
				"contactoAgenteId"  : contactoAgenteId,
				"lineaTransporteId" : lineaTransporteId,
				"letra"             : letra,
				"color"             : color,
				"tarifaCaducada"    : tarifaCaducada,
				"cotizacionTempId"  : cotizacionTempId
			};

			arrayAgentesComparar.push(arrayAgentesObject);
		}		
	}
	
	sJsonArrayAgentesComparar = JSON.stringify(arrayAgentesComparar);
	purl    = './index.php?action=ejecutarAjax&clase=clasePreviewTarifas&metodo=cargarTarifas&sJsonArrayAgentesComparar='+sJsonArrayAgentesComparar+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms;
	content = getContent(purl);
	document.getElementById("divTarifasAgente").innerHTML=content;
	
}

var obtenerAgentes = function() {
	try
	{
		arrayAgentes = [""];
		var mensaje = "Debe marcar los Agentes a quien le va ha enviar la Solicitud.";	
		var rows = document.getElementById("tblGridAgente").rows.length;
		var contactoAgenteId = "";
		var checkId = "";
		var j=0;
		for ( var i=1; i<=rows; i++ )
		{
			try
			{
				checkId = "chk"+i;
				if ( document.getElementById(checkId).checked ) 
				{
					contactoAgenteId = document.getElementById(checkId).value;
					arrayAgentes[j] = contactoAgenteId;	
					j++;
				}
			}
			catch(e){}
		}
		var sJsonArrayAgentes = JSON.stringify(arrayAgentes);
		return sJsonArrayAgentes;
	}
	catch(e)
	{
		var sJsonArrayAgentes = JSON.stringify(arrayAgentes);
		return arrayAgentes;
	}
}

function activateButtonCotizacionValid() {
	var tbodyAgentesComparar = document.getElementById("tbodyAgentesComparar");
	var btnGenerarCotizacion = document.getElementById("btnGenerarCotizacion");
	var enabled = "false";

	for ( var i = 0; i < tbodyAgentesComparar.childElementCount; i++ ) {
		if ( tbodyAgentesComparar.children.item(i).lastElementChild.firstElementChild.firstElementChild.firstElementChild.checked ) {
			enabled = "true";
		}
	}

	if ( enabled === "true" ) {
		btnGenerarCotizacion.classList.remove("disabled");
		if ( btnGenerarCotizacion.getAttribute("disabled") != null ) {
			btnGenerarCotizacion.attributes.removeNamedItem("disabled");

		} 

	} else {
		btnGenerarCotizacion.classList.add("disabled");
		btnGenerarCotizacion.setAttribute("disabled", "true");

	}

}

function checkGenerarCotizacionValid(inputCheckBox) {
	var trRow   = inputCheckBox.parentNode.parentNode.parentNode.parentNode.getAttribute("data-tarifa-caducada");
	var email   = inputCheckBox.parentNode.parentNode.parentNode.parentNode.getAttribute("data-email-cliente");
	var input   = inputCheckBox.parentNode.parentNode.parentNode.previousElementSibling.lastElementChild;
	var icon    = "1";
	var message = "";
	var funcion = "scrollLock();";

	if ( trRow === "1" && inputCheckBox.checked ) {
		inputCheckBox.checked = false;
		message = "No puede generar la cotización de esta tarifa, porque la misma se encuentra caducada.";
		encenderMessageBox(icon,'',message, funcion);

	} else if ( !validarEmailClienteCotizacion(input) ) {
		inputCheckBox.checked = false;
		message = "Debe ingresar un email válido para poder <br>generar la Cotización.";
		encenderMessageBox(icon,'',message, funcion);

	}

	activateButtonCotizacionValid();
}

function emailClienteCotizacion(span) {
	var inputEmail = span.nextElementSibling;
	
	if ( !span.classList.contains("disabled") ) {
		inputEmail.classList.add("input-email-cliente-active");
		inputEmail.focus();

	}

}

function onBlurInputEmailCliente(input) {
	input.classList.remove("input-email-cliente-active");
	input.parentNode.parentNode.setAttribute("data-email-cliente", input.value);
}

function onKeyUpInputEmailCliente(input) {
	if (  validarEmailClienteCotizacion(input) ) {
		input.parentNode.nextElementSibling.firstElementChild.firstElementChild.firstElementChild.checked = true;
		input.style.background = "#CCF3CB"

	} else {
		input.parentNode.nextElementSibling.firstElementChild.firstElementChild.firstElementChild.checked = false;
		input.style.background = "#E79B9A"

	}

	activateButtonCotizacionValid();
}

function validarEmailClienteCotizacion(input) {
	var eMails     = input.value;
	var expr       = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var arrayEmail = [];
	var isOk       = true;

	if ( eMails.indexOf(";") > 0 ) {
		arrayEmail = eMails.split(";");

		for ( var i=0; i<arrayEmail.length; i++ ) {
			if ( !expr.test(arrayEmail[i]) ) {
				isOk = expr.test(arrayEmail[i]);
			}
		}
		return isOk;

	} else {
			return expr.test(eMails);
	}
}

function editTarifa(span) {
	var icon            = 1;
	var tittle          = '';			
	var caption         = '';
	var metodoSi        = '';
	var metodoNo        = '';
	var switchId        = span.parentNode.parentNode.children.item(3).children.item(0).children.item(0).id;
	var tarifaCaducada  = span.parentNode.parentNode.getAttribute("data-tarifa-caducada");
		
	if ( !span.classList.contains("disabled") ) {
		if ( tarifaCaducada === "1" ) {
			caption  = "No puede editar estas tarifas porque se encuentra caducada.";
			metodoSi = "scrollLock();"
			encenderMessageBox(icon, tittle, caption, metodoSi);
			
		} else {
			icon     = 2;
			caption  = '¿Confirma que desea editar esta tarifa?';
			metodoSi = 'encenderEditTarifas(\"'+ switchId +'\");';
			metodoNo = 'scrollLock();';
			encenderMessageBoxConfirm(icon, tittle, caption, metodoSi, metodoNo);
		}
	}
}

function loadEditTarifas(switchId) {
	var sJsonDataObjectInicio		= getDataObjectInicio();
	var sJsonDataObjectIncoterms	= getDataObjectIncoterms();
	var sJsonDataObjectAgente       = "";
	var arrayAgenteObject           = {};
	var arrayProducto               = {};
	var arrayProductoList           = [];

	var tbodyAgentesComparar 		= document.getElementById("tbodyAgentesComparar");
	var tbTarifas                   = document.getElementById("tb-tarifas");
	var tituloEditTarifas	 		= document.getElementById("h1TituloEditTarifas");
	var divEditTarifasDetail		= document.getElementById("divEditTarifasDetail")
	var switchAgenteId 		 		= document.getElementById(switchId);
	var contactoAgenteId	 		= switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-contacto-agente-id");
	var agenteName   		 		= switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-agente-name");
	var lineaTransporteId           = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-linea-transporte");
	var letra                       = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-letra");
	var color                       = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-color");
	var tarifaCaducada              = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-tarifa-caducada");
	var cotizacionTempId            = switchAgenteId.parentNode.parentNode.parentNode.getAttribute("data-cotizaciontemp-id");
	var productoId                  = "";
	var productoName                = "";
	var tipoServicio                = "";
	var purl 						= "";
	var content						= "";

	for ( var i=0; i<tbTarifas.childElementCount; i++ ) {
		productoId   = tbTarifas.children.item(i).getAttribute("data-producto-id");
		tipoServicio = tbTarifas.children.item(i).getAttribute("data-tipo-servicio");
		productoName = tbTarifas.children.item(i).firstElementChild.textContent;

		arrayProducto = {
			"productoId"   : productoId,
			"productoName" : productoName,
			"tipoServicio" : tipoServicio
		};

		arrayProductoList.push(arrayProducto);
	}

	arrayAgenteObject = {
		"contactoAgenteId"  : contactoAgenteId,
		"lineaTransporteId" : lineaTransporteId,
		"letra"             : letra,
		"color"             : color,
		"tarifaCaducada"    : tarifaCaducada,
		"cotizacionTempId"  : cotizacionTempId,
		"arrayProductoList" : arrayProductoList
	};

	sJsonDataObjectAgente = JSON.stringify(arrayAgenteObject);

	purl = './index.php?action=ejecutarAjax&clase=clasePreviewTarifas&metodo=loadEditTarifas&dataObjectAgente='+sJsonDataObjectAgente+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms;
	content = getContent(purl);
	tituloEditTarifas.innerHTML    = "<span class='opcionAgente' style='background-color:" + color + "; margin-right: 1em;'>" + letra + "</span> " + agenteName + " ( Editar Tarifas. )";
	divEditTarifasDetail.innerHTML = content;
}

function generarCotizacionTemp() {
	var sJsonDataObjectInicio		= getDataObjectInicio();
	var sJsonDataObjectIncoterms	= getDataObjectIncoterms();
	var sJsonDataObjectEditTarifas  = getDataObjectEditTarifas();
	var purl                        = "";
	var content                     = "";
	var error                       = 0;
	var icon                        = 0;
	var title                       = "";
	var message                     = "";
	var funcion                     = "";
	var contactoAgenteId            = "";
	var lineaTransporteId           = "";
	var cotizacionTempId            = "";
	var tbEditTarifas               = document.getElementById('tb-edit-tarifas');
	var trAgenteId        			= tbEditTarifas.getAttribute("data-agente-letra");
	var trAgente                    = document.getElementById(trAgenteId);

	contactoAgenteId  = trAgente.getAttribute("data-contacto-agente-id");
	lineaTransporteId = trAgente.getAttribute("data-linea-transporte");
	cotizacionTempId  = trAgente.getAttribute("data-cotizaciontemp-id");
	purl              = './index.php?action=ejecutarAjax&clase=claseInicio&metodo=generarCotizacionTemp&dataObjectEditTarifas='+sJsonDataObjectEditTarifas+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms+'&contactoAgenteId='+contactoAgenteId+'&lineaTransporteId='+lineaTransporteId+'&cotizacionTempId='+cotizacionTempId;
	content           = getContent(purl);
	content           = JSON.parse(content);
	error 	          = parseInt(content[0]['error']);
	message           = content[0]['message'];
	cotizacionTempId  = content[0]['cotizacionTempId'];
	icon	          = (error == -1)? 3: ((error == 0)? 4: 1);
	funcion           = '';
		
	if ( error == 0 ) {
		apagarEditTarifas();
		trAgente.setAttribute("data-cotizaciontemp-id", cotizacionTempId);
		trAgente.children.item(1).style.color = "#00BB00";
		trAgente.children.item(2).style.color = "#00BB00";
		switchAgenteValid(trAgente.children.item(3).firstElementChild.firstElementChild.id);
	} else {
		encenderMessageBox(icon, title, message, funcion);
	}
}
function generarCotizacion() {
	var sJsonDataObjectInicio		= getDataObjectInicio();
	var sJsonDataObjectIncoterms	= getDataObjectIncoterms();
	var sJsonArrayAgentesGenerar    = "";
	var arrayAgentesObject          = {};
	var arrayAgentesGenerar 		= [];
	var tbodyAgentesComparar        = document.getElementById("tbodyAgentesComparar");
	var contactoAgenteId            = "";
    var lineaTransporteId           = "";
	var emailCliente                = "";
	var purl                        = "";
	var content                     = "";
	var error                       = 0;
	var icon                        = 0;
	var title                       = "";
	var message                     = "";
	var funcion                     = "";

	for ( var i = 0; i < tbodyAgentesComparar.childElementCount; i++ ) {
		if ( tbodyAgentesComparar.children.item(i).lastElementChild.firstElementChild.firstElementChild.firstElementChild.checked ) {
			contactoAgenteId       = tbodyAgentesComparar.children.item(i).getAttribute("data-contacto-agente-id");
			lineaTransporteId      = tbodyAgentesComparar.children.item(i).getAttribute("data-linea-transporte");
			emailClienteCotizacion = tbodyAgentesComparar.children.item(i).getAttribute("data-email-cliente");
			cotizacionTempId       = tbodyAgentesComparar.children.item(i).getAttribute("data-cotizaciontemp-id");


			arrayAgentesObject = {
				"contactoAgenteId"       : contactoAgenteId,
				"lineaTransporteId"      : lineaTransporteId,
				"emailClienteCotizacion" : emailClienteCotizacion,
				"cotizacionTempId"       : cotizacionTempId
			};

			arrayAgentesGenerar.push(arrayAgentesObject);
		}
	}

	sJsonArrayAgentesGenerar = JSON.stringify(arrayAgentesGenerar);
	purl = './index.php?action=ejecutarAjax&clase=claseInicio&metodo=generarCotizacion&sJsonArrayAgentesGenerar='+sJsonArrayAgentesGenerar+'&dataObjectInicio='+sJsonDataObjectInicio+'&dataObjectIncoterms='+sJsonDataObjectIncoterms;
	content = getContent(purl);
	content = JSON.parse(content);
	error 	= parseInt(content[0]['error']);
	message = content[0]['message'];
	icon	= (error == -1)?3:((error == 0)?4:1);
	funcion = (error == -1)?'':((error == 0)?'location.href="./";':'');
	
	encenderMessageBox(icon, title, message, funcion);

}

function scrollLock() {
	var screenScrollTop = window.scrollY;
	window.scrollBy(0, -screenScrollTop);
	document.body.style.overflow="hidden";
}

function showObligatorios() {
	$(".obligatorio").fadeIn(1000);	
}

function setRandomBackgroundByClass(clase) {
	var $elemento = $(clase);
	var color = "#" + Math.floor(Math.random()*(999999-100000+1)+100000); //$random(100000, 999999)
	 
	$elemento.css("background-color",color);
}

////////////////////////  JQUERY FUNCTIONS  ////////////////////////
/*
$(document).ready(function(){
	$("#btnBuscar").click(function(){
		var incoterms 	= document.getElementById("cmbIncoterms").value;
		var viaEmbarque = document.getElementById("cmbViaEmbarque").value;
		showObligatorios(incoterms,viaEmbarque);
	});
});
*/

/*
jQuery(function($)
{
	//$("#numero1").mask("9,99", {completed:function() {$("#numero1").addClass("ok") } });
	$("#numero1").mask("9,99");
	// Definimos las mascaras para cada input
	$("#date").mask("99/99/9999");
	$("#movil").mask("999 99 99 99");
	$("#letras").mask("aaa");	$("#comodines").mask("?");
});
*/