function mostrarOcularFiltros(){

    var bandera = document.getElementById('bandera').value;

    if(bandera == 0){
        document.getElementById('formulario_uno').style.display = 'block';
        $("#bandera").val(1);

    }else if(bandera == 1){
        document.getElementById('formulario_uno').style.display = 'none';
        $("#bandera").val(0);
    }
}