<?php
include 'Conexion.php';
session_start();

$id=$_POST['id'];
$codigo   = $_POST['codigo'];
$producto = $_POST['producto'];

if (isset($_POST['serial'])) {
    $serial = $_POST['serial'];
    $plan = $_POST['plan'];

    $query2 = mysqli_query($Conexion, "UPDATE codigos_w SET producto_id='$producto',codigo_producto='$codigo',serial_producto='$serial',monto_valor='$plan' WHERE id_codigo='$id'") or die("Error: " . mysqli_error($Conexion));
}else{
    $query2 = mysqli_query($Conexion, "UPDATE codigos_w SET producto_id='$producto',codigo_producto='$codigo' WHERE id_codigo='$id'") or die("Error: " . mysqli_error($Conexion));
}

if($query2){
  echo 1;
}


