<?php
	class claseInicio {
		public static function show() {
			if ( isset($_GET["action"]) ) {
				$mostrar = "";
				
				if ($_GET["action"]=="ejecutarAjax") {
					$mostrar = claseInicio::ejecutarAjax();
					return $mostrar;
				}
				
				if ($_GET["action"]=="abrirFrm") {
					$mostrar = claseInicio::abrirFrm();
					return $mostrar;
				}
				
				if ($_GET["action"]=="loadComboBox") {
					$mostrar = claseComboBox::loadComboBox();
					return $mostrar;
				}
				
				if ($_GET["action"]=="cargarGridSearchDialog") {
					$mostrar = claseSearchDialog::cargarGridSearchDialog();
					return $mostrar;
				}
				
				if ($_GET["action"]=="logout") {
					$mostrar = claseUsuario::logoutUsuario();
					return $mostrar;
				}
			}
						
			$divMain = claseDivMain::show();

	
			
			//$divBodyImport = claseDivBodyImport::show();
			$mostrar="
				<!DOCTYPE html>
					<head>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
						<title>Portal Comercial</title>
						<link rel='stylesheet' href='../css/normalize.css'>
						<link rel='stylesheet' href='http://".$_SERVER["HTTP_HOST"]."/Framework/devoops/css/font-awesome.css'>
						<link rel='stylesheet' href='../css/main_flat.css'>
						<link rel='stylesheet' href='../css/demo_flat.css'>
						<link rel='stylesheet' href='../css/message_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/message_confirm_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/search_dialog.css?v1.0.10'>
						<link rel='stylesheet' href='../css/modules.css?v1.0.10'>
						<link rel='stylesheet' href='../css/login.css?v1.0.10'>
						<link rel='stylesheet' href='./css/estilos.css?v1.0.10'>
						<link rel='stylesheet' type='text/css' href='../TorresyTorres/files/slider/engine1/style.css'/>
						<style type='text/css'>".claseSkin::extraerSkin(claseSkin::$skinNormal)."</style>
					</head>
					<body
						empresa = 'tyt'
					>
						".$divMain."

						<script language='javaScript'>
							var screenWidht  = screen.width;
							var screenHeight = 1100;
							var screenScrollTop = 0;
							document.body.style.backgroundSize=screenWidht+'px '+screenHeight+'px' ;
							window.moveTo(0,0);
							window.resizeTo(screen.availWidth, screen.availHeight);
						
							function enviarMail() {
								enecenderLoadingScreen();
								var error = 1;
								var icon  = 1;
								var funcion = '';	
								var sJsonDataObjectInicio=getDataObjectInicio();
								var isOK = validaciones();

								if ( isOK ) {
									purl = './index.php?action=ejecutarAjax&clase=claseInicio&metodo=saveRecord&dataObjectInicio='+sJsonDataObjectInicio;
									content	= getContent(purl);
									content	= JSON.parse(content);
									console.log(content);
									error 	= parseInt(content[0]['error']);
									console.log(error);
									icon	= (error == -1)?3:((error == 0)?4:1);
									console.log(icon);
									funcion = (error == 0)?'location.href=\"./\";':'';
									apagarLoadingScreen();
									encenderMessageBox(icon,'',content[0]['message'],funcion);
								}
							}
							

						</script>
						
						".claseSearchDialog::show(claseMessageBackGround::$backgroundWebCotizadorTyT)."
						".claseMessageBox::load(claseMessageBackGround::$backgroundWebCotizadorTyT)."
						".claseMessageBoxConfirm::load(claseMessageBackGround::$backgroundWebCotizadorTyT)."
						".claseLoadingScreen::show()."
						".claseToolTipText::show("#FCF0B0", "blue")."
						<script type='text/javascript' src='../TorresyTorres/files/slider/engine1/jquery.js'></script>
						<script type='text/javaScript' src='../js/librerias.js?v1.0.10'></script>						
						<script type='text/javaScript' src='../TorresyTorres/js/libreriasTorres.js?v1.0.10'></script>
						<script type='text/javaScript' src='../js/login.js?v1.0.10'></script>						
					</body>
				</html>
			";
			return $mostrar;
		}
		
		private static function ejecutarAjax() {
			$clase  = $_GET["clase"];
			$metodo = $_GET["metodo"];
			eval("\$mostrar = ".$clase."::".$metodo."();");
			return $mostrar;

		}
		
		private static function abrirFrm() {
			$frm = $_GET["frm"];	
			eval("\$mostrar = ".$frm."::show();");
			return $mostrar;

		}
		
		public static function saveRecord() {
			// var_dump($_SESSION);
			//Obtener Variables
			$mostrar			  = "Ocurrió un error al tratar de enviar la Solicitud.";
			$dataObjectInicio 	  = $_GET["dataObjectInicio"];
			$arrayInicio          = json_decode($dataObjectInicio,true);
			$arrayMail			  = array(); 
			$userCode			  = strtoupper($_SESSION["userCode"]);
			$userCompany		  = strtolower($_SESSION["empresa"]);
			
			$tipoRequerimiento	  =	$arrayInicio["TipoRequerimiento"];
			$clienteId			  =	$arrayInicio["ClienteId"];
			//echo $clienteId;
			$detalleRequerimiento =	$arrayInicio["DetalleRequerimiento"];
			$razonSocial		  =	$arrayInicio["RazonSocial"];
			$ruc				  =	$arrayInicio["Ruc"];
			$contacto			  =	$arrayInicio["Contacto"];
			$email				  =	$arrayInicio["Email"];
			$telefono			  =	$arrayInicio["Telefono"];
			$tipoSolicitud  	  =	$arrayInicio["TipoSolicitud"];
			$tipoServicio    	  =	$arrayInicio["TipoServicio"];
			
			$arrayMail[0]["error"]=-1;
			$arrayMail[0]["message"]=$mostrar;
			

			//Validaciones
			//Validacioón al menos debe seleccionar un tipo de servicio
			//echo $tipoSolicitud;			
			$arr_lengthServicio = count($tipoServicio); 
			if  ($arr_lengthServicio == 0 ) {
				$mostrar="
					Debe seleccionar un tipo de servicio.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;
			}else {
				if ($arr_lengthServicio == 1 ){
					$tipoSolicitud = $tipoServicio[0];
				}else {
					$tipoSolicitud = 'REQ-INTEG';
				}
			//	echo $tipoSolicitud;
			}

			if ( $tipoRequerimiento == "2" ) {
				if ( strlen(ltrim(rtrim($razonSocial))) === 0 || ltrim(rtrim($razonSocial)) === "Seleccione..." ) {
					$mostrar="
						No ha seleccionado el Cliente.
					";
					//echo "ing a cliente";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;

				}
			} else {
				if ( strlen(ltrim(rtrim($razonSocial))) === 0 || ltrim(rtrim($razonSocial)) === "Seleccione..." ) {
					$mostrar="
						No ha ingresado la razón Social.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;

				}

				if ( strlen(ltrim(rtrim($contacto))) == 0  ) {
					$mostrar="
						No ha ingresado la Persona de Contacto.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;
				}

				if ( strlen(ltrim(rtrim($email))) == 0  ) {
					$mostrar="
						No ha ingresado el email del Contacto.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;
				}

			}
			
			if ( strlen(ltrim(rtrim($detalleRequerimiento))) == 0  ) {
				$mostrar="
					No ha ingresado su requerimiento.
				";
				$arrayMail[0]["error"]=1;
				$arrayMail[0]["message"]=$mostrar;
				$stringJson=json_encode($arrayMail);
				return $stringJson;

			}

			

			//Verificamos si existe un solo tipo de servicio, se ingresa como tipo de solicitud 


			/*if ($tipoSolicitud == 'REQ-INTEG') {
				$arr_lengthServicio = count($tipoServicio); 
				if  ($arr_lengthServicio == 0  || $arr_lengthServicio == 1 )  {
					$mostrar="
						Debe seleccionar al menos 2 Tipos  de Servicios.
					";
					$arrayMail[0]["error"]=1;
					$arrayMail[0]["message"]=$mostrar;
					$stringJson=json_encode($arrayMail);
					return $stringJson;
				}
			}	*/
			//echo  $clienteId;
			//echo $detalleRequerimiento;
			//echo $tipoSolicitud;
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			// $spName = $tipoSolicitud == 'REQ-TOLEPU' ? 'Tolepu..web_cotizador_tolepu_save' : 'TYT..WEB_COTIZADOR_TYT_SaveRecord';
			$strSQL="
				EXEC TYT..WEB_COTIZADOR_TYT_SaveRecord
				'$clienteId',
				'$detalleRequerimiento',
				'$razonSocial',
				'$ruc',
				'$contacto',
				'$email',
				'$telefono',
				'$tipoSolicitud',
				'$userCode',
				'$userCompany'
			";
			// var_dump($strSQL);
			$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayMail)); 
		
			while ($row  =  $baseDatos->db_fetch_array( $rs )) {
				$error 	 	= $baseDatos->sysGetDataFieldSrv( $row[ 'NumError' ] );
				$message 	= $baseDatos->sysGetDataFieldSrv( $row[ 'Mensaje' ] );
				$RegistroID = $baseDatos->sysGetDataFieldSrv( $row[ 'RegistroID' ] );
			}
			
			$arr_lengthServicio = count($tipoServicio); 
			if ( $error == 0 ) {
				for($i=0; $i<$arr_lengthServicio; $i++)
				{
					$IdTipo = $tipoServicio[$i];
					//echo "TipoServicio = ".$IdTipo;
					$strSQL = "
							EXEC TYT..WEB_COTIZADOR_TYT_SaveRecord_Servicio 
						    '$RegistroID',
						    '$IdTipo',
						    '$userCode'";

					$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayMail));	    
			    }
			}
			else {

			 		$arrayMail[0]["error"]            = -1;
			 		$arrayMail[0]["message"]          = "Ocurrió un error al escoger tipo de servicio seleccionado";
			 	}

			
			$baseDatos->desconectarDB();
			$arrayMail[0]["error"]=$error;
			$arrayMail[0]["message"]=$message;
			$stringJson=json_encode($arrayMail);	
			//echo $stringJson;	
			return $stringJson; 
		}
	}
?>