<script>
    /*$(document).ready(function () {
     $('.cliente').change(function () {
     var id = this.value;
     $.ajax({
     type: 'POST',
     url: "<?php //echo $this->Html->url(array('controller' => 'contratos', 'action' => 'veiculosPorClientes'))  ?>/"+true,
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
     <td><a href='#' onclick='addVeiculo(" + veiculo.id + ")'><span class='glyphicon glyphicon-ok'></span></a></td>\n\
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
     $.ajax({
     type: 'POST',
     url: "<?php //echo $this->Html->url(array('controller' => 'contratos', 'action' => 'removerVeiculo'));  ?>/" + id,
     success: function (data) {
     preencherVeiculosContrato(JSON.parse(data));
     },
     error: function (jqXHR, textStatus, errorThrown) {
     alert('Erro Inesperado!' + errorThrown);
     }
     });
     }
     
     function addVeiculo(id) {
     $.ajax({
     type: 'POST',
     url: "<?php //echo $this->Html->url(array('controller' => 'contratos', 'action' => 'addVeiculo'));  ?>",
     data: {idVeiculo: id},
     success: function (data) {
     preencherVeiculosContrato(JSON.parse(data));
     },
     error: function (jqXHR, textStatus, errorThrown) {
     alert('Erro Inesperado!' + errorThrown);
     }
     })
     }*/

</script>

<?php echo $this->Html->script("functionsContrato"); ?>

<div class="contratos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Novo Contrato'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('Contrato', array('role' => 'form')); ?>
            <div class="col-md-12" style="padding: 0px">
                <div class="col-md-9">
                    <?php echo $this->Form->label('Cliente') ?>
                </div>
                <div class="form-group col-md-6">
                    <?php echo $this->Form->input('cliente_id', array('class' => 'form-control cliente', 'label' => false, 'required' => 'required', 'placeholder' => 'Cliente Id', 'empty' => 'Selecione um Cliente')); ?>
                </div>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('numero_contrato', array('class' => 'form-control', 'placeholder' => 'Número Contrato', 'label' => 'Nº Contrato')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('doc', array('class' => 'form-control', 'placeholder' => 'Documentação', 'label' => 'Documentação', 'options' => array('0' => 'Pendente', '1' => 'OK'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php
                echo $this->Form->label('Início do Contrato');
                echo $this->Form->date('data_inicio', array('class' => 'form-control', 'placeholder' => 'Início do Contrato', 'value' => date('Y-m-d')));
                ?>
            </div>
            <div class="form-group col-md-3">
                <?php
                echo $this->Form->label('Validade do Contrato');
                echo $this->Form->date('data_vencimento', array('class' => 'form-control', 'placeholder' => 'Validade do Contrato'));
                ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('dia_vencimento', array('class' => 'form-control dia-mes numberOnly', 'min' => '1', 'max' => '31', 'value' => '1', 'placeholder' => 'Vencimento das Mensalidades', 'label' => 'Vencimento das Mensalidades')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('valor_mensalidade', array('class' => 'form-control money', 'type' => 'text', 'placeholder' => 'Mensalidade (R$)', 'label' => 'Mensalidade (R$)')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php
                echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status', 'options' => array(
                        'OK - ATIVO' => 'OK - ATIVO',
                        'AGUARDANDO COLETA‏' => 'AGUARDANDO COLETA',
                        'APENAS ELABORADO' => 'APENAS ELABORADO',
                        'CANCELADO' => 'CANCELADO',
                        'ENVIADO AO CLIENTE' => 'ENVIADO AO CLIENTE',
                        'EXPIRADO/VENCIDO‏' => 'EXPIRADO/VENCIDO',
                        'PENDENTE' => 'PENDENTE',
                        'SOLICITOU CANCELAMENTO' => 'SOLICITOU CANCELAMENTO',
                        'SUSPENSO' => 'SUSPENSO'
                )));
                ?>
            </div>
            <div class="form-group col-md-12">
<?php echo $this->Form->label('Veiculos'); ?><a href="#" title="Adicionar Veículo" data-toggle="modal" data-target="#modal-veiculos-cliente" ><span class="flaticon-add180"></span></a>
                <div class="col-md-12 scroll-content" style="height: 200px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Ano Fab.</th>
                                <th>Ano Mod.</th>
                                <th>Status</th>
                                <th class="actions"></th>
                            <tr>
                        </thead>
                        <tbody id="veiculosPorContrato">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group col-md-12">
                <?php
                echo $this->Form->label('Observação');
                echo $this->Form->textarea('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));
                ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('controller' => 'contratos', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1">
            <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
<?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-veiculos-cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog bs-example-modal-sm">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Selecione os Veículos desejados</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 scroll-content" style="height: 240px">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Placa</th>
                                        <th>Tipo</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Ano Fab.</th>
                                        <th>Ano Mod.</th>
                                        <th>Status</th>
                                        <th class="actions"></th>
                                    <tr>
                                </thead>
                                <tbody id="veiculosPorClientes">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  ">
                <button class="btn btn-warning" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
