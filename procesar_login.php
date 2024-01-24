<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CoDental</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="barra"></div>
    <nav class="menu">
        <div class="logo">
            <a href="index.html"><img src="CoDental.png" alt="Logo de Consultorio"></a>
        </div>
        <ul>
            <li><a href="quiensomos.html" class="elementoscitas">Quienes Somos</a></li>
            <li><a href="noticias.html" class="elementoscitas">Noticias</a></li>
            <li><a href="citas.html" class="elementoscitas">Citas</a></li>
            <li><a href="contacto.html" class="elementoscitas">Contacto</a></li>
            <li><a href="portal.html" class="elementoscitas">Portal</a></li>
            </li>
        </ul>
    </nav>

    <div class="contenido">
        <?php
        // PROCESAR LOGIN

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];

            // CONEXIÓN A LA BASE DE DATOS
            $servername = "localhost";
            $username = "root";
            $password = "";
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
                // Credenciales incorrectas, mostrar mensaje de error
                echo "<div class='mensaje-error'>Usted no tiene autorización. Usuario y contraseña incorrectas.</div>";
            }

            $conn->close();
        } else {
            echo "<div class='mensaje-error'>Acceso no autorizado.</div>";
        }
        ?>
    </div>

    <footer class="piepagina">
        <img src="CoDentalPie.png" alt="Pie de Página">
        <div>
            <a class="redes" href="https://www.facebook.com/" target="_blank"><img src="facebooklogo.png"
                    alt="facebook"></a>
            <a class="redes" href="https://www.instagram.com/" target="_blank"><img src="instagramlogo.png"
                    alt="instagram"></a>
            <p>Copyright © 2024 CoDental. Federación Odontológica Ecuatoriana. Todos los Derechos Reservados
                <br>
                Av. Ordoñez Lasso y Calle Los Pinos, Cuenca- Ecuador
                <br>
            </p>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
