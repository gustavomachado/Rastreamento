<div class="chips form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo (isset($this->data['Chip']['id']) ? __('Editar Chip') : __('Cadastrar Chip')); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <?php echo $this->Form->create('Chip', array('role' => 'form')); ?>
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            <div class="form-group col-md-2">
                <label>Operadora</label>
                <div class='input-group '>
                    <a href="/AmazonTrace/Operadoras/cadastro" class="input-group-addon">
                        <span class="glyphicon glyphicon-plus" ></span>
                    </a>
                    <?php echo $this->Form->input('operadora_id', array('class' => 'form-control', 'div' => false, 'placeholder' => 'Operadora', 'label' => false)); ?>
                </div>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('numero_telefone', array('class' => 'form-control tel', 'placeholder' => 'Número Telefone')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('numero_chip', array('class' => 'form-control', 'placeholder' => 'Número Chip')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('apn', array('class' => 'form-control', 'placeholder' => 'Apn')); ?>
            </div>
            <div class="col-md-12">
                <?php echo $this->Form->label('Observa&ccedil;&atilde;o'); ?>
            </div>
            <div class="form-group col-md-9">
                <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
            </div>            
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('controller' => 'Chips', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
</div>
