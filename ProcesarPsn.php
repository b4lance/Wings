<?php
require 'Conexion.php';
session_start();

if (!empty($_POST)) {

    $Usuario = $_POST['PS'];

    $Password  = mysqli_real_escape_string($Conexion, $_POST['Password']);
    $CPassword = mysqli_real_escape_string($Conexion, $_POST['CPassword']);
    trim($Password);
    trim($CPassword);

    if ((empty($Password)) || (empty($CPassword))) {?>

    <script type="text/javascript">alert("Ingrese el Password"); window.location.assign("Newpass.php");</script>

<?php }

    if (($Password == $CPassword) && (!empty($Password))) {

        $pass  = sha1($CPassword);
        $sql   = "UPDATE users_w SET pass_u='$pass' WHERE usuario_u='$Usuario'";
        $Resul = $Conexion->query($sql);

    } else {?>

<script type="text/javascript">alert("El Password no coincide"); window.location.assign("Newpass.php");</script>

<?php }

    if ($Conexion->affected_rows > 0) {

        ?>

    <script type="text/javascript">alert("Nuevo Password Exitoso!"); window.location.assign("Index.php");</script>

<?php session_destroy();}

    if ($Conexion->affected_rows == 0) {

        ?>

    <script type="text/javascript">alert("Ingrese un Password, Distinto al anterior.."); window.location.assign("Newpass.php");</script>



   <?php }}?>



