function mostrar(){

    if(document.getElementById('prestamo_tipo').value =="ABIERTO"){
        // document.getElementById('tipo_prestamo').value = 0;
        document.getElementById('prestamo_numero_cuotas').value = 0;
        document.getElementById('prestamo_tasa').value = 0;
        document.getElementById('prestamo_valor').value = 0;

        document.getElementById('numero_cuota').style.display = 'none';

    }else if(document.getElementById('prestamo_tipo').value =="CERRADO"){

        document.getElementById('prestamo_numero_cuotas').value = 0;
        document.getElementById('prestamo_tasa').value = 0;
        document.getElementById('prestamo_valor').value = 0;

        document.getElementById('numero_cuota').style.display = 'block';
    }
}