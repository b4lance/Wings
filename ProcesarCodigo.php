<?php
include 'Conexion.php';
session_start();

$codigo   = $_POST['codigo'];
$producto = $_POST['producto'];
$usuario = $_SESSION['id_usuario'];

if (isset($_POST['serial'])) {
    $serial = $_POST['serial'];
    $plan = $_POST['plan'];

    $query2 = mysqli_query($Conexion, "INSERT INTO codigos_w(producto_id,usuario_id,codigo_producto,serial_producto,monto_valor)VALUES('$producto','$usuario','$codigo','$serial','$plan')") or die("Error: " . mysqli_error($Conexion));
}else{
    $query2 = mysqli_query($Conexion, "INSERT INTO codigos_w(producto_id,usuario_id,codigo_producto)VALUES('$producto','$usuario','$codigo')") or die("Error: " . mysqli_error($Conexion));
}

if($query2){
  echo 1;
}


