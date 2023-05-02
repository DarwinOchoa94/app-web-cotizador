<?php
	class claseMessageBackGround
	{
		public static $backgroundWebCotizadorTolepu=1;
		public static $backgroundWebCotizadorTyT=2;
		
		public static function show($background)
		{
			$mostrar="";
			
			if ( $background == claseMessageBackGround::$backgroundWebCotizadorTolepu )
			{
				$mostrar="../../Framework/images/Tolepu/fondoFormularioDialog.png";
			}
			if ( $background == claseMessageBackGround::$backgroundWebCotizadorTyT )
			{
				$mostrar="../../Framework/images/TyT/fondoFormularioTyTDialog.jpg";
			}
			return $mostrar;
		}
	}
?>
