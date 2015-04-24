<div class="clientes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Cliente'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Cliente'), array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Cliente'), array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Clientes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Cliente'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Contatos'), array('controller' => 'contatos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Contato'), array('controller' => 'contatos', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['tipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cpf Cnpj'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['cpf_cnpj']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ie'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['ie']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Im'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['im']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Razao Social'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['razao_social']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Telefone'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['telefone']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['email']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Email De Cobranca'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['email_de_cobranca']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Medidas Panico'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['medidas_panico']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Senha Panico'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['senha_panico']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Obs'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['obs']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cep'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['cep']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rua'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['rua']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Numero'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['numero']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bairro'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['bairro']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cidade'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['cidade']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Uf'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['uf']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Complemento'); ?></th>
		<td>
			<?php echo h($cliente['Cliente']['complemento']); ?>
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
	<h3><?php echo __('Related Contatos'); ?></h3>
	<?php if (!empty($cliente['Contato'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cliente Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Setor'); ?></th>
		<th><?php echo __('Cargo'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Celular'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Data Nascimento'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($cliente['Contato'] as $contato): ?>
		<tr>
			<td><?php echo $contato['id']; ?></td>
			<td><?php echo $contato['cliente_id']; ?></td>
			<td><?php echo $contato['nome']; ?></td>
			<td><?php echo $contato['setor']; ?></td>
			<td><?php echo $contato['cargo']; ?></td>
			<td><?php echo $contato['telefone']; ?></td>
			<td><?php echo $contato['celular']; ?></td>
			<td><?php echo $contato['email']; ?></td>
			<td><?php echo $contato['data_nascimento']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'contatos', 'action' => 'view', $contato['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'contatos', 'action' => 'edit', $contato['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'contatos', 'action' => 'delete', $contato['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contato['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contato'), array('controller' => 'contatos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Veiculos'); ?></h3>
	<?php if (!empty($cliente['Veiculo'])): ?>
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
	<?php foreach ($cliente['Veiculo'] as $veiculo): ?>
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
