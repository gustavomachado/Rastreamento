<div class="operadoras form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo (isset($this->data['Operadora']['id']) ? 'Editar Operadora' : 'Cadastrar Operadora'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('Operadora', array('role' => 'form')); ?>
            <?php echo $this->Form->hidden('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
            <div class="form-group col-lg-4">
                <?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome')); ?>
            </div>
            <div class="form-group col-lg-12">
                <?php echo $this->Form->input('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('controller' => 'Operadoras', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>
