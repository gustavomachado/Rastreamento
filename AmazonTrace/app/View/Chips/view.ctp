<div class="chips view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Chip'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Chip'), array('action' => 'edit', $chip['Chip']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Chip'), array('action' => 'delete', $chip['Chip']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $chip['Chip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Chips'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Chip'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Rastreadors'), array('controller' => 'rastreadors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($chip['Chip']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rastreador'); ?></th>
		<td>
			<?php echo $this->Html->link($chip['Rastreador']['id'], array('controller' => 'rastreadors', 'action' => 'view', $chip['Rastreador']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Operadora'); ?></th>
		<td>
			<?php echo h($chip['Chip']['operadora']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero Chip'); ?></th>
		<td>
			<?php echo h($chip['Chip']['numero_chip']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero Telefone'); ?></th>
		<td>
			<?php echo h($chip['Chip']['numero_telefone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Apn'); ?></th>
		<td>
			<?php echo h($chip['Chip']['apn']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Obs'); ?></th>
		<td>
			<?php echo h($chip['Chip']['obs']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

