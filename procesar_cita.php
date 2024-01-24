<?php
// PROCESAMIENTO DE CITAS
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
    $password = "";
    $dbname = "codental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    $sql = "INSERT INTO citas(nombre, telefono, correo, fecha, descripcion, iddoctor)
            VALUES ('$nombre','$telefono','$correo','$fecha','$descripcion','$iddoctor')";

    if ($conn->query($sql) === TRUE) {
        // Redirige al usuario a la página de confirmación
        header("Location: confirmacion_cita.html");
        exit();
    } else {
        echo "Error al programar la cita: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>