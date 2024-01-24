function redimensionar() {
    var ancho = window.innerWidth;
    if (ancho < 600) {
        document.body.style.backgroundColor = "#fff";
    } else {
        document.body.style.backgroundColor = "#fff";
    }
}

window.addEventListener('resize', redimensionar);
redimensionar();

function refrescarpagina() {
    location.reload();
}

function mostrarImagen(imagen) {
    const modal = document.getElementById('modal');
    const imagenModal = document.getElementById('imagenModal');

    modal.style.display = 'block';
    imagenModal.src = imagen.src;
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

function eliminarCita(idCita) {
    // Puedes agregar confirmaciones adicionales aquí antes de eliminar
    if (confirm("¿Estás seguro de que deseas eliminar esta cita?")) {
        // Envía una solicitud al servidor para eliminar la cita con el ID proporcionado
        fetch('eliminar_cita.php?id=' + idCita, {
            method: 'GET',  // Cambiar a GET
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al eliminar la cita');
                }
                // Recarga la página después de eliminar la cita
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al eliminar la cita');
            });
    }
}

function modificarCita(idCita) {
    if (confirm("¿Estás seguro de que deseas modificar esta cita?")) {
        window.location.href = 'modificar_cita.php?id=' + idCita;
    }
}

function toggleDescription(id) {
    var descripcion = document.getElementById(id);
    if (descripcion.style.display === "none" || descripcion.style.display === "") {
        descripcion.style.display = "block";
    } else {
        descripcion.style.display = "none";
    }
}

function searchProfiles() {
    var input = document.getElementById("search-input").value.toLowerCase(); // Convertir a minúsculas
    var profiles = document.querySelectorAll('.profile');

    profiles.forEach(profile => {
        var name = profile.getAttribute('data-name').toLowerCase(); // Convertir a minúsculas

        if (name.indexOf(input) > -1) {
            profile.style.display = "";
        } else {
            profile.style.display = "none";
        }
    });
}
function resetFilters() {
    var profiles = document.querySelectorAll('.profile');
    profiles.forEach(profile => {
        profile.style.display = ""; // Restablece la visibilidad
    });
    document.getElementById("search-input").value = "";
}


// Función para validar el campo de Nombre
function validarNombre() {
    var nombre = document.getElementById("nombre").value;
    var regex = /^[a-zA-Z\s]+$/;

    if (nombre.trim() === "") {
        alert("El campo de Nombre es obligatorio.");
        return false;
    }

    if (!regex.test(nombre)) {
        alert("Ingrese un nombre válido sin caracteres especiales ni números.");
        return false;
    }

    return true;
}

// Función para validar el campo de Teléfono
function validarTelefono() {
    var telefono = document.getElementById("telefono").value;
    var regex = /^\d{10}$/;

    if (telefono.trim() === "") {
        alert("El campo de Teléfono es obligatorio.");
        return false;
    }

    if (!regex.test(telefono)) {
        alert("Ingrese un número de teléfono válido de 10 dígitos.");
        return false;
    }

    return true;
}

// Función para validar el campo de Correo Electrónico
function validarCorreo() {
    var correo = document.getElementById("correo").value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (correo.trim() === "") {
        alert("El campo de Correo Electrónico es obligatorio.");
        return false;
    }

    if (!regex.test(correo)) {
        alert("Ingrese una dirección de correo electrónico válida.");
        return false;
    }

    return true;
}

// Función para validar el campo de Fecha
function validarFecha() {
    var fecha = document.getElementById("fecha").value;

    if (fecha.trim() === "") {
        alert("El campo de Fecha es obligatorio.");
        return false;
    }

    return true;
}

// Función para validar el campo de Descripción
function validarDescripcion() {
    var descripcion = document.getElementById("descripcion").value;

    if (descripcion.trim() === "") {
        alert("El campo de Descripción es obligatorio.");
        return false;
    }

    return true;
}

// Función principal para validar todo el formulario antes de enviar
function validarFormularioContacto() {
    if (validarNombre() && validarTelefono() && validarCorreo() && validarFecha() && validarDescripcion()) {
        return true;
    }
        return false;
}

function validarFormularioContacto() {
    function validarNombre() {
        var nombre = document.getElementById("nombre").value;
        if (nombre.trim() === "") {
            alert("Por favor, ingrese su nombre.");
            return false;
        }
        return true;
    }

    function validarCorreo() {
        var correo = document.getElementById("correo").value;
        var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (correo.trim() === "") {
            alert("Por favor, ingrese su correo electrónico.");
            return false;
        }
        if (!regexCorreo.test(correo)) {
            alert("Por favor, ingrese un correo electrónico válido.");
            return false;
        }
        return true;
    }

    function validarTelefono() {
        var telefono = document.getElementById("telefono").value;
        if (telefono.trim() !== "") {
            var regexTelefono = /^\d{10}$/;
            if (!regexTelefono.test(telefono)) {
                alert("Por favor, ingrese un número de teléfono válido de 10 dígitos.");
                return false;
            }
        }
        return true;
    }

    function validarMensaje() {
        var mensaje = document.getElementById("mensaje").value;
        if (mensaje.trim() === "") {
            alert("Por favor, ingrese su mensaje.");
            return false;
        }
        return true;
    }

    // Llamar a las funciones de validación
    return validarNombre() && validarCorreo() && validarTelefono() && validarMensaje();
}

function regresarNoticias(){
    window.location.href = "noticias.html";
}
