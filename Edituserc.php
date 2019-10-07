<?php
include 'Conexion.php';

if (!empty($_POST)) {
    $id        = $_POST['Id'];
    $Nombre    = $_POST['Nombre'];
    $Clave     = $_POST['Clave'];
    $Pregunta  = $_POST['Pregunta'];
    $Respuesta = $_POST['Respuesta'];
    $Nivel     = $_POST['Nivel'];
    $pass      = sha1($Clave);

    $sqlb  = "UPDATE users_w set nombre_u='$Nombre', pass_u='$pass', pregunta_u='$Pregunta', respuesta_u='$Respuesta', nivel_u='$Nivel' where id_u='$id' ";
    $Resul = $Conexion->query($sqlb);

    if ($Conexion->affected_rows > 0) {?>

<script type="text/javascript">alert("Usuario Editado Exitosamente!"); window.location.assign("Usuarios.php");</script>

<?php } else {?>

<script type="text/javascript">alert("Error!, ingrese campos distintos a los que ya estan registrados!!"); window.location.assign("Usuarios.php"); </script>

<?php }}

?>