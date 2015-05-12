<script>
    function salvarPermissao() {
        if (!$('#ContaId').val()) {
            return false;
        }
        var exist = false;
        var pagina;
        $('#tb-acessos-conta tr').each(function () {
            pagina = this.cells[1].innerText;
            if (pagina === $('#ContaPaginaId option:selected').text()) {
                exist = true;
            }
        });
        if (exist === true && (!$('#AcessoId').val())) {
            alert('Permissão já existe na lista.');
            return false;
        }
        $.ajax({
            type: 'POST',
            url: "<?php echo $this->Html->url(array('controller' => 'Acessos', 'action' => 'salvarPermissao')); ?>",
            data: {
                id: $('#AcessoId').val(),
                conta_id: $('#ContaId').val(),
                pagina_id: $('#ContaPaginaId').val(),
                visualizar: $('#ContaVisualizar').val(),
                editar: $('#ContaEditar').val(),
                excluir: $('#ContaExcluir').val()
            },
            success: function (data, textStatus, jqXHR) {
                var update = false;
                var json = JSON.parse(data);
                $('#tb-acessos-conta tr').each(function () {
                    if (this.cells[0].innerText.trim() === json.Acesso.id) {
                        this.cells[1].innerText = json.Pagina.nome;
                        this.cells[2].innerText = (json.Acesso.visualizar === true) ? 'Sim' : 'Não';
                        this.cells[3].innerText = (json.Acesso.editar === true) ? 'Sim' : 'Não';
                        this.cells[4].innerText = (json.Acesso.excluir === true) ? 'Sim' : 'Não';
                        update = true;
                    }
                });
                if (update === true) {
                    return false;
                }
                $('#tb-acessos-conta').append(
                        "<tr>\n\
                                        <td>" + json.Acesso.id + "</td>\n\
                                        <td>" + json.Pagina.nome + " &nbsp;</td>\n\
                                        <td>" + ((json.Acesso.visualizar === true) ? 'Sim' : 'Não') + " &nbsp;</td>\n\
                                        <td>" + ((json.Acesso.editar === true) ? 'Sim' : 'Não') + " &nbsp;</td>\n\
                                        <td>" + ((json.Acesso.excluir === true) ? 'Sim' : 'Não') + " &nbsp;</td>\n\
                                        <td>\n\
                                            <a href='#' class='btnEditarAcesso' data-value='" + json.Acesso.id + "' title='Remover Permissão'><span class='glyphicon glyphicon-edit'></span></a>\n\
                                            <a href='#' class='btnRemoverPermissao' data-value='" + json.Acesso.id + "' title='Remover Permissão'><span class='glyphicon glyphicon-remove'></span></a>\n\
                                        </td>\n\
                                    </tr>"
                        );
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Erro inesperado:\n' + errorThrown);
            }
        });
        return false;
    }

    $(document).ready(function () {
        $('.btnRemoverPermissao').click(function () {
            if (!confirm('Deseja realmente remover esta Permissão?')) {
                return false;
            }
            var id = $(this).attr('data-value');
            $.ajax({
                type: 'POST',
                url: "<?php echo $this->Html->url(array('controller' => 'Acessos', 'action' => 'delete')); ?>/" + $(this).attr('data-value'),
                success: function (data, textStatus, jqXHR) {
                    $('#tb-acessos-conta tr').each(function () {
                        if (this.cells[0].innerText.trim() === id) {
                            document.getElementById('tb-acessos-conta').deleteRow(this.rowIndex - 1);
                        }
                    });
                    $('#AcessoId').empty();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Erro inesperado:\n' + errorThrown);
                }
            });
            return false;
        });
        $('.btnEditarAcesso').click(function () {
            $.ajax({
                type: 'POST',
                url: "<?php echo $this->Html->url(array('controller' => 'Acessos', 'action' => 'view')); ?>/" + $(this).attr('data-value'),
                success: function (data, textStatus, jqXHR) {
                    var json = JSON.parse(data);
                    $('#AcessoId').val(json.Acesso.id);
                    $('#ContaId').val(json.Conta.id);
                    $('#ContaPaginaId').val(json.Pagina.id);
                    $('#ContaVisualizar').val((json.Acesso.visualizar === true) ? '1' : '0');
                    $('#ContaEditar').val((json.Acesso.editar === true) ? '1' : '0');
                    $('#ContaExcluir').val((json.Acesso.excluir === true) ? '1' : '0');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Erro inesperado:\n' + errorThrown);
                }
            });
            return false;
        });
        $('#ContaPaginaId').change(function () {
            $('#AcessoId').val(null);
        });
    });
</script>

<div class="contas form">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo (isset($this->data['Conta']['id']) ? 'Editar Conta' : 'Cadastrar Conta'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('Conta', array('role' => 'form')); ?>                
            <div style="float: left; padding: 0px;" class="col-md-5">
                <?php echo $this->Form->hidden('id') ?>
                <div class="form-group col-md-8">
                    <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'placeholder' => 'Descricao')); ?>
                </div>
                <div class="col-md-12">
                    <?php echo $this->Form->label('Observa&ccedil;&otilde;es'); ?>
                </div>
                <div class="form-group col-md-12">
                    <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
                </div>
            </div>

            <div class="form-group col-md-7">
                <div class="col-md-12"><?php echo $this->Form->label('Acessos') ?></div>
                <div style="float: left; padding: 0px; padding-top: 10px; padding-bottom: 10px; border: solid 2px #e5e5e5 ; border-radius: 7px;" class="col-md-12">
                    <input type="hidden" id="AcessoId" disabled="disabled" class="form-control">
                    <div class="form-group col-md-4">
                        <?php echo $this->Form->input('pagina_id', array('class' => 'form-control', 'placeholder' => 'Pagina Id', 'label' => 'Página', 'options' => $paginas, 'empty' => 'Selecione uma página')); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->input('visualizar', array('class' => 'form-control', 'placeholder' => 'Visualizar', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->input('editar', array('class' => 'form-control', 'placeholder' => 'Editar', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->label('Excluir') ?>
                    </div>
                    <div class="form-group col-md-2">
                        <?php echo $this->Form->input('excluir', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Excluir', 'options' => array(FALSE => 'Não', TRUE => 'Sim'))); ?>
                    </div>
                    <div class="form-group col-md-2 right" style="text-align: right">
                        <a href="#" class="btn btn-primary" onclick="salvarPermissao()" ><span class="glyphicon glyphicon-save"></span>Salvar</a>
                    </div>
                    <div class="col-md-12" >
                        <div class="col-md-12 scroll-content" style="height: 170px;">
                            <table cellpadding="0" cellspacing="0" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo __('ID'); ?></th>
                                        <th><?php echo __('Página'); ?></th>
                                        <th><?php echo __('Visualizar'); ?></th>
                                        <th><?php echo __('Editar'); ?></th>
                                        <th><?php echo __('Excluir'); ?></th>
                                        <th class="actions"></th>
                                    </tr>
                                </thead>
                                <tbody id="tb-acessos-conta">
                                    <?php foreach ($acessos as $acesso): ?>
                                        <tr>
                                            <td><?php echo h($acesso['Acesso']['id']); ?>&nbsp;</td>
                                            <td><?php echo h($acesso['Pagina']['nome']); ?></td>
                                            <td><?php echo h($acesso['Acesso']['visualizar'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                                            <td><?php echo h($acesso['Acesso']['editar'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                                            <td><?php echo h($acesso['Acesso']['excluir'] == 1 ? 'Sim' : 'Não'); ?>&nbsp;</td>
                                            <td class="actions">
                                                <a href="#" class="btnEditarAcesso" data-value="<?php echo $acesso['Acesso']['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="#" class="btnRemoverPermissao" data-value="<?php echo $acesso['Acesso']['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="form-group col-md-offset-10  col-md-1">
            <?php echo $this->Html->link('Cancelar', array('controller' => 'contas', 'action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>
        <div class="form-group col-md-1 right">
            <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
        </div>
    </div><!-- end row -->
</div>
