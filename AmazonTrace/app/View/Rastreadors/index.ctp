<div class="rastreadors index">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Rastreadores');
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
                        <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                        <th><?php echo $this->Paginator->sort('modelo'); ?></th>
                        <th><?php echo $this->Paginator->sort('marca'); ?></th>
                        <th><?php echo $this->Paginator->sort('numero_equipamento', 'Número Equipamento'); ?></th>
                        <th><?php echo $this->Paginator->sort('numero_serie', 'Número série'); ?></th>
                        <th><?php echo $this->Paginator->sort('data_instalacao', 'Data instalação'); ?></th>
                        <th><?php echo $this->Paginator->sort('data_remocao', 'Data remoção'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rastreadors as $rastreador): ?>
                        <tr>
                            <td><?php echo h($rastreador['Rastreador']['id']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['modelo']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['marca']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['numero_equipamento']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['numero_serie']); ?>&nbsp;</td>
                            <td><?php echo ($rastreador['Rastreador']['data_instalacao']) ? date('d/m/Y', strtotime($rastreador['Rastreador']['data_instalacao'])) : 'Não definida'; ?>&nbsp;</td>
                            <td><?php echo ($rastreador['Rastreador']['data_remocao']) ? date('d/m/Y', strtotime($rastreador['Rastreador']['data_remocao'])) : 'Não definida'; ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $rastreador['Rastreador']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $rastreador['Rastreador']['id']), array('escape' => false), __('Deseja realmente excluir este Rastreador [%s] ?', $rastreador['Rastreador']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
