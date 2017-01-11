 <?php

 $servername = "127.0.0.1";
  $username = "root";
  $password = "johndavid";
  $dbname = "mydb";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Conexion Fallida: " . $conn->connect_error);
  } 
    ?><div class="alert alert-success" id="estadodb
     ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Conexion a Base de Datos <strong>Exitosa!</strong>
        </div>
 <?php
  $sql = $conn->query("select * from mydb.route");
  $locations = array();
  while ($row = $sql->fetch_array(MYSQLI_ASSOC)){
    $locations[] = $row["lat"] . ", " . $row["lng"];
}
  // --------------------------


?>
