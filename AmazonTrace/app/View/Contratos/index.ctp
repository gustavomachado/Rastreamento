<div class="contratos index">
    
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Contratos');
                    echo $this->Html->link('<span class="flaticon-add180"></span>', array('action' => 'add'), array('escape' => false, 'title' => 'Novo'));
                    ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('filtro', array('options' => $filtros, 'class' => 'form-control', 'value' => $filtro)) ?>
            </div>
            <label>Pesquisar</label>
            <div class="form-group input-group col-md-3">
                <?php echo $this->Form->input('pesquisar', array('class' => 'form-control', 'style' => 'border-bottom-left-radius: 4px; border-top-left-radius: 4px', 'label' => false, 'value' => $pesquisa)) ?>
                <a id="btn-pesquisar" class="input-group-addon btn-info">
                    <span class="glyphicon glyphicon-filter"></span>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('numero_contrato', 'Nº Contrato'); ?></th>
                        <th><?php echo $this->Paginator->sort('cliente_id', 'Cliente') ?></th>
                        <th><?php echo $this->Paginator->sort('data_vencimento'); ?></th>
                        <th><?php echo $this->Paginator->sort('valor_mensalidade'); ?></th>
                        <th><?php echo $this->Paginator->sort('dia_vencimento'); ?></th>
                        <th><?php echo $this->Paginator->sort('doc'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contratos as $contrato): ?>
                        <tr>
                            <td><?php echo h($contrato['Contrato']['numero_contrato']); ?>&nbsp;</td>                        
                            <td><?php echo $this->Html->link($contrato['Cliente']['id'] . ' - ' . $contrato['Cliente']['nome'], array('controller' => 'clientes', 'action' => 'add', $contrato['Cliente']['id'])); ?>&nbsp;</td>
                            <td><?php echo ($contrato['Contrato']['data_vencimento']) ? date('d/m/Y', strtotime($contrato['Contrato']['data_vencimento'])) : 'Não definada'; ?>&nbsp;</td>
                            <td style="text-align: right; width: 150px"><?php echo h($contrato['Contrato']['valor_mensalidade']); ?>&nbsp;</td>
                            <td style="text-align: right; width: 135px"><?php echo h($contrato['Contrato']['dia_vencimento']); ?>&nbsp;</td>
                            <td><?php echo h($contrato['Contrato']['doc']); ?>&nbsp;</td>
                            <td><?php echo h($contrato['Contrato']['status']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $contrato['Contrato']['id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $contrato['Contrato']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $contrato['Contrato']['id']), array('escape' => false), __('Deseja realmente excluir este Contrato [%s] ?', $contrato['Contrato']['numero_contrato'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
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