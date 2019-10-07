<?php
include 'Conexion.php';
$id = $_POST['id'];
$nombre   = $_POST['nombre'];
$tipo_producto = $_POST['tipo_monto'];

$busca = mysqli_query($Conexion, "SELECT * FROM productos_w WHERE nombre='$nombre' AND id_producto != '$id'") or die("Error: " . mysqli_error($Conexion));
$busca_conteo=mysqli_num_rows($busca);

if($busca_conteo == 0){

	if(isset($_POST['descripcion']) || !empty($_POST['descripcion'])){
		$descripcion=$_POST['descripcion'];
		$query = mysqli_query($Conexion, "UPDATE productos_w SET nombre='$nombre',descripcion='$descripcion',tipo='$tipo_producto' WHERE id_producto='$id'") or die("Error: " . mysqli_error($Conexion));
	}else{
		$query = mysqli_query($Conexion, "UPDATE productos_w SET nombre='$nombre',tipo='$tipo_producto' WHERE id_producto='$id'") or die("Error: " . mysqli_error($Conexion));
	}

  $query2 = mysqli_query($Conexion, "UPDATE montos_productos_w SET status='inactivo' WHERE producto_id='$id'") or die("Error: " . mysqli_error($Conexion));

$number = count($_POST["montos"]);  
 	if($number > 0 && isset($_POST['montos']) && !empty($_POST['montos'])){  
      for($i=0; $i<$number; $i++){  
           if(trim($_POST["montos"][$i] != ''))  
           {  
                $sql = "INSERT INTO montos_productos_w(producto_id,planes) VALUES('$id','".mysqli_real_escape_string($Conexion, $_POST["montos"][$i])."')";  
                mysqli_query($Conexion, $sql);  
           }  
       }    
 	}  

 	if($query){
 		echo 1;
 	}

}else{
    echo 2;
}
	

