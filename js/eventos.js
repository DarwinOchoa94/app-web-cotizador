var loadEvents = function(){
	"use strict";
	/*
	var cmbCiudad = document.getElementById("cmbCiudad");
	var cmbCliente = document.getElementById("cmbCliente")!==null?document.getElementById("cmbCliente"):document.getElementById("txtCliente");
	var searchDialog = function(e){
		if( e.ctrlKey === true && e.which === 40 ){ // Ctrl + Flecha abajo
			enecenderSearchDialog(this.id);
		}
	};
	cmbCiudad.addEventListener("keydown",searchDialog);
	cmbCliente.addEventListener("keydown",searchDialog);
	*/
	
	window.addEventListener("keyup",function(e){
		if ( e.which === 27 ){ //Tecla Esc
			apagarSearchDialog();
			apagarMessageBox();
			apagarMessageBoxConfirm();
		}
	});
};