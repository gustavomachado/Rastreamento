<div class="veiculos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Cadastro Veículos'); ?></h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class=" ">
            <?php echo $this->Form->create('Veiculo', array('role' => 'form')); ?>
            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id')); ?>
            </div>
            <div class="form-group col-md-2 ">
                <?php echo $this->Form->input('placa', array('class' => 'form-control placa', 'placeholder' => 'Placa')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('tipo_veiculo', array('class' => 'form-control', 'placeholder' => 'Tipo Veiculo')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('marca', array('class' => 'form-control', 'placeholder' => 'Marca')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('cor', array('class' => 'form-control', 'placeholder' => 'Cor')); ?>
            </div>
            <div class="form-group col-md-2">
                <label for="datainicio">Ano Fabrica&ccedil;&atilde;o </label>
                <div class='input-group '>
                    <?php
                    echo $this->Form->input('ano_fabricacao', array('class' => 'form-control date-year', 'placeholder' => 'Ano Fabricacao', 'label' => FALSE, 'div' => FALSE,
                        'type' => 'number', 'max' => '9999', 'min' => '1900'));
                    ?>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="datainicio">Ano Modelo </label>
                <div class='input-group '>
                    <?php
                    echo $this->Form->input('ano_modelo', array('class' => 'form-control', 'placeholder' => 'Ano Modelo', 'label' => FALSE, 'div' => FALSE,
                        'type' => 'number', 'max' => '9999', 'min' => '1900'));
                    ?>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('chassi', array('class' => 'form-control', 'placeholder' => 'Chassi')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('renavan', array('class' => 'form-control', 'placeholder' => 'Renavan')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('combustivel', array('class' => 'form-control', 'placeholder' => 'Combustivel')); ?>
            </div>
            <div class="form-group col-md-1">
                <?php
                echo $this->Form->input('consumo_km_litro', array('class' => 'form-control', 'placeholder' => 'Km', 'type' => 'number',
                    'label' => array('text' => 'Km/L'), 'min' => '1'));
                ?>
            </div>
            <div class="form-group col-md-1">
                <?php
                echo $this->Form->input('consumo_litro_hr', array('class' => 'form-control', 'placeholder' => 'L/h', 'type' => 'number',
                    'label' => array('text' => 'Litro/h'), 'min' => '0'));
                ?>
            </div>

            <div class="form-group col-md-4">
                <?php echo $this->Form->input('local_instalacao_rastreador', array('class' => 'form-control', 'placeholder' => 'Local Instalacao Rastreador')); ?>
            </div>
            <div class="form-group col-md-8">
                <label>Fia&ccedil;&atilde;o Utilizada</label>
                <?php echo $this->Form->textArea('fiacao_utilizada', array('class' => 'form-control', 'placeholder' => 'Fiacao Utilizada')); ?>
            </div>
            <div class="form-group   col-md-2 ">
                <?php echo $this->Form->input('sms_notificacao', array('class' => 'form-control tel', 'placeholder' => 'Sms Notificacao')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('plano_notificacao_sms', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Sms')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('email_notificacao', array('class' => 'form-control', 'placeholder' => 'Email Notificacao')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('plano_notificacao_email', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Email')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('motorista_id', array('class' => 'form-control', 'placeholder' => 'Motorista Id')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('bloqueio', array('options' => array(0 => 'Não', 1 => 'Sim'), 'class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha panico')); ?>
            </div>
            <div class="form-group col-md-6">
                <?php echo $this->Form->input('medidas_panico', array('class' => 'form-control', 'placeholder' => 'Medida Panico')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e1', array('class' => 'form-control', 'placeholder' => 'E1', 'label' => array('text' => 'Entrada 1'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e2', array('class' => 'form-control', 'placeholder' => 'E2', 'label' => array('text' => 'Entrada 2'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e3', array('class' => 'form-control', 'placeholder' => 'E3', 'label' => array('text' => 'Entrada 3'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e4', array('class' => 'form-control', 'placeholder' => 'E4', 'label' => array('text' => 'Entrada 4'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s1', array('class' => 'form-control', 'placeholder' => 'S1', 'label' => array('text' => 'Saida 1'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s2', array('class' => 'form-control', 'placeholder' => 'S2', 'label' => array('text' => 'Saida 2'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s3', array('class' => 'form-control', 'placeholder' => 'S3', 'label' => array('text' => 'Saida 3'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s4', array('class' => 'form-control', 'placeholder' => 'S4', 'label' => array('text' => 'Saida 4'))); ?>
            </div>
            <div class="col-md-12">
                <label>Observa&ccedil;&atilde;o</label>
            </div>
            <div class="form-group col-md-9">
                <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class=" col-lg-offset-9 col-md-1">
                        <?php echo $this->Html->link('Novo', array('action' => 'add', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
                    </div>
                    <div class=" col-md-1">
                        <?php echo $this->Html->link('Cancelar', array('action' => 'index', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
                    </div>
                    <div class="form-group  col-md-1">
                        <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
                    </div> 
                </div>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
</div>
