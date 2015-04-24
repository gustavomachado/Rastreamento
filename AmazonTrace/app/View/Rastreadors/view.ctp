<div class="rastreadors view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Rastreador'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Rastreador'), array('action' => 'edit', $rastreador['Rastreador']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Rastreador'), array('action' => 'delete', $rastreador['Rastreador']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $rastreador['Rastreador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Rastreadors'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Rastreador'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Chips'), array('controller' => 'chips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Chip'), array('controller' => 'chips', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Historico Chips'), array('controller' => 'historico_chips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Historico Chip'), array('controller' => 'historico_chips', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Historico Veiculos'), array('controller' => 'historico_veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Historico Veiculo'), array('controller' => 'historico_veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($rastreador['Rastreador']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Veiculo'); ?></th>
		<td>
			<?php echo $this->Html->link($rastreador['Veiculo']['id'], array('controller' => 'veiculos', 'action' => 'view', $rastreador['Veiculo']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Marca'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['marca']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modelo'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['modelo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero Equipamento'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['numero_equipamento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero Serie'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['numero_serie']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha Rastreador'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['senha_rastreador']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha Acesso Remoto'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['senha_acesso_remoto']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha Sms'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['senha_sms']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha Panico'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['senha_panico']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Instalacao'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['data_instalacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Remocao'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['data_remocao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bloqueio'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['bloqueio']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Imei'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['imei']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Apn'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['apn']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Obs'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['obs']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('E1'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['e1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('E2'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['e2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('E3'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['e3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('E4'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['e4']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('S1'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['s1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('S2'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['s2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('S3'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['s3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('S4'); ?></th>
		<td>
			<?php echo h($rastreador['Rastreador']['s4']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Chips'); ?></h3>
	<?php if (!empty($rastreador['Chip'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Rastreador Id'); ?></th>
		<th><?php echo __('Operadora'); ?></th>
		<th><?php echo __('Numero Chip'); ?></th>
		<th><?php echo __('Numero Telefone'); ?></th>
		<th><?php echo __('Apn'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($rastreador['Chip'] as $chip): ?>
		<tr>
			<td><?php echo $chip['id']; ?></td>
			<td><?php echo $chip['rastreador_id']; ?></td>
			<td><?php echo $chip['operadora']; ?></td>
			<td><?php echo $chip['numero_chip']; ?></td>
			<td><?php echo $chip['numero_telefone']; ?></td>
			<td><?php echo $chip['apn']; ?></td>
			<td><?php echo $chip['obs']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'chips', 'action' => 'view', $chip['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'chips', 'action' => 'edit', $chip['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'chips', 'action' => 'delete', $chip['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $chip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Chip'), array('controller' => 'chips', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Historico Chips'); ?></h3>
	<?php if (!empty($rastreador['HistoricoChip'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Chip Id'); ?></th>
		<th><?php echo __('Rastreador Id'); ?></th>
		<th><?php echo __('Data Inicio'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('Informacao Adicional'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($rastreador['HistoricoChip'] as $historicoChip): ?>
		<tr>
			<td><?php echo $historicoChip['id']; ?></td>
			<td><?php echo $historicoChip['chip_id']; ?></td>
			<td><?php echo $historicoChip['rastreador_id']; ?></td>
			<td><?php echo $historicoChip['data_inicio']; ?></td>
			<td><?php echo $historicoChip['data_fim']; ?></td>
			<td><?php echo $historicoChip['informacao_adicional']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'historico_chips', 'action' => 'view', $historicoChip['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'historico_chips', 'action' => 'edit', $historicoChip['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'historico_chips', 'action' => 'delete', $historicoChip['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $historicoChip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Historico Chip'), array('controller' => 'historico_chips', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Historico Veiculos'); ?></h3>
	<?php if (!empty($rastreador['HistoricoVeiculo'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Veiculo Id'); ?></th>
		<th><?php echo __('Rastreador Id'); ?></th>
		<th><?php echo __('Data Inicio'); ?></th>
		<th><?php echo __('Data Fim'); ?></th>
		<th><?php echo __('Informacao Adicional'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($rastreador['HistoricoVeiculo'] as $historicoVeiculo): ?>
		<tr>
			<td><?php echo $historicoVeiculo['id']; ?></td>
			<td><?php echo $historicoVeiculo['veiculo_id']; ?></td>
			<td><?php echo $historicoVeiculo['rastreador_id']; ?></td>
			<td><?php echo $historicoVeiculo['data_inicio']; ?></td>
			<td><?php echo $historicoVeiculo['data_fim']; ?></td>
			<td><?php echo $historicoVeiculo['informacao_adicional']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'historico_veiculos', 'action' => 'view', $historicoVeiculo['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'historico_veiculos', 'action' => 'edit', $historicoVeiculo['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'historico_veiculos', 'action' => 'delete', $historicoVeiculo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $historicoVeiculo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Historico Veiculo'), array('controller' => 'historico_veiculos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
