<?php
include 'Conexion.php';

if (!empty($_POST)) {
    $id = $_POST['id'];

    $sql    = "UPDATE codigos_W set status='cancelado' where id_codigo='$id'";
    $Result = $Conexion->query($sql);

}?>