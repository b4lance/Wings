<?php
session_start();
$Usuario = $_SESSION['usuarior'];

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
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
					<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>

<script type="text/javascript">
 volver=function(){
var n1=window.location.assign("Rcppass2.php");}

</script>
						<div class="content">
							<div class="header">
								<div class="logo text-center"><h1><a >Wings</a></h1></div>
								<p class="lead"><b>Recuperar Password</b></p>
							</div>
							<form class="form-auth-small" action="ProcesarPsn.php" method="POST">
						     <input type="hidden" name="PS" value="<?php echo $Usuario; ?>">
						     <div class="control-group">
						     <label class="control-label" for="usu" >Usuario</label>
								<div class="form-group">
									<input type="text" class="form-control" id="usu" value="<?php echo $Usuario ?>" name="Usuario" disabled>
								</div>
							</div>

								<div class="control-group">
									<label class="control-label" for="prg" >Nuevo Password</label>
									<div class="controls">
									<input type="Password" class="form-control" value="" minlength="8" name="Password">
									</div>
								</div>
<br>
								<div class="control-group">
									<label class="control-label" for="resp">Confirmar Password</label>
									<div class="controls">
									<input  type="Password" name="CPassword" title="" id="resp" value="" minlength="8" class="form-control"  ></input>
									</div>
								</div>

								<div class="form-group clearfix">

								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" >Ingresar</button>
								<p style="font-family: fantasy; margin-top: 6px;">Paso 3 de 3</p>



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