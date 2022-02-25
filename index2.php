<?php
include_once("conexion.php"); 
?>

<html>
<head>    
        <title>Pedidos</title>
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
            <li><a href="index3.php">ClienteS</a></li>
            <li><a class="active" href="index2.php">Pedidos</a></li>

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
            <tr><th colspan="6"><h1>Planilla de pedidos </h1><th><a style="font-weight: normal; font-size: 14px;" onclick="abrirform()">Hacer pedido</a></th></tr>
            <tr>
		    <th>Nro</th>
			<th>Id_cliente</th>
            <th>Id_pedido</th>
            <th>Nombre del CD</th>
            <th>Id_ del CD</th>
            <th>Unidades</th>
			<th>Accion</th>
			</tr>
<?php 

if(isset($_POST['btnbuscar']))
{
    $buscar = $_POST['txtbuscar'];
$queryusuarios = mysqli_query($conn, "SELECT id_cliente,codigo,producto,id_producto,unidades FROM usuarios where nombre like '".$buscar."%'");
}
else
{
$queryusuarios = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY codigo asc");
}
		$numerofila = 0;
        while ($mostrar = mysqli_fetch_array($queryusuarios))
		{    
            $numerofila++;    
            echo "<tr>";
            echo "<td>".$numerofila."</td>";
            echo "<td>".$mostrar['id_cliente']."</td>";
            echo "<td>".$mostrar['codigo']."</td>";
            echo "<td>".$mostrar['producto']."</td>";
            echo "<td>".$mostrar['id_producto']."</td>";
            echo "<td>".$mostrar['unidades']."</td>";      
            echo "<td style='width:15%'>
            <a href=\"editar.php?codigo=$mostrar[codigo]\">Modificar</a> | <a href=\"eliminar.php?codigo=$mostrar[codigo]\" onClick=\"return confirm('¿Estás seguro de eliminar a $mostrar[id_cliente]?')\">Eliminar</a></td>";           
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
  <form action="agregar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Registrar Pedidos</th></tr>
        <tr>  
            <td>id_cliente</td>
                <td><input type="text" name="txtid_cliente" required></td>
            </tr>
            <tr> 
                <td>nombre del cd</td>
                <td><input type="text" name="txtproducto" required></td>
            </tr>
           <tr>  
            <td>id_del CD</td>
                <td><input type="text" name="txtid_producto" required></td>
            </tr>
            <tr> 
                <td>unidades</td>
                <td><input type="text" name="txtunidades" required></td>
            </tr>
			
            <tr> 	
               <td colspan="5">
				   <button type="button" onclick="cancelarform()">Cancelar</button>
				   <input type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar a este usuario?');">
			</td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>