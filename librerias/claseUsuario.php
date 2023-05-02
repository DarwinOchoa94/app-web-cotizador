<?php
	class claseUsuario {
		public static function show() {
            $onfocusCmbEmpresa  = "loadComboBox(\"cmbEmpresa\",\"BASE\");";
			$onchangeCmbEmpresa = "validarComboBox(\"cmbEmpresa\");";
            $onclickBtnLogin    = "login();";

			$logoEmpresa   = claseImage::show("../../Framework/images/logo-TyT.png", "Logo Grupo Torres y Torres", "login-logo");
			$cmbEmpresa    = claseComboBox::show("cmbEmpresa", "login-field select", "[] Seleccione...", $onfocusCmbEmpresa, $onchangeCmbEmpresa);
            $txtUsuario    = claseTextBox::show("txtUsuario", "text", "login-field select", claseTextBox::$string,"");
			$txtPassword   = claseTextBox::show("txtPassword", "password", "login-field select", claseTextBox::$string,"");
			$btnLogin      = claseButton::show("btnLogin", "login-field button button-blue login-button", "<span class='fa fa-unlock-alt'></span> Iniciar Sesión", "", $onclickBtnLogin, "");
            $divLogin      = "";
			$segmentoLogin = "";

			
			$divLogin = "
                <div id='divLoginBackGround' class='login-screen-background hidden'>
                    <div id='divLogin' class='login-screen'>
                        <div id='button-close-sesion' class='fa fa-times-circle close-sesion' onclick='apagarLoginScreen();'></div>
                        <form action='' method='post' target='ifmLoginForm'>
                            <div id='logoLoginEmpresa' class='login-container login-logo-container'>
                                " . $logoEmpresa . "
                            </div>
                            <div class='login-container'>
                                <fieldset class='login-group'>
                                    <legend><pre> Iniciar Sesión </pre></legend>								
                                    <label id='lblEmpresa' class='login-field' for='cmbEmpresa'><span class='fa fa-home'></span> Empresa</label>
                                    " . $cmbEmpresa . "
                                    <label id='lblUsuario' class='login-field' for='txtUsuario'><span class='fa fa-user'></span> Usuario</label>
                                    " . $txtUsuario . "
                                    <label id='lblPassword' class='login-field' for='txtPassword'><span class='fa fa-key'></span> Password</label> 
                                    " . $txtPassword . "
                                    <label id='lblError' class='login-error login-field'></label>
                                    " . $btnLogin . "
                                </fieldset>
                            </div>
                            <iframe name='ifmLoginForm' style='display:none'></iframe>					
                        </form>
                    </div>
                </div>
			";
			
			if (claseUsuario::existeUsuarioRegistrado()) {
				$empresa       = $_SESSION["empresa"];
				$nombreUsuario = "<span class='fa fa-user'></span> Usuario: ".claseUsuario::extraerDatosDeUsuarioEnSesion("Usuario",$empresa);
				
				$segmentoLogin = "
					<div id='divSesion' class='sesion'>
						<label id='lblUsuarioName'>".$nombreUsuario."</label>
						<a id='lnkLogin' href='#' onclick='showLoginScreen();' class='mensaje-hidden'><span class='fa fa-sign-in'></span> Iniciar sesión</a>
						<a id='lnkLogout' href='#' onclick='showLogoutScreen();'><span class='fa fa-sign-out'></span> Cerrar sesión</a>
					</div>
				";
			}
			else {
				$segmentoLogin = "
					<div id='divSesion' class='sesion'>
						<label id='lblUsuarioName'></label>
						<a id='lnkLogin' href='#' onclick='showLoginScreen();'><span class='fa fa-sign-in'></span> Iniciar sesión</a>
						<a id='lnkLogout' href='#' onclick='showLogoutScreen();' class='mensaje-hidden'><span class='fa fa-sign-out'></span> Cerrar sesión</a>
					</div>
				";
			}
			
			$mostrar = "
				".$segmentoLogin."
				".$divLogin."
				<script language='javaScript'>
					//var lnkLogin      = document.getElementById('lnkLogin');
					//var lnkLogout     = document.getElementById('lnkLogout');
					//var btnCloseLogin = document.getElementById('button-close-sesion');

					//lnkLogin.addEventListener('click', showLoginScreen);
					//lnkLogout.addEventListener('click', showLogoutScreen);
					//btnCloseLogin.addEventListener('click', apagarLoginScreen);
					//saludar();
				</script>
			";
			return $mostrar;
		}
		
		public static function loginUsuario() {
			$arrayLogin			= array(); 
			$dataObjectLogin 	= $_GET["variablesLogin"];
			
			$arrayLogin	        = json_decode($dataObjectLogin,true);
		
			$txtUsuario			= 	str_replace(";","",str_replace("'","",$arrayLogin["UserName"]));
			$txtPassword		= 	strtoupper(str_replace(" ","",$arrayLogin["UserPass"]));
			$cmbEmpresa			= 	$arrayLogin["Empresa"];
						
			$mensaje                        = "Error de Inicio de Sesión";
			$segmentoLogin                  = "";
			$_SESSION["usuario"]            = 0;
			$_SESSION["userCode"]           = "";
			$_SESSION["empresa"]            = "";
			$arrayLogin[0]["logged"]        = $_SESSION["usuario"];
			$arrayLogin[0]["message"]       = $mensaje;
			$arrayLogin[0]["segmentoLogin"] = $segmentoLogin;
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			
			$strSQL ="$cmbEmpresa.DBO.WEB_SEG_Usuarios_SeekCODE '$txtUsuario'";
			$rs     =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayLogin)); 
			$baseDatos->desconectarDB();
			
			$date         = date("d/m/Y");
			$time         = date("H:i:s");
			$pcHost       = $_SERVER["REMOTE_ADDR"];
			$url          = $_SERVER["HTTP_REFERER"];
			$statusLogin  = "bad login";
			
			if ( $baseDatos->db_num_rows( $rs ) > 0 ) {
				$row      =   $baseDatos->db_fetch_array( $rs );
				$userCode = strtolower($row[ 'Codigo' ]);
				$userName = $row[ 'Nombre' ];
				$userPass = $row[ 'Password' ];
				
				if ( $txtPassword == $userPass ) {
					$user = "<span class='fa fa-user'></span> Usuario: ".$userCode." [ ".$userName." ]";
					$_SESSION["usuario"]  = 1;
					$_SESSION["userCode"] = $userCode;
					$_SESSION["empresa"]  = $cmbEmpresa;
					$mensaje     = "Bienvenido/a $userName";
					$statusLogin = "successfull";
				} else {
					$user = "";
					if ( strlen($txtPassword) === 0 ) {
						$mensaje = "* Ingrese la contraseña.";
					} else {
						$mensaje = "* Contraseña incorrecta.";
					}
				}
			}
			else {
				$user     = "";
				$mensaje  = "* No existe el usuario.";
				$userCode = $txtUsuario;
			}

			claseBitacora::insert($date."||".$time."||".$cmbEmpresa."||".$userCode."||".$url."||".$pcHost."||".$statusLogin."|<>|");

			$segmentoLogin = "";
			$segmentoLogin = $user;

			$arrayLogin[0]["logged"]        = $_SESSION["usuario"];
			$arrayLogin[0]["message"]       = $mensaje;
			$arrayLogin[0]["segmentoLogin"] = $segmentoLogin;
			$stringJson = json_encode($arrayLogin);			
			return $stringJson;
		}
		
		public static function logoutUsuario() {
			$_SESSION["usuario"] = 0;
			
			$mostrar = "
				<script language='javaScript'>
					document.location='./';
				</script>
			";
			
			return $mostrar;
		}
		
		public static function existeUsuarioRegistrado() {
			if (!isset($_SESSION["usuario"])) {
				return false;
			}			
			if ($_SESSION["usuario"]>0) {
				return true;
			}
			else {
				return false;
			}				
		}
		
		public static function extraerUsuarioEnSesion() {
			return $_SESSION["userCode"];
		}
		
		public static function extraerEmpresaEnSesion() {
			return $_SESSION["empresa"];
		}
		
		public static function extraerDatosDeUsuarioEnSesion($elDato,$empresa) {
			$usuario   = claseUsuario::extraerUsuarioEnSesion();
			
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();
			$strSQL = "
				SELECT $elDato = LOWER(Código) + ' [ ' + dbo.PROPERCASE(LTRIM(RTRIM(ISNULL(Nombre,'')))) + ' ]'
				FROM $empresa.DBO.SEG_USUARIOS WITH(NOLOCK) 
				WHERE Código = '$usuario'
			";
			$rs =  $baseDatos->db_query( $strSQL  ) or die ("Error al verificar si existe usuario con sesion iniciada"); 
			$baseDatos->desconectarDB();
			
			$row  =  $baseDatos->db_fetch_array( $rs );
			return $row[ $elDato ];
		}
	}
?>