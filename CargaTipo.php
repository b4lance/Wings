<?php

include 'Conexion.php';

$id = $_POST['id'];
$sql    = "SELECT* FROM  montos_productos_w WHERE producto_id='$id' AND status='activo'"; 
$Result = $Conexion->query($sql);
$out = '';
$out .= '<label class="control-label" for="prg" >Montos o Planes:<span class="text-danger">*</span></label>
			<div class="controls">
		<select id="plan" name="plan" class="form-control select2" required>';
			
		

while($row = mysqli_fetch_array($Result)){
	$out .= '<option value="'.$row['id_montos'].'">'.$row['planes'].'</option>';
}

$out .= '</select>
	</div>';

echo $out;
