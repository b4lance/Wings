<?php
require 'Conexion.php';
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("location: Home.php");
}

if (!empty($_POST)) {

    $Usuario  = mysqli_real_escape_string($Conexion, $_POST['Usuario']);
    $Password = mysqli_real_escape_string($Conexion, $_POST['Password']);
    $error    = '';

    $Pass = sha1($Password); //encrypta la cadena de texto

    $sql    = "SELECT * FROM users_w WHERE usuario_u='$Usuario' AND pass_u='$Pass' AND status_u='activo'";
    $Result = $Conexion->query($sql);
    $row    = $Result->num_rows;

    if ($row > 0) {

        $row = $Result->fetch_assoc();

        $_SESSION['id_usuario'] = $row['id_u'];
        $_SESSION['usuario']    = $row['usuario_u'];
        $_SESSION['nombre']     = $row['nombre_u'];
        $_SESSION['clave']      = $row['pass_u'];
        $_SESSION['nivel']      = $row['nivel_u'];
        $_SESSION['status']     = $row['status_u'];

        header("location:Home.php");?>

	<?php } else {
        $_SESSION['Error'] = "Nombre o Password Incorrecto";
        header("location:Index.php");
    }

}

?>