<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $tipo_contacto = $_POST["tipo_contacto"];
    $mensaje = $_POST["mensaje"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO formulario_contacto (nombre, correo, telefono, tipo_contacto, mensaje)
            VALUES ('$nombre','$correo','$telefono','$tipo_contacto','$mensaje')";

   
    if ($conn->query($sql) === TRUE) {
        
        echo "¡Formulario enviado con éxito!";
    } else {
        
        echo "Error al enviar el formulario: " . $conn->error;
    }

    $conn->close();
} 
?>

