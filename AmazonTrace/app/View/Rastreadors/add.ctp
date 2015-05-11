<div class="rastreadors form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Adicionar Rastreador'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('Rastreador', array('role' => 'form')); ?>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo', 'required' => 'required')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('marca', array('class' => 'form-control', 'placeholder' => 'Marca')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('numero_equipamento', array('class' => 'form-control', 'label' => 'Número Equipamento', 'placeholder' => 'Número Equipamento')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('numero_serie', array('class' => 'form-control', 'label' => 'Número Série', 'placeholder' => 'Número Série')); ?>
            </div>
            <div class="col-md-12" style="padding: 0px">
                <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_rastreador', array('class' => 'form-control', 'placeholder' => 'Senha Rastreador')); ?>
                </div>
                <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_acesso_remoto', array('class' => 'form-control', 'placeholder' => 'Senha Acesso Remoto')); ?>
                </div>
                <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_sms', array('class' => 'form-control', 'placeholder' => 'Senha Sms')); ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->label('Data Instalação') ?>
                <?php echo $this->Form->date('data_instalacao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->label('Data Remoção') ?>
                <?php echo $this->Form->date('data_remocao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('imei', array('class' => 'form-control', 'placeholder' => 'Imei', 'label' => 'IMEI')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('tipo_instalacao', array('class' => 'form-control', 'placeholder' => 'Tipo instalação', 'label' => 'Tipo instalação')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('fiacao_utilizada', array('class' => 'form-control', 'placeholder' => 'Fiação utilizada', 'label' => 'Fiação utilizada')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('local_instalacao_rastreador', array('class' => 'form-control', 'placeholder' => 'Local instalação', 'label' => 'Local instalação')); ?>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observa&ccedil;&atilde;o') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'rows' => '2', 'cols' => '10')); ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1 right">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
</div>