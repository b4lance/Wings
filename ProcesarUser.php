<?php
require 'Conexion.php';
session_start();
/*$sql    = "SELECT id_usuario, nivel FROM usuarios WHERE id_usuario=2";
$Result = $con->query($sql);
$row    = $Result->fetch_assoc();*/

if (!empty($_POST)) {

    $Usuario   = mysqli_real_escape_string($Conexion, $_POST['Usuario']);
    $Nombre    = mysqli_real_escape_string($Conexion, $_POST['Nombre']);
    $Password  = mysqli_real_escape_string($Conexion, $_POST['Password']);
    $Psecreta  = $_POST['Pregunta'];
    $Respuesta = mysqli_real_escape_string($Conexion, $_POST['Respuesta']);
    $Nivel     = $_POST['Nivel'];
    $Pass      = sha1($Password);

    $tsql    = "SELECT * FROM users_w WHERE usuario_u='$Usuario'";
    $tResult = $Conexion->query($tsql);
    $trow    = mysqli_num_rows($tResult);

    if ($trow <= 0) {

        /*$idusuario = $_SESSION['id_usuario'];
        $accion    = "Registro al Usuario: " . $Usuario . " asignado a:" . " " . $Nombre;
        date_default_timezone_set('America/Caracas');
        $fecha = date('d/m/Y');
        $hora  = date('g:ia');*/

        /*$con->query("INSERT INTO bitacora(id, id_usuario, accion, fecha, hora)VALUES(null,'$idusuario','$accion','$fecha','$hora')");*/

        $Conexion->query("INSERT INTO users_w (id_u,usuario_u,nombre_u,pass_u,pregunta_u,respuesta_u,nivel_u) VALUES (NULL,'$Usuario','$Nombre','$Pass','$Psecreta','$Respuesta','$Nivel')");?>

<script type="text/javascript">alert("Registro Exitoso!"); window.location.assign("Home.php");</script>

<?php } else {?>
<script type="text/javascript">
var usuario="<?php echo $Usuario; ?>"
alert("El Usuario:"+" "+usuario+" "+"ya Existe, Ingrese un Usuario Distinto!"); window.location.assign("RegistroUser.php"); </script>
<?php }
}
?>