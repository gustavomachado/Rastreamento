<div class="contratos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Contrato'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Contrato'), array('action' => 'edit', $contrato['Contrato']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Contrato'), array('action' => 'delete', $contrato['Contrato']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contrato['Contrato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contratos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Contrato'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($contrato['Contrato']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero Contrato'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['numero_contrato']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Inicio'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['data_inicio']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Vencimento'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['data_vencimento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Valor Mensalidade'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['valor_mensalidade']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Dia Vencimento'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['dia_vencimento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Doc'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['doc']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Obs'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['obs']); ?>
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
	<h3><?php echo __('Related Veiculos'); ?></h3>
	<?php if (!empty($contrato['Veiculo'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Motorista Id'); ?></th>
		<th><?php echo __('Contrato Id'); ?></th>
		<th><?php echo __('Placa'); ?></th>
		<th><?php echo __('Tipo Veiculo'); ?></th>
		<th><?php echo __('Marca'); ?></th>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('Cor'); ?></th>
		<th><?php echo __('Ano Fabricacao'); ?></th>
		<th><?php echo __('Ano Modelo'); ?></th>
		<th><?php echo __('Chassi'); ?></th>
		<th><?php echo __('Renavan'); ?></th>
		<th><?php echo __('Combustivel'); ?></th>
		<th><?php echo __('Consumo Km Litro'); ?></th>
		<th><?php echo __('Consumo Litro Hr'); ?></th>
		<th><?php echo __('Tipo Instalacao'); ?></th>
		<th><?php echo __('Local Instalacao Rastreador'); ?></th>
		<th><?php echo __('Fiacao Utilizada'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Email Notificacao'); ?></th>
		<th><?php echo __('Sms Notificacao'); ?></th>
		<th><?php echo __('Plano Notificacao Email'); ?></th>
		<th><?php echo __('Plano Notificacao Sms'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($contrato['Veiculo'] as $veiculo): ?>
		<tr>
			<td><?php echo $veiculo['id']; ?></td>
			<td><?php echo $veiculo['cliente_id']; ?></td>
			<td><?php echo $veiculo['motorista_id']; ?></td>
			<td><?php echo $veiculo['contrato_id']; ?></td>
			<td><?php echo $veiculo['placa']; ?></td>
			<td><?php echo $veiculo['tipo_veiculo']; ?></td>
			<td><?php echo $veiculo['marca']; ?></td>
			<td><?php echo $veiculo['modelo']; ?></td>
			<td><?php echo $veiculo['cor']; ?></td>
			<td><?php echo $veiculo['ano_fabricacao']; ?></td>
			<td><?php echo $veiculo['ano_modelo']; ?></td>
			<td><?php echo $veiculo['chassi']; ?></td>
			<td><?php echo $veiculo['renavan']; ?></td>
			<td><?php echo $veiculo['combustivel']; ?></td>
			<td><?php echo $veiculo['consumo_km_litro']; ?></td>
			<td><?php echo $veiculo['consumo_litro_hr']; ?></td>
			<td><?php echo $veiculo['tipo_instalacao']; ?></td>
			<td><?php echo $veiculo['local_instalacao_rastreador']; ?></td>
			<td><?php echo $veiculo['fiacao_utilizada']; ?></td>
			<td><?php echo $veiculo['status']; ?></td>
			<td><?php echo $veiculo['email_notificacao']; ?></td>
			<td><?php echo $veiculo['sms_notificacao']; ?></td>
			<td><?php echo $veiculo['plano_notificacao_email']; ?></td>
			<td><?php echo $veiculo['plano_notificacao_sms']; ?></td>
			<td><?php echo $veiculo['obs']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'veiculos', 'action' => 'view', $veiculo['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'veiculos', 'action' => 'edit', $veiculo['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'veiculos', 'action' => 'delete', $veiculo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $veiculo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
