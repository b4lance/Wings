<?php require 'Conexion.php';
session_start();
if (!empty($_POST)) {

    $Usuario = mysqli_real_escape_string($Conexion, $_POST['Usuario']);

    $sql    = "SELECT * FROM users_w where usuario_u='$Usuario' and status_u='Activo'";
    $Result = $Conexion->query($sql);
    $row    = mysqli_num_rows($Result);

    if ($row <= 0) {
        ?>

	<script type="text/javascript">alert("El usuario no existe"); window.location.assign("Rcppass.php");</script>

	<?php
} else {
        $_SESSION['usuarior'] = $Usuario;
        header("location:Rcppass2.php");
    }

}
?>