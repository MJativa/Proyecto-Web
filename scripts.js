function redimensionar(){
    var ancho = window.innerWidth;
    if(ancho < 600){
        document.body.style.backgroundColor = "#fff";
    } else{
        document.body.style.backgroundColor = "#fff";
    }
}

window.addEventListener('resize', redimensionar);
redimensionar();

function refrescarpagina(){
    location.reload();
}