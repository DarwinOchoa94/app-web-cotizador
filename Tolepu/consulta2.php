<?php
	session_start();
	if ( isset($_SESSION["idu"]) )
	{
		?>
		<!doctype html>
		<html>
			<head>
				<meta charset="utf-8"/>
				<title>Opciones de Monitoreo de Trámites</title>
				<meta name="viewport" content="width=device-width, initial-scale=1"/>
				<link rel="stylesheet" type="text/css" media="screen" href="../css/style4.css"/>
			<link href="http://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet" type="text/css">
			<link href="http://fonts.googleapis.com/css?family=Allerta" rel="stylesheet" type="text/css">
			</head>
			<body>
			<!-- Menu Starts - cm is abbreviation of circle menu -->
			<div class="cm-container">
			  <div class="cm-large-circle">
				<ul class="cm-small-circle">
				  <li><a href="javascript:void(0)" onClick="window.open('../webDigitador','window1','params');" onMouseOver="document.body.style.backgroundImage='../images/op3.jpg'"><i class="icon-file"></i></a>
					<div class="cm-description">
					  <h2>Digitadores</h2>
					  <p>Controlar los tiempos de elaboración de Cotizaciones.<br>¡Productividad al 110%!</p>
					</div>
				  </li>
				  <!--<li><a href="javascript:void(0)" onClick="window.open('../webOficial','window2','params');" onMouseOver="document.body.style.backgroundImage='../images/op1.jpg'"><i class="icon-play-circle"></i></a>
					<div class="cm-description">
					  <h2>OFICIALES DE CUENTA</h2>
					  <p>Controlar los tiempos en los que se recopila la documentaciÃ³n necesaria para el trÃ¡mite de importaciÃ³n, con la finalidad que sean derivados tres dÃ­as antes del arribo de la carga.
		<br>Â¡Invitemos al cliente a optimizar sus procesos y ahorrar costos!.</p>
					</div>
				  </li>
				  <li><a href="javascript:void(0)" onClick="window.open('../webRevisor','window3','params');" onMouseOver="document.body.style.backgroundImage='../images/op2.jpg'"><i class="icon-picture"></i></a>
					<div class="cm-description">
					  <h2>REVISIÃ“N DE TRÃMITES</h2>
					  <p>Controlar los tiempos de revisiÃ³n de trÃ¡mites, con la finalidad de minimizar errores en el menor tiempo posible, antes de la fecha de arribo de la carga.
		<br>Â¡Productividad y PrecisiÃ³n!
		</p>
					</div>
				  </li>
				  <li><a href="javascript:void(0)" onClick="window.open('../webPapelesPrevios','window4','params');" onMouseOver="document.body.style.backgroundImage='../images/op3.jpg'"><i class="icon-credit-card"></i></a>
					<div class="cm-description">
					  <h2>DIGITACIÃ“N - PAPELES PREVIOS</h2>
					  <p>Controlar los tiempos de la digitaciÃ³n de documentos obligatorios para la importaciÃ³n de entidades de control gubernamental.
		<br>Â¡Productividad al 110%!
		</p>
					</div>
				  </li>
				  <li><a href="javascript:void(0)" onClick="window.open('../webPapelesAnalista','window5','params');" onMouseOver="document.body.style.backgroundImage='../images/op3.jpg'"><i class="icon-wrench"></i></a>
					<div class="cm-description">
					  <h2>ANALISTAS TECNICOS</h2>
					  <p>Controlar los tiempos de todo el proceso interno de generaciÃ³n de documentos emitidos por las autoridades de control.
		<br>Â¡Invitemos al cliente a optimizar sus procesos y ahorrar costos!</p>
					</div>
				  </li>
				  <li><a href="#"><i class="icon-eye-close"></i></a>
					<div class="cm-description">
					  <h2>Salir</h2>
					  <p>Gracias por ser parte del cambio,<br>Piloteando Hacia el Ã‰xito.</p>
					</div>
				  </li>-->
				  <div class="logo"><h2>Monitoreo Tolepu</h2></div>
				</ul>
			  </div>
			</div> <!-- /cm-container -->
			<!-- End of Menu -->
		  </body>
		</html>
		<?php 
	}
	else 
	{ 
		header("Location: ../"); 
	} 
?>