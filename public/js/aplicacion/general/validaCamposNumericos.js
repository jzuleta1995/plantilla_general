function camposNumerico(input)
{
    console.log(input.value);
    var num = input.value.replace(/\./g,'');
    console.log(num);
    if(!isNaN(num)){
        input.value = num;
    }
    else{ alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}