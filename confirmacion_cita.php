<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmación de Cita Odontológica</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
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
            <li><a href="Odontologos.html" class="elementosnoticias">Odontologos</a></li>
            </li>
        </ul>
    </nav>
  <h1>¡Cita Registrada con Éxito!</h1>
  <p>Gracias por programar una cita odontológica con nosotros. Su cita ha sido registrada correctamente.</p>
  <p>Detalles de la cita:</p>
  <ul>
    <li><strong>Nombre:</strong> <?php echo htmlspecialchars($_POST["nombre"]); ?></li>
    <li><strong>Fecha:</strong> <?php echo htmlspecialchars($_POST["fecha"]); ?></li>
    <li><strong>Descripción:</strong> <?php echo htmlspecialchars($_POST["descripcion"]); ?></li>
  </ul>
  <p>Recibirás una confirmación por correo electrónico en la dirección <strong><?php echo htmlspecialchars($_POST["correo"]); ?></strong>.</p><br>
  <a href="index.html" class="boton-regresar">Regresar</a><br>
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
</body>
</html>

