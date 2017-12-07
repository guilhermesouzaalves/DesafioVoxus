$(document).ready(function () {
                $('#btn-login').click(function () {
                    var campo_vazio = false;
                    if ($('#usuario').val() === '') {
                        $('#usuario').css({'border-color': '#A94442'});
                        campo_vazio = true;
                    } else {
                        $('#usuario').css({'border-color': '#CCC'});
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
