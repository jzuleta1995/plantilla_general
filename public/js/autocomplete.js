$( "#nombre" ).autocomplete({
    source:"{!! route('autocomplete')!!}",
    minlength:1,
    autoFocus:true,
    select:function(e,ui)
    {
        $('#nombre').val(ui.item.value);
    }
});