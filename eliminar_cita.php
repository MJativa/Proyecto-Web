<?php
session_start();

if (isset($_SESSION["usuario"])) {
    $doctor = $_SESSION["usuario"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    // Obtener el ID del doctor
    $sqlDoctor = "SELECT id FROM doctores WHERE usuario = '$doctor'";
    $resultDoctor = $conn->query($sqlDoctor);

    if ($resultDoctor->num_rows > 0) {
        $rowDoctor = $resultDoctor->fetch_assoc();
        $idDoctor = $rowDoctor["id"];

        // Verificar si se proporcionó un ID de cita válido
        // Verificar si se proporcionó un ID de cita válido
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $idCita = $_GET["id"];

    // Verificar si el doctor tiene permisos para eliminar esta cita
    $sqlVerificarCita = "SELECT * FROM citas WHERE id = $idCita AND iddoctor = $idDoctor";
    $resultVerificarCita = $conn->query($sqlVerificarCita);

    if ($resultVerificarCita->num_rows > 0) {
        // El doctor tiene permisos para eliminar esta cita

        // Consulta para eliminar la cita
        $sqlEliminarCita = "DELETE FROM citas WHERE id = $idCita";

        if ($conn->query($sqlEliminarCita) === TRUE) {
            echo "<script>alert('Registro eliminado con éxito.'); window.location.href = 'portal_doctor.php';</script>";
        } else {
            echo "Error al eliminar la cita: " . $conn->error;
        }
    } else {
        echo "<p>No tienes permisos para eliminar esta cita.</p>";
    }
} else {
    echo "<p>ID de cita no válido.</p>";
}

    } else {
        echo "<p>No se pudo obtener el ID del doctor.</p>";
    }

    // Cierre de la conexión a la base de datos
    $conn->close();

} else {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header("Location: portal.html");
    exit;
}
?>