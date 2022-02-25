<?php 
include_once("conexion.php");
include_once("index2.php");

$codigo=$_GET['codigo'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM usuarios WHERE codigo=$codigo");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_cliente = $mostrar['id_cliente'];
    $codigo = $mostrar['codigo'];
    $producto = $mostrar['producto'];
    $id_producto = $mostrar['id_producto'];
    $unidades = $mostrar['unidades'];
}
?>
<html>
<head>    
		<title>t4</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="caja_popup2" id="formmodificar">
  <form method="POST" class="contenedor_popup" >
        <table>
		<tr><th colspan="2">Modificar usuario</th></tr>
		     <tr> 
                <td>Id_cliente</td>
                <td><input type="text" name="txtid_cliente" value="<?php echo $id_cliente;?>" required ></td>
            </tr>
            <tr>
				<tr> 
                <td>Producto</td>
                <td><input type="text" name="txtproducto" value="<?php echo $producto;?>" required ></td>
            </tr>
            <tr> 
                <td>Id_producto</td>
                <td><input type="text" name="txtid_producto" value="<?php echo $id_producto;?>" required ></td>
            </tr>
			<tr> 
                <td>Unidades</td>
                <td><input type="text" name="txtunidades" value="<?php echo $unidades;?>" required ></td>
            </tr>
                <td colspan="2">
				<a href="index2.php">Cancelar</a>
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
	$id_cliente1 = $_POST['txtid_cliente'];
    $codigo1 = $_POST['txtcodigo'];
	$producto1 	= $_POST['txtproducto'];
    $id_producto1 = $_POST['txtid_producto'];
	$unidades1 	= $_POST['txtunidades'];
      
    $querymodificar = mysqli_query($conn, "UPDATE usuarios SET id_cliente='$id_cliente1',codigo='$codigo1',producto='$producto1',id_producto='$id_producto1',unidades='$unidades1' WHERE codigo=$codigo1");

  	echo "<script>window.location= 'index2.php' </script>";
    
}
?>