<?php
include_once("conexion2.php"); 
?>

<html>
<head>    
        <title>Registro de CDS</title>
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
            <li><a class="active" href="index4.php">CDS</a></li>
            <li><a href="index3.php">Clientes</a></li>
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
            <tr><th colspan="5"><h1>Planilla de productos</h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Registrar producto</a></th></tr>
            <tr>
			<tr>
		    <th>Nro</th>
			<th>Nº del CD</th>
            <th>Id_ del CD</th>
            <th>Nombre del CD</th>
			<th>Precio</th>
            <th>Accion</th>
			</tr>
<?php 

if(isset($_POST['btnbuscar']))
{
    $buscar = $_POST['txtbuscar'];
    $queryproducto = mysqli_query($conn, "SELECT articulo,id_producto,nombre,precio	FROM producto where nombre like '".$buscar."%'");
}
else
{
    $queryproducto = mysqli_query($conn, "SELECT * FROM producto ORDER BY articulo asc");
}
		$numerofila = 0;
        while($mostrar = mysqli_fetch_array($queryproducto))
		{    
            $numerofila++;    
            echo "<tr>";
            echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['articulo']."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['nombre']."</td>";    
			echo "<td>".$mostrar['precio']."</td>";  
            echo "<td style='width:30%'>
            <a href=\"editar2.php?articulo=$mostrar[articulo]\">Modificar</a> | <a href=\"eliminar2.php?articulo=$mostrar[articulo]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[nombre]?')\">Eliminar</a></td>";           
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
  <form action="agregar3.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Registrar Productos</th></tr>
            <tr> 
            <td>articulo</td>
                <td><input type="text" name="txtarticulo" required></td>
            </tr>
            <tr> 
                <td>nombre del cd</td>
                <td><input type="text" name="txtnombre" required></td>
            </tr>
            <tr> 
                <td>precio</td>
                <td><input type="text" name="txtprecio" required></td>
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