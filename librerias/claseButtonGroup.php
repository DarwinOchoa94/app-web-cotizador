<?php
	class claseButtonGroup
	{
		public static function show($id,$class,$position,$width,$height,$left,$top)
		{
			$mostrar="
				<div 
					id='$id'
					class='$class'
					style='
						position:$position;
						width:$width;
						height:$height;
						left:$left;
						top:$top;
					'
				>
					<a id='btn1' class='button active' onclick='mostarInfoCarga();'>Informacion de la Carga</a>
					<a id='btn2' class='button' onclick='mostarInfoProveedor();'>Informacion del Proveedor</a>
					<a id='btn3' class='button' onclick='mostarInfoAdicional();'>Informacion Adicional</a>
				</div>
			";
			return $mostrar;
		}
	}
?>