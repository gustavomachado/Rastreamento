<div class="acessos form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Acesso'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Acessos'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contas'), array('controller' => 'contas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Conta'), array('controller' => 'contas', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Paginas'), array('controller' => 'paginas', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Pagina'), array('controller' => 'paginas', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Acesso', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('conta_id', array('class' => 'form-control', 'placeholder' => 'Conta Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('pagina_id', array('class' => 'form-control', 'placeholder' => 'Pagina Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('visualizar', array('class' => 'form-control', 'placeholder' => 'Visualizar'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('editar', array('class' => 'form-control', 'placeholder' => 'Editar'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('excluir', array('class' => 'form-control', 'placeholder' => 'Excluir'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
