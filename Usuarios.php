<?php
include "Conexion.php";
$sql    = "SELECT * from users_w where status_u='activo'";
$Result = $Conexion->query($sql);

?>


<?php include 'include/header.php';

/*if ($_SESSION['id_usuario'] != 1) {
header("location:Home.php");} */?>
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

<form action="BusquedaCitas.php" method="post" class="form-inline">
<div> <h1  class=" text-info titulo"><strong>Usuarios de Sistema</strong></h1></div>

	  <a href="RegistroUsuario.php" ><spam class="btn btn-info" style="border-radius: 5px;">Nuevo Usuario</spam></a>
<br>

<table class="table table-bordered" id="tabla">
<br>
<br>
<thead>
	<tr class="info">
	<th>Usuario</th>
	<th>Nombre</th>

	<th>Nivel</th>
	<th>Editar</th>
	<th>Borrar</th>

	</tr>

</thead>
<tbody>


	 <?php while ($user = mysqli_fetch_array($Result)) {$id = $user['id_u'];?>

	<tr class="">
<td> <?php echo $user['usuario_u']; ?> </td>
<td> <?php echo $user['nombre_u']; ?> </td>
	<td><?php echo $user['nivel_u']; ?></td>
	<td><center><a href="Edituser.php?id=<?php echo $id; ?>" > <spam class="lnr lnr-pencil btn btn-warning" > </spam></a></center></td>
	<td><center><a href="DeleteUser.php?id=<?php echo $id; ?>" ><spam class="lnr lnr-trash btn btn-danger" onclick="return validarD();" > </spam></a></center></td>
	</tr>
<script type="text/javascript" src="js/sha1.js"></script>

<script type="text/javascript">



function validar(){

var pas=prompt("Ingrese el Password");
var pass=hex_sha1(pas);



var passs="<?php //echo $_SESSION['clave']; ?>";

if (pass!=passs) {

alert("Password Incorrecto");
window.location.assign("Usuarios.php");
 return false;}

}

function validarD(){




 if (!(confirm('¿Esta seguro que desea eliminar el Usuario?'))){
       return false; }

}




		</script>

<?php }?>

<script type="text/javascript">
	$(document).ready(function(){
    $('#tabla').DataTable();
});
</script>




				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<?php include 'include/footer.php'?>