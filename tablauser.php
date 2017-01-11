<?php

function displayTable($sql){

   //Creamos la conexión
   $server = "localhost";
   $user = "root";
   $pass = "Cable2016";
   $BD = "test";
   $sql = "select idusers,username,email,password,codigo from test.users ";
   $conexion = mysqli_connect($server,$user,$pass,$BD);
   //generamos la consulta
   if(!$result = mysqli_query($conexion, $sql)) die();

   $rawdata = array();
   //guardamos en un array multidimensional todos los datos de la consulta
   $i=0;

   while($row = mysqli_fetch_array($result))
   {
       $rawdata[$i] = $row;
       $i++;
   }

   $close = mysqli_close($conexion);

   //DIBUJAMOS LA TABLA

   echo '<table width="100%" border="1" style="text-align:center;">';
   $columnas = count($rawdata[0])/2;
   //echo $columnas;
   $filas = count($rawdata);
   //echo "<br>".$filas."<br>";

   //Añadimos los titulos

   for($i=1;$i<count($rawdata[0]);$i=$i+2){
      next($rawdata[0]);
      echo "<th><b>".key($rawdata[0])."</b></th>";
      next($rawdata[0]);
   }

   for($i=0;$i<$filas;$i++){

      echo "<tr>";
      for($j=0;$j<$columnas;$j++){
         echo "<td>".$rawdata[$i][$j]."</td>";

      }
      echo "</tr>";
   }

   echo '</table>';

}



displayTable($sql);
?>
<style>
fieldset {
    font-family: sans-serif;
    border: 5px solid #1F497D;
    background: #ddd;
    border-radius: 5px;
    padding: 15px;
}
fieldset legend {
    background: #1F497D;
    color: #fff;
    padding: 5px 10px ;
    font-size: 32px;
    border-radius: 5px;
    box-shadow: 0 0 0 5px #ddd;
    margin-left: 20px;
}
.boton{
        font-size:10px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#638cb5;
        border:0px;
        width:140px;
        height:19px;
       }
</style>
<br/>
<br/>
 <form action="registerNuser.php" method="post"> 
 <section style="margin: 10px;">
<fieldset style="width:700px">

  <legend>ACTUALIZACION DE REGISTROS</legend>
     ID fila que desea actualizar: <br/>
     <input type="text" name="username" value="" /> 
     <br/>
     <br/>
     Resultado:
    <div class="form-group"> 
    <label class="col-md-4 control-label"></label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
    <select name="password" class="form-control selectpicker" >
      <option value=" " >Por favor ingrese el resultado</option>
      <option>1</option>
      <option>2</option>
      
    </select>
  </div>
</div>
</div>
<br/>
     <input type="submit" value="Actualizar" /> 
</fieldset>
 </form>
<br/>
<br/>
<div>
  <form name="form1" action="tabla.php"  method="post">
    <input type="submit" value="Reportes" class="boton">
  </form>
</div>
<div>
  <form name="form1" action="logout.php?logout"  method="post">
    <input type="submit" value=" Cerrar Sesion " class="boton">
  </form>
</div>
