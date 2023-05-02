<?php
	class claseDivBodyTipoCarga {
		public static function contenedor() {
			$obligatorio               = "<span class='obligatorio'>*</span>";
			$lblTipoContenedor	       = $obligatorio."Tipo de Contenedor:";
			$lblCantidadContenedores   = $obligatorio."Cantidad:";
			$lblNaviera			       = $obligatorio."Naviera:"; 
			
			$onfocusCmbTipoContenedor  = "loadComboBox(\"cmbTipoContenedor\",\"TPCONT\");";
			$onfocusCmbNaviera         = "loadComboBox(\"cmbNaviera\",\"NAV\");";	
			
			$onchangeCmbTipoContenedor = "validarComboBox(\"cmbTipoContenedor\");";
			$onchangeCmbNaviera        = "validarComboBox(\"cmbNaviera\");";
			
			$mostrar = "
				<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--container'>
					<section class='section-container-body__fieldset--tipo-carga'>
						<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--container section-container-body__search--half'>
							".claseLabel::show("lblTipoContenedor", "cmbTipoContenedor", "labelFormulario section-container-body__label", $lblTipoContenedor)."
							".claseComboBox::show("cmbTipoContenedor", "select section-container-body__search", "", $onfocusCmbTipoContenedor, $onchangeCmbTipoContenedor)."
						</fieldset>
						<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--container section-container-body__search--half'>
							".claseLabel::show("lblCantidadContenedor", "txtCantidadContenedor", "labelFormulario section-container-body__label", $lblCantidadContenedores)."
							".claseTextBox::show("txtCantidadContenedor", "number", "select section-container-body__search", claseTextBox::$numeric, 3, "")."
						</fieldset>
					</section>
					<div id='divControledtDescContenedor'>
					</div>
					".claseLabel::show("lblNaviera", "cmbNaviera", "labelFormulario section-container-body__label hidden", $lblNaviera)."
					".claseComboBox::show("cmbNaviera", "select select section-container-body__select hidden", "", $onfocusCmbNaviera, $onchangeCmbNaviera)."
				</fieldset>
			";
			return $mostrar;
		}
		
		public static function cargaSuelta() {
			$obligatorio            = "<span class='obligatorio'>*</span>";
			$lblNaviera			    = $obligatorio."Naviera:"; 
			$lblColoaderDestino     = "Coloader en Destino:";
			
			$onfocusCmbUnidad       = "loadComboBox(\"cmbUnidad\",\"UNI\");";
			$onfocusCmbPesoVolumen  = "loadComboBox(\"cmbPesoVolumen\",\"VOL\");";
			$onfocusCmbVolumen      = "loadComboBox(\"cmbVolumen\",\"VOL\");";
			$onfocusCmbEmbalaje     = "loadComboBox(\"cmbEmbalaje\",\"EMB\");";
			$onfocusCmbNaviera      = "loadComboBox(\"cmbNaviera\",\"NAV\");";
			
			$onchangeCmbUnidad      = "validarComboBox(\"cmbUnidad\");";
			$onchangeCmbPesoVolumen = "validarComboBox(\"cmbPesoVolumen\");";
			$onchangeCmbVolumen     = "validarComboBox(\"cmbVolumen\");";
			$onchangeCmbEmbalaje    = "validarComboBox(\"cmbEmbalaje\");";
			$onchangeCmbNaviera     = "validarComboBox(\"cmbNaviera\");";
			
			$mostrar = "
				<fieldset class='section-container-body__fieldset--block section-container-body__fieldset--container'>
					<section class='section-container-body__fieldset--container section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblBultos", "txtBultos", "labelFormulario section-container-body__label", "Total Bultos:")."
						".claseTextBox::show("txtBultos", "text", "select", claseTextBox::$numeric, 9, "")."
					</section>
					<section class='section-container-body__fieldset--container section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblPeso", "txtPeso", "labelFormulario section-container-body__label", "Peso Bruto Total ( en Kilos )")."
						".claseTextBox::show("txtPeso", "text", "select", claseTextBox::$numeric, 12, "")."
					</section>
					<section class='section-container-body__fieldset--container section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblVolumen", "txtVolumen", "labelFormulario section-container-body__label", "Volúmen Total ( en metro cúbico )")."
						".claseTextBox::show("txtVolumen", "text", "select", claseTextBox::$numeric, 12, "")."
					</section>
					<section class='section-container-body__fieldset--container section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblPesoVolumen", "txtPesoVolumen", "labelFormulario section-container-body__label", "Peso Volúmen Total ( en Kilos volúmen )")."
						".claseTextBox::show("txtPesoVolumen", "text", "select", claseTextBox::$numeric, 12, "")."
					</section>
					<section class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblEmbalaje", "cmbEmbalaje", "labelFormulario section-container-body__label", "Embalaje:")."
						".claseComboBox::show("cmbEmbalaje", "select section-container-body__select", "", $onfocusCmbEmbalaje, $onchangeCmbEmbalaje)."
					</section>
					<section class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblDimension", "edtDimensionBultos", "labelFormulario section-container-body__label", "Dimensiones:")."
						".claseTextArea::show("edtDimensionBultos", "select section-container-body__text-area", claseTextArea::$string, 500, "")."
					</section>
					<section class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblNaviera", "cmbNaviera", "labelFormulario section-container-body__label", $lblNaviera)."
						".claseComboBox::show("cmbNaviera", "select section-container-body__select", "", $onfocusCmbNaviera, $onchangeCmbNaviera)."
					</section>
					<section class='section-container-body__fieldset--block section-container-body__fieldset--tipo-carga'>
						".claseLabel::show("lblColoaderDestino", "txtColoaderDestino", "labelFormulario section-container-body__label", $lblColoaderDestino)."
						".claseTextBox::show("txtColoaderDestino", "text", "select section-container-body__select", claseTextBox::$string, 50, "")."
					</section>
				</fieldset>
			";
			return $mostrar;		
		}
	}
?>