<?php
	class claseButtonUploadFile
	{
		public static function show($id,$class,$position,$width,$height,$left,$top,$visibility,$caption,$onclick,$title)
		{
			$background=claseMessageBackGround::show(claseMessageBackGround::$backgroundWebCotizadorTolepu);
			$mostrar="
				<button
					id='$id'
					name='$id'
					class='$class'
					onclick='$onclick'
					title='$title'
					style='
						position:$position;
						width:$width;
						height:$height;
						left:$left;
						top:$top;
						visibility:$visibility;
						font-weight:bold;
						-o-border-radius:50%;
						-webkit-border-radius:50%;
						-moz-border-radius:50%;
						-ms-border-radius:50%;
						border-radius:50%;
						box-shadow:1px 1px 5px rgba(0,0,0,0.5);
						font-size:2em;
					'
				>
					$caption
				</button>
				<div 
					id='divUploadFileBackGround'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:800px;
						height:600px;
						background:black;
						opacity:0.7;
						visibility:hidden;
						z-index:100;
					'
				>
				</div>
				<div class='demo-center' 
					id='divUploadFile'
					style='
						position:absolute;
						left:0px;
						top:0px;
						width:735px;
						height:380px;
						visibility:hidden;
						border-radius: 3px;
						box-shadow: 5px 15px 15px #000000;
						background:url($background);
						background-size:100% 100%;
						z-index:101;
					'
				>
					<form method='POST' 
						enctype='multipart/form-data' 
						action='./index.php?action=ejecutarAjax&clase=claseButtonUploadFile&metodo=uploadMultipleFile'
						target='iframeUploadFiles' 
						onsubmit=''
					>
						<div
							style='
								background-color:white;
								width:100%;
								height:300px;
								display:flex;
								flex-direction:column;
								justify-content:space-between;
								align-items:flex-start;
							'
						>
							<div
								style='
									width:100%;
									display:flex;
									justify-content:flex-end;
								'
							>
								<h5 
									onclick='apagarUploadFileScreen();'
									style='
										color:#3FB6F2; 
										padding-right:10px; 
										font-weight:bold;
										cursor:pointer;
									'
								>x</h5>
							</div>
							<div 
								style='
									width:95%; 
									margin:auto; 
									height:250px; 
									overflow:auto;
									border:1px solid rgba(63,182,242,0.5);
								'
							>
								<table 
									style='
										width:100%;
										display:fixed; 
									'
								>
									<tr class='rowTitle'>
										<td class='colTitleFileName'>
											<h1>Nombre</h1>
										</td>
										<td class='colTitleFileSize'>
											<h1>Tamaño</h1>
										</td>
										<td class='colTitleFileRemove'>
										</td>
									</tr>
								</table>
								<table 
									id='tblUploadFile' 
									style='
										width:100%; 
									'
								>
								</table>
							</div>
							<input id='txtUploadFile' name='txtUploadFile[]' type='file' multiple='true' onchange='verUploadFiles();' style='padding-left:15px;'>
							<iframe name='iframeUploadFiles' style='display:none'></iframe>
						</div>
						<div 
							style='
								display:flex;
								justify-content:space-around;
								algin-items:center;
								margin-top:25px;
								padding-left:65%;
							'
						>
							<button 
								type='submit'
								class='button button-blue'
								onclick='apagarUploadFileScreen();'
							>
								Cargar archivos
							</button>
							<a 
								class='button button-blue'
								onclick='cancelarUploadFileScreen();'
							>
								Cancelar
							</a>
						</div>
					</form>
				</div>
			";
			return $mostrar;
		}
		
		public static function uploadMultipleFile()
		{
			$filePDF = "";
			$dir = 'files/filesTemp/';
			if (isset($_FILES["txtUploadFile"])) 
			{
				$extensiones=array('JPG','JPEG','DOC','DOCX','XLS', 'XLSX', 'PNG', 'PDF', 'RAR', 'ZIP', 'MSG'); 
				if ( count($_FILES["txtUploadFile"]["name"]) > 5 ){
					return "<script> alert(\"Solo está permitido hasta 5 archivos adjuntos.\");</script>";
				}
				for ($i=0; $i<count($_FILES["txtUploadFile"]["name"]); $i++)
				{				
					$valid = 0;
					for ($j=0; $j<count($extensiones); $j++)
					{
						$extFile = explode(".",$_FILES["txtUploadFile"]["name"][$i]);
						if($extensiones[$j] === strtoupper($extFile[count($extFile)-1]) )
						{
							$valid = 1;							
						}
						if( $j == (count($extensiones)-1) && ( $valid == 0 ) ){
							$archivo = $_FILES["txtUploadFile"]["name"][$i];
							//echo "Archivo Invalido $archivo";
							return "<script>alert(\" Archivo Invalido $archivo \");</script>";
						}
					}
					if( $_FILES["txtUploadFile"]["size"][$i] > 4000000 ){
						$archivo = $_FILES["txtUploadFile"]["name"][$i];
						return "<script> alert(\"El tamano del archivo $archivo excede el limite permitido [4 MB.]\");</script>";
					}
				}
				$size = array_sum($_FILES["txtUploadFile"]["size"]);
				$maxSize  = 4000000;//4mb	
				if ( $size > $maxSize )
				{
					return "<script> alert(\"El peso total de los archivos debe ser máximo hasta 4 MB.\");</script>";
				}
				//Copiar los archivos al servidor
				$errorCopyFile = 0;
				for ($i=0; $i<count($_FILES["txtUploadFile"]["name"]); $i++)
				{				
					$filePDF = $dir.$_FILES["txtUploadFile"]["name"][$i];
					if( !copy($_FILES["txtUploadFile"]["tmp_name"][$i], $filePDF) ){
						$errorCopyFile = 1;
					}
				}
				if( $errorCopyFile === 0 ){
					return "<script> alert(\"Archivos subidos al servidor correctamente.\");</script>";
				}else{
					return "<script> alert(\"Error al intentar cargar los archivos al servidor.\");</script>";
				}
			}
			else
			{ 
				return "<script>alert(\"No se han podido cargar los archivos.\");</script>";
			}
		}
	}
?>