var autocompleteClass = {
    autocompleteComponent: function(selector, selector_id, path) {
        $(selector).autocomplete({
            source: function (request, response) {
                $.ajax({
                    type: "GET",
                    url: "/admin/autocomplete",
                    data: {ruta: path, term: request.term},
                    success: response,
                    dataType: "json",
                    minLength: 1,
                    delay: 100
                });
            },
            select: function (e, ui) {
                $(selector).val(ui.item.id);
                $(selector_id).val(ui.item.id);
            }
        });
    }
}
