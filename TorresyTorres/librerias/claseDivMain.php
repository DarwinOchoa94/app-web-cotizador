<?php
	class claseDivMain {
		public static function show() {
			$logoEmpresa = claseImage::show("../../Framework/images/TyT/logo-TyT.png", "Logo Grupo Torres y Torres", "home-logo");
			$divHeader	 = claseDivHeader::show();
			$divCaption	 = claseDivCaption::show();
		 	$divBody	 = claseDivBody::show("main-body__container demo"); // show(" demo");
		    //$divBodyIntegral = claseDivBodyImport::show();
			$divFooter	 = claseDivFooter::show();
			$userLogin 	 = claseUsuario::show("demo");
			$divLogo	 = null;

			$mostrar = "
				<div id='divMain'>
					<main class='main'>
						<div id='tdLogin' class='main-user'>
							{$userLogin}
						</div>
						<header class='main-header'>
							{$logoEmpresa}
							<div id='div-menu' class='main-menu'>
								{$divHeader}
                    		</div>
						</header>
						<section class='main-caption'>
							{$divCaption}
						</section>
						<section class='main-body'>
							{$divBody}
						</section>
					</main>
					{$divFooter}
					<!--
					<table cellspacing='0' cellpadding='0' width='100%'>
						<tr>
							<td id='tdLogin' width='50%' style='background:#7EC7EE;padding-top:3px;padding-bottom:3px;'>
								$userLogin
							</td>
						</tr>
						<tr>
							<td>
								<table 
									class='banner'
									cellspacing='0' 
									cellpadding='0' 
									width='100%'
									style='background:white;'
								>
									<tr>
										<td width='25%'
										>
											$divLogo
										</td>
										<td 
											id='tdHeader'
											style='
												text-align:left;
												color:white;
												font-weight:bold;
												font-size:20px;
												vertical-align:middle;
											'
										>
											$divHeader
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td 
								align='center'
								style='background:#7EC7EE;
									padding-bottom:5px;
								'
							>
								$divCaption
							</td>
						</tr>
						<tr>
							<td 
								style='
									background:url(../../Framework/images/TyT/fondoCotizadorTyT.jpg);
									background-size:100%;
									background-repeat:no-repeat;
								'
							>
								
							
							</td>
						</tr>
						<tr>
							<td>
								$divFooter
							</td>
						</tr>
					</table>
					-->
				</div>
			";
			return $mostrar;
		}
	}
?>