<?php

$Conexion = new mysqli("localhost", "root", "", "wings_db");
if (mysqli_connect_errno()) {
    echo "Error en la conexion a Base de Datos", mysqli_connect_error();
    exit();
}
