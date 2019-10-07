<?php
session_start();
date_default_timezone_set('America/Caracas');

if (!$_SESSION['id_usuario']) {
    header("location:Index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Wings</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/login.jpg">
	<!--sweetalert-->
	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
	<!--dataTables-->
	<link rel="stylesheet" type="text/css" href="DataTables-1.10.16/media/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<link href="assets/css/select2.min.css" rel="stylesheet" />

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
			<!-- NAVBAR -->
		<h1 ><strong><a href="Home.php">Wings System For Business</a></strong></h1>



				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>




			</div>
		</nav>
