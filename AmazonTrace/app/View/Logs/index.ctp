<script>
    $(document).ready(function () {
        if ($('#filtro').val() == 'Log.created') {
            $('#pesquisar').attr('type', 'date');
        } else {
            $('#pesquisar').attr('type', 'text');
        }
        $('#filtro').change(function () {
            if (this.value == 'Log.created') {
                $('#pesquisar').attr('type', 'date');
            } else {
                $('#pesquisar').val(null);
                $('#pesquisar').attr('type', 'text');
            }
            $('#pesquisar').focus();
        });
    });
</script>

<div class="logs index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Logs'); ?></h1>
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
            <div class="col-md-12 scroll-content" style="height: 523px">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('usuario_id', 'Usuário'); ?></th>
                            <th><?php echo $this->Paginator->sort('created', 'Data'); ?></th>
                            <th><?php echo $this->Paginator->sort('acao', 'Ação'); ?></th>
                            <th><?php echo $this->Paginator->sort('tabela'); ?></th>
                            <th><?php echo $this->Paginator->sort('dispositivo'); ?></th>
                            <th><?php echo $this->Paginator->sort('informacao_adicional', 'Informação adicional'); ?></th>
                            <th class="actions" style="width: 20px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($log['Usuario']['id'] . ' - ' . $log['Usuario']['nome'], array('controller' => 'users', 'action' => 'cadastro', $log['Usuario']['id'])); ?>
                                </td>
                                <td><?php echo h(date('d/m/Y H:i:s', strtotime($log['Log']['created']))); ?>&nbsp;</td>
                                <td><?php echo h($log['Log']['acao']); ?>&nbsp;</td>
                                <td><?php echo h($log['Log']['tabela']); ?>&nbsp;</td>
                                <td><?php echo h($log['Log']['dispositivo']); ?>&nbsp;</td>
                                <td><?php echo h($log['Log']['informacao_adicional']); ?>&nbsp;</td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $log['Log']['id']), array('escape' => false)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- end col md 12 -->
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros do total de {:count}, começando no registro {:start}, que termina em {:end}'))); ?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Anterior', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Anterior</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Próximo &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Próximo &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>
        </div>
    </div><!-- end row -->

</div><!-- end containing of content -->