<?php include_once("conexion.php");  
    $id_cliente = $_POST['txtid_cliente'];
    $codigo = $_POST['txtcodigo'];
    $producto 	= $_POST['txtproducto'];
    $id_producto = $_POST['txtid_producto'];
    $unidades 	= $_POST['txtunidades'];
    
	mysqli_query($conn, "INSERT INTO usuarios (id_cliente,producto,id_producto,unidades) VALUES ($id_cliente,'$producto',$id_producto,$unidades)");
    
header("Location:index2.php");
	

?>