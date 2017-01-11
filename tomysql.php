<?php
date_default_timezone_set('America/Bogota');
$referencia= " ";
$fecha_servido= date('Y-m-d H:i:s');
$facha_servido= date('F');
$conexion = @mysql_connect("localhost","root","Cable2016") or die("No se encontró el servidor");
mysql_select_db("test",$conexion)or die("No se encontró la base de datos");
$consulta=mysql_query("INSERT INTO reportes (codigoalarma,Activo,Descripcion,Referencia,Serie,Falla,Fabricante,Proveedor,Fecha,Resultado,MES,resuelto) VALUES('$_POST[codfomplus]','$_POST[activo]','$_POST[equipo]','$_POST[referencia]','$_POST[numero]','$_POST[observaciones]','$_POST[fabricante]','$_POST[proveedor]','$fecha_servido','$referencia','$facha_servido','0')") or die (mysql_error());

header("Location: index.html");

?>

