<?php

	function fnCrearTablaHtmlDeTabla($tabla, $conEncabezados1Sin0){
		$value = '<table class="tbl">';
		for($filas = 1; $filas <= $tabla[0][0] ; $filas++){
				if($conEncabezados1Sin0 == 1 && $filas == 1){
					$value = $value . '<tr class="tr-hdr">';
				}else{
					if($filas == 1){
						
					}
					else {
						$value = $value . '<tr class="tr">';
					}
				}
				
				for($col = 0; $col <= $tabla[0][1]-1; $col++){
					if($conEncabezados1Sin0 == 1 && $filas == 1){
						$value = $value . '<td class="td-hdr">' . $tabla[$filas][$col] . '</td>';
					}else{
						if($filas == 1){
							
						}
						else {
							$value = $value . '<td class="td">' . $tabla[$filas][$col] . '</td>';
						}
					}
					
				}
				$value = $value . '</tr>';
		}
		$value = $value . '</table>';
		
		return $value;
	}
	
?>