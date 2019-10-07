<?php
require "Conexion.php";
include 'include/header.php';
include 'include/sidebar.php';
$id=$_GET['id'];
$sql    = "SELECT * FROM productos_w WHERE id_producto='$id' AND status='activo'";
$Result = $Conexion->query($sql);
$p=mysqli_fetch_assoc($Result);

$sql2    = "SELECT * FROM montos_productos_w WHERE producto_id='$id' AND status = 'activo'";
$Result2 = $Conexion->query($sql2);
$conteo_montos = mysqli_num_rows($Result2);
?>

<div class="main" style="margin-top: 40px;">

<div class="main-content">
<div class="container-fluid">
          <!-- main-->
<button type="button" style="width: 40px; float: right; border: none; background: none;" onclick="volver();"> <i class="fa fa-reply"></i> </button>

<script type="text/javascript">
 volver=function(){
var n1=window.location.assign("Productos.php");}
</script>

<form class="form-horizontal" id="form_producto">
<div> <h2 class="text-info titulo"><strong>Editar Producto</strong></h2></div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="col-md-10" style="margin-left: 9%;">
<div class="control-group">
  <label class="control-label" for="user" >Nombre <span class="text-danger">*</span></label>
  <div class="controls">
  <input type="text" name="nombre" id="nombre" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);"  class="form-control" pattern="[A-Za-z 0-9]*" maxlength="30" required="" value="<?php echo $p['nombre']; ?>"></input>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="nom" >Descripción <span class="text-danger"></span></label>
  <div class="controls">
  <textarea name="descripcion" id="descripcion" onkeyup="mayus(this);" onkeypress="return validar_string_puntos(event);" cols="30" rows="2" class="form-control"><?php echo utf8_encode($p['descripcion']);  ?></textarea>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="prg" >Tipo de Producto:<span class="text-danger">*</span></label>
  <div class="controls">
    <select id="tipo_monto" name="tipo_monto" class="form-control" required onchange="cambiar();">
      <option value="">Seleccione</option>
      <option value="mensual" <?php if($p['tipo'] == 'mensual'){ echo 'selected'; }?>>Mensual</option>
      <option value="moneda virtual" <?php if($p['tipo'] == 'moneda virtual'){ echo 'selected'; }?>>Moneda Virtual</option>
      <option value="llamadas" <?php if($p['tipo'] == 'llamadas'){ echo 'selected'; }?>>Llamadas Online (Team Speak)</option>
    </select>
  </div>
</div>

<div class="div_montos" <?php if($p['tipo'] == 'mensualidad'){ ?> style="margin-top: 20px; opacity: : 0;"<?php }else{?> style="margin-top: 20px; display: block;" <?php } ?>>
  <h4>Ingrese Montos o Planes</h4>
  <div class="table-responsive">  
            <table class="table table-bordered" id="dynamic_field">  
              <?php if($conteo_montos > 0){ ?>
                <?php $i=0; ?>
                <?php while($r = mysqli_fetch_array($Result2)){ 
                    $i++;
                  ?>
                  <?php if($i == 1){ ?>
                  <tr>  
                      <td width="90%"><input type="text" name="montos[]" onkeypress="return validar_string(event);" class="form-control name_list" required value="<?php echo $r['planes']; ?>"></td>  
                      <td><button type="button" name="add" id="add" class="btn btn-success"><span class="fa fa-plus"></span></button></td>  
                  </tr> 
                <?php }else{?>
                       <tr id="row<?php echo $i; ?>"><td><input type="text" name="montos[]" required class="form-control name_list" value="<?php echo $r['planes']; ?>"></td><td><button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">X</button></td></tr>
                <?php } ?>
               <?php } ?>
              <?php } ?>
            </table>  
       </div>
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

function cambiar(){
    var monto = $('#tipo_monto').val();
    if(monto === 'moneda virtual' || monto === 'llamadas'){
      $('.div_montos').css("opacity","100");
      $('.name_list').attr( "required", "");
    }else{
      $('.div_montos').css("opacity","0");
       $('.name_list').removeAttr( "required");
    }
  }


</script>

<script type="text/javascript">
$(document).ready(function(){  
      var i=1;  
      var f=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="montos[]" required class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#form_producto').submit(function(e){     
        e.preventDefault();       
           $.ajax({  
                url:"UpdateProducto.php",  
                method:"POST",  
                data:$('#form_producto').serialize(),  
                success:function(data)  
                {  
                     if(data === '1'){
                      swal({
                        title: "Producto editado con exito",
                        text: "",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                  var delay = 2000;
                  setTimeout(function(){ window.location = "Productos.php"; }, delay);
                     }
                     if(data === '2'){
                      swal('Nombre de producto ya existente','','error');
                     }
                }  
           });  
      });  
 });  
</script>