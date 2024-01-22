<?php
session_start();

if(isset($_SESSION["usuario"])){
    $doctor = $_SESSION["usuario"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Conexión Fallida: " . $conn->connect_error);
    }

    $sql = "SELECT citas.*, doctores.nombre as nombre_doctor
        FROM citas
        INNER JOIN doctores ON citas.iddoctor = doctores.id
        WHERE citas.iddoctor = '$doctor'";
    $result = $conn->query($sql);

    echo "<h2>Bienvenido, $doctor</h2>";

    if($result->num_rows > 0){
        echo "<table border='1'>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>ID Doctor</th>
                </tr>";

        while($row = $result->fetch_assoc()){
            echo "<tr>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["telefono"]."</td>
                    <td>".$row["correo"]."</td>
                    <td>".$row["fecha"]."</td>
                    <td>".$row["descripcion"]."</td>
                    <td>".$row["iddoctor"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay citas asignadas.</p>";
    }

    $conn->close();
} else{
    header("Location: portal.html");
    exit;
}
?>