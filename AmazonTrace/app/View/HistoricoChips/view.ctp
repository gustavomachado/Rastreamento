<div class="historicoChips view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Historico Chip'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Historico Chip'), array('action' => 'edit', $historicoChip['HistoricoChip']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Historico Chip'), array('action' => 'delete', $historicoChip['HistoricoChip']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $historicoChip['HistoricoChip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Historico Chips'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Historico Chip'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Chips'), array('controller' => 'chips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Chip'), array('controller' => 'chips', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($historicoChip['HistoricoChip']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Chip'); ?></th>
		<td>
			<?php echo $this->Html->link($historicoChip['Chip']['id'], array('controller' => 'chips', 'action' => 'view', $historicoChip['Chip']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rastreador'); ?></th>
		<td>
			<?php echo $this->Html->link($historicoChip['Rastreador']['id'], array('controller' => 'rastreadors', 'action' => 'view', $historicoChip['Rastreador']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Inicio'); ?></th>
		<td>
			<?php echo h($historicoChip['HistoricoChip']['data_inicio']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Fim'); ?></th>
		<td>
			<?php echo h($historicoChip['HistoricoChip']['data_fim']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Informacao Adicional'); ?></th>
		<td>
			<?php echo h($historicoChip['HistoricoChip']['informacao_adicional']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

