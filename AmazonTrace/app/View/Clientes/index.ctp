<div class="clientes index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Clientes'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">
        <!-- SIDEBAR
                <div class="col-md-3">
                    <div class="actions">
                        <div class="panel panel-default">
                            <div class="panel-heading">Actions</div>
                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Cliente'), array('action' => 'add'), array('escape' => false)); ?></li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Enderecos'), array('controller' => 'enderecos', 'action' => 'index'), array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Endereco'), array('controller' => 'enderecos', 'action' => 'add'), array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contatos'), array('controller' => 'contatos', 'action' => 'index'), array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contato'), array('controller' => 'contatos', 'action' => 'add'), array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Veiculos'), array('controller' => 'veiculos', 'action' => 'index'), array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Veiculo'), array('controller' => 'veiculos', 'action' => 'add'), array('escape' => false)); ?> </li>
                                </ul>
                            </div><!-- end body - ->
                        </div><!-- end panel - ->
                    </div><!-- end actions - ->
                </div><!-- end col md 3 -->

        <div >

            <div  >
                <?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>
                <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->select('tipo', array(  'F'=>'Pessoa Fisica','J'=>'Pessoa Juridica') );?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('cpf_cnpj', array('class' => 'form-control cpf', 'placeholder' => 'Cpf'));?>
                </div>
                <div class="form-group col-md-3">
					<?php echo $this->Form->input('ie', array( 'class' => 'form-control pj', 'placeholder' => 'Inscrição estadual'));?>
                </div>
                <div class="form-group  col-md-3">
					<?php echo $this->Form->input('im', array( 'class' => 'form-control pj', 'placeholder' => 'Inscrição municipal'));?>
                </div>
                <div class="form-group  col-md-6">
					<?php echo $this->Form->input('nome', array('class' => 'form-control ', 'placeholder' => 'Nome'));?>
                </div>
                <div class="form-group  col-md-6">
					<?php echo $this->Form->input('razao_social', array( 'class' => 'form-control pj', 'placeholder' => 'Razao Social'));?>
                </div>
                <div class="form-group  col-md-2">
					<?php echo $this->Form->input('telefone', array('class' => 'form-control tel', 'placeholder' => 'Telefone'));?>
                </div>
                <div class="form-group  col-md-5">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email'));?>
                </div>
                <div class="form-group  col-md-5">
					<?php echo $this->Form->input('email_de_cobranca', array('class' => 'form-control', 'placeholder' => 'Email De Cobranca'));?>
                </div>
                <div class="form-group  col-md-9">
					<?php echo $this->Form->input('medidas_panico', array('class' => 'form-control', 'placeholder' => 'Medidas Panico'));?>
                </div>
                <div class="form-group  col-md-3">
					<?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha Panico'));?>
                </div>
                <div class="form-group  col-md-12">
					<?php echo $this->Form->label('Observ&ccedil;&otilde;es');?>
                </div>
                <div class="form-group  col-md-12">
					<?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs'));?>
                </div>
                <div class="form-group col-md-offset-10  col-md-1">
                     <?php echo $this->Html->link('Novo', array('action' => 'index' ), array('escape' => false ,'class'=>'btn btn-default')); ?>

                </div>
                <div class="form-group col-md-1">
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
                            <th><?php echo $this->Paginator->sort('tipo'); ?></th>
                            <th><?php echo $this->Paginator->sort('cpf_cnpj'); ?></th>

                            <th><?php echo $this->Paginator->sort('nome'); ?></th>
                            
                            <th><?php echo $this->Paginator->sort('telefone'); ?></th>
                            <th><?php echo $this->Paginator->sort('email'); ?></th>
                            <th><?php echo $this->Paginator->sort('email_de_cobranca'); ?></th>


                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
				<?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo h($cliente['Cliente']['id']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['tipo']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['cpf_cnpj']); ?>&nbsp;</td>

                            <td><?php echo h($cliente['Cliente']['nome']); ?>&nbsp;</td>
                         
                            <td><?php echo h($cliente['Cliente']['telefone']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['email']); ?>&nbsp;</td>
                            <td><?php echo h($cliente['Cliente']['email_de_cobranca']); ?>&nbsp;</td>


                            <td class="actions">

							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'index', $cliente['Cliente']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $cliente['Cliente']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cliente['Cliente']['id'])); ?>
                            </td>
                        </tr>
				<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <p>
                    <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
                </p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
                <ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
                </ul>
			<?php } ?>
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->