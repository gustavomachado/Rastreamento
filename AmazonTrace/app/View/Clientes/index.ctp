<div class="clientes index">

    <div class="row">
        <div class="col-md-12 page-header">
            <div class=" col-md-2">
                <h1><?php echo __('Clientes'); 
                echo $this->Html->link('<span class="flaticon-add180"></span>', array('action' => 'add'), array('escape' => false));?>
                </h1>
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
        <div >
            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('tipo'); ?></th>
                            <th><?php echo $this->Paginator->sort('cpf_cnpj'); ?></th>
                            <th><?php echo $this->Paginator->sort('nome'); ?></th>
                            <th><?php echo $this->Paginator->sort('telefone'); ?></th>
                            <th><?php echo $this->Paginator->sort('email'); ?></th>
                            <th><?php echo $this->Paginator->sort('email_de_cobranca1'); ?></th>
                            <th class="actions">A&ccedil;&otilde;es</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['tipo']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['cpf_cnpj']); ?>&nbsp;</td>

                            <td><?php echo h($cliente['Cliente']['nome']); ?>&nbsp;</td>

                            <td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['email_de_cobranca1']); ?>&nbsp;</td>
                            <td class="actions">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'add', $cliente['Cliente']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
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
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->

