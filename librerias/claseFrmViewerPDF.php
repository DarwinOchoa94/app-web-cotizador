<?php
	class claseFrmViewerPDF
	{
		public static function show()
		{
			$sJsonDataObject=$_POST["claseFrmViewerPDF"];
			$arrayDataObject = json_decode($sJsonDataObject,true);

			$filePDF=$arrayDataObject["FilePDF"];
			$dir 		= "files/filesTemp/";

			$mostrar="
				<head>
					<meta charset='utf-8'>
					<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
					<title>Visor PDF</title>
					
				</head>
				<body>
				</body>
				<script language='javaScript'>
					window.resizeTo(1220,760);
					window.screenX = 50;
					window.screenY = 50;
					document.location='./".$dir.$filePDF."';
				</script>
			";

			return $mostrar;
		}
	}
?>