<div class="contatos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Contato'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Contato'), array('action' => 'edit', $contato['Contato']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Contato'), array('action' => 'delete', $contato['Contato']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contato['Contato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contatos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Contato'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($contato['Contato']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cliente'); ?></th>
		<td>
			<?php echo $this->Html->link($contato['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $contato['Cliente']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($contato['Contato']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Setor'); ?></th>
		<td>
			<?php echo h($contato['Contato']['setor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cargo'); ?></th>
		<td>
			<?php echo h($contato['Contato']['cargo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone'); ?></th>
		<td>
			<?php echo h($contato['Contato']['telefone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Celular'); ?></th>
		<td>
			<?php echo h($contato['Contato']['celular']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($contato['Contato']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Nascimento'); ?></th>
		<td>
			<?php echo h($contato['Contato']['data_nascimento']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

