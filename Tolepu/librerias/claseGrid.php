<?php
	class claseGrid
	{
		public static function show($id,$class,$width,$visibility)
		{
			//$baseDatos=new claseBaseDatos();
			//$baseDatos->conectarse();
				//$sql=$sql;
				//$result=mysql_query($sql);
			//$baseDatos->desconectarse();
			
			$listar="";
			/*
			while ($table = mysql_fetch_array($result))
			{
				$value = $table[0];
				$codigo = $table[1];
				$nombre = $table[2];
				$cantidad = $table[1];
				
				$listar.="
					<option value='$value'>($codigo) $nombre</option>
				";
			}*/
			//<th style='width:10%' align='left'>Vigencia</th>
			$presentar="
				<div
					id='divClaseGrid'
					class='$class'
					style='	
						width:100%;
						background:#d7ebf8;
						visibility:$visibility;
						border:2px solid #d7ebf8;
					'
				>
					<label style='margin-left:2em; float:left; margin-top:1em; color:blue;'>Filtros:</label> 
					<label for='chkViaEmbarque' style='float:right; margin:1em 1em 0 1em; color:#FC6D07;'>Por Vía de Embarque 
						<label class='option'>
							<input id='chkViaEmbarque' class='focus' type='checkbox' checked='true' onclick='validarCheckBox(this.id);'>
							<span class='checkbox'></span>
						</label>
					</label>
					<label for='chkAutorizadoSENAE' style='display: none; float:right; margin:1em 1em 0 1em; color:green;'>Autorizado SENAE 
						<label class='option'>
							<input id='chkAutorizadoSENAE' class='focus' type='checkbox' onclick='validarCheckBox(this.id);'>
							<span class='checkbox'></span>
						</label>
					</label>
					<div
						class='$class'
						style='	
							width:100%;
							height:40px;
							background:#d7ebf8;
							border:0px solid #c7c7c7;
							margin:0px;
						'
					>
						<table class='$class' style='width:100%;'>
							<thead class='table-head'>
								<tr>
								  <th style='width:10%'>#</th>
								  <th style='width:45%' align='center'>Nombre</th>
								   <th style='width:15%' align='center'>Ciudad</th>
								  <th style='width:20%' align='center'> </th>
								  <th style='width:10%' align='center'>Sel.</th>
								</tr>
							</thead>
						</table>
					</div>
					<div 
						id='divClaseGridBody'
						class='$class'
						style='
							width:$width;
							height:calc(50vh - 170px);
							background:white;
							overflow:auto; 
							border:0px solid #c7c7c7;
						'
					>
						<table id='$id' 
							style='
								width:100%; 
							'
						>
						</table>
					</div>
				</div>
			<!--
			<script src='./ejemplo03.js'></script>
			<script language='javaScript'>
				insertarRegistro();
			</script>
			-->
				
			";
			/*
			 <select
			id='$id'
			style='
			position:absolute;
			width:$width;
			height:$height;
			left:$left;
			top:$top;
			'
			>
			$listar
			</select>
			<script language='javaScript'>
			var elId_$id = document.getElementById('$id');
			
			elId_$id.readOnly=function(valor){
			this.disabled = valor;
			};
			
			</script>*/
			
			return $presentar;
		}
		
		public static function cargarAgentesExterior()
		{
			$paisId 	  	 = $_GET["paisId"];
			$viaEmbarqueId 	 = $_GET["viaEmbarqueId"];
			$viaEmbarque 	 = $_GET["viaEmbarque"];
			$autorizadoSENAE = $_GET["autorizadoSENAE"];
			$viaEmbarque	 = ($viaEmbarque==="true")?"1":"0";
			$autorizadoSENAE = ($autorizadoSENAE==="true")?"1":"0";
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();				
			$str_SQL = "";
			$str_SQL = "
				TOLEPU..WEB_COTIZADOR_SELECT_AGENTES '$paisId', '$viaEmbarqueId', $viaEmbarque, '$autorizadoSENAE'
			";
			//global $conn, $class_fn_basic;
			//$rs  =  $conn->db_query( $str_SQL );
			$rs  =  $baseDatos->db_query( $str_SQL );
			$baseDatos->desconectarDB();
			$contadorAgente = 0;
			$mostrar="";
			$mostrar="".
				"<tbody id='tblGridAgente' class='table-body'". 
					"style='".
						"width:100%;".
					"'".
				">".
			"";
			//while ($row  =  $conn->db_fetch_array( $rs ))
			while ($row  =  $baseDatos->db_fetch_array( $rs ))
			{
				$contadorAgente++;
				//$codigo = $class_fn_basic->sysGetDataFieldSrv( $row[ 'Codigo' ] );
				//$nombre = $class_fn_basic->sysGetDataFieldSrv( $row[ 'Nombre' ] );
				//$autorizado = $class_fn_basic->sysGetDataFieldSrv( $row[ 'Autorizado' ] );
				
				/*
					  "<th style='width:20%;color:black;' align='center'>".
					  		"<button id='btnTarifas$agenteExteriorId'".
								"class='button button-white'".
								"style='vertical-align:middle;width:60px;height:25px;'".
								"onmouseover='this.className=&quot;button button-orange&quot;'".
								"onmouseout='this.className=&quot;button button-white&quot;'".
								"onclick='agenteExteriorId=&quot;$agenteExteriorId&quot;; abrirFrm(&quot;claseFrmTarifas&quot;);'".
							">".
								"Tarifas".
							"</button>".
					  "</th>".
				*/
				
				$agenteExteriorId = $baseDatos->sysGetDataFieldSrv( $row[ 'ID' ] );
				$nombre = $baseDatos->sysGetDataFieldSrv( $row[ 'Nombre' ] );
				$ciudad = $baseDatos->sysGetDataFieldSrv( $row[ 'Ciudad' ] );
				$autorizadoAduana = $baseDatos->sysGetDataFieldSrv( $row[ 'AutorizadoAduana' ] );
				$color = "#0478B5"; //($autorizadoAduana==="SI")?"green":"black";
				$mostrar.="".
					"<tr>".
					  "<th style='width:10%;color:$color;' align='center'>$contadorAgente</th>".
					  "<th style='width:50%;color:$color;' align='left'>$nombre</th>".
					  "<th style='width:30%;color:$color;' align='left'>$ciudad</th>".
					  "<th style='width:10%;color:$color;' align='center'>".
					  	"<p class='demo-options'>".
							"<label class='option' style='vertical-align:middle;'>".
								"<input onclick='validarAgente(this.id);' id='chk$contadorAgente' value = '$agenteExteriorId' estado='true' class='focus' type='checkbox' name='checkbox' checked>".
								"<span class='checkbox'></span>".
							"</label>".
						"</p>".
					  "</th>".
					"</tr>".	
				"";
			}
			$mostrar.="".
				"</tbody>".
			"";
			//$presentar=($contadorAgente==0)?'':$presentar;
			return "{'mensaje':\"".$mostrar."\",'success':'true','contadorAgente':".$contadorAgente."}";// ltrim(rtrim($presentar));
		}
		
		public static function validarAgente()
		{
			$mostrar			= false;
			$arrayAgenteId	 	= array(); 
			$arrayObjectAgenteId	= $_GET["stringJsonAgenteId"];			
			$arrayAgenteId = json_decode($arrayObjectAgenteId,true);
			$contactoAgenteId	  = $arrayAgenteId["ContactoAgenteId"];
			
			$baseDatos = new claseDataBase();
			$baseDatos->conectarDB();				
			$str_SQL = "";
			$str_SQL = "
				SELECT Email = LTRIM(RTRIM(ISNULL(Email,'')))
				FROM TRM_AGENCIAS_EXTERNAS_CONTACTOS WITH(NOLOCK)
				WHERE ID = '$contactoAgenteId'
			";
			$rs  =  $baseDatos->db_query( $str_SQL ) or die ($mostrar); ;
			$baseDatos->desconectarDB();
			
			if ( $baseDatos->db_num_rows( $rs ) > 0 ){
				$row  =  $baseDatos->db_fetch_array( $rs );
				$eMail=$row[ 'Email' ];
				if ( strlen($eMail) > 0 ){				
					$mostrar = true;
				}else{
					$mostrar = false;
				}
			}else{
				$mostrar = false;
			}
			
			return $mostrar;
		}
	}
?>