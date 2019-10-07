<?php

include 'Conexion.php';

$id = $_POST['id'];

$sql    = "SELECT * FROM  productos_w WHERE id_producto='$id'"; 
$Result = $Conexion->query($sql);
$producto = mysqli_fetch_assoc($Result);

if($producto['tipo'] == 'mensual' ){
	echo 'mensual';
}

if($producto['tipo'] == 'moneda virtual' ){
	echo 'moneda virtual';
}
 if($producto['tipo'] == 'llamadas' ) {
 	echo 'llamadas';
 }
