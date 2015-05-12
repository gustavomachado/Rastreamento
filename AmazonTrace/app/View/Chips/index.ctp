<div class="chips index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Chips');
                    echo $this->Html->link('<span class="flaticon-add180"></span>', array('action' => 'cadastro'), array('escape' => false, 'title' => 'Novo'));
                    ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="  row"> 
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
        <div>
            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped  ">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('rastreador_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('operadora'); ?></th>
                            <th><?php echo $this->Paginator->sort('numero_chip', 'Número Chip'); ?></th>
                            <th><?php echo $this->Paginator->sort('numero_telefone', 'Número Telefone'); ?></th>
                            <th><?php echo $this->Paginator->sort('apn'); ?></th>
                            <th class="actions">A&ccedil;&otilde;es</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chips as $chip): ?>
                        <tr > 
                            <td><?php echo h($chip['Chip']['id']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($chip['Rastreador']['id'].' - '.$chip['Rastreador']['modelo'], array('controller' => 'rastreadors', 'action' => 'edit', $chip['Rastreador']['id'])); ?>
                            </td>
                            <td><?php echo h($chip['Operadora']['nome']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['numero_chip']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['numero_telefone']); ?>&nbsp;</td>
                            <td><?php echo h($chip['Chip']['apn']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'cadastro', $chip['Chip']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $chip['Chip']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $chip['Chip']['id'])); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <p>
                    <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
                </p>
                <?php
                $params = $this->Paginator->params();
                if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                            echo $this->Paginator->prev('&larr; Anterior', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Anterior</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
                            echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
                            echo $this->Paginator->next('Pr&oacute;ximo &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Pr&oacute;ximo &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
                    ?>
                </ul>
                <?php } ?>
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->