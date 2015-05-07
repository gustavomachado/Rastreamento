<div class="contratos view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Contrato') . ' - ' . h($contrato['Contrato']['numero_contrato']); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <div class="col-md-12">			
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Numero Contrato'); ?></th>
                            <td style="width: 160px;">
                                <?php echo h($contrato['Contrato']['numero_contrato']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('Doc'); ?></th>
                            <td>
                                <?php echo h($contrato['Contrato']['doc']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>                         
                            <th style="width: 160px; text-align: right"><?php echo __('Data Inicio'); ?></th>
                            <td style="width: 160px;">
                                <?php echo h($contrato['Contrato']['data_inicio']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('Dia Vencimento'); ?></th>
                            <td>
                                <?php echo h($contrato['Contrato']['dia_vencimento']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Data Vencimento'); ?></th>
                            <td style="width: 160px;">
                                <?php echo h($contrato['Contrato']['data_vencimento']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('Valor Mensalidade'); ?></th>
                            <td>
                                <?php echo h($contrato['Contrato']['valor_mensalidade']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Status'); ?></th>
                            <td >
                                <?php echo h($contrato['Contrato']['status']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('Obs'); ?></th>
                            <td colspan="4">
                                <?php echo h($contrato['Contrato']['obs']); ?>
                                &nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h3><?php echo __('Cliente'); ?></h3>
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo ($contrato['Cliente']['tipo'] == 'F') ? __('CPF'): __('CNPJ'); ?></th>
                            <td style="width: 160px;">
                                <?php echo h($contrato['Cliente']['cpf_cnpj']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('Nome'); ?></th>
                            <td>
                                <?php echo h($contrato['Cliente']['nome']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Telefone'); ?></th>
                            <td style="width: 160px;">
                                <?php echo h($contrato['Cliente']['telefone']); ?>
                                &nbsp;
                            </td>
                            <th style="width: 160px; text-align: right"><?php echo __('E-mail'); ?></th>
                            <td>
                                <?php echo h($contrato['Cliente']['email']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Endereço'); ?></th>
                            <td colspan="3">
                                <?php echo h($contrato['Cliente']['rua'] . ', nº' . $contrato['Cliente']['numero'] . ', ' . $contrato['Cliente']['bairro']) . ', ' . $contrato['Cliente']['cidade'] . '-' . $contrato['Cliente']['uf'] ; ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 160px; text-align: right"><?php echo __('Complemento'); ?></th>
                            <td colspan="3">
                                <?php echo h($contrato['Cliente']['complemento']); ?>
                                &nbsp;
                            </td>
                        </tr>
                            
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <h3><?php echo __('Veiculos'); ?></h3>
            <?php if (!empty($contrato['Veiculo'])): ?>
                <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo __('Placa'); ?></th>
                            <th><?php echo __('Tipo Veiculo'); ?></th>
                            <th><?php echo __('Marca'); ?></th>
                            <th><?php echo __('Modelo'); ?></th>
                            <th><?php echo __('Ano Fabricacao'); ?></th>
                            <th><?php echo __('Ano Modelo'); ?></th>
                            <th><?php echo __('Status'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contrato['Veiculo'] as $veiculo): ?>
                            <tr>
                                <td><?php echo $veiculo['placa']; ?></td>
                                <td><?php echo $veiculo['tipo_veiculo']; ?></td>
                                <td><?php echo $veiculo['marca']; ?></td>
                                <td><?php echo $veiculo['modelo']; ?></td>
                                <td><?php echo $veiculo['ano_fabricacao']; ?></td>
                                <td><?php echo $veiculo['ano_modelo']; ?></td>
                                <td><?php echo $veiculo['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div><!-- end col md 12 -->
        <div class="col-md-12">
            <hr>
        </div>
        <div class="form-group col-md-12" style="text-align: right">
            <?php echo $this->Html->link('Cancelar', array('controller' => 'contratos', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>
    </div>
</div>

