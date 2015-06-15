/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {

    $('.dia-mes').keyup(function () {
        if (this.value > 31) {
            this.value = 31;
        } else if (this.value < 1 && this.value) {
            this.value = 1;
        }
    });
    $('.dia-mes').change(function (){
        (this.value === '')? (this.value = 1) : this.value;
    });
    
    if ($('#ContratoClienteId').val()) {
        var id = $('#ContratoClienteId').val();
        $('#veiculosPorClientes').empty();
        $.ajax({
            type: 'POST',
            url: "/AmazonTrace/contratos/veiculosPorClientes",
            data: {id: id},
            success: function (data, textStatus, jqXHR) {
                var json = JSON.parse(data);
                json.forEach(function (value) {
                    var veiculo = value.Veiculo;
                    $('#veiculosPorClientes').append("<tr>\n\
                                                        <td>" + veiculo.placa + "</td>\n\
                                                        <td>" + veiculo.tipo_veiculo + "</td>\n\
                                                        <td>" + veiculo.marca + "</td>\n\
                                                        <td>" + veiculo.modelo + "</td>\n\
                                                        <td>" + veiculo.ano_fabricacao + "</td>\n\
                                                        <td>" + veiculo.ano_modelo + "</td>\n\
                                                        <td>" + veiculo.status + "</td>\n\
                                                        <td><a href='#' onclick='addVeiculo(" + veiculo.id + ", " + veiculo.contrato_id + ")'><span class='glyphicon glyphicon-ok'></span></a></td>\n\
                                                    <tr>");
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Erro inesperado:\n' + errorThrown);
            }
        });
    }

    $('.cliente').change(function () {
        var id = this.value;
        $.ajax({
            type: 'GET',
            url: "/AmazonTrace/contratos/veiculosPorClientes/" + true,
            data: {id: id},
            success: function (data) {
                var json = JSON.parse(data);
                $('#veiculosPorClientes, #veiculosPorContrato').empty();
                json.forEach(function (value) {
                    var veiculo = value.Veiculo;
                    $('#veiculosPorClientes').append("<tr>\n\
                                                        <td>" + veiculo.placa + "</td>\n\
                                                        <td>" + veiculo.tipo_veiculo + "</td>\n\
                                                        <td>" + veiculo.marca + "</td>\n\
                                                        <td>" + veiculo.modelo + "</td>\n\
                                                        <td>" + veiculo.ano_fabricacao + "</td>\n\
                                                        <td>" + veiculo.ano_modelo + "</td>\n\
                                                        <td>" + veiculo.status + "</td>\n\
                                                        <td><a href='#' onclick='addVeiculo(" + veiculo.id + ", " + veiculo.contrato_id + ")'><span class='glyphicon glyphicon-ok'></span></a></td>\n\
                                                    <tr>");
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Erro inesperado:\n' + errorThrown);
            }
        });
    });
});

function preencherVeiculosContrato(arrayJson) {
    $('#veiculosPorContrato').empty();
    arrayJson.forEach(function (value) {
        var veiculo = value.Veiculo;
        $('#veiculosPorContrato').append("<tr>\n\
                                            <td>" + veiculo.placa + "</td>\n\
                                            <td>" + veiculo.tipo_veiculo + "</td>\n\
                                            <td>" + veiculo.marca + "</td>\n\
                                            <td>" + veiculo.modelo + "</td>\n\
                                            <td>" + veiculo.ano_fabricacao + "</td>\n\
                                            <td>" + veiculo.ano_modelo + "</td>\n\
                                            <td>" + veiculo.status + "</td>\n\
                                            <td><a href='#' onclick='removerVeiculo(" + veiculo.id + ")'><span class='glyphicon glyphicon-remove'></span></a></td>\n\
                                        <tr>");
    });
}

function removerVeiculo(id) {
    if (!confirm('Deseja relamente remover este veículo do contrato?')) {
        return false;
    }
    var idContrato = '';
    if ($('#ContratoId').val()) {
        idContrato = '/' + $('#ContratoId').val()
    }
    $.ajax({
        type: 'POST',
        url: "/AmazonTrace/contratos/removerVeiculo/" + id + idContrato,
        success: function (data, textStatus, jqXHR) {
            preencherVeiculosContrato(JSON.parse(data));
            $('.alert').remove();
            $('.contratos').append('<div class="alert alert-success" style="top: 70px"><span class="flaticon-check52"></span>Removido com sucesso.<button class="close" data-dismiss="alert" ><span class="flaticon-cancel19" ></span></button></div>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Erro Inesperado!\n' + errorThrown);
        }
    });
}

function addVeiculo(id, contrato) {
    if ((contrato) && contrato != $('#ContratoId').val()) {
        if (!confirm('Este Veículo já está anexado a um outro contrato.\nDeseja continuar e anexar o veículo a este contrato?\n\nobs. o veículo permanecerá apenas no contrato atual.')) {
            return false;
        }
    }
    $.ajax({
        type: 'POST',
        url: "/AmazonTrace/contratos/addVeiculo",
        data: {idVeiculo: id},
        success: function (data, textStatus, jqXHR) {
            preencherVeiculosContrato(JSON.parse(data));
            $('.alert').remove();
            $('.contratos').append('<div class="alert alert-success" style="top: 70px"><span class="flaticon-check52"></span>Anexado com sucesso.<button class="close" data-dismiss="alert" ><span class="flaticon-cancel19" ></span></button></div>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Erro Inesperado!\n' + errorThrown);
        }
    });
}