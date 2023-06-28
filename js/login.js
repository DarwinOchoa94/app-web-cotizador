/**************************************************************************************************************************************/
/************************************************************    JQUERY    ************************************************************/
/**************************************************************************************************************************************/
function login() {
	var $body				 = $("body");
	var $txtUsuario			 = $("#txtUsuario");
	var $txtPassword		 = $("#txtPassword");
	var $cmbEmpresa		 	 = $("#cmbEmpresa");
	var $lblError			 = $("#lblError");
	var $divSesion			 = $("#divSesion");
	var $divLogin			 = $("#divLogin");
	var $lnkLogin			 = $("#lnkLogin");
	var $lnkLogout			 = $("#lnkLogout");
	var $lblUsuarioName		 = $("#lblUsuarioName");

	var purl				 = "";
	var content 			 = "";
	var userCompany          = "";
	var lcUsuario			 = $txtUsuario.prop("value");
	var lcPassword			 = $txtPassword.prop("value");
	var lcEmpresa			 = "TOLEPU";

	if (lcUsuario == "") {
		$lblError.text("* Ingrese su Usuario.");
		return;
	}
	if (lcPassword == "") {
		$lblError.text("* Ingrese su Password.");
	}
	if (lcEmpresa == "") {
		$lblError.text("* No ha seleccionado la Empresa.");
	} else {
		switch (lcEmpresa) {
			case "TYT":
				userCompany = "tyt";
				break;
			case "CIA":
				userCompany = "cia";
				break;
			case "TOLEPU":
				userCompany = "tolepu";
				break;
			case "ESTIBA":
				userCompany = "estiba";
				break;
		}
	}

	var arrayObjectLogin = {
		"UserName": lcUsuario,
		"UserPass": lcPassword,
		"Empresa": lcEmpresa
	};
	var stringJsonLogin = JSON.stringify(arrayObjectLogin);

	purl = "./index.php?action=ejecutarAjax&clase=claseUsuario&metodo=loginUsuario&variablesLogin=" + stringJsonLogin;
	content = getContent(purl);
	content = JSON.parse(content);
	var logged = parseInt(content[0]['logged']);
	var icon = 4;
	var tittle = '';
	var caption = content[0]['message'];
	var funcion = 'apagarLoginScreen();';

	if (logged == 1) {
		//$divSesion.html(content[0]['segmentoLogin']);
		$body.attr("data-empresa", userCompany);
		$lblUsuarioName.html(content[0]['segmentoLogin']);
		$divLogin.hide();
		$lnkLogin.addClass("mensaje-hidden");
		$lnkLogout.removeClass("mensaje-hidden");
		encenderMessageBox(icon, tittle, caption, funcion);
		showMenu();

	} else {
		$body.attr("data-empresa", "");
		$lblError.text(caption);
		$lnkLogin.removeClass("mensaje-hidden");
		$lnkLogout.addClass("mensaje-hidden");
	}
}
function showLoginScreen() {
	var $body = $("body");
	var $headerNav = $("#header-nav");
	var $divLoginBackGround = $("#divLoginBackGround");

	$body.toggleClass("body-fixed");
	$headerNav.removeClass("mostrar-menu");

	//$divLoginBackGround.fadeIn();
	$divLoginBackGround.removeClass("hidden");
}
function showLogoutScreen() {
	var icon = 2;
	var title = "";
	var caption = "¿Confirma que desea cerrar la sesión S/N ?";
	var accept = "logout()";
	var cancel = "";
	encenderMessageBoxConfirm(icon, title, caption, accept, cancel);
}
function apagarLoginScreen() {
	var $body = $("body");
	var $divLoginBackGround = $("#divLoginBackGround");

	$body.toggleClass("body-fixed");
	//$divLoginBackGround.hide();
	$divLoginBackGround.addClass("hidden");
}

/**************************************************************************************************************************************/
