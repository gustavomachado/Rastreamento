<div class="historicoVeiculos index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Historico Veiculos'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div>
            <div class="form-group col-md-2">
                <label>Chip</label>
                <?php echo $this->Form->input('filtro', array('options' => $veiculos, 'class' => 'form-control', 'value' => $filtro, 'empty' => array(0 => 'Selecione'), 'label' => false)) ?>
            </div>
            <label>Rastreador</label>
            <div class="form-group input-group col-md-3">
                <?php echo $this->Form->input('pesquisar', array('options' => $rastreadores, 'class' => 'form-control', 'style' => 'border-bottom-left-radius: 4px; border-top-left-radius: 4px', 'label' => false, 'value' => $pesquisa, 'empty' => array(0 => 'Selecione'))) ?>
                <a id="btn-pesquisar" class="input-group-addon btn-info">
                    <span class="glyphicon glyphicon-filter"></span>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12 scroll-content" style="height: 500px">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('veiculo_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('rastreador_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('data_inicio'); ?></th>
                            <th><?php echo $this->Paginator->sort('data_fim'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
				<?php foreach ($historicoVeiculos as $historicoVeiculo): ?>
                        <tr>
                            <td><?php echo h($historicoVeiculo['HistoricoVeiculo']['id']); ?>&nbsp;</td>
                            <td>
			<?php echo $this->Html->link($historicoVeiculo['Veiculo']['marca'] . ' ' . $historicoVeiculo['Veiculo']['modelo'] . ' - ' . $historicoVeiculo['Veiculo']['placa'], array('controller' => 'veiculos', 'action' => 'view', $historicoVeiculo['Veiculo']['id'])); ?>
                            </td>
                            <td>
			<?php echo $this->Html->link($historicoVeiculo['Rastreador']['id'] . ' - ' . $historicoVeiculo['Rastreador']['modelo'], array('controller' => 'rastreadors', 'action' => 'view', $historicoVeiculo['Rastreador']['id'])); ?>
                            </td>
                            <td><?php echo h(date('d/m/Y H:i:s', strtotime($historicoVeiculo['HistoricoVeiculo']['data_inicio']))); ?>&nbsp;</td>
                            <td><?php echo ($historicoVeiculo['HistoricoVeiculo']['data_fim']) ? h(date('d/m/Y H:i:s', strtotime($historicoVeiculo['HistoricoVeiculo']['data_fim']))) : 'Não definida'; ?>&nbsp;</td>
                        </tr>
				<?php endforeach; ?>
                    </tbody>
                </table>



            </div> <!-- end col md 9 -->
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros do total de {:count}, começando no registro {:start}, que termina em {:end}'))); ?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
            ?>
            <ul class="pagination pagination-sm">
                <?php
                        echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
                        echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
                ?>
            </ul>
            <?php } ?>
        </div>
    </div><!-- end row -->


</div><!-- end containing of content -->