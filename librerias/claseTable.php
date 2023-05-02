<?php
	class claseTable
	{
		public static function show($id,$class,$rows,$cols)
		{
			$mostrar="
				<table
					id=$id
					class='$class'
				>	
					<colgroup>
			";
			
			for( $c=1; $c<=$cols; $c++ ){
				$mostrar.="
						<col class='col-$id-$c'>
				";
			}
			
			$mostrar.="
					</colgroup>
					<thead>
						<tr id='$id-thead'>
			";
			
			for( $c=1; $c<=$cols; $c++ ){
					$mostrar.="
							<th id='$id-th-$c'></th>
					";			
			}
			
			$mostrar.="
						</tr>
					</thead>
					<tfoot>
						<tr id='$id-tfoot'>
			";
			
			for( $c=1; $c<=$cols; $c++ ){
					$mostrar.="
							<td id='$id-tf-$c'></td>
					";			
			}
			$mostrar.="
						</tr>
					</tfoot>
					<tbody>
			";
			
			for( $r=1; $r<=$rows; $r++ ){
					$mostrar.="
						<tr id='$id-tr$r'>
					";			
				for( $c=1; $c<=$cols; $c++ ){
						$mostrar.="
							<td id='$id-tr$r-td$c'></td>
						";			
				}
					$mostrar.="
						</tr>
					";
			}

			$mostrar.="
					</tbody>
				</table>
			";
		return $mostrar;
		}
	}
?>