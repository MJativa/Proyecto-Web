<?php
session_start();

if(isset($_SESSION["usuario"])){
    $doctor = $_SESSION["usuario"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codental";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Conexión Fallida: " . $conn->connect_error);
    }

    $sql = "SELECT citas.*, doctores.nombre as nombre_doctor
        FROM citas
        INNER JOIN doctores ON citas.iddoctor = doctores.id
        WHERE citas.iddoctor = '$doctor'";
    $result = $conn->query($sql);

    echo "<html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Portal - CoDental - Tu Sonrisa, Nuestra Prioridad</title>
                <link rel='stylesheet' href='estilos.css'> <!-- Vincula tus estilos generales -->
                <link rel='stylesheet' href='estilos_citas.css'> <!-- Vincula tus estilos específicos para citas -->
            </head>
            <body>
                <script src='scripts.js'></script>
                <div class='barra'></div>
                <nav class='menu'>
                    <div class='logo'>
                        <a href='index.html'><img src='CoDental.png' alt='Logo de Consultorio'></a>
                    </div>
                    <ul>
                        <li><a href='quiensomos.html' class='elementoscontacto'>Quienes Somos</a></li>
                        <li><a href='noticias.html' class='elementoscontacto'>Noticias</a></li>
                        <li><a href='citas.html' class='elementoscontacto'>Citas</a></li>
                        <li><a href='contacto.html' class='elementoscontacto'>Contacto</a></li>
                        <li><a href='portal.html' class='elementoscontacto'>Portal</a></li>
                    </ul>
                </nav>";

    echo "<h2>Bienvenido, $doctor</h2>";

    if($result === FALSE) {
        die("Error en la consulta: " . $conn->error);
    }

    if($result->num_rows > 0){
        echo "<table>
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
        </footer>
    </body>
</html>";

    $conn->close();
} else{
    header("Location: portal.html");
    exit;
}
?>