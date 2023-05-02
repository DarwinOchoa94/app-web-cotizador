<?php
	class claseUsuarioOld
	{
		public static function show($class="demo")
		{
			$onfocusCmbEmpresa="loadComboBox(\"cmbEmpresa\",\"BASE\");";
			$onchangeCmbEmpresa="validarComboBox(\"cmbEmpresa\");";
			$onclickBtnLogin="validarButton(\"btnLogin\");";
			$logoEmpresa=claseDivLogo::show("../../Framework/images/Tolepu/isologoGrupoTyT-vertical.png","40%");
			$lblUsuario=claseLabel::show("lblUsuario", "labelFormulario", "static", 30, 10, 0, 0, "hidden", "black", "UserName");
			$lblPassword=claseLabel::show("lblPassword", "labelFormulario", "static", 30, 10, 0, 0, "hidden", "black", "PassWord");
			$lblMessageLogin=claseLabel::show("lblMessageLogin", "labelFormulario", "static", 30, 10, 0, 0, "hidden", "red", "<br>");
			$txtUsuario=claseTextBox::show("txtUsuario", "text", "select", "relative", "100%", 10, 0, 0, "hidden", claseTextBox::$string,"");
			$txtPassword=claseTextBox::show("txtPassword", "password", "select", "relative", "100%", 10, 0, 0, "hidden", claseTextBox::$string,"");
			$cmbEmpresa=claseComboBox::show("cmbEmpresa", "select", "relative", "94%", 30, 0, 0, "hidden", "[] Seleccione...", $onfocusCmbEmpresa, $onchangeCmbEmpresa,"","");
			$btnLogin=claseButton::show("btnLogin", "button button-blue", "relative", "55%", "35px", 1, 1, "hidden",".:: <i class='fa fa-unlock-alt'></i> Entrar ::.","",$onclickBtnLogin);
			
			$segmentoLogin="";
			
			if (claseUsuario::existeUsuarioRegistrado())
			{
				$empresa=$_SESSION["empresa"];
				$nombreDelUsuario = "<i class='fa fa-user'></i> Usuario: ".claseUsuario::extraerDatosDeUsuarioEnSesion("Usuario",$empresa);
				
				$segmentoLogin="
					<table width='60%' align='right'>
						<tr>
							<td width='80%' align='right' style='color:white;'>
								$nombreDelUsuario
							</td>
							<td align='center'>
								<a 
									href='#'
									onclick='cerrarSession();' 
									style='color:white;'
								>
									<b><i class='fa fa-sign-out'></i> Cerrar sesion</b>
								</a>
							</td>
						</tr>
					</table>
				";
			}
			else
			{
				$segmentoLogin="
					<table width='60%' align='right'>
						<tr>
							<td width='80%' align='right' style='color:white;'>
							
							</td>
							<td align='center'>
								<a 
									href='#'
									onclick='enecenderLoginScreen();' 
									style='color:white;'
								>
									<b><i class='fa fa-sign-in'></i> Iniciar sesión</b>
								</a>
							</td>
						</tr>
					</table>
				";
			}
			
			$mostrar="
				$segmentoLogin
				<div
					id='divLoginBackGround'
					class='$class'
					onclick='apagarLoginScreen();'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:0px;
						height:0px;
						background:black;
						opacity:0.7;
						visibility:hidden;
						z-index:100;
					'
				>
				</div>
				<div 
					id='divLogin'
					class='$class'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:500px;
						height:400px;
						visibility:hidden;
						background:white;
						border-radius:6px;
						box-shadow: 5px 5px 15px #000000;
						z-index:101;
					'
				>
					<table width='100%' align='center' >
						<tr>
							<td id='tdLogoEmpresa'>
								$logoEmpresa
							</td>
						</tr>
						<tr>
							<td>
								<table width='100%'>
									<tr>
										<td width='3%'>
										</td>
										<td width='45%'>
											<i class='fa fa-user'></i> Usuario
											$txtUsuario
											<i class='fa fa-home'></i> Empresa
										</td>
										<td width='4%'>
										</td>
										<td width='45%'>
											<i class='fa fa-key'></i> Contraseña
											$txtPassword
											<p>&nbsp;</p>
										</td>
										<td width='3%'>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align='center'>
								$cmbEmpresa
							</td>
						</tr>
						<tr>
							<td align='center' style='padding-top:30px;'>
								$btnLogin
							</td>
						</tr>
						<tr>
							<td align='left'>
								$lblMessageLogin
							</td>
						</tr>
					</table>
				</div>
				
				<script language='javaScript'>
					function enecenderLoginScreen()
					{
						var screenScrollTop = window.scrollY;
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						//var anchoDocumento = document.body.clientWidth;
						//var altoDocumento = document.body.clientHeight;
						var anchoDocumento = screen.width;
						var altoDocumento = screen.height;
											
						var	divBody				= document.getElementById('divBody');
						var	divBodyFooter		= document.getElementById('divBodyFooter');
						var divLoginBackGround 	= document.getElementById('divLoginBackGround');
						divLoginBackGround.style.width	= anchoDocumento +'px';
						divLoginBackGround.style.height	= altoDocumento +'px';
						divLoginBackGround.style.visibility='visible';
						
						var divLogin 		= document.getElementById('divLogin');
						//var lblUsuario		= document.getElementById('lblUsuario');
						//var lblPassword		= document.getElementById('lblPassword');
						var lblMessageLogin	= document.getElementById('lblMessageLogin');
						var txtUsuario		= document.getElementById('txtUsuario');
						var txtPassword		= document.getElementById('txtPassword');
						var cmbEmpresa 		= document.getElementById('cmbEmpresa');
						var btnLogin 		= document.getElementById('btnLogin');
						var elLeft = (anchoDocumento - parseFloat(divLogin.style.width))/2;
						var elTop = (altoDocumento - ( parseFloat(divLogin.style.height) * 2 ))/2;

					
						divLogin.style.left = elLeft+'px';
						divLogin.style.top 	= elTop+'px';
						//lblUsuario.style.visibility='visible';
						//lblPassword.style.visibility='visible';
						lblMessageLogin.style.visibility='visible';
						txtUsuario.style.visibility='visible';
						txtPassword.style.visibility='visible';
						cmbEmpresa.parentNode.style.visibility='visible';
						btnLogin.style.visibility='visible';
						divLogin.style.visibility='visible';
						txtUsuario.focus();
					}
					function apagarLoginScreen()
					{
						document.body.style.overflow='auto';
						var divLoginBackGround = document.getElementById('divLoginBackGround');
						var divLogin = document.getElementById('divLogin');
						//var lblMessageLogin	= document.getElementById('lblMessageLogin');
						var txtUsuario		= document.getElementById('txtUsuario');
						var txtPassword		= document.getElementById('txtPassword');
						var cmbEmpresa 		= document.getElementById('cmbEmpresa');
						
						txtUsuario.value='';
						txtPassword.value='';
						lblMessageLogin.innerHTML='<br>';
						
						txtUsuario.style.visibility='hidden';
						txtPassword.style.visibility='hidden';
						cmbEmpresa.parentNode.style.visibility='hidden';
						lblMessageLogin.style.visibility='hidden';
						btnLogin.style.visibility='hidden';
						divLogin.style.visibility='hidden';
						divLoginBackGround.style.width='800px';
						divLoginBackGround.style.height='600px';
						divLoginBackGround.style.visibility='hidden';
					}
					window.addEventListener('keyup',function(e){
						if ( e.which === 27 ){ //Tecla Esc
							apagarLoginScreen();
						}
					});
				</script>
			";
			return $mostrar;
		}
		
		public static function loginUsuario()
		{
			$arrayLogin			 = array(); 
			$dataObjectLogin 	 = $_GET["variablesLogin"];
			
			$arrayLogin	 = json_decode($dataObjectLogin,true);
		
			$txtUsuario			= 	str_replace(";","",str_replace("'","",$arrayLogin["UserName"]));
			$txtPassword		= 	strtoupper(str_replace(" ","",$arrayLogin["UserPass"]));
			$cmbEmpresa			= 	strtoupper(str_replace(" ","",$arrayLogin["Empresa"]));
			
			$mensaje="Error de Inicio de Sesión";
			$segmentoLogin="";
			$_SESSION["usuario"] = 0;
			$_SESSION["userCode"] = "";
			$_SESSION["empresa"] = "";
			$arrayLogin[0]["logged"]=$_SESSION["usuario"];
			$arrayLogin[0]["message"]=$mensaje;
			$arrayLogin[0]["segmentoLogin"]=$segmentoLogin;
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			
			$strSQL="$cmbEmpresa.DBO.WEB_SEG_Usuarios_SeekCODE '$txtUsuario'";
			$rs =  $baseDatos->db_query( $strSQL  ) or die (json_encode($arrayLogin)); 
			$baseDatos->desconectarDB();
			
			$date = date("d/m/Y");
			$time = date("H:i:s");
			$pcHost = $_SERVER["REMOTE_ADDR"];
			$url = $_SERVER["HTTP_REFERER"];
			$statusLogin = "bad login";
			
			if ( $baseDatos->db_num_rows( $rs ) > 0 )
			{
				$row  =  $baseDatos->db_fetch_array( $rs );
				$userCode=strtolower($row[ 'Codigo' ]);
				$userName=$row[ 'Nombre' ];
				$userPass=$row[ 'Password' ];
				
				if ( $txtPassword == $userPass )
				{
					$user = "$userCode [ $userName ]";
					$_SESSION["usuario"] = 1;
					$_SESSION["userCode"] = $userCode;
					$_SESSION["empresa"]  = $cmbEmpresa;
					$mensaje="Bienvenido/a $userName";
					$statusLogin="successfull";
				}	
				else
				{
					$user="";
					$mensaje="<br>Contraseña incorrecta.";
				}
			}
			else
			{
				$user="";
				$mensaje="<br>No existe el usuario.";
				$userCode = $txtUsuario;
			}

			claseBitacora::insert($date."||".$time."||".$cmbEmpresa."||".$userCode."||".$url."||".$pcHost."||".$statusLogin."|<>|");
						
			$segmentoLogin="
				<table width='50%' align='right'>
					<tr>
						<td width='80%' align='right' style='color:white;'>
							<i class='fa fa-user'></i> Usuario: $user
						</td>
						<td align='center'>
							<a 
								href='#'
								onclick='cerrarSession();' 
								style='color:white;'
							>
								<b><i class='fa fa-sign-out'></i> Cerrar sesion</b>
							</a>
						</td>
					</tr>
				</table>
			";

			$arrayLogin[0]["logged"]=$_SESSION["usuario"];
			$arrayLogin[0]["message"]=$mensaje;
			$arrayLogin[0]["segmentoLogin"]=$segmentoLogin;
			$stringJson=json_encode($arrayLogin);			
			return $stringJson;
		}
		
		public static function logoutUsuario()
		{
			$_SESSION["usuario"] = 0;
			
			$mostrar="
				<script language='javaScript'>
					document.location='./';
				</script>
			";
			
			return $mostrar;
		}
		
		public static function existeUsuarioRegistrado()
		{
			if (!isset($_SESSION["usuario"]))
			{
				return false;
			}
			
			if ($_SESSION["usuario"]>0)
			{
				return true;
			}
			else
			{
				return false;
			}
				
		}
		
		public static function extraerUsuarioEnSesion()
		{
			return $_SESSION["userCode"];
		}
		
		public static function extraerEmpresaEnSesion()
		{
			return $_SESSION["empresa"];
		}
		
		public static function extraerDatosDeUsuarioEnSesion($elDato,$empresa)
		{
			$usuario = claseUsuario::extraerUsuarioEnSesion();
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			$strSQL="
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