<?php
include "Conexion.php";
$sql    = "SELECT * FROM productos_w where status='activo'";
$Result = $Conexion->query($sql);
include 'include/header.php';
include 'include/sidebar.php'
?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
<div class="main-content">
		<div class="container-fluid">
					<!-- main-->
	<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>


	<div> <h1  class=" text-info titulo"><strong>Productos</strong></h1></div>

	  <a href="RegistroProducto.php" ><spam class="btn btn-info" style="border-radius: 5px;">Nuevo Producto</spam></a>
		<br><br>
	
	<div class="table-responsive">
	<table class="table table-bordered" id="tabla" >

		<thead>
			<tr class="info">
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Tipo</th>
				<th>Editar</th>
				<!--<th>Borrar</th>-->
			</tr>

		</thead>
		<tbody>
		<?php while ($user = mysqli_fetch_array($Result)) {
			$id = $user['id_producto'];
		?>
			<tr class="">
				<td> <?php echo  utf8_encode($user['nombre']); ?> </td>
				<td> <?php
				if($user['descripcion']){
				 echo utf8_encode($user['descripcion']); 
				}else{
					echo 'NO POSEE';
				}?> </td>
				
				<td><?php 
					if($user['tipo'] == 'mensual'){
						echo 'MENSUAL';
					}else if($user['tipo'] == 'moneda virtual'){
						echo 'MONEDA VIRTUAL';
					}else{
						echo 'LLAMADAS ONLINE(TEAMSPEAK)';
					}
				?></td>
				
				<td><center><a href="EditProducto.php?id=<?php echo $id; ?>" class="btn btn-warning"> <span class="lnr lnr-pencil"> </span></a></center></td>
				<!--<td><center><button onclick="eliminar('<?php echo $id; ?>')" class="btn btn-danger"><span class="lnr lnr-trash"> </span></button></center></td>-->
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

</div>
</div>
			<!-- END MAIN CONTENT -->
</div>
	<!-- END MAIN -->
<?php include 'include/footer.php'?>

<script>
	function eliminar(id){
      swal({
      title: 'Eliminar Producto',
      text: "¿Desea eliminar este Producto?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'No, cancelar!',
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-primary',
      buttonsStyling: false
      }).then(function () {
            $.ajax({
                url:"DeleteProducto.php",
                type:"POST",
                data: 'id='+id,
                success:function(respuesta){
                    swal({
                        title: "Producto eliminado con exito",
                        text: "",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                	var delay = 2000;
                	setTimeout(function(){ window.location = "Productos.php"; }, delay);
                }
            });
            return true;    
      }, function (dismiss) {
    })
    }
</script>