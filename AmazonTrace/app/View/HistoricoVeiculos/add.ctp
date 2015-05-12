<div class="historicoVeiculos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Historico Veiculo'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Historico Veiculos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rastreadors'), array('controller' => 'rastreadors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('HistoricoVeiculo', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('veiculo_id', array('class' => 'form-control', 'placeholder' => 'Veiculo Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('rastreador_id', array('class' => 'form-control', 'placeholder' => 'Rastreador Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_inicio', array('class' => 'form-control', 'placeholder' => 'Data Inicio'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_fim', array('class' => 'form-control', 'placeholder' => 'Data Fim'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('informacao_adicional', array('class' => 'form-control', 'placeholder' => 'Informacao Adicional'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
