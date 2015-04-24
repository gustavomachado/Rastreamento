<div class="rastreadors form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Rastreador'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rastreadors'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Chips'), array('controller' => 'chips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Chip'), array('controller' => 'chips', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Historico Chips'), array('controller' => 'historico_chips', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Historico Chip'), array('controller' => 'historico_chips', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Historico Veiculos'), array('controller' => 'historico_veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Historico Veiculo'), array('controller' => 'historico_veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Rastreador', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('veiculo_id', array('class' => 'form-control', 'placeholder' => 'Veiculo Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('marca', array('class' => 'form-control', 'placeholder' => 'Marca'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('numero_equipamento', array('class' => 'form-control', 'placeholder' => 'Numero Equipamento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('numero_serie', array('class' => 'form-control', 'placeholder' => 'Numero Serie'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('senha_rastreador', array('class' => 'form-control', 'placeholder' => 'Senha Rastreador'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('senha_acesso_remoto', array('class' => 'form-control', 'placeholder' => 'Senha Acesso Remoto'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('senha_sms', array('class' => 'form-control', 'placeholder' => 'Senha Sms'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha Panico'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_instalacao', array('class' => 'form-control', 'placeholder' => 'Data Instalacao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_remocao', array('class' => 'form-control', 'placeholder' => 'Data Remocao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bloqueio', array('class' => 'form-control', 'placeholder' => 'Bloqueio'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('imei', array('class' => 'form-control', 'placeholder' => 'Imei'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('apn', array('class' => 'form-control', 'placeholder' => 'Apn'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('e1', array('class' => 'form-control', 'placeholder' => 'E1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('e2', array('class' => 'form-control', 'placeholder' => 'E2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('e3', array('class' => 'form-control', 'placeholder' => 'E3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('e4', array('class' => 'form-control', 'placeholder' => 'E4'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('s1', array('class' => 'form-control', 'placeholder' => 'S1'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('s2', array('class' => 'form-control', 'placeholder' => 'S2'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('s3', array('class' => 'form-control', 'placeholder' => 'S3'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('s4', array('class' => 'form-control', 'placeholder' => 'S4'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
