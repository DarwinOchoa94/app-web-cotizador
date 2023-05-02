<?php
	class claseIcons
	{
		public static $iconWebCotizadorTolepuInformation=1;
		public static $iconWebCotizadorTolepuQuestion=2;
		public static $iconWebCotizadorTolepuError=3;
		public static $iconWebCotizadorTolepuOK=4;
		
		public static function show($icon)
		{
			$mostrar="";
			
			if ( $icon == claseIcons::$iconWebCotizadorTolepuInformation )
			{
				$mostrar="../../Framework/images/Tolepu/Icons/webCotizador/iconInformation.png";
			}
			if ( $icon == claseIcons::$iconWebCotizadorTolepuQuestion )
			{
				$mostrar="../../Framework/images/Tolepu/Icons/webCotizador/iconQuestion.png";
			}
			if ( $icon == claseIcons::$iconWebCotizadorTolepuError )
			{
				$mostrar="../../Framework/images/Tolepu/Icons/webCotizador/iconError.png";
			}
			if ( $icon == claseIcons::$iconWebCotizadorTolepuOK )
			{
				$mostrar="../../Framework/images/Tolepu/Icons/webCotizador/iconOK.png";
			}
			
			return $mostrar;
		}
	}
?>
