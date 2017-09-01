var clave ={

    recuperarPreguntaSecreta: function () {
        $('#email').focusout(function (){

            var url = '/user/retornarRespuestaSecreta';

            $.ajax({
                url: url+'/'+$("#email").val(),
                type:"GET",
                //data: {"id":id},
                success: function(result){
                    //console.log(result);
                    $("#id").val(result.codigo_usuario);
                    $("#pregunta_secreta").val(result.pregunta_secreta);
                }
            });
        });



    }
}
$(document).ready(function () {
    clave.recuperarPreguntaSecreta();
})