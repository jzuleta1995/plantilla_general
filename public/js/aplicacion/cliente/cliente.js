$('#tabs').tabs();

var TabFunctions = {

    tabSelect: function () {

        var hidden = true;

        $('li.tabs').each(function () {

            $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            active_tab = $(this).hasClass('active');
            $content = $($active[0].hash);

            $links.not($active).each(function () {
                $(this.hash).hide();
            });

            $(this).on('click', 'a', function(e){

                $active.removeClass('active');
                $content.hide();

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('active');
                $content.show();

            });

        });


        $('#more').on('click', function () {
            $('#more').addClass('hidden');
            $('#tab2').removeClass('hidden');
        });

        $('#2').find('input').each(function () {

            if($.trim($(this).val()) != ""){
                hidden = false;
            }

            if(!hidden){

                $('#more').addClass('hidden');
                $('#tab2').removeClass('hidden');
                $('#tabs').tabs({
                    active: 2
                });

                $('#2').find('input.not-empty').each(function () {
                    $(this).prop("required", "required");
                });

            }else{

                $('#more').removeClass('hidden');
                $('#tab2').addClass('hidden').removeClass('active');
                $('#tab1').addClass('active');

                $('#tabs').tabs({
                    active: 0
                });

                $('#2').find('input.not-empty').each(function () {
                    $(this).prop("required", "");
                });
            }
        });
    },

    detailHidden: function () {
        var checked = $('#aplica_fiador').prop("checked");

        if(checked){
            $('#detail_fiador').removeClass('hidden');

            $('#1').find('input.not-empty').each(function () {
                $(this).prop("required", "required");
            });

        }else{
            $('#detail_fiador').addClass('hidden');

            $('#1').find('input.not-empty').each(function () {
                $(this).prop("required", "");
            });
        }
    },

}


$(document).ready(function () {
    TabFunctions.tabSelect();
    TabFunctions.detailHidden();
});

$('#aplica_fiador').on('click', function () {
    TabFunctions.tabSelect();
    TabFunctions.detailHidden();
});


