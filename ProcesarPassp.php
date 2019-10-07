<?php
require 'Conexion.php';
session_start();

$Usuario = $_SESSION['usuarior'];

$sqlb    = "SELECT u.pregunta_u, u.respuesta_u, u.usuario_u from users_w AS u where usuario_u='$Usuario' ";
$Resultb = $Conexion->query($sqlb);
$arrayb  = mysqli_fetch_assoc($Resultb);

$r = $arrayb['respuesta_u'];

if (!empty($_POST)) {

    $Respuesta = mysqli_real_escape_string($Conexion, $_POST['Respuesta']);

    if ($Respuesta == $r) {
        header("location:Newpass.php");
    } else {?>
		<script type="text/javascript">alert("La Respuesta es incorrecta"); window.location.assign("Rcppass2.php");</script>
<?php }

}

?>