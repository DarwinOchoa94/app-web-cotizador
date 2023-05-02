<?php
	class claseDivMain
	{
		public static function show() {
			$divLogo	= claseDivLogo::show("../../Framework/images/Tolepu/isologoTolepu.png","70%");
			$divHeader	= claseDivHeader::show();
			$divCaption	= claseDivCaption::show();
			$divBody	= claseDivBody::show();
			$divFooter	= claseDivFooter::show();
			$userLogin 	= claseUsuario::show("demo");	
			
			$presentar="
				<div id='divMain'>
					<table cellspacing='0' cellpadding='0' width='100%'>
						<tr style='
							background-color:#003D69;
							padding-top:1px;
							padding-bottom:1px;'
						>
							    
							<td id='tdLogin' width='60%'>
								$userLogin
							</td>
						</tr>
						<tr style='background-color: white;'>
							<td>
								<table cellspacing='0' cellpadding='0' width='100%'
									style='
										margin-top: 1em;
									    //background:url(../../Framework/images/Tolepu/bannerTopDarkBlue.jpg);
									    //background-size:cover;
										//box-shadow: 25px 25px 20px #000000;
									'
								>
									<tr>
										<td width='25%'
										>
											$divLogo
										</td>
										<td style='
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
							<td align='center'
								style='background: white;
									padding-bottom:5px;
									border-bottom: 3px solid #148ABC;
								'
							>
								$divCaption
							</td>
						</tr>
						<tr>
							<td>
								$divBody
							</td>
						</tr>
						<tr>
							<td>
								$divFooter
							</td>
						</tr>
					</table>
				</div>
			";
			return $presentar;
		}
	}
?>