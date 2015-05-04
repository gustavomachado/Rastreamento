<div class="usuarios index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Usuários');
                    echo $this->Html->link('<span class="flaticon-add180"></span>', array('action' => 'cadastro'), array('escape' => false, 'title' => 'Novo'));
                    ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('conta_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('nome'); ?></th>
                        <th><?php echo $this->Paginator->sort('email'); ?></th>
                        <th><?php echo $this->Paginator->sort('observação'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo h($usuario['User']['id']); ?>&nbsp;</td>
                        <td>
			<?php echo $this->Html->link($usuario['Conta']['id'] . ' - '.$usuario['Conta']['descricao'], array('controller' => 'contas', 'action' => 'view', $usuario['Conta']['id'])); ?>
                        </td>
                        <td><?php echo h($usuario['User']['nome']); ?>&nbsp;</td>
                        <td><?php echo h($usuario['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($usuario['User']['obs']); ?>&nbsp;</td>
                        <td class="actions">
                            <!--<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $usuario['User']['id']), array('escape' => false)); ?>-->
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'cadastro', $usuario['User']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $usuario['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $usuario['User']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('{:count} total')));?></small>
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

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->