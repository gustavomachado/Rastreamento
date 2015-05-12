<script>
    $(document).ready(function () {
       $('.btn-receber-notify').click(function (){
           if(!confirm('Deseja dar baixa nesta mensalidade/notificação ?')){
               return false;
           }
       }); 
    });
</script>

<div class="home form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Bem vindo!'); ?></h1>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-12">
            <div class="col-md-12 scroll-content" style="height: 370px">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nº Contrato</th>
                            <th>Cliente</th>
                            <th>Vencimento</th>
                            <th>Status</th>
                            <th style="text-align: right">Valor R$</th>
                            <th style="width: 115px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($notificacoes as $notificacao) : ?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($notificacao['Contrato']['numero_contrato'], array('controller' => 'contratos', 'action' => 'view', $notificacao['Contrato']['id'])); ?>
                                </td>
                                <td>
                                    <?php echo $this->Html->link($notificacao['Cliente']['nome_cpjCnpj'], array('controller' => 'clientes', 'action' => 'add', $notificacao['Cliente']['id'])); ?>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($notificacao['Mensalidade']['vencimento'])); ?></td>
                                <td><?php echo h($notificacao['Mensalidade']['status'] == 0) ? 'Em Aberto' : 'Paga'; ?></td>
                                <td style="text-align: right"><?php echo $notificacao['Contrato']['valor_mensalidade'] ?></td>
                                <td>
                                    <a href="<?php echo $this->Html->url(array('controller' => 'Inicio', 'action' => 'receber', $notificacao['Mensalidade']['id'])); ?>" class="btn-receber-notify">
                                        <span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-check"></span>
                                        Receber
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>