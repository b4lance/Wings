<?php
require 'conexion.php';

//$sql="SELECT id_usuario, nivel FROM usuarios WHERE id_usuario=2";
//$Result=$con->query($sql);
//$row=$Result->fetch_assoc(); ?>

<?php include 'include/header.php';
//if ($_SESSION['id_usuario']!=1) {
//header("location:Home.php"); } ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php include 'include/sidebar.php'?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- main-->
<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>

<script type="text/javascript">
 volver=function(){
var n1=window.location.assign("Home.php");}
</script>

<form  class="form-horizontal" id="form">
<div> <h2 class="text-info titulo"><strong>Registro Usuario</strong></h2></div>

<div class="col-md-10" style="margin-left: 9%;">
<div class="control-group">
	<label class="control-label" for="user" >Usuario</label>
	<div class="controls">
	<input type="text" name="Usuario" title="" id="user" value=""  class="form-control" pattern="[A-Za-z 0-9]*" maxlength="30" required=""></input>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="nom" >Nombre</label>
	<div class="controls">
	<input  type="text" name="Nombre" title="Ingrese solo caracteres de tipo letra "  pattern="[A-Za-z ]*" id="nom" value="" maxlength="50" class="form-control"  required=""></input>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="pass" >Password</label>
	<div class="controls">
	<input  type="password" name="Password" title="El password debe coincidir" id="pass" value="" class="form-control" minlength="8" pattern="[A-Za-z 0-9]*" maxlength="30" required=""></input>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="cpass" > Confirmar Password</label>
	<div class="controls">
	<input  type="password" name="ComfPassword" title="El password debe coincidir" id="cpass" value="" minlength="8" maxlength="30" pattern="[A-Za-z 0-9]*" class="form-control" pattern="[A-Za-z 0-9]*"  required=""></input>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="prg" >Pregunta Secreta</label>
	<div class="controls">
	<select id="prg" name="Pregunta" class="form-control"required="">
	<option value="0">Seleccione</option>
	<option value="Nombre de mi Madre">¿Nombre de mi madre?</option>
	<option value="Nombre de mi padre">¿Nombre de mi padre?</option>
	<option value="Lugar de Nacimiento">¿Lugar de Nacimiento?</option>
	<option value="Nombre de mi primera mascota">¿Nombre de mi primera mascota?</option>
	<option value="Comida Favorita">¿Comida Favorita?</option>
	<option value="Banda musical Favorita">¿Banda musical Favorita?</option>
		</select>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="resp">Respuesta</label>
	<div class="controls">
	<input  type="password" name="Respuesta" title="Ingrese solo caracteres de tipo letra" id="resp" value="" pattern="[A-Z a-z]*" class="form-control" maxlength="30" required=""></input>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="Nivel" >Nivel de Usuario</label>
	<div class="controls">
	<select id="Nivel" name="Nivel" class="form-control" required="">
	<option value="0">Seleccione</option>
	<option value="Administrador">Administrador</option>
	<option value="Empleado">Empleado</option>
	</select>
	</div>
</div>


<br>
					<center><button onclick="cargar();" class="btn btn-success">Registrar Nuevo Usuario</button>
							&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="reset" class="btn btn-danger" onclick="return pregunta();">Reestablecer</button> </center>

</div>
		</form>

		<script type="text/javascript">


		function pregunta(){
    if (!(confirm('¿Esta seguro que desea reestablecer los datos, los campos ingresados se borraran?'))){
       return false; }
							}

function cargar(){


$.post("ProcesarUsuario.php", {"Usuario":$('#user').val(),"Nombre":$('#nom').val(),"Password":$('#pass').val(),"Pregunta":$('#prg').val(),"Respuesta":$('#resp').val(),"Nivel":$('#Nivel').val()}, function(devuelta){

			var datos = devuelta;

			if (datos==1) {
				alert("Registro Exitoso");
			}

			if (datos==0) {
				alert("Error en el Registro");
				}

				if (datos==2) {
				alert("El Usuario ya Existe");
				}

		});

};

		</script>

		<script type="text/javascript" src="js/ValidarUsuario.js"></script>
</div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<?php include 'include/footer.php'?>