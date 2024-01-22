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

        // Consulta para obtener las citas asignadas al doctor
        $sqlCitas = "SELECT * FROM citas WHERE iddoctor = $idDoctor";
        echo "Consulta SQL para Citas: " . $sqlCitas; // Verificar la consulta SQL
        $resultCitas = $conn->query($sqlCitas);

        // Verificar el número de filas devueltas
        echo "Número de Filas de Citas: " . $resultCitas->num_rows;

        echo "<h2>Bienvenido, $doctor</h2>";

        if ($resultCitas->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>ID Doctor</th>
                    </tr>";

            while ($row = $resultCitas->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["telefono"] . "</td>
                        <td>" . $row["correo"] . "</td>
                        <td>" . $row["fecha"] . "</td>
                        <td>" . $row["descripcion"] . "</td>
                        <td>" . $row["iddoctor"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay citas asignadas.</p>";
        }
    } else {
        echo "<p>No se pudo obtener el ID del doctor.</p>";
    }

    $conn->close();
} else {
    header("Location: portal.html");
    exit;
}
?>