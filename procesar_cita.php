<?php
//PROCESAMIENTO DE CITAS
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $fecha = $_POST["fecha"];
    $descripcion = $_POST["descripcion"];
    $iddoctor = $_POST["iddoctor"];

    // CONEXIÓN A LA BASE DE DATOS
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    // Verificar si el script llega hasta aquí
    die("Script llegó hasta aquí");

    $sql = "INSERT INTO citas(nombre, telefono, correo, fecha, descripcion, iddoctor)
            VALUES ('$nombre','$telefono','$correo','$fecha','$descripcion','$iddoctor')";

    if ($conn->query($sql) == TRUE) {
        // Imprime el ID de la última fila insertada
        echo "Cita programada con éxito. ID de la cita: " . $conn->insert_id;
        // Cierra la conexión
        $conn->close();
    } else {
        echo "Error al programar la cita: " . $conn->error;
    }
} else {
    echo "Acceso no autorizado.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirección</title>
    <script>
        // Redirección a confirmacion.html
        window.location.href = "confirmacion.html";
    </script>
</head>
<body>
    <!-- No es necesario contenido en el cuerpo -->
</body>
</html>