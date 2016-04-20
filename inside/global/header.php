<?php 
	session_start();
	
	
	
	if (isset($_POST['btn_logout'])){
		session_destroy();
		$_SESSION = array();
		session_start();
		$_SESSION['msg'] = "Sesión cerrada exitosamente";
		echo '
			<meta http-equiv="refresh" content="0; url=../../index.php" />
			<script type="text/javascript">window.location.href = "../../index.php";</script>';
	}
	
	if (!isset($_SESSION['usermail']) && empty($_SESSION['usermail'])){
		session_destroy();
		$_SESSION = array();
		session_start();
		echo '
			<meta http-equiv="refresh" content="0; url=../../index.php" />
			<script type="text/javascript">window.location.href = "../../index.php";</script>';
	}
	
	include("../../config/connection.php");
	include("functions/Fn_InsertsUpdatesDeletes.php");
	include("functions/fnCrearTablaHtmlDeTabla.php");
	include("functions/functions.php");
	
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		
		<title>MINT BARBER & CREW</title>
		<link href="../../images/mint_icon.ico" type="image/x-icon" rel="shortcut icon" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="../../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom Theme files -->
		<link href="../../css/style.css" rel='stylesheet' type='text/css' />
		<link href="../../css/font-awesome.css" rel="stylesheet"> 
		<script src="../../js/jquery.min.js"> </script>
		<!-- Mainly scripts -->
		<script src="../../js/jquery.metisMenu.js"></script>
		<script src="../../js/jquery.slimscroll.min.js"></script>
		<!-- Custom and plugin javascript -->
		<link href="../../css/custom.css" rel="stylesheet">
		<script src="../../js/custom.js"></script>
		<script src="../../js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);
			
			if (!screenfull.enabled) {
				return false;
			}
			
			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			
		});
		</script>
		
		<!----->
		
		<!--pie-chart--->
		<script src="../../js/pie-chart.js" type="text/javascript">
		</script>
		
		<script type="text/javascript">
			$(document).ready(function () 
			{
				$('#demo-pie-1').pieChart({
					barColor: '#3bb2d0',
					trackColor: '#eee',
					lineCap: 'round',
					lineWidth: 8,
					onStep: function (from, to, percent) 
					{
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});
				
				$('#demo-pie-2').pieChart({
				barColor: '#fbb03b',
				trackColor: '#eee',
				lineCap: 'butt',
				lineWidth: 8,
				onStep: function (from, to, percent) {
					$(this.element).find('.pie-value').text(Math.round(percent) + '%');
				}
				});
				
				
				$('#demo-pie-3').pieChart({
					barColor: '#ed6498',
					trackColor: '#eee',
					lineCap: 'square',
					lineWidth: 8,
					onStep: function (from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});
			});
		</script>
		
		<!--skycons-icons-->
		<script src="../../js/skycons.js"></script>
		<!--//skycons-icons-->
	
	</head>

	