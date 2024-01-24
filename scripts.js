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
        alert('Campo modificado exitosamente');
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