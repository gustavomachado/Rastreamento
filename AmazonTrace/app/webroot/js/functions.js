

$(document).ready(function () {


    if (typeof ($(".tel")) !== undefined) {
        $(".tel").mask("(99)99999-9999");
    }
    if (typeof ($(".cpf")) !== undefined) {
        $(".cpf").mask("999.999.999-99");
    }
    if (typeof ($(".cnpj")) !== undefined) {
        $(".cnpj").mask("99.999.999/9999-99");
    }

    

    $("select").change(function () {
        var value = $(this).val();
        
        if ( value == 'J') {
            $(".cpf").addClass("cnpj").removeClass("cpf").mask("99.999.999/9999-99");
          //  $(".pj").prop("disabled");
        } else {
            $(".cnpj").addClass("cpf").removeClass("cnpj").mask("999.999.999-99");
          //   $(".pj").prop("disabled","true");
        }
    });

});