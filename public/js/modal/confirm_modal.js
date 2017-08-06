$("#modalOptions").confirm({
    text: "Deseas Guardar!",
    modalOptionsBackdrop: 'static',
    modalOptionsKeyboard: false,
    confirm: function() {
        alert("Estas Seguro Que Deseas Confirmar.");
    },
    cancel: function() {
        alert("Estas Seguro Que Deseas Cancelar.");
    }
});