<div class="contratos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Editar Contrato'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->create('Contrato', array('role' => 'form')); ?>
            <div class="form-group">
                <?php echo $this->Form->hidden('id'); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('numero_contrato', array('class' => 'form-control', 'placeholder' => 'Numero Contrato')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('doc', array('class' => 'form-control', 'placeholder' => 'Doc')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php
                echo $this->Form->label('Data Início');
                echo $this->Form->date('data_inicio', array('class' => 'form-control', 'placeholder' => 'Data Inicio'));
                ?>
            </div>
            <div class="form-group col-md-3">
                <?php
                echo $this->Form->label('Data Vencimento');
                echo $this->Form->date('data_vencimento', array('class' => 'form-control', 'placeholder' => 'Data Vencimento'));
                ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('valor_mensalidade', array('class' => 'form-control', 'placeholder' => 'Valor Mensalidade')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('dia_vencimento', array('class' => 'form-control', 'placeholder' => 'Dia Vencimento')); ?>
            </div>
            <div class="form-group col-md-12">
                <?php
                echo $this->Form->label('Observação');
                echo $this->Form->textarea('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));
                ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('controller' => 'contratos', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1">
<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
<?php echo $this->Form->end() ?>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
