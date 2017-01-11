<?php

require("config.inc.php");

if (!empty($_POST)) {

    if (empty($_POST['username']) || empty($_POST['password'])) {
        
        $response["success"] = 0;
        $response["message"] = "Por favor ingrese el ID y el estado";
        
      
    }
   
   
     // juan: NOMBRE TABLA

    $query = "UPDATE reportes SET resuelto = '1', resultado = (:pass) WHERE RF = (:user)";
    
    $query_params = array(
        ':user' => $_POST['username'],
        ':pass' => $_POST['password']
    );
    
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {

        
        $response["success"] = 0;
        $response["message"] = "Error base de datos2. Porfavor vuelve a intentarlo";
        
    }
    
 header("Location: tabla.php");
    // HTML QUE SE OBSERVA  
    
} else {
?>
 <h1>Actualizar registro</h1> 
 <form action="registerN.php" method="post"> 
     ID fila que desea actualizar:
     <input type="text" name="username" value="" /> 
     <br /><br /> 
     Nuevo resultado:
     <input type="text" name="password" value="" /> 
     <br /><br /> 
     <input type="submit" value="Actualizar" /> 
 </form>
 <?php
}

?>