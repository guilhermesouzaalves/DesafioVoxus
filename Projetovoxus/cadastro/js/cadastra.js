$(document).ready(function () {
    $('#btn-cadastra').click(function () {
        var campo_vazio = false;
        if ($('#nome').val() === '') {
            $('#nome').css({'border-color': '#A94442'});
            campo_vazio = true;
        } else {
            $('#nome').css({'border-color': '#CCC'});
        }
        if ($('#email').val() === '') {
            $('#email').css({'border-color': '#A94442'});
            campo_vazio = true;
        } else {
            $('#email').css({'border-colo': '#CCC'});
        }
        if ($('#senha').val() === '') {
            $('#senha').css({'border-color': '#A94442'});
            campo_vazio = true;
        } else {
            $('#senha').css({'border-colo': '#CCC'});
        }
        if (campo_vazio)
            return false;
    });
});


