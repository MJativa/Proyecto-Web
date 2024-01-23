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
            <div class="profile" data-name="Nombre 1">
                <img src="persona1.jpg" alt="Foto de Persona 1">
                <div class="profile-details">
                    <h2>Nombre 1</h2>
                    <p>Teléfono: 123-456-7890</p>
                    <p>Correo Electrónico: nombre1@example.com</p>
                    <p>Consultorio: Consultorio 1</p>
                    <p>Odontología general</p>
                </div>
            </div>

            <div class="profile" data-name="Nombre 2">
                <img src="persona2.jpg" alt="Foto de Persona 2">
                <div class="profile-details">
                    <h2>Nombre 2</h2>
                    <p>Teléfono: 987-654-3210</p>
                    <p>Correo Electrónico: nombre2@example.com</p>
                    <p>Consultorio: Consultorio 2</p>
                    <p>Periodoncia</p>
                </div>
            </div>

            <div class="profile" data-name="Nombre 3">
                <img src="persona3.jpg" alt="Foto de Persona 3">
                <div class="profile-details">
                    <h2>Nombre 3</h2>
                    <p>Teléfono: 555-123-4567</p>
                    <p>Correo Electrónico: nombre3@example.com</p>
                    <p>Consultorio: Consultorio 1</p>
                    <p>Endodoncia</p>
                </div>
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