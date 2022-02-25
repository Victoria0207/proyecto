<?php
include_once("conexion1.php"); 
?>

<html>
<head>    
        <title>Clientes</title>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

    <table>
        <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#" class="enlace">
            <img src="logo.png" alt="" class="logo">
        </a>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a class="nosotros" href="nosotros.html">Nosotros</a></li>
            <li><a href="index4.php">CDS</a></li>
            <li><a class="active" href="index3.php">Clientes</a></li>
            <li><a href="index2.php">Pedidos</a></li>

             </ul>
     </nav>
      <table>
        <div id="barrabuscar">
        <form method="POST">
        <input type="submit" value="Buscar" name="btnbuscar"><input type="text" name="txtbuscar" id="cajabuscar" placeholder="&#128270;Ingresar nombre de usuario">
        </form>
        </div>
            </div>
        <div class="lista">
            <tr><th colspan="8"><h1>Planilla de clientes </h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Registrar cliente</a></th></tr>
            <tr>
			<tr>
		    <th>Nro</th>
			<th>Id_cliente</th>
            <th>Nombre</th>
            <th>Apellido</th>
			<th>Telefono</th>
            <th>Dni</th>
            <th>Calle</th>
            <th>Nº de casa</th>
            <th>Accion</th>
			</tr>
<?php 

if(isset($_POST['btnbuscar']))
{
    $buscar = $_POST['txtbuscar'];
    $querycliente = mysqli_query($conn, "SELECT id_cliente,nombre,apellido,telefono,dni,domicilio,numero  FROM id_cliente where nombre like '".$buscar."%'");
}
else
{
$querycliente = mysqli_query($conn, "SELECT * FROM cliente ORDER BY id_cliente asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($querycliente))
		{    
            $numerofila++;    
            echo "<tr>";
            echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_cliente']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";
            echo "<td>".$mostrar['apellido']."</td>";    
			echo "<td>".$mostrar['telefono']."</td>";  
            echo "<td>".$mostrar['dni']."</td>";
            echo "<td>".$mostrar['domicilio']."</td>";
            echo "<td>".$mostrar['numero']."</td>";
            echo "<td style='width:26%'>
            <a href=\"editar1.php?id_cliente=$mostrar[id_cliente]\">Modificar</a> | <a href=\"eliminar1.php?id_cliente=$mostrar[id_cliente]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
}
?>
    </table>

<script>
function abrirform() {
  document.getElementById("formregistrar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formregistrar").style.display = "none";
}

</script>

<div class="caja_popup" id="formregistrar">
  <form action="agregar1.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Nuevo usuario</th></tr>
            <tr> 
                <td>nombre</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>apellido</td>
                <td><input type="text" name="txtapellido" required></td>
            </tr>
            <tr> 
                <td>teléfono</td>
                <td><input type="text" name="txttelefono" required></td>
            </tr>
            <tr> 
                <td>dni</td>
                <td><input type="text" name="txtdni" required></td>
            </tr>
            <tr> 
                <td>calle</td>
                <td><input type="text" name="txtdomicilio" required></td>
            </tr>
                  <tr> 
                <td>nº de casa</td>
                <td><input type="text" name="txtnumero" required></td>
            </tr>

            <tr> 	
               <td colspan="7">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>