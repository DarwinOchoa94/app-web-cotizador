<?php
	class claseDivHeader {
		public static function show() {
          //  $iconImport         = claseImage::show("../../Framework/images/iconMenuImportacion.png", "Icono Importación", "icon-import");
         //   $iconExport         = claseImage::show("../../Framework/images/iconMenuExportacion.png", "Icono Exportación", "icon-export");
          //  $iconInternacional  = claseImage::show("../../Framework/images/iconMenuInternacional.png", "Icono Internacional", "icon-tolepu");
          //  $iconTransporte     = claseImage::show("../../Framework/images/iconMenuTransporte.png", "Icono Transporte", "icon-transporte");
         //   $iconEstiba         = claseImage::show("../../Framework/images/iconMenuEstibas.png", "Icono Estiba", "icon-estiba");
        //    $iconSeguros        = claseImage::show("../../Framework/images/iconMenuSeguros.png", "Icono Seguros", "icon-seguros");
		 	//$iconIntegral        = claseImage::show("../../Framework/images/iconMenuIntegral.png", "Icono Integral", "icon-integral");
          //  $iconCia4pl        = claseImage::show("../../Framework/images/iconMenuImportacion.png", "Icono Cia 4PL", "icon-cia4pl");
            

            $lblHeader          = claseLabel::show("lblHeader", "", "headerFormulario", "PORTAL COMERCIAL TORRES Y TORRES");
		//	$lblImportacion     = claseLabel::show("lblImportacion", "", "subHeaderFormulario", "Importación");
		//	$lblExportacion     = claseLabel::show("lblExportacion", "", "subHeaderFormulario", "Exportación");
		//	$lblTolepu          = claseLabel::show("lblTolepu", "", "subHeaderFormulario", "Internacional");
		//	$lblTransporte      = claseLabel::show("lblTransporte", "", "subHeaderFormulario", "Transporte");
		//	$lblEstiba          = claseLabel::show("lblEstiba", "", "subHeaderFormulario", "Estiba");
		//	$lblSeguros         = claseLabel::show("lblSeguros", "", "subHeaderFormulario", "App Seguros");
    // $lblIntegral        = claseLabel::show("lblIntegral", "", "subHeaderFormulario", "App Integral");
          //  $lblCia4pl          = claseLabel::show("lblCia4pl", "", "subHeaderFormulario", "4PL");
			
			if ( !	claseUsuario::existeUsuarioRegistrado() ) {
				$mostrar = "
                    {$lblHeader}
                ";

			} else {
				$mostrar = "

  
				";
			}
			return $mostrar;
		}
	}
?>
