<div class="acessos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Acesso'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Acesso'), array('action' => 'edit', $acesso['Acesso']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Acesso'), array('action' => 'delete', $acesso['Acesso']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $acesso['Acesso']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Acessos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Acesso'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contas'), array('controller' => 'contas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Conta'), array('controller' => 'contas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Paginas'), array('controller' => 'paginas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Pagina'), array('controller' => 'paginas', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($acesso['Acesso']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Conta'); ?></th>
		<td>
			<?php echo $this->Html->link($acesso['Conta']['id'], array('controller' => 'contas', 'action' => 'view', $acesso['Conta']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Pagina'); ?></th>
		<td>
			<?php echo $this->Html->link($acesso['Pagina']['id'], array('controller' => 'paginas', 'action' => 'view', $acesso['Pagina']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Visualizar'); ?></th>
		<td>
			<?php echo h($acesso['Acesso']['visualizar']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Editar'); ?></th>
		<td>
			<?php echo h($acesso['Acesso']['editar']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Excluir'); ?></th>
		<td>
			<?php echo h($acesso['Acesso']['excluir']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

