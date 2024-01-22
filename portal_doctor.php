<?php
session_start();

if(isset($_SESSION["usuario"])){
    $doctor = $_SESSION["usuario"];
    echo "<h2>Bienvenido, Dr. $doctor</h2>";
}
else{
    header("Location: portal.html");
    exit;
}
?>
