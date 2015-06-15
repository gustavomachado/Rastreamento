<div class="clientes view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Cliente'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">			
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('ID'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['id']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Tipo'); ?></th>
                        <td>
                            <?php echo ($cliente['Cliente']['tipo'] == 'J') ? 'Jurídica' : 'Física'; ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Cpf/Cnpj'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['cpf_cnpj']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Nome'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['nome']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Im'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['im']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Ie'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['ie']); ?>
                            &nbsp;
                        </td>                        
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Razão Social'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['razao_social']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('Telefone'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['telefone']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('E-mail'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['email']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('E-mail De Cobrança 01'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['email_de_cobranca1']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('E-mail De Cobrança 02'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['email_de_cobranca2']); ?>
                            &nbsp;
                        </td>
                        <th style="width: 190px; text-align: right"><?php echo __('E-mail De Cobrança 03'); ?></th>
                        <td>
                            <?php echo h($cliente['Cliente']['email_de_cobranca3']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 190px; text-align: right"><?php echo __('Obs'); ?></th>
                        <td colspan="3">
                            <?php echo h($cliente['Cliente']['obs']); ?>
                            &nbsp;
                        </td>
                    </tr>                    
                </tbody>
            </table>
            <h3>Endereço</h3>            
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tr>
                    <th style="width: 190px; text-align: right"><?php echo __('Logradouro'); ?></th>
                    <td>
                        <?php echo h($cliente['Cliente']['rua']); ?>
                        &nbsp;
                    </td>
                    <th style="width: 100px; text-align: right"><?php echo __('Número'); ?></th>
                    <td style="width: 50%">
                        <?php echo h($cliente['Cliente']['numero']); ?>
                        &nbsp;
                    </td>  
                </tr>
                <tr>
                    <th style="width: 190px; text-align: right"><?php echo __('Bairro'); ?></th>
                    <td>
                        <?php echo h($cliente['Cliente']['bairro']); ?>
                        &nbsp;
                    </td>                   
                    <th style="width: 100px; text-align: right"><?php echo __('Cep'); ?></th>
                    <td>
                        <?php echo h($cliente['Cliente']['cep']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th style="width: 190px; text-align: right"><?php echo __('Cidade'); ?></th>
                    <td>
                        <?php echo h($cliente['Cliente']['cidade']); ?>
                        &nbsp;
                    </td>
                    <th style="width: 100px; text-align: right"><?php echo __('Uf'); ?></th>
                    <td>
                        <?php echo h($cliente['Cliente']['uf']); ?>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <th style="width: 190px; text-align: right"><?php echo __('Complemento'); ?></th>
                    <td colspan="3">
                        <?php echo h($cliente['Cliente']['complemento']); ?>
                        &nbsp;
                    </td>
                </tr>
            </table>
        </div><!-- end col md 9 -->
    </div>
</div>
<div class="related row">
    <div class="col-md-12">
        <hr/>
        <h3><?php echo __('Contatos'); ?></h3>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo __('Nome'); ?></th>
                    <th><?php echo __('Setor'); ?></th>
                    <th><?php echo __('Cargo'); ?></th>
                    <th><?php echo __('Telefone'); ?></th>
                    <th><?php echo __('Celular'); ?></th>
                    <th><?php echo __('E-mail'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente['Contato'] as $contato): ?>
                    <tr>
                        <td><?php echo $contato['nome']; ?></td>
                        <td><?php echo $contato['setor']; ?></td>
                        <td><?php echo $contato['cargo']; ?></td>
                        <td><?php echo $contato['telefone']; ?></td>
                        <td><?php echo $contato['celular']; ?></td>
                        <td><?php echo $contato['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- end col md 12 -->
</div>
<div class="related row">
    <div class="col-md-12">
        <hr/>
        <h3><?php echo __('Veículos'); ?></h3>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <th><?php echo __('Placa'); ?></th>
                    <th><?php echo __('Tipo Veiculo'); ?></th>
                    <th><?php echo __('Marca'); ?></th>
                    <th><?php echo __('Modelo'); ?></th>
                    <th><?php echo __('Cor'); ?></th>
                    <th><?php echo __('Ano Fabricacao'); ?></th>
                    <th><?php echo __('Ano Modelo'); ?></th>
                    <th><?php echo __('Combustível'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente['Veiculo'] as $veiculo): ?>
                    <tr>
                        <td><?php echo $veiculo['placa']; ?></td>
                        <td><?php echo $veiculo['tipo_veiculo']; ?></td>
                        <td><?php echo $veiculo['marca']; ?></td>
                        <td><?php echo $veiculo['modelo']; ?></td>
                        <td><?php echo $veiculo['cor']; ?></td>
                        <td><?php echo $veiculo['ano_fabricacao']; ?></td>
                        <td><?php echo $veiculo['ano_modelo']; ?></td>
                        <td><?php echo $veiculo['combustivel']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- end col md 12 -->
    <div class="col-md-12" style="text-align: right">
        <hr>
        <div>
            <?php echo $this->Html->link('Voltar', array('controller' => 'clientes', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>
    </div>
</div>
