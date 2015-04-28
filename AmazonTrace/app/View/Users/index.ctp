<div class="usuarios index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Usuários'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div>
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
            <div class="col-md-12" style="padding-left: 0px">
                <div class="form-group">
                    <?php echo $this->Form->hidden('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('conta_id', array('class' => 'form-control', 'placeholder' => 'Conta Id'));?>
                </div>
            </div>
            <div class="col-md-12" style="padding-left: 0px">
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('senha', array('class' => 'form-control', 'type'=>'password' , 'placeholder' => 'Senha'));?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('', array('class' => 'form-control', 'type'=>'password' , 'placeholder' => 'Confirmar Senha', 'label'=>'Confirmar Senha'));?>
                </div>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observação') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));?>
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
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $usuario['User']['id']), array('escape' => false)); ?>
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