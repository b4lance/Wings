<?php
session_start();
if ($_SESSION['id_usuario']) {
    session_destroy();
    header("location:Index.php");
} else {
    header("location:Index.php");
}
