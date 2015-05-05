<div class="veiculos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Veiculo'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Veiculo'), array('action' => 'edit', $veiculo['Veiculo']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Veiculo'), array('action' => 'delete', $veiculo['Veiculo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $veiculo['Veiculo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Veiculos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Veiculo'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Motoristas'), array('controller' => 'motoristas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Motorista'), array('controller' => 'motoristas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contratos'), array('controller' => 'contratos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Contrato'), array('controller' => 'contratos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($veiculo['Veiculo']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cliente'); ?></th>
		<td>
			<?php echo $this->Html->link($veiculo['Cliente']['id'], array('controller' => 'clientes', 'action' => 'view', $veiculo['Cliente']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Motorista'); ?></th>
		<td>
			<?php echo $this->Html->link($veiculo['Motorista']['id'], array('controller' => 'motoristas', 'action' => 'view', $veiculo['Motorista']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Contrato'); ?></th>
		<td>
			<?php echo $this->Html->link($veiculo['Contrato']['id'], array('controller' => 'contratos', 'action' => 'view', $veiculo['Contrato']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Placa'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['placa']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo Veiculo'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['tipo_veiculo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Marca'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['marca']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modelo'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['modelo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cor'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['cor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ano Fabricacao'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['ano_fabricacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ano Modelo'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['ano_modelo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Chassi'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['chassi']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Renavan'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['renavan']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Combustivel'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['combustivel']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Consumo Km Litro'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['consumo_km_litro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Consumo Litro Hr'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['consumo_litro_hr']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo Instalacao'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['tipo_instalacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Local Instalacao Rastreador'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['local_instalacao_rastreador']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fiacao Utilizada'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['fiacao_utilizada']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email Notificacao'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['email_notificacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Sms Notificacao'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['sms_notificacao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Plano Notificacao Email'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['plano_notificacao_email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Plano Notificacao Sms'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['plano_notificacao_sms']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Obs'); ?></th>
		<td>
			<?php echo h($veiculo['Veiculo']['obs']); ?>
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
	<h3><?php echo __('Related Rastreadors'); ?></h3>
	<?php if (!empty($veiculo['Rastreador'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Veiculo Id'); ?></th>
		<th><?php echo __('Marca'); ?></th>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('Numero Equipamento'); ?></th>
		<th><?php echo __('Numero Serie'); ?></th>
		<th><?php echo __('Senha Rastreador'); ?></th>
		<th><?php echo __('Senha Acesso Remoto'); ?></th>
		<th><?php echo __('Senha Sms'); ?></th>
		<th><?php echo __('Senha Panico'); ?></th>
		<th><?php echo __('Data Instalacao'); ?></th>
		<th><?php echo __('Data Remocao'); ?></th>
		<th><?php echo __('Bloqueio'); ?></th>
		<th><?php echo __('Imei'); ?></th>
		<th><?php echo __('Apn'); ?></th>
		<th><?php echo __('Obs'); ?></th>
		<th><?php echo __('E1'); ?></th>
		<th><?php echo __('E2'); ?></th>
		<th><?php echo __('E3'); ?></th>
		<th><?php echo __('E4'); ?></th>
		<th><?php echo __('S1'); ?></th>
		<th><?php echo __('S2'); ?></th>
		<th><?php echo __('S3'); ?></th>
		<th><?php echo __('S4'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($veiculo['Rastreador'] as $rastreador): ?>
		<tr>
			<td><?php echo $rastreador['id']; ?></td>
			<td><?php echo $rastreador['veiculo_id']; ?></td>
			<td><?php echo $rastreador['marca']; ?></td>
			<td><?php echo $rastreador['modelo']; ?></td>
			<td><?php echo $rastreador['numero_equipamento']; ?></td>
			<td><?php echo $rastreador['numero_serie']; ?></td>
			<td><?php echo $rastreador['senha_rastreador']; ?></td>
			<td><?php echo $rastreador['senha_acesso_remoto']; ?></td>
			<td><?php echo $rastreador['senha_sms']; ?></td>
			<td><?php echo $rastreador['senha_panico']; ?></td>
			<td><?php echo $rastreador['data_instalacao']; ?></td>
			<td><?php echo $rastreador['data_remocao']; ?></td>
			<td><?php echo $rastreador['bloqueio']; ?></td>
			<td><?php echo $rastreador['imei']; ?></td>
			<td><?php echo $rastreador['apn']; ?></td>
			<td><?php echo $rastreador['obs']; ?></td>
			<td><?php echo $rastreador['e1']; ?></td>
			<td><?php echo $rastreador['e2']; ?></td>
			<td><?php echo $rastreador['e3']; ?></td>
			<td><?php echo $rastreador['e4']; ?></td>
			<td><?php echo $rastreador['s1']; ?></td>
			<td><?php echo $rastreador['s2']; ?></td>
			<td><?php echo $rastreador['s3']; ?></td>
			<td><?php echo $rastreador['s4']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'rastreadors', 'action' => 'view', $rastreador['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'rastreadors', 'action' => 'edit', $rastreador['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'rastreadors', 'action' => 'delete', $rastreador['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $rastreador['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
