function camposNumerico(input)
{
    var num = input.value.replace(/\./g,'');
    if(!isNaN(num)){
        input.value = num;
    }
    else{ alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}