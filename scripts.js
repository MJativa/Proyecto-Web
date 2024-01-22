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
            method: 'DELETE',
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
    // Puedes redirigir a una página de edición o mostrar un formulario en la misma página
    // Aquí redirigiremos a una página de edición (modificar_cita.html) con el ID de la cita
    window.location.href = 'modificar_cita.html?id=' + idCita;
}