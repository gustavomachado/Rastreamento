<div class="veiculos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Veiculo'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Veiculo.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Veiculo.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Veiculos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Clientes'), array('controller' => 'clientes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Cliente'), array('controller' => 'clientes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Motoristas'), array('controller' => 'motoristas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Motorista'), array('controller' => 'motoristas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contratos'), array('controller' => 'contratos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contrato'), array('controller' => 'contratos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rastreadors'), array('controller' => 'rastreadors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Veiculo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cliente_id', array('class' => 'form-control', 'placeholder' => 'Cliente Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('motorista_id', array('class' => 'form-control', 'placeholder' => 'Motorista Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('contrato_id', array('class' => 'form-control', 'placeholder' => 'Contrato Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('placa', array('class' => 'form-control', 'placeholder' => 'Placa'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo_veiculo', array('class' => 'form-control', 'placeholder' => 'Tipo Veiculo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('marca', array('class' => 'form-control', 'placeholder' => 'Marca'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cor', array('class' => 'form-control', 'placeholder' => 'Cor'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ano_fabricacao', array('class' => 'form-control', 'placeholder' => 'Ano Fabricacao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ano_modelo', array('class' => 'form-control', 'placeholder' => 'Ano Modelo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('chassi', array('class' => 'form-control', 'placeholder' => 'Chassi'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('renavan', array('class' => 'form-control', 'placeholder' => 'Renavan'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('combustivel', array('class' => 'form-control', 'placeholder' => 'Combustivel'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('consumo_km_litro', array('class' => 'form-control', 'placeholder' => 'Consumo Km Litro'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('consumo_litro_hr', array('class' => 'form-control', 'placeholder' => 'Consumo Litro Hr'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('tipo_instalacao', array('class' => 'form-control', 'placeholder' => 'Tipo Instalacao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('local_instalacao_rastreador', array('class' => 'form-control', 'placeholder' => 'Local Instalacao Rastreador'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('fiacao_utilizada', array('class' => 'form-control', 'placeholder' => 'Fiacao Utilizada'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email_notificacao', array('class' => 'form-control', 'placeholder' => 'Email Notificacao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('sms_notificacao', array('class' => 'form-control', 'placeholder' => 'Sms Notificacao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('plano_notificacao_email', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Email'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('plano_notificacao_sms', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Sms'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
