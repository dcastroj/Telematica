<?php
$var1 = "";
$var2 = "";
$id= $_POST["ideso"];

  
$conexion = @mysql_connect("localhost","root","Cable2016") or die("No se encontró el servidor");
mysql_select_db("test",$conexion)or die("No se encontró la base de datos");

$consulta=mysql_query("SELECT codala,ref FROM test.equipos WHERE idequipos='$id'");
$var1 = mysql_result($consulta,0, "codala");
$var2 = mysql_result($consulta,0, "ref");
echo "codigo:".mysql_result($consulta, 0, "codala")."_"; 
echo "referecia:".mysql_result($consulta, 0, "ref"); 


?>