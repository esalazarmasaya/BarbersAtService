<?php $pageid = "../Permission/index.html"; ?>

<div class="content-main">
	
	<!--msgbanner-->
	<?php 
		if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
			echo '
				<div class="banner">
					<h2>
						' . $_SESSION['msg'] . '
					</h2>
				</div>
				';
		}
		
		$_SESSION['msg'] = "";
		/*if (!isset($_SESSION['PageCode5']) && empty($_SESSION['PageCode5'])) {
			$_SESSION['msg'] = "No tiene permiso para ingresar a esta pagina. ";
			echo '
			<meta http-equiv="refresh" content="0; url=../../index.php" />
			<script type="text/javascript">window.location.href = "../main/index.php";</script>';
			
		}*/
	?>
	
	<!--banner-->
	<div class="banner">
		<h2>
			<a href="../main/index.html">Permisos</a>
			<i class="fa fa-angle-right"></i>
			<a href="<?php echo $pageid; ?>">Permisos por Rol</a>
		</h2>
	</div>
	
	<!--//banner-->
	
	<!--content-->
	<div class="grid-form">
 		<div class="grid-form1">
	 		<h3 id="forms-example" class="">Permisos</h3>
			
			</br>
			
			<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'/>
			<form name="form_reloj"> 
				<input type="text" name="reloj" style="background-color:#333333; font-family:'Orbitron', sans-serif; font-size:60px; text-shadow:0px; 0px 1px #fff; color:#FFFFFF; text-align: center;"> 
			</form>
			<script language="JavaScript"> 
				momentoActual = "";
			   	hora =  "";
			   	minuto =  "";
			   	segundo =  "";
			   	horaImprimible =  "";
			   	
				function mueveReloj(horaTrabajo, minutoTrabajo, segundoTrabajo){ 
				   	momentoActual = new Date();
				   	hora = momentoActual.getHours();
				   	minuto = momentoActual.getMinutes();
				   	segundo = momentoActual.getSeconds();
				   	
				   	segundo = segundo + (minuto * 60) + (hora * 3600);
				   	segundoTrabajo = segundoTrabajo + (minutoTrabajo * 60) + (horaTrabajo * 3600);
				   	segundo = segundoTrabajo - segundo;
				   	hora = segundo / 3600 | 0;
				   	segundo = segundo - (hora * 3600);
				   	minuto = segundo / 60 | 0;
				   	segundo = segundo - (minuto * 60);
				   	
				   	if (hora <= 0 && minuto <= 0 && segundo <= 0){
						minuto = 0;
				   		hora = 0;
				   		segundo = 0
					}else{
						setTimeout("mueveRelojAtras()",1000);
					}
					
				
				   	horaImprimible = hora + " : " + minuto + " : " + segundo;
				
				   	document.form_reloj.reloj.value = horaImprimible;
				
				   	
				} 
				
				function mueveRelojAtras(){ 
				   	 
				   	segundo =  segundo - 1;
				   	if (segundo == (0-1)){
				   		segundo = 59;
				   		minuto = minuto - 1;
				   	}
				   	
				   	if (minuto == (0-1)){
				   		minuto = 59;
				   		hora = hora - 1;
				   	}
					
					if (hora <= 0 && minuto <= 0 && segundo <= 0){
						minuto = 0;
				   		hora = 0;
				   		segundo = 0
					}else{
						setTimeout("mueveRelojAtras()",1000);
					}
					
					horaImprimible = hora + " : " + minuto + " : " + segundo;
				
				   	document.form_reloj.reloj.value = horaImprimible;
				   	
				} 
			</script> 
			
			<body onload="mueveReloj(22,0,0)"> 
			
			<?php 
				//fnDeplegarPermissions(); 
				//echo $_SESSION['html'];
				
				

			?>
			
		</div>
		

	</div>
	

	<!--//content-->
	
	
	
	<!---->
	<div class="copy">
		<?php include "../global/footer.php"; ?>
	</div>
</div>