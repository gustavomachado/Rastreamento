<div class="motoristas form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Cadastro Motoristas'); ?></h1>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->create('Motorista', array('role' => 'form')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
            </div>
            <div class="form-group col-md-6">
                <?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('telefone', array('class' => 'form-control tel', 'placeholder' => 'Telefone')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('celular', array('class' => 'form-control tel', 'placeholder' => 'Celular')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('numero_cnh', array('class' => 'form-control', 'placeholder' => 'Numero Cnh')); ?>
            </div>
            <div class="col-md-12">
                <label>Observa&ccedil;&atilde;o</label>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
            </div>
            <div class=" col-lg-offset-9 col-md-1">
                <?php echo $this->Html->link('Novo', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class=" col-md-1">
                <?php echo $this->Html->link('Sair', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
