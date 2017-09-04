function format(input)
{
    console.log(input.value);
    var num = input.value.replace(/\./g,'');
    console.log(num);
    if(!isNaN(num)){
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        input.value = num;
        //$("input[name=prestamo_valor_cuota]").value = num;
    }

    else{ alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}