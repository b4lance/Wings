<?php
include 'Conexion.php';

$nombre   = $_POST['nombre'];
$tipo_producto = $_POST['tipo_monto'];

$query = mysqli_query($Conexion, "SELECT * FROM productos_w WHERE nombre='$nombre' AND status='activo'") or die("Error: " . mysqli_error($Conexion));
$consulta = mysqli_num_rows($query);

if ($consulta == 0) {

	if(isset($_POST['descripcion']) || !empty($_POST['descripcion'])){
		$descripcion=$_POST['descripcion'];
		$query = mysqli_query($Conexion, "INSERT INTO productos_w(nombre,descripcion,tipo)VALUES('$nombre','$descripcion','$tipo_producto')") or die("Error: " . mysqli_error($Conexion));
	}else{
		$query = mysqli_query($Conexion, "INSERT INTO productos_w(nombre,tipo)VALUES('$nombre','$tipo_producto')") or die("Error: " . mysqli_error($Conexion));
	}


    $id_producto=mysqli_insert_id($Conexion);

  
 	if(isset($_POST['montos']) && !empty($_POST['montos'])){  
    $number = count($_POST["montos"]);  
      for($i=0; $i<$number; $i++){  
           if(trim($_POST["montos"][$i] != ''))  
           {  
                $sql = "INSERT INTO montos_productos_w(producto_id,planes) VALUES('$id_producto','".mysqli_real_escape_string($Conexion, $_POST["montos"][$i])."')";  
                mysqli_query($Conexion, $sql);  
           }  
       }    
 	}  

 	if($query){
 		echo 1;
 	}
	

} else {

    echo 2;
}
