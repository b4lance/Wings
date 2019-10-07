<?php

include 'include/header.php';
include 'include/sidebar.php';
include 'Conexion.php';


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
<div> <h2 class="text-info titulo"><strong>Cargar Codigos</strong></h2></div>

<div class="col-md-10" style="margin-left: 9%;">


<div class="control-group">
	<label class="control-label" for="prg" >Producto:<span class="text-danger">*</span></label>
	<div class="controls">
		<select id="producto" name="producto" class="form-control select2" required onchange="verifica_type();">
			<option value="">Seleccione</option>
			<?php 
          while($row= mysqli_fetch_array($productos)){
       ?>
          <option value="<?php echo $row['id_producto']; ?>"><?php echo $row['nombre']; ?></option>
     <?php } ?>
		</select>
	</div>
</div>

<div class="control-group" id="div_tipo" style="display: none;">
  
</div>

<div id="div_cargar" style="display:none;">
  
</div>


<br>
<center><button type="submit" class="btn btn-success">Registrar</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button type="reset" class="btn btn-danger" onclick="return pregunta();">Reestablecer</button> </center>

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
                url:"ProcesarCodigo.php",  
                method:"POST",  
                data:$('#form_producto').serialize(),  
                success:function(data)  
                {  
                     if(data === '1'){
                       swal('Excelente','Producto guardado con exito','success');
                       $('#codigo').val('');
                       $('#serial').val('');
                     }
                     if(data === '2'){
                     	swal('Codigo ya existente, intenta de nuevo','','error');
                     }
                }  
           });  
      });  
 });  
</script>