<?php include_once("conexion1.php");  
    $id_cliente = $_POST['txtid_cliente'];
    $nombre 	= $_POST['txtnombre'];
    $apellido 	= $_POST['txtapellido'];
    $telefono 	= $_POST['txttelefono'];
    $dni 	= $_POST['txtdni'];
    $domicilio 	= $_POST['txtdomicilio'];
    $numero 	= $_POST['txtnumero'];

  mysqli_query($conn, "INSERT INTO cliente (nombre,apellido,telefono,dni,domicilio,numero) VALUES ('$nombre','$apellido',$telefono,$dni,'$domicilio','$numero')");

header("Location:index3.php");
	

?>