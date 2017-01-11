<?php
session_start();
$var = $_POST['txt'];
$_SESSION['placa'] = $var;
echo $_SESSION['placa'];
?>