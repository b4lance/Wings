<?php

include 'Conexion.php';

if (!empty($_GET)) {

    $id = $_GET['id'];

    $sql    = "UPDATE users_w set status_u='inactivo' where id_u='$id'";
    $Result = $Conexion->query($sql);

    if ($Conexion->affected_rows > 0) {?>

<script type="text/javascript">alert("Eliminación de Usuario Completado!"); window.location.assign("Usuarios.php");</script>

<?php } else {?>

	<script type="text/javascript">alert("Error, el Usuario no fue Eliminado!"); window.location.assign("Usuarios.php");</script>

	<?php }}?>