var tipoSolicitud = "";

function getDataObjectInicio() {
	var optTarifa = document.getElementById("optTarifa");
	var optCotizacion = document.getElementById("optCotizacion");
	var cmbCliente = document.getElementById("cmbCliente");
	var edtDetalleRequerimiento = document.getElementById("edtDetalleRequerimiento");
	var txtRazonSocial = document.getElementById("txtRazonSocial");
	var txtRuc = document.getElementById("txtRuc");
	var txtContacto = document.getElementById("txtContacto");
	var txtEmail = document.getElementById("txtEmail");
	var txtTelefono = document.getElementById("txtTelefono");
	var chkComparativa = document.getElementById("checkComparativas");
	var chkUrgente = document.getElementById("checkUrgente");
	var txtMotivoUrgente = document.getElementById("txtMotivoUrgente");
	var chkPeligrosa = document.getElementById("checkPeligrosa");
	var dateFechaAsignacion = document.getElementById('dateFechaAsignacion');
	var dateFechaExpiracion = document.getElementById('dateFechaExpiracion');
	var cmbTipoCotizacion = document.getElementById('cmbTipoCotizacion');
	var cmbTipoTransporte = $('#cmbTipoTransporte').select2('data');
	var cmbModoTrasportacion = document.getElementById('cmbModoTrasportacion');
	var cmbIncoterms = document.getElementById('cmbIncoterms');
	var cmbOrigen = document.getElementById('cmbOrigen');
	var cmbDestino = document.getElementById('cmbDestino');
	var cmbZonaHoraria = document.getElementById('cmbZonaHoraria');
	///let chkTiposervicio = document.querySelectorAll(".item-servicio");
	console.log(cmbTipoTransporte);

	var lbTarifa = optTarifa.checked;
	var lbCotizacion = optCotizacion.checked;
	var lcClienteId = ((cmbCliente != null) ? cmbCliente.value : "");

	var comparativa = chkComparativa.checked ? 1 : 0;
	var urgente = chkUrgente.checked ? 1 : 0;
	var motivoUrgente = txtMotivoUrgente != null ? txtMotivoUrgente.value : '';
	var peligrosa = chkPeligrosa.checked ? 1 : 0;
	var fechaAsignacion = dateFechaAsignacion != null ? dateFechaAsignacion.value : '';
	var fechaExpiracion = dateFechaExpiracion != null ? dateFechaExpiracion.value : '';
	var tipoCotizacionId = cmbTipoCotizacion != null ? cmbTipoCotizacion.value : '';
	var tipoTransporteId = cmbTipoTransporte.length >= 1 ? cmbTipoTransporte[0].id : "";
	var modoTrasportacionId = cmbModoTrasportacion != null ? cmbModoTrasportacion.value : '';
	var incotermId = cmbIncoterms != null ? cmbIncoterms.value : '';
	var origenId = cmbOrigen != null ? cmbOrigen.value : '';
	var destinoId = cmbDestino != null ? cmbDestino.value : '';
	var zonaHorariaId = cmbZonaHoraria != null ? cmbZonaHoraria.value : '';
	var comentario = edtDetalleRequerimiento != null ? edtDetalleRequerimiento.value : '';

	var lcDetalleRequerimiento = limpiarCadena(edtDetalleRequerimiento.value);
	//var lctDetalleRequerimiento = edtDetalleRequerimiento.value;
	//var lcRazonSocial 	= ((txtRazonSocial != null)?limpiarCadena(txtRazonSocial.value):((cmbCliente != null)?limpiarCadena(cmbCliente.firstChild.textContent):""));
	if (txtRazonSocial != null) {
		var lcRazonSocial = limpiarCadena(txtRazonSocial.value);
	} else if (cmbCliente != null) {
		var lcRazonSocial = limpiarCadena(cmbCliente.firstChild.textContent);
	} else {
		var lcRazonSocial = "";
	}

	var checkboxes = document.querySelectorAll('input[name="tiposerv"]:checked');
	//console.log(checkboxes);
	const tiposServicios = [];
	var len = checkboxes.length;
	// console.log(len);
	var i;

	for (i = 0; i < len; i++) {
		//console.log(checkboxes[i].value);
		tiposServicios.push(checkboxes[i].value);
	}

	var lcRuc = ((txtRuc != null) ? txtRuc.value : "");
	var lcContacto = ((txtContacto != null) ? txtContacto.value : "");
	var lcEmail = ((txtEmail != null) ? txtEmail.value : "");
	var lcTelefono = ((txtTelefono != null) ? txtTelefono.value : "");
	var lcTipoSolicitud = tipoSolicitud;

	var tipoTransporteIds = [];
	if (chkComparativa.checked) {
		for (let index = 0; index < cmbTipoTransporte.length; index++) {
			const element = cmbTipoTransporte[index];
			tipoTransporteIds.push(element.id)
		}
	}

	var arrayDataObject =
	{
		"tipoRequerimiento": ((lbCotizacion == true) || (lbCotizacion == "on")) ? "1" : "2",
		"clienteId": lcClienteId,
		"detalleRequerimiento": lcDetalleRequerimiento,
		"razonSocial": lcRazonSocial,
		"ruc": lcRuc,
		"contacto": lcContacto,
		"email": lcEmail,
		"telefono": lcTelefono,
		"urgente": urgente,
		"motivoUrgente": motivoUrgente,
		"cotizacion_comparativa": comparativa,
		"peligrosa": peligrosa,
		"tipoSolicitud": lcTipoSolicitud,
		"fechaAsignacion": fechaAsignacion,
		"fechaExpiracion": fechaExpiracion,
		"tipoCotizacionId": tipoCotizacionId,
		"tipoTransporteId": chkComparativa.checked ? tipoTransporteIds: tipoTransporteId,
		"modoTransportacionId": modoTrasportacionId,
		"incotermId": incotermId,
		"origenId": origenId,
		"destinoId": destinoId,
		"zonaHorariaId": zonaHorariaId,
		"comentario": comentario,
		"tipoServicio": tiposServicios
	};
	console.log(arrayDataObject);
	var stringJson = JSON.stringify(arrayDataObject);
	return stringJson;
}

function validaciones() {
	var txtEmail = document.getElementById('txtEmail');
	if ((txtEmail !== null) && (txtEmail.parentNode.className == 'invalid')) {
		var icon = 1;
		var funcion = '';
		var mensajeEmail = 'El email ingresado es incorrecto.';
		apagarLoadingScreen();
		encenderMessageBox(icon, '', mensajeEmail, funcion);
		return false;
	}
	return true;
}

function showMenu() {
	var divMenu = document.getElementById('div-menu');
	var divCaption = document.getElementById('divCaption');
	var purl = './index.php?action=ejecutarAjax&clase=claseDivHeader&metodo=show';
	var content = getContent(purl);

	divMenu.innerHTML = content;
	divCaption.innerHTML = 'Detalle la información de su requerimiento.';
}

function onclickImportacion() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-TYT-IM";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickExportacion() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-TYT-EX";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickTolepu() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-TOL";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tolepu");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickTransporte() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-CIA";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickEstiba() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-EST";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickSeguros() {
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-SEG";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
}

function onclickIntegral() {
	//console.log("click en Integral otra vez.... ");
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-INTEG";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	//console.log(content);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;
	interactiveMenu(tipoSolicitud);
	console.log(divBody.innerHTML);
}


function onclickCia4pl() {
	console.log("click en Cia 4PL.... ");
	var purl = "";
	var content = "";
	var divBody = document.getElementById("divBody");

	tipoSolicitud = "REQ-4PL";
	purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyImport&metodo=show";
	content = getContent(purl);
	document.body.setAttribute("empresa", "tyt");
	divBody.innerHTML = content;

	interactiveMenu(tipoSolicitud);
}

function validarOption(optionId) {
	var purl = "";
	var content = "";
	var divDetalleRequerimiento = document.getElementById("divDetalleRequerimiento");

	if (optionId == "optTarifa") {
		purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyTarifa&metodo=show";
		content = getContent(purl);
		divDetalleRequerimiento.innerHTML = content;
		crearChecks();
		crearSelects();
	}

	if (optionId == "optCotizacion") {
		purl = "./index.php?action=ejecutarAjax&clase=claseDivBodyCotizacion&metodo=show";
		content = getContent(purl);
		divDetalleRequerimiento.innerHTML = content;
		crearChecks();
		crearSelects();
	}
}

function interactiveMenu(tipoSolicitud) {
	var menuImport = document.getElementById("menu-import");
	var menuExport = document.getElementById("menu-export");
	var menuTolepu = document.getElementById("menu-tolepu");
	var menuTransporte = document.getElementById("menu-transporte");
	var menuEstiba = document.getElementById("menu-estiba");
	var menuSeguros = document.getElementById("menu-seguros");
	var menuIntegral = document.getElementById("menu-integral");
	var bodyBackground = document.querySelector(".main-body__background");
	var trTiposervicio = document.getElementById("check_servicios");
	var servicioLabel = document.getElementById("label_servicio");
	var menuCia4PL = document.getElementById("menu-cia4pl");

	/*	menuImport.classList.remove("main-menu__active");
		menuExport.classList.remove("main-menu__active");
		menuTolepu.classList.remove("main-menu__active");
		menuTransporte.classList.remove("main-menu__active");
		menuEstiba.classList.remove("main-menu__active");
		menuSeguros.classList.remove("main-menu__active");*/
	menuIntegral.classList.remove("main-menu__active");
	//menuCia4PL.classList.remove("main-menu__active");

	/*menuImport.classList.remove("main-menu__active--import");
	menuExport.classList.remove("main-menu__active--export");
	menuTolepu.classList.remove("main-menu__active--tolepu");
	menuTransporte.classList.remove("main-menu__active--transporte");
	menuEstiba.classList.remove("main-menu__active--estiba");
	menuSeguros.classList.remove("main-menu__active--seguros");*/
	menuIntegral.classList.remove("main-menu__active--integral");
	//menuCia4PL.classList.remove("main-menu__active--cia4pl");


	switch (tipoSolicitud) {
		case "REQ-TYT-IM":
			menuImport.classList.add("main-menu__active");
			menuImport.classList.add("main-menu__active--import");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuImportacion.png");
			break;

		case "REQ-TYT-EX":
			menuExport.classList.add("main-menu__active");
			menuExport.classList.add("main-menu__active--export");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuExportacion.png");
			break;

		case "REQ-TOL":
			menuTolepu.classList.add("main-menu__active");
			menuTolepu.classList.add("main-menu__active--tolepu");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuInternacional.png");
			break;

		case "REQ-CIA":
			menuTransporte.classList.add("main-menu__active");
			menuTransporte.classList.add("main-menu__active--transporte");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuTransporte.png");
			break;

		case "REQ-EST":
			menuEstiba.classList.add("main-menu__active");
			menuEstiba.classList.add("main-menu__active--estiba");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuEstibas.png");
			break;

		case "REQ-SEG":
			menuSeguros.classList.add("main-menu__active");
			menuSeguros.classList.add("main-menu__active--seguros");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuSeguros.png");
			break;

		case "REQ-INTEG":
			menuIntegral.classList.add("main-menu__active");
			menuIntegral.classList.add("main-menu__active--integral");
			servicioLabel.classList.remove("tipo-serviciocheck");
			trTiposervicio.classList.remove("tipo-serviciocheck");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuImportacion.png");
			break;
		case "REQ-4PL":
			menuCia4PL.classList.add("main-menu__active");
			menuCia4PL.classList.add("main-menu__active--cia4pl");
			bodyBackground.setAttribute("src", "../../Framework/images/iconMenuImportacion.png");
			break;
	}
}
