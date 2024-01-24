<!DOCTYPE html>
<html>
    <head>
        <title>Odontólogos - CoDental - Tu Sonrisa, Nuestra Prioridad</title>
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
                <li><a href="quiensomos.html" class="elementosnoticias">Quienes Somos</a></li>
                <li><a href="noticias.html" class="elementosnoticias">Noticias</a></li>
                <li><a href="citas.html" class="elementosnoticias">Citas</a></li>
                <li><a href="contacto.html" class="elementosnoticias">Contacto</a></li>
                <li><a href="portal.html" class="elementosnoticias">Portal</a></li>
                <li><a href="Odontologos.html" class="elementosnoticias">Odontólogos</a></li>
                </li>
            </ul>
        </nav>
        <div id="search-container">
            <input type="text" id="search-input" placeholder="Buscar por Nombre / Apellido" ">
            <button id="search-button" onclick="searchProfiles()">Buscar</button><button id="reset-button" onclick="resetFilters()">Todos</button>
        </div>
        <div class="profile-container">
            <?php
            include 'odontologos-data.php';

            foreach ($odontologos as $odontologo) {
                echo '<div class="profile" data-name="' . $odontologo[0] . '">';
                echo '<img src="' . $odontologo[5] . '" alt="Foto de ' . $odontologo[0] . '">';
                echo '<div class="profile-details">';
                echo '<h2>' . $odontologo[0] . '</h2>';
                echo '<p>Teléfono: ' . $odontologo[1] . '</p>';
                echo '<p>Correo Electrónico: ' . $odontologo[2] . '</p>';
                echo '<p>Consultorio: ' . $odontologo[3] . '</p>';
                echo '<p>' . $odontologo[4] . '</p>';
                echo '</div></div>';
            }
            ?>
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