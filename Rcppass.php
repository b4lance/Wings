<?php
require 'Conexion.php';
//session_start();
/*if (!empty($_POST)) {

$Usuario = mysqli_real_escape_string($con, $_POST['Usuario']);
$error   = '';
$sql     = "SELECT * FROM usuarios where usuario='$Usuario'";
$Result  = $con->query($sql);
$row     = mysqli_num_rows($Result);

if ($row <= 0) {
$_SESSION['ErrorPs'] = "El Usuario:" . " " . $Usuario . " no Existe!";
header("location:RecuperarPassword.php");
} else {
$_SESSION['usuarior'] = $Usuario;
header("location:RecuperarPasswordp.php");
}

}*/
?>


<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Wings</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/login.jpg">
</head>

<body>
	<!-- WRAPPER -->
	<
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
					<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>

<script type="text/javascript">
 volver=function(){
var n1=window.location.assign("Index.php");}

</script>
						<div class="content">

							<div class="header">
								<div class="logo text-center"><h1><a >Wings</a></h1></div>
								<p class="lead"><b>Recuperar Password</b></p>
							</div>
							<form class="form-auth-small" action="ProcesarPass.php" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Usuario</label>
									<input type="text" class="form-control" id="signin-email"  placeholder="Usuario" name="Usuario">
								</div>

								<div class="form-group clearfix">

								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" >Ingresar</button>
								<br>
<p style="font-family: fantasy;">Paso 1 de 3</p>
								<div style="font-size: 16px; color: #cc0000;"><?php echo isset($_SESSION['ErrorPs']) ? utf8_decode($_SESSION['ErrorPs']) : ''; ?></div>

							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading lol" style="margin-top: 300px;">Wings System For Business</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>