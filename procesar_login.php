<?php
// PROCESAR LOGIN

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // CONEXIÓN A LA BASE DE DATOS
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión Fallida: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales del usuario
    $sql = "SELECT * FROM doctores WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente
        // Iniciar sesión y redirigir al portal del doctor
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: portal_doctor.php");
        exit;
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos. Por favor, inténtelo nuevamente.";
    }

    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
