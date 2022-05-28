jQuery(document).ready(function ($) {
    $('a[href="#finish"]').click(function () {
//        alert('Sign new href executed.');
        $("form").submit();
    });

    $('#periodo_academico_a').change(function () {
        var conYear = $('#periodo_academico_a').val();
        var conPer = $('#periodo_academico_b').val();

        $('#periodo_academico').val(conYear + '-' + conPer);
    });

    $('#periodo_academico_b').change(function () {
        var conYear = $('#periodo_academico_a').val();
        var conPer = $('#periodo_academico_b').val();

        $('#periodo_academico').val(conYear + '-' + conPer);
    });

//selectores de pais departament y municipio de nacimiento
    $('#paisNacimiento').change(function () {
        selectHijoAcction('paisNacimiento', 'departamentNacimiento', 'deparatamento_nacimiento', '1');
    });

    $("#dND").change("#departamentResiden", function () {
        selectHijoAcction('departamentNacimiento', 'municipioNacimiento', 'municipio_nacimiento', '2');
    });

//selectores de pais departament y municipio de nacimiento
    $('#paisExpedicion').change(function () {
        selectHijoAcction('paisExpedicion', 'departamentExpedicion', 'deparatamento_expedicion', '1');
    });

    $("#dED").change("#departamentResiden", function () {
        selectHijoAcction('departamentExpedicion', 'municipioExpedicion', 'municipio_expedicion', '2');
    });

//selectores de pais departament y municipio de residencia
    $('#paisResidencia').change(function () {
        //console.log($('#paisResidencia').val());
        selectHijoAcction('paisResidencia', 'departamentResiden', 'deparatamento_recidencia', '1');
    });

    $("#dRD").change("#departamentResiden", function () {
//        console.log('hola 1 chnge departamentResiden ' + $('#departamentResiden').val());
        selectHijoAcction('departamentResiden', 'municipioResiden', 'municipio_recidencia', '2');
    });


});


function selectHijoAcction(inputPadre, inputHijo, nameInputHijo, selectLista) {
//    console.log('hola 1 '+$('#'+inputPadre).val());
//    console.log(selectLista);
    switch (selectLista) {
        case '1':
            if ($('#' + inputPadre).val() == 'Colombia') {
//        console.log('hola 2 '+$('#'+inputPadre).val()+' h '+ $('#'+inputHijo).val());
                console.log('antes de crear el select' + $('select#' + inputHijo).length);
                if ($('select#' + inputHijo).length < 1) {
//                      console.log('hola 3 ' + $('#' + inputPadre).val() + ' h ' + $('#' + inputHijo).val());
                    $("#" + inputHijo).after('<select id="' + inputHijo + '" class="form-control selectInputCambios' + inputHijo + '" name="' + nameInputHijo + '">' +
                            '<option value="">Selecione una opcion</option></select>');
                    this.alimentarSelectDepartamentos(inputHijo);
                }
                $('input#' + inputHijo).remove();
            } else {
                var referent = $('#' + inputPadre).prop('name').split("_");
                var segParent = $('#' + inputPadre).closest('div').attr('id').slice(-2);
                var idSelectM = $('#m' + segParent + " select[name=municipio_" + referent['1'] + "]").prop('id');
                if ($('input#' + inputHijo).length < 1) {
                    //console.log($('select#'+inputHijo).length);      
                    $('#' + inputHijo).after('<input class="form-control" id="' + inputHijo + '" placeholder="Requerido" name="' + nameInputHijo + '" type="text">');

                }

                if ($('input#' + idSelectM).length < 1) {
                    $('#' + idSelectM).after('<input class="form-control" id="' + idSelectM + '" placeholder="Requerido" name="municipio_' + referent['1'] + '" type="text">');
                }

//                str.split(" ");  municipio_recidencia
                $('select#' + inputHijo).remove();
                $('select#' + idSelectM).remove();
            }
            break;
        case '2':
            switch (true) {
                case ($('select#' + inputHijo).length < 1 && $('input#' + inputHijo).length == 1):
                    console.log('hola 2 3 ' + $('#' + inputPadre).val() + ' h ' + $('#' + inputHijo).val());
                    $("#" + inputHijo).after('<select id="' + inputHijo + '" class="form-control selectInputCambios" name="' + nameInputHijo + '">' +
                            '<option value="">Selecione una opcion</option></select>');
//                    console.log('#'+inputHijo+'InputsToken '+$('#'+inputHijo+'InputsToken').val());
                    this.alimentarSelectMunicipios(inputHijo, inputPadre, $('#' + inputHijo + 'InputsToken').val());
                    $('input#' + inputHijo).remove();
                    break;
                case ($('select#' + inputHijo).length == 1):
                    console.log('hola 2 3 ' + $('#' + inputPadre).val() + ' h ' + $('#' + inputHijo).val());
                    $('#' + inputHijo).find('option').remove();
                    $('#' + inputHijo).append('<option value="">Selecione una opcion</option>');
                    this.alimentarSelectMunicipios(inputHijo, inputPadre, $('#' + inputHijo + 'InputsToken').val());
//                    $('input#' + inputHijo).remove();
                    break;

                case ($('input#' + inputHijo).length < 1 && $('select#' + inputHijo).length == 1):
                    $('#' + inputHijo).after('<input class="form-control" id="' + inputHijo + '" placeholder="Requerido" name="' + nameInputHijo + '" type="text">');
                    $('select#' + inputHijo).remove();
                    break;
            }

            break;
    }
}

function  alimentarSelectDepartamentos(input) {
    $.ajax({
        url: 'lista/departamentos',
        type: 'get',
        success: function (data) {
//            console.log(data);
            var datax = (Object.keys(data));
            //console.log(datax);
            $.each(datax, function (key, value) {
                var option = new Option(value, value);
//                console.log(input);
                $('select#' + input).append(option);
            });
        },
        error: function (xhr, status, error) {
            $.each(xhr, function (key, value) {
                console.log(key + ':' + value);
            });
            console.log(status + ' - ' + error);
        },

    });
}


function  alimentarSelectMunicipios(input, departamento, token) {
    var valueDepartamento = $('#' + departamento).val();
    $.ajax({
        url: 'lista/municipios',
        type: 'POST',
        data: {'departamento': valueDepartamento, '_token': token},
        success: function (data) {
//            console.log(data);
            var datax = (Object.keys(data));
//            console.log(datax);

            $.each(data, function (key, value) {
//                console.log(value.municipio);
                var option = new Option(value.municipio, value.municipio);
                $('select#' + input).append(option);
            });
        }
    });
}