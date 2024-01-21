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