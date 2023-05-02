<?php
	class claseDivListaAgentes
	{
		public static function show($backgroundMessage)
		{
			if (isset($_GET["action"]))
			{
				$mostrar="";				
			}

			$background=claseMessageBackGround::show($backgroundMessage);
			
			$mostrar="
				<div 
					id='divListaAgentesBackGround'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:800px;
						height:600px;
						background:black;
						opacity:0.7;
						visibility:hidden;
					'
				>
				</div>
				<div class='demo-center' 
					id='divListaAgentes'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:750px;
						height:420px;
						visibility:hidden;
						border-radius: 3px;
						box-shadow: 5px 5px 15px #000000;
					'
				>
					<table 
						cellspacing='0' 
						cellpadding='0' 
						width='100%' 
						style='
							background:#FFFFFF;
							background:url($background);
							background-size:cover;
							background-repeat:no-repeat;
						'
					>
						<tr style='background:#FFFFFF;'>
							<td width='95%' align='center'>
								<div>
									<br>
										".claseLabel::show("lblListaAgentesDialog", "detailFormulario", "static", 30, 10, 0, 0, "hidden", "#00365A", "Enviando Solicitudes")."
									 <div id ='divImageLoadingH'
									 	style='
											background:url(../../Framework/images/Tolepu/w8Hloading.gif);
											width:200px;
											height:3px;
										'
									 >
									 </div>
									<br>
								</div>
							</td>
						</tr>
						<tr>
							<td width='100%' cellspacing='0' cellpadding='10' align='center'>
								<br>
								<div class='table'
									style='
										width:95%;
										height:260px;
										background:#ffffff;
										overflow:auto; 
									 '
								>
									<table class='table' id='tblListaAgentes' rowId='' style='cursor:default;'>
									</table>
								</div>
								<br>
							</td>
						</tr>
						<tr>
							<td align='center' width='100%'>
								<div style='width:25%;'>
									<button 
										id='btnOKAgente'
										class='button button-blue'
										onclick='location.href=\"./\";'
										style='
											width:100%;
											visibility:hidden;
										'
									>
										ACEPTAR
									</button>
								</div>
								<br>
							</td>
						</tr>
					</table>
				</div>
					
				<script language='javaScript'>
					function enecenderListaAgentesDialog()
					{
						screenScrollTop = window.scrollY;
						window.scrollBy(0, -screenScrollTop);
						document.body.style.overflow='hidden';
						
						var anchoDocumento = document.body.clientWidth;
						//var altoDocumento = document.body.clientHeight;
						var altoDocumento = screen.height;
						
						var divListaAgentesBackGround = document.getElementById('divListaAgentesBackGround');
						var divListaAgentes = document.getElementById('divListaAgentes');
						var lblListaAgentesDialog = document.getElementById('lblListaAgentesDialog');
						var btnOKAgente = document.getElementById('btnOKAgente');
						
						divListaAgentesBackGround.style.visibility='visible';
						divListaAgentesBackGround.style.width=anchoDocumento+'px';
						divListaAgentesBackGround.style.height=document.body.clientHeight+'px';
						divListaAgentes.style.visibility='visible';
						lblListaAgentesDialog.style.visibility='visible';
						btnOKAgente.style.visibility='hidden';
											
						var elLeft = (anchoDocumento - parseFloat(divListaAgentes.style.width))/2;
						var elTop = (altoDocumento - parseFloat(divListaAgentes.style.height))/2;
						divListaAgentes.style.left = elLeft+'px';
						divListaAgentes.style.top = elTop+'px';
					}
					
					function apagarListaAgentesDialog()
					{
						window.scrollBy(0, screenScrollTop);
						document.body.style.overflow='auto';
						
						var divListaAgentesBackGround = document.getElementById('divListaAgentesBackGround');
						divListaAgentesBackGround.style.width='800px';
						divListaAgentesBackGround.style.visibility='hidden';
					
						var divListaAgentes = document.getElementById('divListaAgentes');
						divListaAgentes.style.visibility='hidden';
						
						var lblListaAgentesDialog = document.getElementById('lblListaAgentesDialog');
						lblListaAgentesDialog.style.visibility='hidden';
						
						var btnOKAgente = document.getElementById('btnOKAgente');
						btnOKAgente.style.visibility='hidden';
					}
					
					function reEnviarMail(linkAgenteId)
					{
						var linkAgente = document.getElementById(linkAgenteId);
						var contactoAgenteId = linkAgenteId.substr(5,10);
						var imgAgente = document.getElementById(\"img-\"+contactoAgenteId);
						imgAgente.src='../../Framework/images/Tolepu/w8loading.gif';
						var purl = './index.php?action=ejecutarAjax&clase=claseDivListaAgentes&metodo=enviarMailAgente&sContactoAgenteId='+contactoAgenteId+'&documentoId='+documentoId;
						var content=getContent(purl);
						var error = parseInt(content);
						if ( error == 0 )
						{
							imgAgente.src='../../Framework/images/Tolepu/check-mark.png';
							imgAgente.setAttribute('statusmail','true');
							linkAgente.style='visibility:hidden;'
						}
						else
						{
							imgAgente.src='../../Framework/images/Tolepu/warning-mark.png';
							linkAgente.style='visibility:visible;'
						}
						comprobarEnvio();
					}
					
					function cargarListaAgentes()
					{
						arrayControl={'controlId':'grdGridAgentes'};
						stringJson = JSON.stringify(arrayControl);			
						purl = './index.php?action=ejecutarAjax&clase=claseDivBody&metodo=addControl&variables='+stringJson;
						content = getContent(purl);
						document.getElementById('divWrap').innerHTML=content;
					}
					
					function comprobarEnvio()
					{
						var estado = false;
						var lblListaAgentesDialog = document.getElementById(\"lblListaAgentesDialog\");
						for (var i=0; i<=arrayAgentes.length -1;i++)
						{
							var img = \"img-\"+arrayAgentes[i];
							img = document.getElementById(img);
							if ( img.getAttribute(\"statusmail\") == \"false\" )
							{
								estado = true;
							}
						}
						if ( estado )
						{
							lblListaAgentesDialog.innerHTML=\"No se enviaron todas las Solicitudes.\";	
							lblListaAgentesDialog.style.color=\"red\";
						}
						else
						{
							lblListaAgentesDialog.innerHTML=\"Solicitudes enviadas correctamente.\";	
							lblListaAgentesDialog.style.color='#00365A';
						}
					}
				</script>
			";			
			return $mostrar;
		}
		
		public static function cargarGridListaAgentes()
		{
			$dataArrayAgentes	 = $_GET["dataArrayAgentes"];			
			$arrayAgentes = json_decode($dataArrayAgentes,true);
			
			$baseDatos = new claseDataBase();
			$contadorAgente=0;
			$mostrar="";
			$mostrar="
				<tbody class='table-body' 
					style='
						width:'100%'; 
					'
				>
			";
			
			$baseDatos->conectarDB();			
			for($i=0; $i<=count($arrayAgentes)-1; $i++)
			{
				$contadorAgente++;
				$contactoAgenteId = $arrayAgentes[$i];
				$strSQL="";
				$strSQL = "
					TOLEPU..WEB_COTIZADOR_SELECT_AGENTES_BY_ContactoAgenteID '$contactoAgenteId'
				";
				$rs =  $baseDatos->db_query( $strSQL );		
				$row  =  $baseDatos->db_fetch_array( $rs );					
				//mssql_free_result($rs);
				$contactoAgenteExteriorId = $baseDatos->sysGetDataFieldSrv( $row[ 'ID' ] );
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ 'Nombre' ] );
				$ciudad = $baseDatos->sysGetDataFieldSrv( $row[ 'Ciudad' ] );
				$mostrar.="".
					"<tr id='trAgente-$contactoAgenteExteriorId'>".
					  "<th style='width:10%;color:black;' align='center'>$contadorAgente</th>".
					  "<th style='width:50%;color:black;' align='left'>$nombre</th>".
					  "<th style='width:20%;color:black;' align='left'>$ciudad</th>".
					  "<th style='width:10%;color:black;' align='center'>".
						"<img statusmail='false' id='img-$contactoAgenteExteriorId' src='../../Framework/images/Tolepu/w8loading.gif' style='width:25%;'></img>".
					  "</th>".
					  "<th style='width:10%;' align='center'>".
						"<a href='#' id='link-$contactoAgenteExteriorId' onclick='reEnviarMail(this.id);' style='visibility:hidden;'> Reenviar</a>".
					  "</th>".
					"</tr>".	
				"";
			}
			
			$baseDatos->desconectarDB();				
			$mostrar.="
				</tbody>
			";
			return $mostrar;
		}
		
		public static function enviarMailAgente()
		{
			sleep(1); //hacer una pausa de medio segundo
			$contactoAgenteId = $_GET["sContactoAgenteId"];
			$documentoId 	  = $_GET["documentoId"];
			$error=-1;
			$arrayMailAgente=array(); 
			$mostrar="../../Framework/images/Tolepu/check-mark.png";
			
			$baseDatos=new claseDataBase();
			$baseDatos->conectarDB();
			$strSQL="
				EXEC TOLEPU..WEB_COTIZADOR_BITACORA_EnviarMail '$contactoAgenteId','$documentoId'
			";
			
			$rs =  $baseDatos->db_query( $strSQL  ) or die ($error); 
			$baseDatos->desconectarDB();
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$error 	 	= $baseDatos->sysGetDataFieldSrv( $row[ 'NumError' ] );
			}
			return $error;
		}
	}
?>