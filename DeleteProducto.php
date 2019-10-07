<?php
include 'Conexion.php';

if (!empty($_POST)) {
    $id = $_POST['id'];

    $sql    = "UPDATE productos_w set status='inactivo' where id_producto='$id'";
    $Result = $Conexion->query($sql);

}?>