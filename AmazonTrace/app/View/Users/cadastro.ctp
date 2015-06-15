<div class="usuarios form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo (isset($this->data['User']['id']) ?  'Editar Usuário' : 'Cadastrar Usuário') ; ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('User', array('role' => 'form')); ?>
            <div class="col-md-12" style="padding-left: 0px">
                <div class="form-group">
                    <?php echo $this->Form->hidden('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
                </div>
                <div class="form-group col-md-4">
                    <?php echo $this->Form->input('conta_id', array('class' => 'form-control', 'placeholder' => 'Conta Id', 'label' => 'Perfil'));?>
                </div>
            </div>
            <div class="col-md-12" style="padding-left: 0px">
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('senha', array('class' => 'form-control', 'required' => 'required', 'type'=>'password' , 'placeholder' => 'Senha', 'value' => ''));?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('confirmar_senha', array('class' => 'form-control', 'required' => 'required', 'type'=>'password' , 'placeholder' => 'Confirmar Senha', 'label'=>'Confirmar Senha'));?>
                </div>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observa&ccedil;&atilde;o') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('controller' => 'users'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1 right">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
    
</div>
