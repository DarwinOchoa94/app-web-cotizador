var estadoToggle = false;
function getContent(sURL) {
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

function abrirFrm(nombreClase) {
	var sJsonDataObject=getDataObjectInicio();
	windowOpenPost("./index.php?action=abrirFrm&frm="+nombreClase, nombreClase, "width=1280,height=600,resizable=no", sJsonDataObject); 
}

function windowOpenPost(url, name, winOption, params) {
	var form = document.createElement("form");
		form.setAttribute("method", "post");
		form.setAttribute("action", url);
		form.setAttribute("target", name);
	
	var input = document.createElement('input');
		input.type = 'hidden';
		input.name = name;
		input.value = params;
		
	form.appendChild(input);
	document.body.appendChild(form);
	window.open("post.htm", name, winOption);
	form.submit();
	document.body.removeChild(form);
}

function existsUserLogin() {
	var purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=existeUsuarioRegistrado";
	var content = getContent(purl);
	var $lnkLoginMovil		 = $("#lnkLoginMovil");
	var $lnkLogoutMovil		 = $("#lnkLogoutMovil");
	
	content = ( content == 1? true: false );
	return content;
}

function cerrarSession() {
	var icon 	 = 2;
	var tittle	 = '';
	var caption	 = 'Seguro que desea cerrar sesión?';
	var metodo	 = 'logout();';
	encenderMessageBoxConfirm(icon,tittle,caption,metodo);
}

function logout() {
	document.location="./index.php?action=logout";
}

function loadComboBox(controlId,parametro) {
	var comboBox = document.getElementById(controlId);
	var empresa = document.body.getAttribute("empresa");

	if ( ( comboBox.getAttribute("focusinicial") == 0 ) || ( comboBox.value == "" ) ) {
		var cmbViaEmbarque = document.getElementById("cmbViaEmbarque");
		var viaEmbarqueId = ((cmbViaEmbarque !== null)?cmbViaEmbarque.value:'');
		var purl="./index.php?action=loadComboBox&parametro="+parametro+"&viaEmbarqueId="+viaEmbarqueId+"&empresa="+empresa;
		var content=getContent(purl);

		document.getElementById(controlId).innerHTML=content;
		document.getElementById(controlId).setAttribute("focusinicial","1")
	}
}

function loadListBox(txtInputId, parametro) {
	var cmbViaEmbarque = document.getElementById("cmbViaEmbarque");
	var txtInput       = document.getElementById(txtInputId);
	var valor          = txtInput.value;
	var viaEmbarqueId  = cmbViaEmbarque.value;
	var empresa        = document.body.getAttribute("data-empresa");
	var purl	       = "";
	var content	       = "";

	purl = "./index.php?action=loadListBox&parametro="+parametro+"&empresa="+empresa+"&valor="+valor+"&viaEmbarqueId="+viaEmbarqueId;
	content = getContent(purl);
	switch(txtInputId) {
		case "txtCliente":
			var lstCliente = document.getElementById("lstCliente");
			lstCliente.innerHTML=content;
			break;

		case "schCiudad":
			var lstCiudad = document.getElementById("lstCiudad");
			lstCiudad.innerHTML=content;
			break;

		case "schPuertoOrigen":
			var lstPuertoOrigen = document.getElementById("lstPuertoOrigen");
			lstPuertoOrigen.innerHTML=content;
			break;

		case "schPuertoDestino":
			var lstPuertoDestino = document.getElementById("lstPuertoDestino");
			lstPuertoDestino.innerHTML=content;
			break;
			
		default:
			alert("Por default");
			break;
	}
}

function validarButton(buttonId) {
	if ( buttonId == "btnSolicitar" ) {
		var purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=existeUsuarioRegistrado";
		var content = getContent(purl);

		if ( content == false ) {
			var tdLogin	            = document.getElementById("tdLogin");
			var divLoginBackGround	= document.getElementById("divLoginBackGround");
			purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=show";
			content = getContent(purl);			
			tdLogin.innerHTML=content;	
			caption="Para poder procesar su solicitud, primero debe iniciar sesión.";
			encenderMessageBox(1,'',caption,'showLoginScreen();');
			return;
		}
		
		var lstCiudad		= document.getElementById("lstCiudad");
		var cmbIncoterms	= document.getElementById("cmbIncoterms");
		var cmbViaEmbarque	= document.getElementById("cmbViaEmbarque");
		var cmbTipoTramite	= document.getElementById("cmbTipoTramite");
		var switchCliente	= document.getElementById("switchCliente");
		var txtCliente      = document.getElementById("txtCliente");
		var lcCliente		= "";
		
		lcCliente	        = txtCliente.value;			
			
		if  ( ( lstCiudad.getAttribute("data-id") == "" ) || ( cmbIncoterms.value == "" ) || ( cmbViaEmbarque.value == "" ) || ( lcCliente == "" ) || ( cmbTipoTramite.value == "" ) ) {
			var tittle="";
			var caption="";
			
			if ( lstCiudad.getAttribute("data-id") == "" ) {
				caption="Especifique el pais del Agente Exterior";
				encenderMessageBox(1,'',caption,'');
				return;

			}

			if ( cmbIncoterms.value == "" ) {
				caption="Especifique el Incoterms que desea cotizar";
				encenderMessageBox(1,'',caption,'');
				return;

			}

			if ( cmbViaEmbarque.value == "" ) {
				caption="Especifique la Via de Embarque";
				encenderMessageBox(1,'',caption,'');
				return;	

			}

			if ( lcCliente == "" ) {
				caption="Especifique el Cliente de la Solicitud";
				encenderMessageBox(1,'',caption,'');
				return;

			}

			if ( cmbTipoTramite.value == "" ) {
				caption="Especifique el Tipo de Trámite";
				encenderMessageBox(1,'',caption,'');
				return;	

			}
		} else {
			if ( existeFileUpload() == false ) {
				cargarBodyIncoterms();
			}
		}
	}

	if ( ( buttonId === "btnEnviar" ) || ( buttonId === "btnVerTarifas")  ) {
		var empresa = document.body.getAttribute("empresa");
		var purl    = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=existeUsuarioRegistrado";
		var content = getContent(purl);
		var caption = "";

		if ( content == false )	{
			var tdLogin	= document.getElementById("tdLogin");

			purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=show";
			content = getContent(purl);			
			tdLogin.innerHTML=content;
			caption="La sesión ha caducado, inicie sesión nuevamente y a continuación vuelva a intentarlo.";
			encenderMessageBox(3,'',caption,'');
			return;

		}
		
		if ( document.location.pathname === "/webCotizador/Tolepu/" ) {
			if ( buttonId === "btnEnviar" ){
				encenderPreviewDocument();

			} else {
				encenderPreviewTarifas();

			}

		} else {
			var icon 	 = 2;
			var tittle	 = '';
			var mensaje2 = 'Se procederá a enviar la solicitud';
			var metodo	 = 'enviarMail();';

			caption = mensaje2;			
			encenderMessageBoxConfirm(icon,tittle,caption,metodo);	

		}
	}

	if ( buttonId == "btnLogin" ) {
		var tdLogin			= document.getElementById("tdLogin");
		var txtUsuario		= document.getElementById("txtUsuario");
		var txtPassword		= document.getElementById("txtPassword");
		var cmbEmpresa		= document.getElementById("cmbEmpresa");
		var lblMessageLogin = document.getElementById("lblMessageLogin");
		
		var lcUsuario		= txtUsuario.value;
		var lcPassword		= txtPassword.value;
		var lcEmpresa		= cmbEmpresa.value;
		
		if ( lcUsuario == "" )
		{
			lblMessageLogin.innerHTML="<br>Ingrese su Usuario.";
			return;
		}
		if ( lcPassword == "" )
		{
			lblMessageLogin.innerHTML="<br>Ingrese su Password.";
			return;
		}
		if ( lcEmpresa == "" )
		{
			lblMessageLogin.innerHTML="<br>No ha seleccionado la Empresa.";
			return;
		}
		
		var arrayObjectLogin=
		{
			"UserName":lcUsuario,
			"UserPass":lcPassword,
			"Empresa":lcEmpresa
		};
		var stringJsonLogin = JSON.stringify(arrayObjectLogin);

		var purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=loginUsuario&variablesLogin="+stringJsonLogin;
		var content = getContent(purl);
		content	= JSON.parse(content);
		var logged 	= parseInt(content[0]['logged']);
		var caption = content[0]['message'];
		lblMessageLogin.innerHTML=caption;
		if ( logged == 1 )
		{
			var icon    = 4;
			var tittle  = '';			
			var funcion = 'apagarLoginScreen();';
			tdLogin.innerHTML=content[0]['segmentoLogin'];
			encenderMessageBox(icon,tittle,caption,funcion);	
			showMenu();		
		}		
	}
	if ( buttonId == "btnListaAgentes" ) {
		slideToggle(buttonId,"lista de Agentes del Exterior");
	}

	if ( buttonId == "btnUpload" ) {
		//submit();
		/*var purl = "./index.php?action=claseDivBody";
		var content = getContent(purl);
		//alert(purl);
		//alert(content);
		var icon    = 4;
		var tittle  = '';			
		var funcion = '';
		var caption = content;
		encenderMessageBox(icon,tittle,caption,funcion);		*/
		
		/*var icon 	 = 2;
		var tittle	 = '';
		var caption	 = 'Se procederá a subir el archivo al servidor?';
		var metodo	 = 'javascript:submit();';
		encenderMessageBoxConfirm(icon,tittle,caption,metodo);*/
		displayHiddenLabels();
	}
}

var slideToggle = function(buttonId,lblLista) {
	var btnLista = document.getElementById(buttonId);

	$('.sectionToggle').slideToggle();
	if ( estadoToggle == true ) {
		btnLista.innerHTML="<i class='fa fa-chevron-down'></i> Abrir "+lblLista;
		estadoToggle = false;

	} else {
		btnLista.innerHTML="<i class='fa fa-chevron-up'></i> Cerrar "+lblLista;
		estadoToggle = true;

	}
}

function validarTextBox(textBoxId) {
	switch ( textBoxId ) {
		case "txtRuc":
			validarRuc();
			break;
			
		case "txtCotizacion":
			validarCotizacion();
			break;

		case "txtRequerimiento":
			validarRequerimiento();
			break;
	}
}

function validarRuc() {
	var txtRuc = document.getElementById('txtRuc');
	
	var varResult = 0;
	var varSubStr = "";
	var varTotal = "";
	var varTotal2 = 0;
	var varlength = 0;
	var varEnteroMayor = 0;
	var varProdEnteroMayor = 0;
	var varDigitoVerificador1 = 0;
	var varDigitoVerificador2 = 0;
	
	if ( txtRuc.value.length <= 10 )
	{
		var i = 0;
		var j = 2;
		varDigitoVerificador1 = txtRuc.value.substr(9,1);
		while ( i <= 8 )
		{
			varSubStr = txtRuc.value.substr(i,1);
			varTotal  = varTotal + ( varSubStr * j);
			i += 1;
			if ( i % 2 == 0 )
			{
				j = 2;	
			}
			else
			{
				j = 1;
			}
		}
		varlength = varTotal.length;
		i = 0;
		while ( i <= varlength - 1 )
		{
			varTotal2 = varTotal2 + parseFloat(varTotal.substr(i,1));
			i += 1;	
		}

		varEnteroMayor = Math.ceil(varTotal2 / 10); 
		varProdEnteroMayor = varEnteroMayor * 10;
		varDigitoVerificador2 = varProdEnteroMayor - varTotal2;

		if ( varDigitoVerificador1 == varDigitoVerificador2 ) 
		{
		}
		else
		{
			var icon    = 3;
			var tittle  = "";
			var caption = "Cédula incorrecta, por favor verifique.";			
			var funcion = 'txtRuc.value=""';
			encenderMessageBox(icon,tittle,caption,funcion);
		}
	}
	else
	{
		if( txtRuc.value.length != 13 )
		{
			var icon    = 3;
			var tittle  = "";
			var caption = "Ruc incorrecto, por favor verifique.";			
			var funcion = 'txtRuc.value=""';
			encenderMessageBox(icon,tittle,caption,funcion);
		}
	}
}

function previewPDF(txtFile) {
	var txtFilePDF = document.getElementById(txtFile);
	var icon    = 1;
	var tittle  = "";
	var caption = "";
	var funcion = "";
	var filePDF = txtFilePDF.value;
	if ( filePDF == "" ) {
		icon    = 1;
		caption = "Primero debe subir un archivo PDF."
		encenderMessageBox(icon,tittle,caption,funcion);

	} else {
		var arrayObjectFilePDF = {"FilePDF":filePDF};
		var stringJsonFilePDF  = JSON.stringify(arrayObjectFilePDF);
		var purl = "./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=existeFile&stringJsonFilePDF="+stringJsonFilePDF;
		var content = getContent(purl);

		if ( content == true ) {
			abrirFrm("claseFrmViewerPDF");

		} else {
			icon    = 1;
			caption = "El archivo " + filePDF + " no existe en el Servidor. Asegurese de que el archivo se haya subido correctamente.";
			encenderMessageBox(icon,tittle,caption,funcion);			
		}
	}
}

function removePDF(txtFile) {
	var txtFilePDF = document.getElementById(txtFile);
	var btnUpload = document.getElementById("btnUpload");
	var deleted = 0;
	var icon    = 1;
	var tittle  = "";
	var caption = "";
	var funcion = "";
	var filePDF = txtFilePDF.value;

	if ( filePDF == "" ) {
		icon    = 1;
		caption = "No existe ningun archivo en el servidor."	
		encenderMessageBox(icon,tittle,caption,funcion);

	} else {
		var arrayObjectFilePDF = {"FilePDF":filePDF};
		var stringJsonFilePDF  = JSON.stringify(arrayObjectFilePDF);
		var purl = "./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=existeFile&stringJsonFilePDF="+stringJsonFilePDF;
		var content = getContent(purl);

		if ( content == true ) 	{
			purl = "./index.php?action=ejecutarAjax&clase=claseDivBody&metodo=removeFile&stringJsonFilePDF="+stringJsonFilePDF;
			content = getContent(purl);
			content	= JSON.parse(content);
			deleted = parseInt(content[0]['deleted']);
			icon    = ( deleted == 1 )?1:3;
			txtFilePDF.value=( deleted == 1 )?'':txtFilePDF.value;
			txtFilePDF.onchange();
			caption = content[0]['message'];
			encenderMessageBox(icon,tittle,caption,funcion);

		} else {
			txtFilePDF.value = "";
			btnUpload.className="button button-file-upload disabled";
			btnUpload.disabled=true;
			
		}
	}
}

function validarSearchBox(searchId) {
	if ( searchId === "schCiudad" ) {
		cargarListaAgentes();
		cargarGridAgentes();		
	}
}

function validarComboBox(comboId) {
	console.log(document.getElementById(comboId).value);
	var optValue      = document.getElementById(comboId).value;
	var arrayControl  = {};
	var stringJson    = "";
	var purl          = "";
	var content       = "";	
	var btnVerTarifas = document.getElementById("btnVerTarifas");
	
	if ( optValue == 'optDialog' ) {
		document.getElementById(comboId).innerHTML="<option value=''>Seleccione...</option>";
		enecenderSearchDialog(comboId);
		return;

	}

	if ( comboId == 'cmbEmpresa' ) {
		var imagenGRP='../../Framework/images/Tolepu/isologoGrupoTyT-vertical.png';
		var imagenTyT='../../Framework/images/TyT/isologoTyT-vertical.png';
		var imagenCIA='../../Framework/images/Ciateite/isologoCiateite-vertical.png';
		var imagenTOL='../../Framework/images/Tolepu/isologoTolepu-vertical.png';
		var imagenEST='../../Framework/images/Torrestibas/logoLoginTorrestibas.png';
		var anchoLogo=optValue==''?'40%':'40%';
		var imagenLogo=optValue=='TYT'?imagenTyT:(optValue=='CIA'?imagenCIA:(optValue=='TOLEPU'?imagenTOL:(optValue=='ESTIBA'?imagenEST:imagenGRP)));

		purl = './index.php?action=claseDivLogo&imagen='+imagenLogo+'&ancho='+anchoLogo;
		content = getContent(purl);
		document.getElementById("tdLogoEmpresa").innerHTML=content;

	}

	if ( comboId == 'cmbTipoMercaderia' ) {
		if ( optValue == '0000001885' ) { //[] Peligrosa
			arrayControl={'controlId':'txtClaseIMO'};
			stringJson = JSON.stringify(arrayControl);			
			purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables=' + stringJson;
			content = getContent(purl);
			document.getElementById("divControltxtClaseIMO").innerHTML = content;
			
			arrayControl={'controlId':'txtUN'};
			stringJson = JSON.stringify(arrayControl);			
			purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables=' + stringJson;
			content = getContent(purl);
			document.getElementById("divControltxtUN").innerHTML = content;
			
			arrayControl={'controlId':'divFileUpload'};
			stringJson = JSON.stringify(arrayControl);			
			purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables=' + stringJson;
			content = getContent(purl);
			document.getElementById("divControlFileUpload").innerHTML = content;
			document.getElementById('btnUpload').disabled = true;

		} else {
			// Validar si se subió un archivo al servidor no pueda cambiar de Tipo de Mercaderia hasta quitar el archivo subido.
			if ( existeFileUpload() == false ) {
				document.getElementById("divControltxtClaseIMO").innerHTML="";
				document.getElementById("divControltxtUN").innerHTML="";
				document.getElementById("divControlFileUpload").innerHTML="";
			}
		}
	}

	if ( comboId == 'cmbTipoContenedor' ) {
		if ( ( optValue == '0000001880' ) || ( optValue == '0000001952' ) ) {//[] Varios Contenedores`, [] Varios Contenedores - Vehiculos
			arrayControl={'controlId':'edtDescContenedor'};
			stringJson = JSON.stringify(arrayControl);			
			purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables='+stringJson;
			content = getContent(purl);
			document.getElementById("divControledtDescContenedor").innerHTML=content;

			document.getElementById("lblCantidadContenedor").style.display = "none";
			document.getElementById("txtCantidadContenedor").style.display = "none";
			addTablaContenedores();

		} else {
			document.getElementById("lblCantidadContenedor").style.display = "inline";
			document.getElementById("txtCantidadContenedor").style.display = "inline";
			document.getElementById("divControledtDescContenedor").innerHTML="";
		}
	}

	if ( comboId == 'cmbTipoCarga' ) {
		var cmbViaEmbarque 	      = document.getElementById("cmbViaEmbarque");
		var cmbIncoterms 	      = document.getElementById("cmbIncoterms");
		var cmbViaEmbarque 	      = document.getElementById("cmbViaEmbarque");		
		var txtCantidadContenedor = "";
		var txtVolumen		      = "";
		var txtPesoVolumen	      = "";
		var lblPeso			      = "";
		var lblPesoVolumen	      = "";
		
		if (( optValue == '0000000200' ) || ( optValue == '0000000203' ) || ( optValue == '0000002139' )) {//Carga General, Carga General Peligrosa, Refrigerado
			purl = './index.php?action=ejecutarAjax&clase=claseDivBodyTipoCarga&metodo=cargaSuelta';
			content = getContent(purl);
			document.getElementById("divControlesTipoCarga").innerHTML=content;
			
			txtVolumen		= document.getElementById("txtVolumen");
			txtPesoVolumen 	= document.getElementById("txtPesoVolumen");
			lblPesoVolumen	= document.getElementById("lblPesoVolumen");
			
			if ( cmbViaEmbarque.value === '0000000502' ) { //Aereo
				txtVolumen.addEventListener("blur",function(){
					txtPesoVolumen.value = txtVolumen.value * 167;
				});
				txtPesoVolumen.setAttribute("disabled","true");
				lblPesoVolumen.style.display = "block";
				txtPesoVolumen.style.display = "inline";

			} else {
				lblPesoVolumen.style.display = "none";
				txtPesoVolumen.style.display = "none";

			}
			
			if ( ( cmbIncoterms.value == '0000000101' ) || ( cmbIncoterms.value == '0000000100' ) || ( cmbIncoterms.value == '0000002401' ) ) {//DDP,DDU,DAP
				if ( cmbViaEmbarque.value == '0000000502' ) {//Aereo
					document.getElementById("lblNaviera").innerHTML="<span class='obligatorio'>*</span>Aerolinea:";

				} else {
					document.getElementById("lblNaviera").innerHTML="<span class='obligatorio'>*</span>Naviera:";

				}
				document.getElementById("lblNaviera").classList.remove("hidden");
				document.getElementById("cmbNaviera").parentNode.classList.remove("hidden");
				document.getElementById("lblColoaderDestino").classList.add("hidden");
				document.getElementById("txtColoaderDestino").classList.add("hidden");

			} else {
				document.getElementById("lblNaviera").classList.add("hidden");
				document.getElementById("cmbNaviera").parentNode.classList.add("hidden");
				document.getElementById("lblColoaderDestino").classList.add("hidden");
				document.getElementById("txtColoaderDestino").classList.add("hidden");
			}
			
			return;
		}

		if ( optValue === '0000000204' ) {//[] Contenedor
			purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyTipoCarga&metodo=contenedor';
			content = getContent(purl);
			document.getElementById("divControlesTipoCarga").innerHTML = content;
			
			txtCantidadContenedor = document.getElementById("txtCantidadContenedor");
			txtCantidadContenedor.setAttribute("min","1");
			txtCantidadContenedor.setAttribute("max","20");
			txtCantidadContenedor.value = 1;
			
			if ( ( cmbIncoterms.value === '0000000101' ) || ( cmbIncoterms.value === '0000000100' ) || (cmbIncoterms.value === '0000002401' ) ) {//DDP,DDU,DAP
				document.getElementById("lblNaviera").innerHTML="<span class='obligatorio'>*</span>Naviera:";
				document.getElementById("lblNaviera").classList.remove("hidden");
				document.getElementById("cmbNaviera").parentNode.classList.remove("hidden");

			} else {
				document.getElementById("lblNaviera").classList.add("hidden");
				document.getElementById("cmbNaviera").parentNode.classList.add("hidden");

			}

			if ( cmbViaEmbarque.value === "0000000499" ) {//Terrestre
				document.getElementById("lblTipoContenedor").innerHTML="<span class='obligatorio'>*</span>Tipo de Vehículo:";
			}

			return;
		}

		if ( optValue == '0000000206' ) {//[] Carga Suelta Consolidada
			purl    = './index.php?action=ejecutarAjax&clase=claseDivBodyTipoCarga&metodo=cargaSuelta';
			content = getContent(purl);
			document.getElementById("divControlesTipoCarga").innerHTML=content;
			txtVolumen		= document.getElementById("txtVolumen");
			txtPesoVolumen 	= document.getElementById("txtPesoVolumen");
			lblPeso			= document.getElementById("lblPeso");
			lblPesoVolumen	= document.getElementById("lblPesoVolumen");
			
			if ( cmbViaEmbarque.value === '0000000502' ) { //Aereo
				txtVolumen.addEventListener("blur",function(){
					txtPesoVolumen.value = txtVolumen.value * 167;
				});
				txtPesoVolumen.setAttribute("disabled","true");
				lblPesoVolumen.style.display = "block";
				txtPesoVolumen.style.display = "inline";

			} else {
				lblPeso.innerHTML = "Peso Bruto Total ( en Toneladas )"
				lblPesoVolumen.style.display = "none";
				txtPesoVolumen.style.display = "none";

			}
			
			if ( ( cmbIncoterms.value == '0000000101' ) || ( cmbIncoterms.value =='0000000100' ) || ( cmbIncoterms.value == '0000002401' ) ) {//DDP,DDU,DAP
				document.getElementById("lblNaviera").innerHTML="<span class='obligatorio'>*</span>Coloader en Origen:";
				document.getElementById("lblNaviera").style.display="block";
				document.getElementById("cmbNaviera").parentNode.style.display="block";
				document.getElementById("lblColoaderDestino").style.display="block";
				document.getElementById("txtColoaderDestino").style.display="inline";

			} else {
				document.getElementById("lblNaviera").style.display="none";
				document.getElementById("cmbNaviera").parentNode.style.display="none";
				document.getElementById("lblColoaderDestino").style.display="none";
				document.getElementById("txtColoaderDestino").style.display="none";

			}
			return;

		} else {
			document.getElementById("lblNaviera").style.display            = "none";
			document.getElementById("cmbNaviera").parentNode.style.display = "none";
			document.getElementById("divControlesTipoCarga").innerHTML     = "";
			document.getElementById("lblColoaderDestino").style.display    = "none";
			document.getElementById("txtColoaderDestino").style.display    = "none";

		}
	}

	if ( comboId == 'cmbCiudad' ) {
		cargarListaAgentes();
		cargarGridAgentes();		
	}

	if ( comboId == 'cmbIncoterms' ) {
		var cmbViaEmbarque = document.getElementById("cmbViaEmbarque");

		if ( ( optValue !== optIncoterms ) || ( cmbViaEmbarque.value !== optViaEmbarque ) ) {
			btnEnviar.classList.add("hidden");
			btnVerTarifas.classList.add("hidden");

		} else {
			btnEnviar.classList.remove("hidden");
			btnVerTarifas.classList.remove("hidden");

		}		
	}

	if ( comboId == 'cmbViaEmbarque' ) {
		var cmbIncoterms = document.getElementById("cmbIncoterms");

		if ( ( optValue !== optViaEmbarque ) || ( cmbIncoterms.value !== optIncoterms ) ) {
			btnEnviar.classList.add("hidden");
			btnVerTarifas.classList.add("hidden");

		} else {
			btnEnviar.classList.remove("hidden");
			btnVerTarifas.classList.remove("hidden");

		}
		cargarGridAgentes();

	}
}

function AceptarDialog() {
	var comboBoxId=document.getElementById("txtSearch").comboBoxId;
	var strRowId=document.getElementById("tblSearchDialog").getAttribute("rowId");
	var rowId=strRowId.replace("tr-","");

	selectItemComboBox(comboBoxId,rowId);	
}

function selectItemComboBox(comboBoxId, valueId) {
	var thValue  = document.getElementById('thId-'+valueId).innerHTML;
	var thName 	 = document.getElementById('thName-'+valueId).innerHTML;

	if ( comboBoxId === "txtCliente"){
		var txtCliente = document.getElementById(comboBoxId);

		txtCliente.value = thName;

	} else {	
		var cmbValue = document.getElementById(comboBoxId).innerHTML;

		cmbValue="<option value='"+thValue+"'>"+thName+"</option>"+
				 "<option value='optDialog'>Buscar...</option>"
		;
		document.getElementById(comboBoxId).value=thValue
		document.getElementById(comboBoxId).innerHTML=cmbValue;

	}

	apagarSearchDialog();

	if ( comboBoxId === "cmbCiudad" ) {
		cargarListaAgentes();
		cargarGridAgentes();		
	}
}

function selectItemListBox(inputId, dataListId) {
	var input    = document.getElementById(inputId);
	var dataList = document.getElementById(dataListId);
	
	for ( var i=0; i<dataList.children.length; i++ ) {
		if ( dataList.children.item(i).value.toUpperCase() == input.value.toUpperCase() ) {
			input.setAttribute("data-id", dataList.children.item(i).getAttribute("data-id"));

		}
	}
}

function limpiarGrid(tableName,backGroundOne,backGroundTwo)
{
	var i=0;
	var rowGrid=document.getElementById(tableName);
	do
	{
		if ( i % 2 == 0 )
		{
			rowGrid.rows.item(i).style.background=backGroundOne;
		}
		else
		{
			rowGrid.rows.item(i).style.background=backGroundTwo;
		}
		i++;
	}while (i < rowGrid.rows.length);	
}

function validarSpan(spanId)
{
	var spanValue = document.getElementById(spanId).checked;
	switch ( spanId )
	{
		case "spnServiciosOrigen":
			spnServiciosOrigenValid(spanValue);
			break;
			
		case "spnPartidaArancelaria":
			spnPartidaArancelariaValid(spanValue);
			break;
	}
}

function validarSwitch(switchId){
	switch( switchId ){
		case "switchCliente":
			switchClienteValid();
			break;
		default:
			switchAgenteValid(switchId);
			break;
	}
}

function validarCheckBox(checkBoxId){
	switch( checkBoxId ){
		case "chkAutorizadoSENAE":
			cargarGridAgentes();
			break;
		case "chkViaEmbarque":
			cargarGridAgentes();
			break;
	}	
}

function validarEmail(id) 
{
    var txtMail = document.getElementById(id);
	var eMail = txtMail.value;
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(eMail) )
	{
		if ( txtMail.value != "" )
		{
			txtMail.parentNode.className="invalid";
		}
		else
		{
			txtMail.parentNode.className="email";
		}
	}
	else
	{
		txtMail.parentNode.className="valid";
	}
}

function closeWindows()
{
	if (!confirm('Seguro que desea cancelar y no enviar la Solicitud de Cotización?'))
	{
		return;
	}
	window.close();
}

function encenderToolTipText(Id)
{
	var toolTipText = document.getElementById("divToolTipText");
	var controlId 	= document.getElementById(Id);
	toolTipText.style.left=controlId.style.left+"px";
	toolTipText.style.top=controlId.style.left+"px";
	toolTipText.style.width=controlId.style.width+"px";
	toolTipText.style.height=controlId.style.height+"px";
	toolTipText.innerHTML="";
	toolTipText.style.visibility="visible";
}
function apagarToolTipText()
{
	var toolTipText = document.getElementById("divToolTipText");
	toolTipText.style.visibility="hidden";
}

var limpiarCadena = function(cadena)
{
	cadena = cadena.replace(/Á/gi,"A");
	cadena = cadena.replace(/É/gi,"E");
	cadena = cadena.replace(/Í/gi,"I");
	cadena = cadena.replace(/Ó/gi,"O");
	cadena = cadena.replace(/Ú/gi,"U");
	cadena = cadena.replace(/á/gi,"a");
	cadena = cadena.replace(/é/gi,"e");
	cadena = cadena.replace(/í/gi,"i");
	cadena = cadena.replace(/ó/gi,"o");
	cadena = cadena.replace(/ú/gi,"u");
	cadena = cadena.replace(/Ñ/gi,"N");
	cadena = cadena.replace(/ñ/gi,"n");
	cadena = cadena.replace(/&/gi,"y");
	cadena = cadena.replace(/#/gi,"No.");
	cadena = cadena.replace(/'/gi,"");	
	cadena = cadena.replace(/"/gi,"");	
	return cadena;
}

function encenderUploadFileScreen()
{
	//var purl = './index.php?action=ejecutarAjax&clase=claseMessageBox&metodo=show&icon='+icon+'&tittle='+tittle+'&caption='+caption+'&funcion='+funcion;
	//var content = getContent(purl);
	//document.getElementById(\"divMessageBox\").innerHTML=content;
	
	screenScrollTop = window.scrollY;
	window.scrollBy(0, -screenScrollTop);
	document.body.style.overflow='hidden';
	//var anchoDocumento = document.body.clientWidth;
	//var altoDocumento = document.body.clientHeight;
	var anchoDocumento = screen.width;
	var altoDocumento  = screen.height;
	
	var divUploadFileBackGround = document.getElementById('divUploadFileBackGround');
	var divUploadFile = document.getElementById('divUploadFile');
	//var btnOkMessage = document.getElementById('btnOkMessage');
	//var lblMessageTittle = document.getElementById('lblMessageTittle');
	//var lblMessage = document.getElementById('lblMessage');
	
	divUploadFileBackGround.style.width=anchoDocumento+'px';
	divUploadFileBackGround.style.height=document.body.clientHeight+'px';
	divUploadFileBackGround.style.visibility='visible';
	divUploadFile.style.visibility='visible';
	//btnOkMessage.style.visibility='visible';
	//lblMessageTittle.style.visibility='visible';
	//lblMessage.style.visibility='visible';
	
	var elLeft = (anchoDocumento - parseFloat(divUploadFile.style.width))/2;
	var elTop = (altoDocumento - ( parseFloat(divUploadFile.style.height) ))/2;
	divUploadFile.style.left = elLeft+'px';
	divUploadFile.style.top = elTop+'px';
}

function apagarUploadFileScreen()
{
	document.body.style.overflow='auto';
	
	var divUploadFileBackGround = document.getElementById('divUploadFileBackGround');
	var divUploadFile = document.getElementById('divUploadFile');
	//var btnOkMessage = document.getElementById('btnOkMessage');
	//var lblMessageTittle = document.getElementById('lblMessageTittle');
	//var lblMessage = document.getElementById('lblMessage');
	
	divUploadFileBackGround.style.width='800px';
	divUploadFileBackGround.style.visibility='hidden';
	divUploadFile.style.visibility='hidden';
	//btnOkMessage.style.visibility='hidden';
	//lblMessageTittle.style.visibility='hidden';
	//lblMessage.style.visibility='hidden';
}

function cancelarUploadFileScreen(){
	var arrayFile = document.getElementById("txtUploadFile").files;
	var txtUploadFile = document.getElementById("txtUploadFile");
	var tblUploadFile = document.getElementById("tblUploadFile");
	var trFileN = "";
	for ( i = 0; i<arrayFile.length; i++ ){
		trFileN = document.getElementById("trFile"+i);
		tblUploadFile.removeChild(trFileN);
	}	
	txtUploadFile.value = "";
	apagarUploadFileScreen();	
}

function verArchivos(){
	alert(arrayFile[i].name);
}

function verUploadFiles(){
	var tblUploadFile = document.getElementById("tblUploadFile");
	var arrayFile = document.getElementById("txtUploadFile").files;
	var fila = "";
	var colFileName = "";
	var colFileSize = "";

	//onclick='removeUploadFiles(this);'
	tblUploadFile.innerHTML="";	
	for ( i = 0; i<arrayFile.length; i++ ){
		colFileName = document.createElement("td");
		colFileName.innerHTML=arrayFile[i].name;
		colFileName.className="colFieldFileName";
		colFileSize = document.createElement("td");
		colFileSize.innerHTML=Math.round(parseFloat(arrayFile[i].size)/1024) + " KB";
		colFileSize.className="colFieldFileSize";
		colQuitar = document.createElement("td");
		colQuitar.innerHTML = "<a href='#'><i class='fa fa-trash-o'></i> Quitar</a>";
		colQuitar.className="colFieldFileRemove";
		fila = document.createElement("tr");
		fila.setAttribute("id","trFile"+i); 
		fila.appendChild(colFileName);
		fila.appendChild(colFileSize);
		fila.appendChild(colQuitar);
		tblUploadFile.appendChild(fila);
	}		
}

function removeUploadFiles(elemento){
	var tblUploadFile = document.getElementById("tblUploadFile");
	var arrayFile = document.getElementById("txtUploadFile").files;
	var col = elemento.parentNode;
	var row = col.parentNode;
	var trFileN = "";
	var fila = "";
	var colFileName = "";
	var colFileSize = ""; 

	for ( i = 0; i<arrayFile.length; i++ ){
		trFileN = document.getElementById("trFile"+i);
		tblUploadFile.removeChild(trFileN);
	}	

	for ( i = 0; i<arrayFile.length; i++ ){
		colFileName = document.createElement("td");
		colFileName.innerHTML=arrayFile[i].name;
		colFileName.className="colFieldFileName";
		colFileSize = document.createElement("td");
		colFileSize.innerHTML=arrayFile[i].size;
		colFileSize.className="colFieldFileSize";
		colQuitar = document.createElement("td");
		colQuitar.innerHTML = "<a href='#' onclick='removeUploadFiles(this);'><i class='fa fa-trash-o'></i> Quitar</a>";
		colQuitar.className="colFieldFileRemove";
		fila = document.createElement("tr");
		fila.setAttribute("id","trFile"+i); 
		fila.appendChild(colFileName);
		fila.appendChild(colFileSize);
		fila.appendChild(colQuitar);
		if (row.id === fila.id){
			
		}else{
			tblUploadFile.appendChild(fila);
		}
	}	
}

////////////////////////  JQUERY FUNCTION  ////////////////////////
$(document).ready(function(){
	$('.mailSistemas').attr('href','mailto:sistemas@torresytorres.com');
});
















