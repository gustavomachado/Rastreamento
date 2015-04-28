<div class="rastreadors index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Rastreadores'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->

    <div class="row">
        <div>
            <?php echo $this->Form->create('Rastreador', array('role' => 'form')); ?>
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo')); ?>
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
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_rastreador', array('class' => 'form-control', 'placeholder' => 'Senha Rastreador')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_acesso_remoto', array('class' => 'form-control', 'placeholder' => 'Senha Acesso Remoto')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_sms', array('class' => 'form-control', 'placeholder' => 'Senha Sms')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha Pânico', 'label' => 'Senha Pânico')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->label('Data Instalação') ?>
                <?php echo $this->Form->date('data_instalacao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->label('Data Remoção') ?>
                <?php echo $this->Form->date('data_remocao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('bloqueio', array('class' => 'form-control', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('imei', array('class' => 'form-control', 'placeholder' => 'Imei')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e1', array('class' => 'form-control', 'placeholder' => 'E1')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e2', array('class' => 'form-control', 'placeholder' => 'E2')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e3', array('class' => 'form-control', 'placeholder' => 'E3')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('e4', array('class' => 'form-control', 'placeholder' => 'E4')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s1', array('class' => 'form-control', 'placeholder' => 'S1')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s2', array('class' => 'form-control', 'placeholder' => 'S2')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s3', array('class' => 'form-control', 'placeholder' => 'S3')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('s4', array('class' => 'form-control', 'placeholder' => 'S4')); ?>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observação') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'rows' => '2', 'cols' => '10')); ?>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Novo', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1 right">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('marca'); ?></th>
                        <th><?php echo $this->Paginator->sort('modelo'); ?></th>
                        <th><?php echo $this->Paginator->sort('numero_equipamento'); ?></th>
                        <th><?php echo $this->Paginator->sort('numero_serie'); ?></th>
                        <th><?php echo $this->Paginator->sort('data_instalacao'); ?></th>
                        <th><?php echo $this->Paginator->sort('data_remocao'); ?></th>
                        <th><?php echo $this->Paginator->sort('bloqueio'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rastreadors as $rastreador): ?>
                        <tr>
                            <td><?php echo h($rastreador['Rastreador']['id']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['marca']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['modelo']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['numero_equipamento']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['numero_serie']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['data_instalacao']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['data_remocao']); ?>&nbsp;</td>
                            <td><?php echo h($rastreador['Rastreador']['bloqueio']); ?>&nbsp;</td>
                            <td class="actions">
                                <!--<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $rastreador['Rastreador']['id']), array('escape' => false)); ?>-->
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $rastreador['Rastreador']['id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $rastreador['Rastreador']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $rastreador['Rastreador']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?></small>
            </p>
            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->