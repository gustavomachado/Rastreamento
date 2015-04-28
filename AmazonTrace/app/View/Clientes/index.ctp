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
                <div class="col-md-12">
                    <h3><?php echo __('Dados Pessoais'); ?></h3>
                </div>
                <?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>
                <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('tipo', array('options' => array('F' => 'Pessoa Fisica', 'J' => 'Pessoa Juridica'), 'empty' => 'Selecione o Tipo', 'class' => 'form-control','required')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('cpf_cnpj', array('class' => 'form-control cpf', 'placeholder' => 'Cpf')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('ie', array('class' => 'form-control pj', 'placeholder' => 'Inscrição estadual')); ?>
                </div>
                <div class="form-group  col-md-3">
                    <?php echo $this->Form->input('im', array('class' => 'form-control pj', 'placeholder' => 'Inscrição municipal')); ?>
                </div>
                <div class="form-group  col-md-6">
                    <?php echo $this->Form->input('nome', array('class' => 'form-control ', 'placeholder' => 'Nome')); ?>
                </div>
                <div class="form-group  col-md-6">
                    <?php echo $this->Form->input('razao_social', array('class' => 'form-control pj', 'placeholder' => 'Razao Social')); ?>
                </div>
                <div class="form-group  col-md-2">
                    <?php echo $this->Form->input('telefone', array('class' => 'form-control tel', 'placeholder' => 'Telefone')); ?>
                </div>
                <div class="form-group  col-md-4">
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                </div>
                <div class="  col-md-6">
                    <label>Email De Cobranca</label>
                </div>
                <div class="form-group  col-md-4">
                    <?php
                    echo $this->Form->input('email_de_cobranca', array('class' => 'form-control',
                        'placeholder' => 'Email De Cobranca', 'label' => FALSE));
                    ?>
                </div>
                <div class="form-group  col-md-2">
                    <button type="button" data-toggle="modal" data-target="#modal-contato" class="btn btn-default">Add Contato
                       <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </div>
                <div class="form-group  col-md-9">
                    <?php echo $this->Form->input('medidas_panico', array('class' => 'form-control', 'placeholder' => 'Medidas Panico')); ?>
                </div>
                <div class="form-group  col-md-3">
                    <?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha Panico')); ?>
                </div>
                <div class="form-group  col-md-12">
                    <?php echo $this->Form->label('Observ&ccedil;&otilde;es'); ?>
                </div>
                <div class="form-group  col-md-12">
                    <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
                </div>
                <div class="col-md-12">
                    <h3><?php echo __('Endere&ccedil;o'); ?></h3>
                </div>


                <div class="form-group col-md-2">
                    <label>CEP</label> <?php echo $this->Html->image('ajax_loader.gif', array('class' => 'pull-right loading', 'alt' => "teste", 'border' => '0')); ?>
                    <div class="input-group">
                        <?php
                        echo $this->Form->input('cep', array('class' => 'form-control cep', 'placeholder' => 'XX.XXX-XXX',
                            'label' => FALSE,
                            'div' => FALSE));
                        ?>
                        <span class="input-group-addon busca-cep"><span class="glyphicon glyphicon-search"></span></span>
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <?php echo $this->Form->input('rua', array('class' => 'form-control', 'placeholder' => 'Rua')); ?>
                </div>
                <div class="form-group col-md-2">
                    <?php echo $this->Form->input('numero', array('class' => 'form-control', 'placeholder' => 'Numero')); ?>
                </div>

                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('bairro', array('class' => 'form-control', 'placeholder' => 'Bairro')); ?>
                </div>


                <div class="form-group col-md-6">
                    <?php echo $this->Form->input('complemento', array('class' => 'form-control', 'placeholder' => 'Complemento')); ?>
                </div>
                <div class="form-group col-md-5">
                    <?php echo $this->Form->input('cidade', array('class' => 'form-control', 'placeholder' => 'Cidade')); ?>
                </div>
                <div class="form-group col-md-1">
                    <?php echo $this->Form->input('uf', array('class' => 'form-control', 'placeholder' => 'Uf')); ?>
                </div>


                <div class="form-group col-md-offset-10  col-md-1">
                    <?php echo $this->Html->link('Novo', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>

                </div>
                <div class="form-group col-md-1">
                    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
                </div>
                <div id="contatos-container">

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
            </div>
        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-contato">
    <div class="modal-dialog bs-example-modal-sm">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Contato</h4>
            </div>
            <div class="modal-body modal-body-contato ">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nome</label>
                        <input class="form-control" type="text" name="nome" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>e-Mail</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group col-md-4 ">
                        <label>Telefone</label>
                        <input class="form-control tel" type="text" name="telefone">
                    </div>
                    <div class="form-group col-md-4 ">
                        <label>Celular</label>
                        <input class="form-control tel" type="text" name="celular">
                    </div>
                    <div class="form-group col-md-4">	
                        <label for="datainicio">Data nascimento</label>
                        <div class='input-group date datetimepicker'>
                            <input class="data form-control dtinicio" type="text"     data-date-format="DD/MM/YYYY" placeholder="DD/MM/YYYY" name="data_nascimento">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Setor</label>
                        <input class="form-control" type="text" name="setor">
                    </div>
                    <div class="form-group col-md-offset-2 col-md-5">
                        <label>Cargo</label>
                        <input class="form-control" type="text" name="cargo">
                    </div>
                </div>
            </div>
            <div class="modal-footer  ">
                <div class="row">
                    <div class="msg-area col-md-7" style="//border: 1px solid red;">
                        
                    </div>
                    <div class="col-md-5" style="//border: 1px solid black;">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <button  type="button" class="btn btn-success add-contato" data-target="#modal-contato">Adicionar
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->