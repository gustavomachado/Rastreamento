<div class="historicoVeiculos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Historico Veiculo'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Historico Veiculo'), array('action' => 'edit', $historicoVeiculo['HistoricoVeiculo']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Historico Veiculo'), array('action' => 'delete', $historicoVeiculo['HistoricoVeiculo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $historicoVeiculo['HistoricoVeiculo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Historico Veiculos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Historico Veiculo'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($historicoVeiculo['HistoricoVeiculo']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Veiculo'); ?></th>
		<td>
			<?php echo $this->Html->link($historicoVeiculo['Veiculo']['id'], array('controller' => 'veiculos', 'action' => 'view', $historicoVeiculo['Veiculo']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rastreador'); ?></th>
		<td>
			<?php echo $this->Html->link($historicoVeiculo['Rastreador']['id'], array('controller' => 'rastreadors', 'action' => 'view', $historicoVeiculo['Rastreador']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Inicio'); ?></th>
		<td>
			<?php echo h($historicoVeiculo['HistoricoVeiculo']['data_inicio']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Fim'); ?></th>
		<td>
			<?php echo h($historicoVeiculo['HistoricoVeiculo']['data_fim']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Informacao Adicional'); ?></th>
		<td>
			<?php echo h($historicoVeiculo['HistoricoVeiculo']['informacao_adicional']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

