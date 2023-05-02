<?php
	class claseSkin
	{
		public static $skinNormal=1;
		public static $skinNocturno=2;
		
		public static function extraerSkin($skin)
		{
			$presentar="";
			if ($skin == claseSkin::$skinNormal)
			{
				return claseSkin::extraerSkinNormal();
			}
			
			if ($skin == claseSkin::$skinNocturno)
			{
				return claseSkin::extraerSkinNocturno();
			}
		}
		
		private static function extraerSkinNormal()
		{
			$presentar="
				.wrap{
					width:95%;
					max-width:1000px;
					margin:auto;
				}
				.sectionToggle{
					display:none;
					height:calc(50vh - 50px);
					background:#F4F6FB;
					color:#001F3F;
					padding:0px 0px;
					text-align:center;
				}
				.estiloMenu{
					background:#0095C8;
					padding-left:15px;
					padding-right:15px;
					border-right:01px solid #ffffff;
					color:#ffffff;
				}
				.estiloMenu:hover{
					background:#BAE2EF;
					color:#16657F;
					cursor:pointer;
				}
				.headerFormulario{
					font-style:normal;
					font-size:20px;
					font-family:Times New Roman, Times, serif;
				}
				.subHeaderFormulario{
					font-style:normal;
					font-size:12px;
					font-family:Verdana, Geneva, sans-serif;
					color:white;
				}
				.detailFormulario{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:13px;
					font-weight:bold;
				}
				.labelFormulario{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:12px;
					font-weight:normal;
					color: #00365A;
				}
				.labelFormulario--title {
					@extend .labelFormulario;
					color: #2594E9;
					font-weight: bold;
				}
				.labelCabecera{
					@extend .labelFormulario;
					padding:0 1em;
					color: white;
				}
				.mailSistemas:after{
					content:'sistemas\40 torresytorres.com';
					cursor:pointer;
					color: white;
				}
				.mailSistemas:hover {
					color:white;
				}
				.obligatorio{
					color:red;
					margin:2px 5px;
					display:none;
				}
				.disabled{
					cursor:default;
					background:#F2EFEF;
					color:#bbc0b9;
					text-shadow: 1px 1px white;
				}
				.disabled:hover{background:#F2EFEF;color:#bbc0b9;}
				.disabled:active{background:#F2EFEF;color:#bbc0b9;}
				
				
				/* SUBIR MULTIPLES ARCHIVOS */
				.rowTitle{background:#D7EBF8;height:40px;}
				.colTitleFileName{width:70%;text-align:center;}
				.colFieldFileName{width:70%;text-align:left;background:white;padding-left:10px;border-bottom:1px solid #DCDFE7;border-right:1px solid #DCDFE7;}
				.colTitleFileSize{width:20%;text-align:center;}
				.colFieldFileSize{width:20%;text-align:right;background:white;border-bottom:1px solid #DCDFE7;}
				.colTitleFileRemove{width:10%;text-align:center;}
				.colFieldFileRemove{width:10%;text-align:center;background:white;color:green;border-bottom:1px solid #DCDFE7;}
				.colTitleFileName h1,.colTitleFileSize h1{margin-top:10px;font-weight:bold;color:#085370;}
				.colFieldFileRemove a{color:red;}
				
				#txtCotizacion,
				#txtRequerimiento {
					width: 49%;
				}
				#lblCotizacion,
				#lbl-NotaEXW-Terrestre,
				#lblFleteAproximado {
					display: inline-block; 
					position: absolute;
				}
				#lblCotizacion {
					top: -1.5em;
					right: 0;
					font-size: 10px;
				}
				#lbl-NotaEXW-Terrestre {
					top: 3em;
					left: -130%;
				}
				#lblFleteAproximado {
					top: .8em;
					right: 0;
					margin-right: 1em;
					font-size: 10px;
				}
				
				[class^='im-']:before,
				[class*=' im-']:before{
					font-size:4em;
					position:relative;
					top:-0.1em
				}
			";			
			return $presentar;
		}
		
		private static function extraerSkinNocturno()
		{
			$presentar="
				.estiloMenu{
					background:#000000;
					padding-left:15px;
					padding-right:15px;
					border-right:01px solid #ffffff;
					color:#ffffff;
				}
				.estiloMenu:hover{
					background:#BAE2EF;
					color:#16657F;
					cursor:pointer;
				}
				.headerFormulario{
					font-style:normal;
					font-size:20px;
					font-family:Times New Roman, Times, serif;
				}
				.subHeaderFormulario{
					font-style:normal;
					font-size:12px;
					font-family:Verdana, Geneva, sans-serif;
					color:white;
				}
				.detailFormulario{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:13px;
					font-weight:bold;
				}
				.labelFormulario{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:12px;
					font-weight:normal;
				}
				.mailSistemas:after{
					content:'sistemas\40 torresytorres.com';
					cursor:pointer;
					color: white;
				}
				.mailSistemas:hover {
					color:white;
				}
			";
			return $presentar;
		}
	}
	
?>