<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    if($usuario == "Doctor Murphy" && $contrasena == "m10d0nt0l0g14"){
        $_SESSION["usuario"] = $usuario;
        header("Location: portal_doctor.php");
        exit;
    } 
    elseif ($usuario == "Doctor Pearce" && $contrasena == "d0ct0r0d0nt0"){
        $_SESSION["usuario"] = $usuario;
        header("Location: portaldoctor.php");
        exit;
    } else {
        header("Location: portal.html");
        exit;
    }
}
?>