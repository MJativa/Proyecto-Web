<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "codental";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los odontólogos
$sql = "SELECT * FROM doctores";
$result = $conn->query($sql);

$odontologos = [];

if ($result->num_rows > 0) {
    // Obtener los datos de la consulta
    while ($row = $result->fetch_assoc()) {
        $odontologos[] = [
            $row["nombre"],
            $row["telefono"],
            $row["correo"],
            $row["consultorio"],
            $row["especialidad"],
            $row["imagen"]
        ];
    }
}

// Cerrar la conexión
$conn->close();
?>
