<script>
    var appModule = angular.module('appModule', []);

    appModule.controller('myCtrl', function ($scope) {
        $scope.rastreador = {
            id: null,
            veiculo_id: null,
            modelo: "",
            marca: "",
            numero_serie: "",
            numero_equipamento: "",
            data_install: "",
            data_remove: "",
            local_instalacao_rastreador: "",
            fiacao_utilizada: "",
            info_add: ""
        };

        $scope.rastreadores = new Array();

        $scope.getRastreadorVinculado = function () {
            $.ajax({
                url: "<?php echo $this->Html->url(array('action' => 'getRastreadorVinculado', 'controller' => 'Veiculos')) ?>/" + $('#VeiculoId').val(),
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    var registro = JSON.parse(data);
                    if (registro.Rastreador.id) {
                        $scope.rastreador = registro.Rastreador;
                        $scope.rastreador.veiculo_id = $('#VeiculoId').val();
                        $scope.$apply();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("ERRO");
                }
            });
        };
        $scope.getRastreadorVinculado();

        $scope.listarRastreadoresDisponiveis = function () {
            $.ajax({
                url: "<?php echo $this->Html->url(array('action' => 'getRastreadoresDisponiveis', 'controller' => 'Veiculos')) ?>",
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $scope.rastreadores = JSON.parse(data);
                    $scope.$apply();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("ERRO");
                }
            });
        };
        $scope.listarRastreadoresDisponiveis();

        $scope.selecionarRastreador = function (rastreador) {
            $scope.rastreador = rastreador;
            $scope.rastreador.veiculo_id = $('#VeiculoId').val();

            console.log($scope.rastreador);

            $("#modal-rastreador").modal('hide');
        };

        $scope.vincularRastreador = function () {
            console.log($scope.rastreador);
            if (!$scope.rastreador.id) {
                alert("Informe um rastreador.");
            } else if (!$scope.rastreador.data_install) {
                alert("Informe uma data válida para a instalação.");
            }
            if ($scope.rastreador.id && $scope.rastreador.data_install) {
                var data = $scope.rastreador;
                $.ajax({
                    url: "<?php echo $this->Html->url(array('action' => 'vincularVeiculo', 'controller' => 'Rastreadors')) ?>",
                    type: 'POST',
                    data: data,
                    success: function (dataJson, textStatus, jqXHR) {
                        console.log(dataJson);
                        var data = $.parseJSON(dataJson);
                        $('.loading-adicionados').css("display", 'none');
                        var msg;
                        if (data.status != 6) {
                            switch ((data.status)) {
                                case 0:
                                    msg = ("Falha ao Adicionar Rastreador");
                                    break;
                                case 1:
                                    msg = ("Rastreador Adicionado Com Sucesso!");
                                    break;
                                case 2:
                                    msg = ("Falha ao Adicionar Rastreador. Rastreador está vinculado à Outro Veículo!");
                                    break;
                                case 3:
                                    msg = "Falha ao registrar rastreador, impossivel criar histórico em " + data.dataInstalacao;
                                    break;
                                case 4:
                                    msg = data.msg;
                                    break;
                                case 5:
                                    msg = "Informe a data corretamente!";
                                    break;
                                case 6:
                                    msg = "Em sessão!";
                                    break;
                            }
                            alert(msg);
                        } else {
                            alert("Para que o vínculo do rastreador seja válidado por favor conclua o cadastro do Veículo e salve.");
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("ERRO");
                    }
                });
            }
        };

        $scope.desvincularRastreador = function () {
            if (!$scope.rastreador.data_remove) {
                alert("Informe uma data válida para a remoção.");
                return false;
            }

            if (confirm("Deseja realmente desvincular este Rastreador?")) {
                var data = $scope.rastreador;
                console.log(data);
                $.ajax({
                    type: 'GET',
                    url: "<?php echo $this->Html->url(array('action' => 'desvincularVeiculo', 'controller' => 'rastreadors')); ?>",
                    data: data,
                    async: true,
                    success: function (dataJson) {
                        var data = $.parseJSON(dataJson);
                        var msg;
                        switch ((data.status)) {
                            case 0:
                                msg = ("Falha ao Remover Rastreador");
                                break;
                            case 1:
                                msg = ("Rastreador Removido Com Sucesso!");
                                classe = "text-success";
                                break;
                            case 2:
                                msg = ("Falha ao Remover rastreador");
                                break;
                            case 3:
                                msg = "Falha ao remover, impossivel criar historico em " + data.dataRemocao;
                                break;
                            case 4:
                                msg = " Excecao, " + data.msg;
                                break;
                        }
                        alert(msg);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("Falha ao remover rastreador.");
                    }
                });
            }
        };

        $scope.editarInformacaoHistorico = function () {
            if (confirm("Deseja realmente editar essas informações?")) {
                var data = $scope.rastreador;
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: "<?php echo $this->Html->url(array('action' => 'editarInfoHistorico', 'controller' => 'rastreadors')); ?>",
                    data: data,
                    async: true,
                    success: function (dataJson) {
                        console.log(dataJson);

                        var data = $.parseJSON(dataJson);
                        var msg;
                        switch (data.status) {
                            case 0:
                                msg = ("Falha ao editar informações.");
                                break;
                            case 1:
                                msg = ("Iformações editadas com sucesso!");
                                break;
                        }
                        alert(msg);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("Falha ao remover rastreador.");
                    }
                });
            }
        }

    });
</script>

<div ng-app="appModule" ng-controller="myCtrl">
    <div class="veiculos form">

        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php
                        echo __('Cadastro Veículos');
                        ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" ">
                <?php echo $this->Form->create('Veiculo', array('role' => 'form')); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
                </div>

                <div class="form-group col-md-2 ">
                    <?php echo $this->Form->input('placa', array('class' => 'form-control placa', 'placeholder' => 'Placa')); ?>
                </div>

                <div class="form-group col-md-2 ">
                    <?php echo $this->Form->input('apelido', array('class' => 'form-control ', 'placeholder' => 'Apelido')); ?>
                </div>

                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('tipo_veiculo', array('class' => 'form-control', 'placeholder' => 'Tipo Veiculo', "options" => $tipos_veic)); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('marca', array('class' => 'form-control', 'placeholder' => 'Marca')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('cor', array('class' => 'form-control', 'placeholder' => 'Cor')); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="datainicio">Ano Fabrica&ccedil;&atilde;o </label>
                    <div class='input-group '>
                        <?php
                        echo $this->Form->input('ano_fabricacao', array('class' => 'form-control date-year', 'placeholder' => 'Ano Fabricacao', 'label' => FALSE, 'div' => FALSE,
                            'type' => 'number', 'max' => '9999', 'min' => '1900'));
                        ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="datainicio">Ano Modelo </label>
                    <div class='input-group '>
                        <?php
                        echo $this->Form->input('ano_modelo', array('class' => 'form-control', 'placeholder' => 'Ano Modelo', 'label' => FALSE, 'div' => FALSE,
                            'type' => 'number', 'max' => '9999', 'min' => '1900'));
                        ?>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('chassi', array('class' => 'form-control', 'placeholder' => 'Chassi')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('renavan', array('class' => 'form-control', 'placeholder' => 'Renavan')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('combustivel', array('class' => 'form-control', 'placeholder' => 'Combustivel', "options" => $tipos_comb)); ?>
                </div>
                <div class="form-group col-md-1">
                    <?php
                    echo $this->Form->input('consumo_km_litro', array('class' => 'form-control', 'placeholder' => 'Km', 'type' => 'number',
                        'label' => array('text' => 'Km/L'), 'min' => '1'));
                    ?>
                </div>
                <div class="form-group col-md-1">
                    <?php
                    echo $this->Form->input('consumo_litro_hr', array('class' => 'form-control', 'placeholder' => 'L/h', 'type' => 'number',
                        'label' => array('text' => 'Litro/h'), 'min' => '0'));
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label>Motorista</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <a href="/AmazonTrace/Motoristas/add" target="_blank">  
                                <span class="glyphicon glyphicon-plus"></span></a>
                        </span>
                        <?php
                        echo $this->Form->input('motorista_id', array('class' => 'form-control', 'placeholder' =>
                            'Motorista Id', 'label' => FALSE, 'div' => FALSE, 'options' => $motoristas, 'empty' => 'Selecione o motorista'));
                        ?>
                    </div>
                </div>

                <div class="form-group   col-md-2 ">
                    <?php echo $this->Form->input('sms_notificacao_01', array('class' => 'form-control tel', 'placeholder' => 'Sms Notificacao 1')); ?>
                </div>
                <div class="form-group   col-md-2 ">
                    <?php echo $this->Form->input('sms_notificacao_02', array('class' => 'form-control tel', 'placeholder' => 'Sms Notificacao 2')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('plano_notificacao_sms', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Sms')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('email_notificacao_01', array('class' => 'form-control', 'placeholder' => 'Email Notificacao 01')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('email_notificacao_02', array('class' => 'form-control', 'placeholder' => 'Email Notificacao 02')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('plano_notificacao_email', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Email')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status', "options" => $tipos_status)); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('bloqueio', array('options' => array(0 => 'Não', 1 => 'Sim'), 'class' => 'form-control', 'placeholder' => 'Status')); ?>
                </div>


                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha panico')); ?>
                </div>
                <div class="form-group col-md-10">
                    <?php echo $this->Form->input('medidas_panico', array('class' => 'form-control', 'placeholder' => 'Medida Panico')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('e1', array('class' => 'form-control', 'placeholder' => 'E1', 'label' => array('text' => 'Entrada 1'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('e2', array('class' => 'form-control', 'placeholder' => 'E2', 'label' => array('text' => 'Entrada 2'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('e3', array('class' => 'form-control', 'placeholder' => 'E3', 'label' => array('text' => 'Entrada 3'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('e4', array('class' => 'form-control', 'placeholder' => 'E4', 'label' => array('text' => 'Entrada 4'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('s1', array('class' => 'form-control', 'placeholder' => 'S1', 'label' => array('text' => 'Saida 1'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('s2', array('class' => 'form-control', 'placeholder' => 'S2', 'label' => array('text' => 'Saida 2'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('s3', array('class' => 'form-control', 'placeholder' => 'S3', 'label' => array('text' => 'Saida 3'))); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('s4', array('class' => 'form-control', 'placeholder' => 'S4', 'label' => array('text' => 'Saida 4'))); ?>
                </div>  
                <div class="  col-md-9">
                    <label>Observa&ccedil;&atilde;o</label>
                </div>

                <div class="form-group col-md-9">
                    <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
                </div>
                <div class=" col-md-2">
                    <?php if (isset($id)): ?>
                        <button type="button" data-toggle="modal" data-target="#modal-rastreadores" class="btn btn-default">Rastreador
                            <span class="flaticon-wifi83"></span>
                        </button>
                    <?php endif; ?>
                </div>
                <div class="col-md-12" style="padding: 0px; display: <?php echo isset($this->data['Veiculo']['id']) ? "block" : "block"; ?>">
                    <div class="col-md-12">
                        <h2><?php echo __('Rastreador'); ?></h2>
                    </div>
                    <div class="col-md-12" >
                        <div class="col-md-12" style="padding: 5px;border-radius: 10px ;border: solid 1px #cccccc;">
                            <div class="form-group col-md-8">
                                <label>Rastreador (marca, modelo, nº série, nº equip.)</label><br/>
                                <button type="button" <?php echo isset($this->data['Rastreador']['id']) ? "disabled='true'" : "" ?>  data-toggle="modal" data-target="#modal-rastreador" class="btn btn-default" style="width: 100%">
                                    {{rastreador.id ? rastreador.marca + ", " + rastreador.modelo + ", " + rastreador.numero_serie + ", " + rastreador.numero_equipamento : "Selecione aqui um rastreador"}}
                                </button>
                            </div> 
                            <div class="form-group col-md-2">
                                <?php echo $this->Form->input('data_install', array('class' => 'form-control data', 'label' => array('text' => 'Data instalação'), 'ng-model' => 'rastreador.data_install')); ?>
                            </div>
                            <div class="form-group col-md-2">
                                <?php echo $this->Form->input('data_remove', array('class' => 'form-control data', 'label' => array('text' => 'Data remoção'), 'ng-model' => 'rastreador.data_remove')); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Fiação utilizada</label><br/>
                                <?php echo $this->Form->textArea('fiacao_utilizada', array('class' => 'form-control', 'label' => array('text' => 'Fiação Utilizada'), 'ng-model' => 'rastreador.fiacao_utilizada')); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Local instalação</label><br/>
                                <?php echo $this->Form->textArea('local_instalacao_rastreador', array('class' => 'form-control', 'label' => array('text' => 'Local'), 'ng-model' => 'rastreador.local_instalacao_rastreador')); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Observação</label><br/>
                                <?php echo $this->Form->textArea('info_add', array('class' => 'form-control', 'label' => array('text' => 'Observação'), 'ng-model' => 'rastreador.info_add')); ?>
                            </div>
                            <div class="col-md-12" style="padding: 0">
                                <div class=" col-lg-offset-9 col-md-1">
                                    <?php
                                    echo isset($this->data['Rastreador']['id']) ?
                                            '<button type="button" class="btn btn-danger" ng-click="desvincularRastreador()">Desvincular</button>' :
                                            '<button type="button" class="btn btn-info" ng-click="vincularRastreador()">Vincular</button>';
                                    ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="button"  <?php echo isset($this->data['Rastreador']['id']) ? "" : "disabled='true'" ?> class="btn btn-success" ng-click="editarInformacaoHistorico()">Salvar dados Vinculo</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3><?php echo __('Histórico'); ?></h3>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12 scroll-content" style="height: 200px;">
                                    <table cellpadding="0" cellspacing="0" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rastreador (marca, modelo, nº série, nº equip.)</th>
                                                <th style="width: 115px;">Data Instação</th>
                                                <th style="width: 115px;">Data Remoção</th>
                                                <th style="width: 330px;">Local Instalação</th>
                                                <th style="width: 320px;">Fiação Utilizada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($historicoVeiculos as $historicoVeiculo): ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        echo $this->Html->link($historicoVeiculo['Rastreador']['marca'] . ', ' .
                                                                $historicoVeiculo['Rastreador']['modelo'] . ', ' .
                                                                $historicoVeiculo['Rastreador']['numero_serie'] . ', ' .
                                                                $historicoVeiculo['Rastreador']['numero_equipamento'], array('controller' => 'rastreadors', 'action' => 'view', $historicoVeiculo['Rastreador']['id']));
                                                        ?>
                                                    </td>
                                                    <td><?php echo h(date('d/m/Y', strtotime($historicoVeiculo['HistoricoVeiculo']['data_inicio']))); ?>&nbsp;</td>
                                                    <td><?php echo ($historicoVeiculo['HistoricoVeiculo']['data_fim']) ? h(date('d/m/Y', strtotime($historicoVeiculo['HistoricoVeiculo']['data_fim']))) : 'Não definida'; ?>&nbsp;</td>
                                                    <td><?php echo h($historicoVeiculo['HistoricoVeiculo']['local_instalacao_rastreador']); ?>&nbsp;</td>
                                                    <td><?php echo h($historicoVeiculo['HistoricoVeiculo']['fiacao_utilizada']); ?>&nbsp;</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr/>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class=" col-lg-offset-9 col-md-1">
                            <?php echo $this->Html->link('Novo', array('action' => 'add', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
                        </div>
                        <div class=" col-md-1">
                            <?php echo $this->Html->link('Sair', array('action' => 'index', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
                        </div>
                        <div class="form-group  col-md-1">
                            <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
                        </div> 
                    </div>
                </div>
                <?php echo $this->Form->end() ?>
            </div>
        </div><!-- end row -->
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-rastreador">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    Esacolha um rastreador
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body ui-widget-content">
                                <table cellpadding="0" cellspacing="0" class="table-striped">
                                    <thead>
                                        <tr>
                                            <th style="padding: 5px; width: 220px; text-align: center">Modelo<br/><input type="search" placeholder="Buscar" ng-model="searchRastreador.Rastreador.modelo" class="form-control"/></th>
                                            <th style="padding: 5px;width: 220px; text-align: center">Marca<br/><input type="search" placeholder="Buscar" ng-model="searchRastreador.Rastreador.marca" class="form-control"/></th>
                                            <th style="padding: 5px;width: 220px; text-align: center">Nº Série<br/><input type="search" placeholder="Buscar" ng-model="searchRastreador.Rastreador.numero_serie" class="form-control"/></th>
                                            <th style="padding: 5px;width: 220px; text-align: center">Nº Equipamento<br/><input type="search" placeholder="Buscar" ng-model="searchRastreador.Rastreador.numero_equipamento" class="form-control"/></th>
                                        </tr>
                                    </thead>
                                    <tbody style="overflow-y: scroll; height: 400px; position: inherit">
                                        <tr>
                                            <td colspan="4">
                                                <div style="overflow-y: auto; height: 500px;">
                                                    <table ellpadding="0" cellspacing="0" class="table table-striped">
                                                        <tr style="cursor: pointer" ng-repeat="item in rastreadores| filter:searchRastreador:strict" ng-click="selecionarRastreador(item.Rastreador)">
                                                            <td style="width: 210px;">{{item.Rastreador.modelo}}</td>
                                                            <td style="width: 200px;">{{item.Rastreador.marca}}</td>
                                                            <td style="width: 210px;">{{item.Rastreador.numero_serie}}</td>
                                                            <td>{{item.Rastreador.numero_equipamento}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
