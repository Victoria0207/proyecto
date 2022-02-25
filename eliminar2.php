<?php
include_once("conexion2.php");
 
$articulo = $_GET['articulo'] ;
 
mysqli_query($conn, "DELETE FROM producto WHERE articulo = $articulo ") or die("problemas en el select".mysqli_error($conn));
mysqli_close($conn); 
header("Location:index4.php");

?>