<?php
require 'Conexion.php';

if (isset($_GET)) {
    $id = $_GET['id'];

    $sql    = "SELECT * FROM users_w where id_u='$id'";
    $Result = $Conexion->query($sql);
    $datos  = mysqli_fetch_assoc($Result);
}

?>




<?php include 'include/header.php'?>

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
var n1=window.location.assign("Usuarios.php");}
</script>

<form action="Edituserc.php" method="post" class="form-horizontal">
<div> <h2  class=" text-info titulo"><strong>Editar Usuario</strong></h2></div>



<input type="hidden" name="Id" value="<?php echo $id; ?>">



<div  class="control-group">
	<label class="control-label" for="Nombreu">Nombre</label>
	<div class="controls">
		<input type="text" name="Nombre" class="form-control" id="Nombreu" value="<?php echo $datos['nombre_u'] ?>" required>
	</div>
</div>

<div  class="control-group">
	<label class="control-label" for="vçclave">Password</label>
	<div class="controls">
		<input type="password" name="Clave" maxlength="12" minlength="6" class="form-control" id="vçclave" value="<?php echo $datos['pass_u'] ?>" required>
	</div>
</div>


<div class="control-group">
	<label class="control-label" for="prg" >Pregunta Secreta</label>
	<div class="controls">
	<select id="prg" name="Pregunta" class="form-control" required="">
	<option disabled value="<?php echo $datos['pregunta_u']; ?>" disabled><?php echo $datos['pregunta_u']; ?></option>
	<option value="Nombre de mi Madre">¿Nombre de mi madre?</option>
	<option value="Nombre de mi padre">¿Nombre de mi padre?</option>
	<option value="Lugar de Nacimiento">¿Lugar de Nacimiento?</option>
	<option value="Nombre de mi primera mascota">¿Nombre de mi primera mascota?</option>
	<option value="Comida Favorita">¿Comida Favorita?</option>
	<option value="Banda musical Favorita">¿Banda musical Favorita?</option>
		</select>
	</div>
</div>

<div  class="control-group">
	<label class="control-label" for="Resp">Respuesta</label>
	<div class="controls">
		<input type="text" name="Respuesta" class="form-control" id="Resp" value="<?php echo $datos['respuesta_u'] ?>" required>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="Nivel" >Nivel de Usuario</label>
	<div class="controls">
	<select id="Nivel" name="Nivel" class="form-control" required="">
	<option disabled value="<?php echo $datos['nivel_u']; ?>" ><?php echo $datos['nivel_u']; ?> </option>
	<option value="Administrador">Administrador</option>
	<option value="Empleado">Empleado</option>
	</select>
	</div>
</div>



<br>



					<center><button type="submit" class="btn btn-success" name="">Editar Usuario</button>
&nbsp;&nbsp;&nbsp;&nbsp;
					<button type="reset" class="btn btn-danger" onclick="return pregunta();">Reestablecer</button> </center>
</form>

<script type="text/javascript">

		function pregunta(){
    if (!(confirm('¿Esta seguro que desea reestablecer los datos, los campos ingresados se borraran?'))){
       return false; }
}
		</script>




				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

		<?php include 'include/footer.php'?>