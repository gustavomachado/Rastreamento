<div class="acessos index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Acessos');
 
                ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div>
            <?php echo $this->Form->create('Acesso', array('role' => 'form')); ?>
            <?php echo $this->Form->hidden('id'); ?>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('pagina_id', array('class' => 'form-control', 'placeholder' => 'Pagina Id', 'label' => 'Página', 'options' => $paginas, 'empty' => 'Selecione uma página')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('conta_id', array('class' => 'form-control', 'placeholder' => 'Conta Id', 'options' => $contas, 'empty' => 'Selecione uma conta')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('visualizar', array('class' => 'form-control', 'placeholder' => 'Visualizar', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('editar', array('class' => 'form-control', 'placeholder' => 'Editar', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('excluir', array('class' => 'form-control', 'placeholder' => 'Excluir', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Novo', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1 right">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('pagina_id', 'Página'); ?></th>
                        <th><?php echo $this->Paginator->sort('conta_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('visualizar'); ?></th>
                        <th><?php echo $this->Paginator->sort('editar'); ?></th>
                        <th><?php echo $this->Paginator->sort('excluir'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($acessos as $acesso): ?>
                        <tr>
                            <td>
                                <?php echo $this->Html->link($acesso['Pagina']['id'] . ' - ' . $acesso['Pagina']['nome'], array('controller' => 'paginas', 'action' => 'view', $acesso['Pagina']['id'])); ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link($acesso['Conta']['id'] . ' - ' . $acesso['Conta']['descricao'], array('controller' => 'contas', 'action' => 'view', $acesso['Conta']['id'])); ?>
                            </td>
                            <td><?php echo h($acesso['Acesso']['visualizar'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                            <td><?php echo h($acesso['Acesso']['editar'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                            <td><?php echo h($acesso['Acesso']['excluir'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $acesso['Acesso']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $acesso['Acesso']['id']), array('escape' => false), __('Deseja realmente excluir este acesso # %s?', $acesso['Acesso']['id'])); ?>
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