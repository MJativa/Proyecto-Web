<?php
session_start();

if (isset($_SESSION["usuario"])) {
    $doctor = $_SESSION["usuario"];

    $servername = "localhost";
    $username = "root";
    $password = "";
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
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $idCita = $_GET["id"];

            // Consulta para obtener la información de la cita
            $sqlCita = "SELECT * FROM citas WHERE id = $idCita AND iddoctor = $idDoctor";
            $resultCita = $conn->query($sqlCita);

            if ($resultCita->num_rows > 0) {
                $rowCita = $resultCita->fetch_assoc();

                // Verificar si se envió el formulario de modificación
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Procesar los datos del formulario y realizar la modificación en la base de datos
                    $nuevoNombre = $_POST["nombre"];
                    $nuevoTelefono = $_POST["telefono"];
                    $nuevoCorreo = $_POST["correo"];
                    $nuevaFecha = $_POST["fecha"];
                    $nuevaDescripcion = $_POST["descripcion"];
                    // Agrega más campos según sea necesario

                    // Consulta para actualizar la cita
                    $sqlActualizarCita = "UPDATE citas SET
                                            nombre = '$nuevoNombre',
                                            telefono = '$nuevoTelefono',
                                            correo = '$nuevoCorreo',
                                            fecha = '$nuevaFecha',
                                            descripcion = '$nuevaDescripcion'
                                            WHERE id = $idCita";

                    if ($conn->query($sqlActualizarCita) === TRUE) {
                        echo "<script>alert('Cita modificada exitosamente.'); window.location.href = 'portal_doctor.php';</script>";
                    } else {
                        echo "Error al modificar la cita: " . $conn->error;
                    }
                } else {
                    // Mostrar formulario prellenado con la información de la cita
                    echo "<!DOCTYPE html>
                            <html lang='es'>
                            <head>
                                <meta charset='UTF-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                                <title>Modificar Cita - CoDental</title>
                                <link rel='stylesheet' href='estilos.css'>
                            </head>
                            <body>
                                <script src='scripts.js'></script>
                                <div class='barra'></div>
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

                    echo "<h2>Modificar Cita</h2>";
                    echo "<form action='modificar_cita.php?id=$idCita' method='post'>
                            <label for='nombre'>Nombre:</label>
                            <input type='text' name='nombre' value='" . $rowCita["nombre"] . "' required><br>

                            <label for='telefono'>Teléfono:</label>
                            <input type='tel' name='telefono' value='" . $rowCita["telefono"] . "' required><br>

                            <label for='correo'>Correo:</label>
                            <input type='email' name='correo' value='" . $rowCita["correo"] . "' required><br>

                            <label for='fecha'>Fecha:</label>
                            <input type='date' name='fecha' value='" . $rowCita["fecha"] . "' required><br>

                            <label for='descripcion'>Descripción:</label>
                            <textarea name='descripcion' required>" . $rowCita["descripcion"] . "</textarea><br>
                            <!-- Agrega más campos según sea necesario -->

                            <button type='submit' class='envio'>Guardar Cambios</button>
                          </form>";

                    echo "<form action='portal_doctor.php'>
                            <button type='submit' class='envio'>Cancelar</button>
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
                }
            } else {
                echo "<p>No se encontró la cita.</p>";
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