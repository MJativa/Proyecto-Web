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
    // Obtener el ID del doctor
    $sqlDoctor = "SELECT id FROM doctores WHERE usuario = '$doctor'";
    $resultDoctor = $conn->query($sqlDoctor);

    if ($resultDoctor->num_rows > 0) {
        $rowDoctor = $resultDoctor->fetch_assoc();
        $idDoctor = $rowDoctor["id"];

        // Consulta para obtener las citas asignadas al doctor
        $sqlCitas = "SELECT * FROM citas WHERE iddoctor = $idDoctor ORDER BY fecha ASC";
        $resultCitas = $conn->query($sqlCitas);

        echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Citas - CoDental - Tu Sonrisa, Nuestra Prioridad</title>
                    <link rel='stylesheet' href='estilos.css'>
                </head>
                <body>
                    <script src='scripts.js'></script>
                    <div class='barra'></div>
                <nav class='menu'>
                    <div class='logo'>
                        <a href='index.html'><img src='CoDental.png' alt='Logo de Consultorio'></a>
                    </div>
                    <ul>
                        <li><a href='quiensomos.html' class='elementoscitas'>Quienes Somos</a></li>
                        <li><a href='noticias.html' class='elementoscitas'>Noticias</a></li>
                        <li><a href='citas.html' class='elementoscitas'>Citas</a></li>
                        <li><a href='contacto.html' class='elementoscitas'>Contacto</a></li>
                        <li><a href='portal.html' class='elementoscitas'>Portal</a></li>
                    </ul>
                </nav>";

        echo "<h2>Bienvenido, $doctor</h2>";

        if ($resultCitas->num_rows > 0) {
            echo "<div class='tabla-citas'>
                    <table>
                        <!-- Encabezados de la tabla -->
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                            <th>ID Doctor</th>
                            <th>Acciones</th>
                        </tr>";

            while ($row = $resultCitas->fetch_assoc()) {
                echo "<tr>
                        <!-- Datos de la cita -->
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["telefono"] . "</td>
                        <td>" . $row["correo"] . "</td>
                        <td>" . $row["fecha"] . "</td>
                        <td>" . $row["descripcion"] . "</td>
                        <td>" . $row["iddoctor"] . "</td>
                        <td>
                            <!-- Botones de acciones con llamadas a funciones JavaScript -->
                            <button class='envio' onclick='eliminarCita(" . $row["id"] . ")'>Eliminar</button>
                            <button class='envio' onclick='modificarCita(" . $row["id"] . ")'>Modificar</button>
                        </td>
                    </tr>";
            }
            echo "</table></div>";
        } else {
            echo "<p>No hay citas asignadas.</p>";
        }
    } else {
        echo "<p>No se pudo obtener el ID del doctor.</p>";
    }

    echo "<form action='cerrar_sesion.php' method='post'>
            <button class='envio' type='submit'>Cerrar Sesión</button>
          </form>";

    echo "<footer class='piepagina'>
    <img src='CoDentalPie.png' alt='Pie de Página'>
    <div>
        <a class='redes' href='https://www.facebook.com/' target='_blank'><img src='facebooklogo.png' alt='facebook'></a>
        <a class='redes' href='https://www.instagram.com/' target='_blank'><img src='instagramlogo.png' alt='instagram'></a>
        <p>Copyright © 2024 CoDental. Federación Odontológica Ecuatoriana. Todos los Derechos Reservados
            <br>
            Av. Ordoñez Lasso y Calle Los Pinos, Cuenca- Ecuador
            <br>
                </p>
            </div>
            </footer>";

    // Cierre de la conexión a la base de datos
    $conn->close();

} else {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header("Location: portal.html");
    exit;
}
?>
<script src="script.js"></script>
</body>
</html>