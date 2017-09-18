// cuando se muestre la página
window.addEventListener('pageshow', function(event) {
    // borra el formulario (asumiendo que sólo hay uno; si hay más, especifica su Id)
    //document.querySelector("form").reset();
    document.getElementById("formulario").reset();
});