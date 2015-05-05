<div class="clientes form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Cadastro Clientes');
                    echo $this->Html->link('<span class="flaticon-list89"></span>', array('action' => 'index'), array('escape' => false));
                    ?></h1>
            </div>
        </div>
    </div>



    <div class="row">

        <?php
        if (isset($this->request->data['Contato'])) {
            $contatos = $this->request->data['Contato'];
        }
        if (isset($this->request->data["Cliente"])) {
            $id = $this->request->data["Cliente"]['id'];
            if (strcasecmp($this->request->data["Cliente"]['tipo'], "J") == 0) {
                $tipo = '';
                $cpfCNPJ = 'cnpj';
            } else {
                $tipo = 'pj';
                $cpfCNPJ = 'cpf';
            }
        } else {
            $id = 0;
            $tipo = 'pj';
            $cpfCNPJ = 'cpf';
        }
        ?>
        <div  >
            <div class="col-md-12">
                <h3><?php echo __('Dados Pessoais'); ?></h3>
            </div>
            <?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('tipo', array('options' => array('F' => 'Pessoa Fisica', 'J' => 'Pessoa Juridica'), 'empty' => 'Selecione o Tipo', 'class' => 'form-control', 'required')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('cpf_cnpj', array('class' => 'form-control ' . $cpfCNPJ, 'placeholder' => 'Cpf')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('ie', array('class' => 'form-control ' . $tipo, 'placeholder' => 'Inscrição estadual')); ?>
            </div>
            <div class="form-group  col-md-3">
                <?php echo $this->Form->input('im', array('class' => 'form-control ' . $tipo, 'placeholder' => 'Inscrição municipal')); ?>
            </div>
            <div class="form-group  col-md-5">
                <?php echo $this->Form->input('nome', array('class' => 'form-control ', 'placeholder' => 'Nome')); ?>
            </div>
            <div class="form-group  col-md-5">
                <?php echo $this->Form->input('razao_social', array('class' => 'form-control ' . $tipo, 'placeholder' => 'Razao Social')); ?>
            </div>
            <div class="form-group  col-md-2">
                <?php echo $this->Form->input('telefone', array('class' => 'form-control tel', 'placeholder' => 'Telefone')); ?>
            </div>
            <div class="form-group  col-md-3">
                <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
            </div>

            <div class="form-group  col-md-3">
                <?php
                echo $this->Form->input('email_de_cobranca1', array('class' => 'form-control',
                    'placeholder' => 'Email De Cobranca'));
                ?>
            </div>
            <div class="form-group  col-md-3">
                <?php
                echo $this->Form->input('email_de_cobranca2', array('class' => 'form-control',
                    'placeholder' => 'Email De Cobranca'));
                ?>
            </div>

            <div class="form-group  col-md-3">
                <?php
                echo $this->Form->input('email_de_cobranca3', array('class' => 'form-control',
                    'placeholder' => 'Email De Cobranca'));
                ?>
            </div>

            <?php if ($id > 0) { ?>
                <div class="form-group  col-md-2">
                    <button type="button" data-toggle="modal" data-target="#modal-contato" class="btn btn-default">Add Contato
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </div>
                <div class="form-group  col-md-2">
                    <a href="/AmazonTrace/Veiculos/index/<?= $id ?>" class="btn btn-default">
                        Add Veículos
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </div>
            <?php } else { ?>
                <div class = "form-group    col-md-2">
                    <button type = "button" data-toggle = "modal" data-target = "#modal-contato" class = "btn btn-default">Add Contato
                        <span class = "glyphicon glyphicon-plus"></span>
                    </button>
                </div>
            <?php } ?>


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


            <div id="contatos-container">
                <?php
                if (isset($contatos) && count($contatos) > 0) {
                    $i = 0;
                    foreach ($contatos as $contato) {
                        //  var_dump($contato);exit;
                        ?>
                        <div id="contato-<?= $i ?>" class="contatos">
                            <input type="hidden" value="<?= $contato['id'] ?>" name="data[Cliente][Contatos][<?= $i ?>][id]" >
                            <input type="hidden" value="<?= $contato['cliente_id'] ?>" name="data[Cliente][Contatos][<?= $i ?>][cliente_id]" >
                            <input type="hidden" value="<?= $contato['nome'] ?>" name="data[Cliente][Contatos][<?= $i ?>][nome]" >
                            <input type="hidden" value="<?= $contato['setor'] ?>" name="data[Cliente][Contatos][<?= $i ?>][setor]" >
                            <input type="hidden" value="<?= $contato['cargo'] ?>" name="data[Cliente][Contatos][<?= $i ?>][cargo]" >
                            <input type="hidden" value="<?= $contato['telefone'] ?>" name="data[Cliente][Contatos][<?= $i ?>][telefone]" >
                            <input type="hidden" value="<?= $contato['celular'] ?>" name="data[Cliente][Contatos][<?= $i ?>][celular]" >
                            <input type="hidden" value="<?= $contato['email'] ?>" name="data[Cliente][Contatos][<?= $i ?>][email]" >
                            <input type="hidden" value="<?= $contato['data_nascimento'] ?>" name="data[Cliente][Contatos][<?= $i++ ?>][data_nascimento]" >
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Novo', array('action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>

            </div>
            <div class="form-group col-md-1">
                <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div>
    </div><!-- end row -->
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-contato">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Contato</h4>
            </div>
            <div class="modal-body modal-body-contato ">
                <?php // echo $this->Form->create("Contato",array('role'=>'form','url'=>$this->Html->url(array('controller'=>'Contatos', 'action'=>'add'))))   ?>

                <?php // echo $this->Form->end( )   ?>
                <div class=" row">
                    <div class="form-group col-md-4">
                        <label>Nome</label>
                        <input class="form-control" type="text" name="nome" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>e-Mail</label>
                        <input class="form-control" type="email" name="email">
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
                    <div class="form-group col-md-3 ">
                        <label>Telefone</label>
                        <input class="form-control tel" type="text" name="telefone">
                    </div>
                    <div class="form-group col-md-3 ">
                        <label>Celular</label>
                        <input class="form-control tel" type="text" name="celular">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Setor</label>
                        <input class="form-control" type="text" name="setor">
                    </div>
                    <div class="form-group  col-md-3">
                        <label>Cargo</label>
                        <input class="form-control" type="text" name="cargo">
                    </div>
                    <div class="col-md-12">
                        <button  type="button" class="btn btn-default add-contato pull-right" data-target="#modal-contato">Adicionar
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                    <div class="col-md-12 ">
                        <hr>
                    </div>
                    <div   class="col-md-12  scroll-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>e-Mail</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th>
                                    <th class="actions">A&ccedil;&otilde;es</th>
                                </tr>
                            </thead>
                            <tbody id="contatos-container-table">
                                <?php
                                if (isset($contatos) && count($contatos) > 0) {
                                    foreach ($contatos as $contato) {
                                        ?>
                                        <tr id="contato-<?= $i ?>-table" class="contatos">
                                            <td><?= $contato['nome'] ?></td>
                                            <td><?= $contato['email'] ?></td>
                                            <td><?= $contato['telefone'] ?></td>
                                            <td><?= $contato['cargo'] ?></td>
                                            <td><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'Contatos', 'action' => 'delete', $contato['id'], $contato['cliente_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contato['id'])); ?> </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer  ">
                <div class="row">
                    <div class="msg-area col-md-7" style="//border: 1px solid red;">

                    </div>
                    <div class="col-md-5" style="//border: 1px solid black;">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Sair
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>

                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->