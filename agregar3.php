<?php include_once("conexion.php");  
    $articulo = $_POST['txtarticulo'];
    $id_producto = $_POST['txtid_producto'];
    $nombre 	= $_POST['txtnombre'];
    $precio 	= $_POST['txtprecio'];
    
	mysqli_query($conn, "INSERT INTO producto (articulo,nombre,precio) VALUES ($articulo,'$nombre',$precio)");
    
header("Location:index4.php");
	

?>