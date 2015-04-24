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
    if (typeof ($(".cep")) !== undefined) {
        $(".cep").mask("99999-999");
    }
    if (typeof ($(".busca-cep")) !== undefined) {
        $(".busca-cep").click(function () {
            $(".loading").css("display", "block");
            var cep = $(".cep").val();
            var rexp = /[\d]{5,5}\-[\d]{3,3}/;
            if (rexp.test(cep)) {
                $.ajax({
                    type: 'get',
                    url: 'http://viacep.com.br/ws/' + cep + '/json/',
                    async: true,
                    success: function (data, textStatus, jqXHR) {
                        //  var json = $.parseJSON(data);
                        $("#ClienteRua").val(data['logradouro']);
                        $("#ClienteBairro").val(data['bairro']);
                        $("#ClienteComplemento").val(data['complemento']);
                        $("#ClienteCidade").val(data['localidade']);
                        $("#ClienteUf").val(data['uf']);
                        $(".loading").css("display", "none");
                    }
                });
            }
        });
    }

    $("select").change(function () {
        var value = $(this).val();

        if (value == 'J') {
            $(".cpf").addClass("cnpj").removeClass("cpf").mask("99.999.999/9999-99");
            $(".pj").prop("disabled", false);
        } else {
            $(".cnpj").addClass("cpf").removeClass("cnpj").mask("999.999.999-99");
            $(".pj").prop("disabled", true).val('');
        }
    });
    
    $('.alert').append('<button class="close" data-dismiss="alert" ><span class="flaticon-cancel19" ></span></button>');
    
});