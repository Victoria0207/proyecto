<?php 
include_once("conexion1.php");
include_once("index3.php");

$id_cliente=$_GET['id_cliente'];
 
$querybuscar = mysqli_query($conn, "SELECT * FROM cliente WHERE id_cliente=$id_cliente");
 
while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_cliente = $mostrar['id_cliente'];
    $nombre = $mostrar['nombre'];
    $apellido = $mostrar['apellido'];
	$telefono = $mostrar['telefono'];
    $dni = $mostrar['dni'];
    $domicilio = $mostrar['domicilio'];
    $numero = $mostrar['numero'];
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
                <td>Id_cliente</td>
                <td><input type="text" name="txtid_cliente" value="<?php echo $id_cliente;?>" required ></td>
            </tr>
            <tr> 
                <td>Nombre</td>
                <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>" required></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="txtapellido" value="<?php echo $apellido;?>" required></td>
            </tr>
            <tr> 
                <td>Teléfono</td>
                <td><input type="text" name="txttelefono" value="<?php echo $telefono;?>"required></td>
            </tr>
            <tr>
				<tr> 
                <td>Dni</td>
                <td><input type="text" name="txtdni" value="<?php echo $dni;?>" required ></td>
            </tr>
			<tr> 
                <td>Calle</td>
                <td><input type="text" name="txtdomicilio" value="<?php echo $domicilio;?>" required ></td>
            </tr>
           <tr> 
                <td>Nº de casa</td>
                <td><input type="text" name="txtnumero" value="<?php echo $numero;?>" required ></td>
            </tr>
                <td colspan="2">
				<a href="index3.php">Cancelar</a>
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
	$nombre1 	= $_POST['txtnombre'];
	$apellido1    = $_POST['txtapellido'];
    $telefono1 	= $_POST['txttelefono']; 
	$dni1 	= $_POST['txtdni'];
	$domicilio1 	= $_POST['txtdomicilio'];
    $numero1     = $_POST['txtnumero'];
      
    $querymodificar = mysqli_query($conn, "UPDATE cliente SET id_cliente='$id_cliente1',nombre='$nombre1',apellido='$apellido1',telefono='$telefono1',dni='$dni1',domicilio='$domicilio1',numero='$numero1' WHERE id_cliente=$id_cliente1");

  	echo "<script>window.location= 'index3.php' </script>";
    
}
?>