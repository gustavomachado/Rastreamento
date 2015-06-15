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
    if (typeof ($(".data")) !== undefined) {
        $(".data").mask("99/99/9999");
    }
     

    if (typeof ($(".date-year")) !== undefined) {
        $(".date-year").mask("9999");
    }
    if (typeof ($(".datetimepicker")) !== undefined) {
        $(".datetimepicker").datetimepicker({
            pickTime: false
        });
        $(".datetimepicker span").click(function () {
            $(".datetimepicker").removeClass("has-error");
        });
    }




    if (typeof ($(".add-contato")) !== undefined) {
        $(".add-contato").click(function () {

            var input = ".modal-body-contato input[name=";

            var nome = $(input + "nome]");
            var telefone = $(input + "telefone]");
            var celular = $(input + "celular]");
            var email = $(input + "email]");
            var setor = $(input + "setor]");
            var cargo = $(input + "cargo]");
            var dataNascimento = $(input + "data_nascimento]");

            var contatos = countClassElements("contatos");
            $("#contatos-container").append($("<div>").addClass("contatos").attr("id", "contato-" + contatos)
                    .append($("<input>").attr("type", "hidden").val(nome.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][nome]"))
                    .append($("<input>").attr("type", "hidden").val(telefone.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][telefone]"))
                    .append($("<input>").attr("type", "hidden").val(celular.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][celular]"))
                    .append($("<input>").attr("type", "hidden").val(email.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][email]"))
                    .append($("<input>").attr("type", "hidden").val(setor.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][setor]"))
                    .append($("<input>").attr("type", "hidden").val(cargo.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][cargo]"))
                    .append($("<input>").attr("type", "hidden").val(dataNascimento.val()).attr("name", "data[Cliente][Contatos][" + contatos + "][data_nascimento]"))
                    );
            $("#contatos-container-table").append($("<tr>").attr("id", "contato-" + contatos + "-table")
                    .append($("<td>").html(nome.val()))
                    .append($("<td>").html(email.val()))
                    .append($("<td>").html(telefone.val()))
                    .append($("<td>").html(cargo.val()))
                    .append($("<td>").append($("<a>").click(function () {

                        $("#contatos-container #contato-" + contatos + " , #contato-" + contatos + "-table ").remove();

                    }).append($("<span>").addClass("glyphicon").addClass("glyphicon-remove")))
                            ));
            $(".modal-body-contato input").val('');
        });
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
            } else {
                $(".loading").css("display", "none");
            }
        });
    }
    if (typeof ($(".pj")) !== undefined) {
        $(".pj").prop("disabled", true);
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


    $('.alert').append('<button class="close" data-dismiss="alert" ><span class="flaticon-cancel19" ></span></button>');

    $('.money').maskMoney();

    $('.numberOnly').keypress(function (e) {
        if (e.keyCode > 47 && e.keyCode < 58) {
            return true;
        } else {
            return false;
        }
    });

    $('#btn-pesquisar').click(function () {
        if ($('#pesquisar').val()) {
            window.location = urlAtual + "/index/" + $('#filtro').val() + '/' + $('#pesquisar').val();
        } else {
            window.location = urlAtual;
        }
    });
    $('#btn-pesquisar').css('cursor', 'pointer');
    $('#pesquisar').keypress(function (e) {
        if (e.keyCode === 13) {
            if ($('#pesquisar').val()) {
                window.location = urlAtual + "/index/" + $('#filtro').val() + '/' + $('#pesquisar').val();
            } else {
                window.location = urlAtual;
            }
        }
    });
    if ($('.actions').width() > 52) {
        $('.actions').width(52);
    }


});



function validaTelefone(telefone) {
    var rexp = /\([\d]{2}\)[\d]{5}-[\d]{4}/;
    return rexp.test(telefone);
}
function validaData(data) {
    var rexp = new RegExp(/((0[1-9]|[12][0-9]|3[01])\/(0[13578]|1[02])\/[12][0-9]{3})|((0[1-9]|[12][0-9]|30)\/(0[469]|11)\/[12][0-9]{3})|((0[1-9]|1[0-9]|2[0-8])\/02\/[12][0-9]([02468][1235679]|[13579][01345789]))|((0[1-9]|[12][0-9])\/02\/[12][0-9]([02468][048]|[13579][26]))/gi);
    return new String(data).match(rexp) !== null;
}

function putMessage(msg) {
    $(".msg-area *").remove();
    $(".msg-area").append($("<h4>").html(msg)).addClass("text-left");
}
function setHasError(selector) {
    $(selector).focus().parent("div").addClass("has-error");
}
function listaByClass(nomeDaClasse) {

    var lista = document.getElementsByClassName(nomeDaClasse);
    return lista;
}
function countClassElements(nomeDaClasse) {

    var lista = listaByClass(nomeDaClasse);
    return lista.length;
}