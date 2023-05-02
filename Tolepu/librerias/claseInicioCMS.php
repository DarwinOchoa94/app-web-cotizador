<?php
	class claseInicioCms
	{
		public static function show()
		{
			if (isset($_GET["action"]))
			{
				$presentar="";
				
				if ($_GET["action"]=="ejecutarAjax")
				{
					$presentar=claseInicioCms::ejecutarAjax();
				}
				
				if ($_GET["action"]=="abrirFrm")
				{
					$presentar=claseInicioCms::abrirFrm();
				}
				
				echo $presentar;
				return;
			}
			
			$elMenu=claseInicioCms::menu();
			
			$elDFI="";
			
			$presentar="
				<!DOCTYPE html>
					<head>
						<meta charset='utf-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
						<title>Cotizador Tolepu</title>
						<link rel='stylesheet' href='../css/main_flat.css'>
						<link rel='stylesheet' href='../css/demo_flat.css'>						
						<script type='text/javaScript' src='../../js/librerias.js'></script>
					</head>
					<body
						style='background:url(../../images/fondoCotizadorTolepu.jpg);'
					>
						$elMenu
						
						$elDFI
					</body>
				</html>
			";
			
			return $presentar;
		}
		//<a href='./indexCMS.php?action=verCatalogo'>
		private static function menu()
		{
			$presentar="
				<div id='cssmenu'>
					<ul>
						<li class='active'>
							<a href='./indexCMS.php'>
								Inicio
							</a>
						</li>
						<li class='has-sub'>
							<a href='#'>Inventarios</a>
							<ul>
								<li>
									<a
										onclick='
											abrirFrm(\"claseFrmProductos\");
										' 
									>
										Catal. de Productos
									</a>
								</li>
								<li class='has-sub'>
									<a href='./indexCMS.php?action=abrirFrm(\"claseFrmCotizador\")'>
										Cotizador Tolepu
									</a>
								</li>
								<li>
									<a
										onclick='
											abrirFrm(\"claseFrmCliente\");
										' 
									>
										Dir. Clientes
									</a>
								</li>
								<li class='has-sub'>
									<hr>
								</li>
								<li class='has-sub'>
									<a 
										onclick='
											abrirFrm(\"claseFrmIngresoBodega\");
										'
									>
										Ingreso Bodega
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			";
			$presentar="ESTO VA AQUI";
			
			return $presentar;
		}
		
		private static function abrirFrm()
		{
			$frm=$_GET["frm"];
			
			eval("\$presentar = ".$frm."::show();");
			
			return $presentar;
		}
		
		private static function ejecutarAjax()
		{
			$clase=$_GET["clase"];
			$metodo=$_GET["metodo"];
				
			eval("\$presentar = ".$clase."::".$metodo."();");
				
			return $presentar;
		}
		
		
	}
?>