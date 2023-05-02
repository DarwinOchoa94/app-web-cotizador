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
				.estiloMenu
				{
					background:#0095C8;
					padding-left:15px;
					padding-right:15px;
					border-right:01px solid #ffffff;
					color:#ffffff;
				}
				.estiloMenu:hover
				{
					background:#BAE2EF;
					color:#16657F;
					cursor:pointer;
				}
				.headerFormulario
				{
					font-style:normal;
					font-size:25px;
					font-family:Times New Roman, Times, serif;
				}
				.subHeaderFormulario
				{
					font-style:normal;
					font-size:15px;
					font-family:Verdana, Geneva, sans-serif;
					color: #14ABE2;
				}
				.detailFormulario
				{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:10px;
					color: #00365A;
				}
				.labelFormulario
				{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:12px;
					color: #00365A;
				}
				.banner
				{
					background: rgb(169,3,41); /* Old browsers */
					background: -moz-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%); /* FF3.6+ */
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,3,41,1)), color-stop(44%,rgba(143,2,34,1)), color-stop(100%,rgba(109,0,25,1))); /* Chrome,Safari4+ */
					background: -webkit-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%); /* Chrome10+,Safari5.1+ */
					background: -o-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%); /* Opera 11.10+ */
					background: -ms-linear-gradient(top, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%); /* IE10+ */
					background: linear-gradient(to bottom, rgba(169,3,41,1) 0%,rgba(143,2,34,1) 44%,rgba(109,0,25,1) 100%); /* W3C */
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019',GradientType=0 ); /* IE6-9 */
				}
				body
				{
					background: rgb(242,246,248); /* Old browsers */
					background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 94%, rgba(224,239,249,1) 100%); /* FF3.6+ */
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,246,248,1)), color-stop(94%,rgba(181,198,208,1)), color-stop(100%,rgba(224,239,249,1))); /* Chrome,Safari4+ */
					background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%,rgba(181,198,208,1) 94%,rgba(224,239,249,1) 100%); /* Chrome10+,Safari5.1+ */
					background: -o-linear-gradient(top, rgba(242,246,248,1) 0%,rgba(181,198,208,1) 94%,rgba(224,239,249,1) 100%); /* Opera 11.10+ */
					background: -ms-linear-gradient(top, rgba(242,246,248,1) 0%,rgba(181,198,208,1) 94%,rgba(224,239,249,1) 100%); /* IE10+ */
					background: linear-gradient(to bottom, rgba(242,246,248,1) 0%,rgba(181,198,208,1) 94%,rgba(224,239,249,1) 100%); /* W3C */
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9',GradientType=0 ); /* IE6-9 */
					behavior:url (../css/PIE/PIE.htc)
				}
				.mailSistemas
				{
					cursor:pointer;
					href='mailto:sistemas\40 torresytorres.com'
				}
				.mailSistemas:after
				{
					content:'sistemas\40 torresytorres.com';
				}
			";			
			return $presentar;
		}
		
		private static function extraerSkinNocturno()
		{
			$presentar="
				.estiloMenu
				{
					background:#000000;
					padding-left:15px;
					padding-right:15px;
					border-right:01px solid #ffffff;
					color:#ffffff;
				}
				.estiloMenu:hover
				{
					background:#BAE2EF;
					color:#16657F;
					cursor:pointer;
				}
				.headerFormulario
				{
					font-style:normal;
					font-size:20px;
					font-family:Times New Roman, Times, serif;
				}
				.subHeaderFormulario
				{
					font-style:normal;
					font-size:12px;
					font-family:Verdana, Geneva, sans-serif;
					color: #14ABE2;
				}
				.detailFormulario
				{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:13px;
					font-weight:bold;
					color: #00365A;
				}
				.labelFormulario
				{
					font-style:normal;
					font-family:Verdana, Geneva, sans-serif;
					font-size:12px;
					font-weight:normal;
					color: #00365A;
				}
				.mailSistemas
				{
					cursor:pointer;
					href:'mailto:sistemas\40 torresytorres.com';
				}
				.mailSistemas:after
				{
					content:'sistemas\40 torresytorres.com';
				}
			";
			return $presentar;
		}
	}
	
?>