<?php
	class claseDataBase {
		//private $servidor = "192.168.0.177\SQLDEV";
		//private $servidor = "192.168.0.6";
		private $servidor = "192.168.0.15";
		private $usuario  = "sa";
		private $password = "24t0RreS41";
		private $base     = "tyt";
		private $link;
		private $typeBase = 'MSSQL';
		private $rsTmp    = "";
		private $result   = "";
		private $numRow   = 0;
		
		function conectarDB() {
			$servidor = $this->servidor;
			$usuario  = $this->usuario;
			$password = $this->password;
			$base     = $this->base;
			
        	$this->link = mssql_connect($servidor,$usuario,$password);
        	mssql_select_db($base,$this->link) or die ("Error de Conexion");
			return "Conectado";
		}
		
		function desconectarDB() {
        	mssql_close($this->link);
		}
		
		/*Funcion que ejecuta los query Insert, Update, Select, etc.*/
		function db_query( $qstring ) {
			switch( $this->typeBase  ) {
				case 'MYSQL':
					if( !( $ret = mysql_query( $qstring ) ) ) {
						return  false;
					}
					$this->rsTmp = $ret;
					break;
				case 'MSSQL':
					if( !( $ret = @mssql_query( $qstring ) ) ) {
						return  false;
					}
					$this->rsTmp = $ret;
					break;
				case 'PG':
					if( !( $ret = pg_query( $qstring ) ) ) {
						return  false;
					}
					$this->rsTmp = $ret;
					break;	
			}
			return $ret;
		}
		
		/*Funcion que obtiene los datos de una consulta*/
		function db_fetch_array( $rs ) {
			switch( $this->typeBase  ) {
				case 'MYSQL':
					$this->result = mysql_fetch_array( $rs, MYSQL_ASSOC );
					break;
				case 'MSSQL':
					$this->result = @mssql_fetch_array( $rs, MSSQL_ASSOC );
					break;
				case 'PG':
					$this->result = pg_fetch_array( $rs, NULL, PGSQL_ASSOC );
					break;	
			}
			return $this->result;
		}
		
		/*Funcion que obtiene el numero de registros*/
		function db_num_rows( $rs ) {
			switch( $this->typeBase  ) {
				case 'MYSQL':
					$this->numRow = mysql_num_rows( $rs );
				break;
				case 'MSSQL':
					$this->numRow = @mssql_num_rows( $rs );
				break;
				case 'PG':
					$this->numRow = pg_num_rows( $rs );
				break;	
			}
			return $this->numRow;
		}
		
		function sysGetDataFieldSrv($pc_dato) {	
			$pc_dato = ltrim(rtrim($pc_dato));
			$c_data = '';
			$c_data = ($pc_dato == NULL)? '' : ltrim(rtrim($pc_dato));
			return $c_data;
		}

	}
?>
