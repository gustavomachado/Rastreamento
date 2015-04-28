<div class="contas index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Contas'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <!--<div class="col-md-3">
                <div class="actions">
                        <div class="panel panel-default">
                                <div class="panel-heading">Actions</div>
                                        <div class="panel-body">
                                                <ul class="nav nav-pills nav-stacked">
                                                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Conta'), array('action' => 'add'), array('escape' => false)); ?></li>
                                                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Acessos'), array('controller' => 'acessos', 'action' => 'index'), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Acesso'), array('controller' => 'acessos', 'action' => 'add'), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Usuarios'), array('controller' => 'usuarios', 'action' => 'index'), array('escape' => false)); ?> </li>
        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Usuario'), array('controller' => 'usuarios', 'action' => 'add'), array('escape' => false)); ?> </li>
                                                </ul>
                                        </div><!-- end body - ->
                        </div><!-- end panel - ->
                </div><!-- end actions - ->
        </div><!-- end col md 3 -->
        <div>
            <div>
                <?php echo $this->Form->create('Conta', array('role' => 'form')); ?>
                <?php echo $this->Form->hidden('id') ?>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descricao')); ?>
                </div>
                <div class="col-md-8">
                    <?php echo $this->Form->label('Observa&ccedil;&otilde;es'); ?>
                </div>
                <div class="form-group col-md-8">
                    <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
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
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                            <th><?php echo $this->Paginator->sort('obs'); ?></th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contas as $conta): ?>
                            <tr>
                                <td><?php echo h($conta['Conta']['id']); ?>&nbsp;</td>
                                <td><?php echo h($conta['Conta']['descricao']); ?>&nbsp;</td>
                                <td><?php echo h($conta['Conta']['obs']); ?>&nbsp;</td>
                                <td class="actions">
                                    <!-- <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $conta['Conta']['id']), array('escape' => false)); ?> -->
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $conta['Conta']['id']), array('escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $conta['Conta']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $conta['Conta']['id'])); ?>
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
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->