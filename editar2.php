<?php 
include_once("conexion2.php");
include_once("index4.php");

$articulo=$_GET['articulo'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM producto WHERE articulo=$articulo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $articulo = $mostrar['articulo'];
    $id_producto = $mostrar['id_producto'];
    $nombre = $mostrar['nombre'];
	$precio = $mostrar['precio'];
}
?>
<html>
<head>    
		<title>t4</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Articulo</td>
                <td><input type="text" name="txtarticulo" value="<?php echo $articulo;?>" required ></td>
            </tr>
            <tr> 
                <td>Id_producto</td>
                <td><input type="text" name="txtid_producto" value="<?php echo $id_producto;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre del cd</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Precio</td>
                <td><input type="text" name="txtprecio" value="<?php echo $precio;?>"required></td>
            </tr>
                <td colspan="2">
				<a href="index4.php">Cancelar</a>
				<input type="submit" name="btnmodificar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar a este usuario?');">
				</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
	
	if(isset($_POST['btnmodificar']))
{    
	$articulo1 = $_POST['txtarticulo'];
    $id_producto1 = $_POST['txtid_producto'];
	$nombre1 	= $_POST['txtnombre'];
    $precio1 	= $_POST['txtprecio']; 

      
    $querymodificar = mysqli_query($conn, "UPDATE producto SET articulo='articulo1',id_producto='$id_producto1',nombre='$nombre1',precio='$precio1' WHERE articulo=$articulo1");

  	echo "<script>window.location= 'index4.php' </script>";
    
}
?>