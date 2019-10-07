<?php
include "Conexion.php";
$sql    = "SELECT * FROM codigos_w INNER JOIN productos_W ON codigos_w.producto_id=productos_w.id_producto where codigos_w.status='disponible' ORDER BY codigos_w.id_codigo DESC";
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


	<div> <h1  class=" text-info titulo"><strong>Administración de Codigos</strong></h1></div>

	  <a href="RegistroProducto.php" ><spam class="btn btn-info" style="border-radius: 5px;">Nuevo Producto</spam></a>
		<br><br>
	
	<div class="table-responsive">
	<table class="table table-bordered" id="tabla" >

		<thead>
			<tr class="info">
				<th>Codigo-Llave-IP</th>
				<th>Serial</th>
				<th>Producto</th>
				<th>Valor</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>

		</thead>
		<tbody>
		<?php while ($row = mysqli_fetch_array($Result)) {
			$id=$row['id_codigo'];
			?>
			<tr class="">
				<td><?php echo $row['codigo_producto'];?></td>
				<td><?php echo $row['serial_producto'];?></td>
				<td><?php echo $row['nombre'];?></td>
				<td><?php 
					$out='';
					$product=$row['monto_valor'];
					$p= $Conexion->query("SELECT * FROM montos_productos_w WHERE id_montos='$product'");
					$busca = mysqli_num_rows($p);
					if($busca > 0){
						$listado_montos=mysqli_fetch_assoc($p);
						$pl=$listado_montos['planes'];
						$out .= $pl;
					}else{
						$out .= 'Mensual';
					}
					echo $out;	
				?></td>
				<td><center><a href="EditCodigo.php?id=<?php echo $id; ?>" class="btn btn-warning"> <span class="lnr lnr-pencil"> </span></a></center></td>
				<td><center><button onclick="eliminar('<?php echo $id; ?>')" class="btn btn-danger"><span class="lnr lnr-trash"> </span></button></center></td>
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
      title: 'Eliminar Codigo',
      text: "¿Desea eliminar este Codigo?",
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
                url:"DeleteCodigo.php",
                type:"POST",
                data: 'id='+id,
                success:function(respuesta){
                    swal({
                        title: "Codigo eliminado con exito",
                        text: "",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                	var delay = 2000;
                	setTimeout(function(){ window.location = "Codigos.php"; }, delay);
                }
            });
            return true;    
      }, function (dismiss) {
    })
    }
</script>