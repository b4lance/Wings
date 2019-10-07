<?php
include 'Conexion.php';

$Usuario   = $_REQUEST['Usuario'];
$Nombre    = $_REQUEST['Nombre'];
$Password  = $_REQUEST['Password'];
$Pregunta  = $_REQUEST['Pregunta'];
$Respuesta = $_REQUEST['Respuesta'];
$Nivel     = $_REQUEST['Nivel'];

$Pass = sha1($Password);

$busqueda = mysqli_query($Conexion, "SELECT usuario_u FROM users_w AS u WHERE u.usuario_u='$Usuario' ") or die("Error: " . mysqli_error($Conexion));
$b        = mysqli_num_rows($busqueda);

if ($b <= 0) {

    $query = mysqli_query($Conexion, "INSERT INTO users_w(id_u,usuario_u,pass_u,nombre_u,nivel_u,pregunta_u,respuesta_u)VALUES(null,'$Usuario','$Pass','$Nombre','$Nivel','$Pregunta','$Respuesta')") or die("Error: " . mysqli_error($Conexion));

    if ($query) {

        echo 1;
    } else {

        echo 0;
    }

} else {

    echo 2;
}
