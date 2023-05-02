<?php
	class claseDataObjectInicio
	{
		public static $cmbClienteId="";
		public static $cmbTipoTramiteId="";
		public static $cmbPaisOrigenId="";
		public static $cmbPuertoOrigenId="";
		public static $cmbTipoCotizacionId="";
		public static $cmbIncotermsId="";
		
		public static function getValue($object)
		{
			
			$value="";
			
			if ($object == claseDataObjectInicio::$cmbClienteId)
			{
				$value=claseDataObjectInicio::$cmbCliente;
			}
			if ($object == claseDataObjectInicio::$cmbTipoTramite)
			{
				$value="";
			}
				
			$presentar="";
			$presentar=$value;
			return $presentar;
		}
		
		public static function getDataObject()
		{
			claseDataObjectInicio::$cmbClienteId = $_GET["clienteId"];
			return claseDataObjectInicio::$cmbClienteId; 
		}
		
	}
?>