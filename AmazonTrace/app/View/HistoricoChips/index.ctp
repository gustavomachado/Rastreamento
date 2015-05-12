<div class="historicoChips index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Histórico Chips'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">

        <div>
            <div class="form-group col-md-2">
                <label>Chip</label>
                <?php echo $this->Form->input('filtro', array('options' => $chips, 'class' => 'form-control', 'value' => $filtro, 'empty' => array(0 => 'Selecione'), 'label' => false)) ?>
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
                            <th><?php echo $this->Paginator->sort('chip_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('rastreador_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('data_inicio'); ?></th>
                            <th><?php echo $this->Paginator->sort('data_fim'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historicoChips as $historicoChip): ?>
                        <tr>
                            <td>
                                    <?php echo ($historicoChip['Chip']['status_reg'] !== '1') ? $this->Html->link($historicoChip['Chip']['id'] . ' - ' . $historicoChip['Chip']['numero_telefone'], array('controller' => 'chips', 'action' => 'cadastro', $historicoChip['Chip']['id'])) : '<span style="color: red">'. h($historicoChip['Chip']['id'] . ' - ' . $historicoChip['Chip']['numero_telefone']).'</span>'; ?>
                            </td>
                            <td>
                                    <?php echo ($historicoChip['Rastreador']['status_reg'] !== '1') ? $this->Html->link($historicoChip['Rastreador']['id'] . ' - ' . $historicoChip['Rastreador']['modelo'], array('controller' => 'rastreadors', 'action' => 'edit', $historicoChip['Rastreador']['id'])) : '<span style="color: red">'. h($historicoChip['Rastreador']['id'] . ' - ' . $historicoChip['Rastreador']['modelo']).'</span>'; ?>
                            </td>
                            <td><?php echo h(date('d/m/Y H:i:s', strtotime($historicoChip['HistoricoChip']['data_inicio']))); ?>&nbsp;</td>
                            <td><?php echo h(date('d/m/Y H:i:s', strtotime($historicoChip['HistoricoChip']['data_fim']))); ?>&nbsp;</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros do total de {:count}, começando no registro {:start}, que termina em {:end}'))); ?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
            <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
            </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->