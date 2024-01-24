<!DOCTYPE html>
<html>
    <head>
        <title>Contacto - CoDental - Tu Sonrisa, Nuestra Prioridad</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <script src="scripts.js"></script>
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
            </ul>
        </nav>
        <br>
        <div class="imagennoticia">
            <img class="imagennoticia"src="quejas1.png" alt="Imagen noticia0">
            <div class="texto-superpuesto">    
                    <pre>Retroalimentación</pre>
            </div>   
        </div>
        <div class="containerque">
            <div class="left-side">
                <h1>Quejas y Comentarios</h1>
            </div>
            <div class="right-side">
                <?php
                // Aquí se debería hacer la conexión a la base de datos y obtener los datos
                // Reemplaza las siguientes líneas con la lógica adecuada para tu caso

                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "codental";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexión Fallida: " . $conn->connect_error);
                }

                $sql = "SELECT nombre, tipo_contacto, mensaje FROM contacto";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='dato'>";
                        echo "<p><strong>Nombre:</strong> " . $row["nombre"]. " " . $row["tipo_contacto"]. "</p>";
                        echo "<p><strong>Mensaje:</strong> " . $row["mensaje"]. "</p>";
                        echo "</div>";
			echo "<br>";

                    }
                } else {
                    echo "<p>No hay quejas ni sugerencias.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
        
        <footer class="piepagina">
            <img src="CoDentalPie.png" alt="Pie de Página">
            <div>
                <a class="redes" href="https://www.facebook.com/" target="_blank"><img src="facebooklogo.png" alt="facebook"></a>
                <a class="redes" href="https://www.instagram.com/" target="_blank"><img src="instagramlogo.png" alt="instagram"></a>
                <p>Copyright © 2024 CoDental. Federación Odontológica Ecuatoriana. Todos los Derechos Reservados
                    <br>
                    Av. Ordoñez Lasso y Calle Los Pinos, Cuenca- Ecuador
                    <br>
                </p>
            </div>
        </footer>
    </body>
</html>