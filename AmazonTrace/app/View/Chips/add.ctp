<div class="chips form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Add Chip'); ?></h1>
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

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Chips'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rastreadors'), array('controller' => 'rastreadors', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Rastreador'), array('controller' => 'rastreadors', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div>
                </div>
            </div>			
        </div><!-- end col md 3 -->
        <div class="col-md-9">
			<?php echo $this->Form->create('Chip', array('role' => 'form')); ?>

            <div class="form-group">
					<?php echo $this->Form->input('rastreador_id', array('class' => 'form-control', 'placeholder' => 'Rastreador Id'));?>
            </div>
            <div class="form-group">
					<?php echo $this->Form->input('operadora', array('class' => 'form-control', 'placeholder' => 'Operadora'));?>
            </div>
            <div class="form-group">
					<?php echo $this->Form->input('numero_chip', array('class' => 'form-control', 'placeholder' => 'Numero Chip'));?>
            </div>
            <div class="form-group">
					<?php echo $this->Form->input('numero_telefone', array('class' => 'form-control cel', 'placeholder' => 'Numero Telefone'));?>
            </div>
            <div class="form-group">
					<?php echo $this->Form->input('apn', array('class' => 'form-control', 'placeholder' => 'Apn'));?>
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
