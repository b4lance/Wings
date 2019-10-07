<?php

include 'include/header.php';
include 'include/sidebar.php';
include 'Conexion.php';
$id=$_GET['id'];
$q_c = mysqli_query($Conexion, "SELECT * FROM codigos_w INNER JOIN productos_w ON productos_w.id_producto=codigos_w.producto_id WHERE codigos_w.status='disponible' AND codigos_w.id_codigo='$id'") or die("Error: " . mysqli_error($Conexion));
$codigo = mysqli_fetch_assoc($q_c);
$productos = mysqli_query($Conexion, "SELECT * FROM productos_w WHERE status='activo'") or die("Error: " . mysqli_error($Conexion));
?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main" style="margin-top: 40px;">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- main-->
<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>

<script type="text/javascript">
 volver=function(){
var n1=window.location.assign("Home.php");}
</script>

<form class="form-horizontal" id="form_producto">
  <input type="hidden" id="id_codigo" name="id" value="<?php echo $id; ?>">
<div> <h2 class="text-info titulo"><strong>Editar Codigo</strong></h2></div>

<div class="col-md-10" style="margin-left: 9%;">


<div class="control-group">
	<label class="control-label" for="prg" >Producto:<span class="text-danger">*</span></label>
	<div class="controls">
		<select id="producto" name="producto" class="form-control select2" required onchange="verifica_type();">
			<option value="">Seleccione</option>
			<?php 
          while($row= mysqli_fetch_array($productos)){
       ?>
          <option value="<?php echo $row['id_producto']; ?>" <?php if($row['id_producto'] == $codigo['producto_id']){ echo 'selected';}?>><?php echo $row['nombre']; ?></option>
     <?php } ?>
		</select>
	</div>
</div>

<div class="control-group" id="div_tipo">
  
</div>

<div id="div_cargar">
    <?php if($codigo['tipo'] == 'mensual'){
      echo '<div class="control-group"><label class="control-label" for="nom" >Llave: <span class="text-danger">*</span></label><div class="controls"><input name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" value="'.$codigo['codigo_producto'].'" required></div></div>';
    ?>

     <?php }else if($codigo['tipo'] == 'moneda_virtual'){
      echo '<div class="control-group"><label class="control-label" for="nom" >Codigo: <span class="text-danger">*</span></label><div class="controls"><input value="'.$codigo['codigo_producto'].'" name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div> <div class="control-group"><label class="control-label" for="nom" >Serial: <span class="text-danger">*</span></label><div class="controls"><input value="'.$codigo['serial_producto'].'" name="serial" id="serial" required onkeyup="mayus(this);" onkeypress=""class="form-control"></div></div>';
    }else{?>

     <?php 
      echo '<div class="control-group"><label class="control-label" for="nom" >IP: <span class="text-danger">*</span></label><div class="controls"><input value="'.$codigo['codigo_producto'].'" name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div> <div class="control-group"><label class="control-label" for="nom" >Llave: <span class="text-danger">*</span></label><div class="controls"><input value="'.$codigo['serial_producto'].'" name="serial" id="serial" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div>';
    } ?>
</div>


<br>
<center><button type="submit" class="btn btn-success">Registrar</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" class="btn btn-danger" onclick="return pregunta();">Restablecer</button> </center>

</div>
</form>
</div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<?php include 'include/footer.php'?>

<script type="text/javascript">
function pregunta(){
    if (!(confirm('¿Esta seguro que desea reestablecer los datos, los campos ingresados se borraran?'))){
       return false; }
}

<?php if ($codigo['tipo'] == 'moneda virtual' || $codigo['tipo'] == 'llamadas'){?>
    carga_ahora(<?php echo $codigo['id_producto'];?>,<?php echo $codigo['monto_valor'];?>);
    function carga_ahora(id,diferencia){
     $.ajax({  
                url:"CargaTipoUpdate.php",  
                method:"POST",  
                data:'id='+id+'&diferencia='+diferencia,  
                success:function(data)  
                { 
                  $('#div_tipo').css('display','block');
                  $('#div_tipo').html(data);
                 
                }  
      });  
  }
<?php }else{ ?>
      
<?php } ?>

function carga_tipo(id){
     $.ajax({  
                url:"CargaTipo.php",  
                method:"POST",  
                data:'id='+id,  
                success:function(data)  
                { 
                  $('#div_tipo').css('display','block');
                  $('#div_tipo').html(data);
                }  
      });  
}

function carga_contenido(contenido){
    $('#div_cargar').css('display','block');

      if(contenido === 'mensual'){
        $('#div_cargar').html('<div class="control-group"><label class="control-label" for="nom" >Llave: <span class="text-danger">*</span></label><div class="controls"><input name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div>');
      }

      if(contenido === 'moneda virtual'){
        $('#div_cargar').html('<div class="control-group"><label class="control-label" for="nom" >Codigo: <span class="text-danger">*</span></label><div class="controls"><input name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div> <div class="control-group"><label class="control-label" for="nom" >Serial: <span class="text-danger">*</span></label><div class="controls"><input name="serial" id="serial" required onkeyup="mayus(this);" onkeypress=""class="form-control"></div></div>');
      }

      if(contenido === 'llamadas'){
        $('#div_cargar').html('<div class="control-group"><label class="control-label" for="nom" >IP: <span class="text-danger">*</span></label><div class="controls"><input name="codigo" id="codigo" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div> <div class="control-group"><label class="control-label" for="nom" >Llave: <span class="text-danger">*</span></label><div class="controls"><input name="serial" id="serial" onkeyup="mayus(this);" onkeypress=""class="form-control" required></div></div>');
      }
}

function verifica_type(){
    var producto = $('#producto').val();
     $.ajax({  
                url:"VerificaTipoProducto.php",  
                method:"POST",  
                data:'id='+producto,  
                success:function(data)  
                {  
                  if(data == 'mensual'){
                      $('#div_tipo').css('display','none');
                      carga_contenido(data);
                  }

                  if(data == 'moneda virtual'){
                      carga_tipo(producto);
                      carga_contenido(data);
                  }

                  if(data == 'llamadas'){
                    carga_tipo(producto);
                    carga_contenido(data);
                  }


                }  
           });  
}
</script>

<script type="text/javascript">
$(document).ready(function(){  
    
      $('#form_producto').submit(function(e){     
      	e.preventDefault();       
           $.ajax({  
                url:"UpdateCodigo.php",  
                method:"POST",  
                data:$('#form_producto').serialize(),  
                success:function(data)  
                {  
                     if(data === '1'){
                       swal({
                        title: "Codigo editado con exito",
                        text: "",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                  var delay = 2000;
                  setTimeout(function(){ window.location = "Codigos.php"; }, delay);
                     }
                     if(data === '2'){
                     	swal('Codigo ya existente, intenta de nuevo','','error');
                     }
                }  
           });  
      });  
 });  
</script>