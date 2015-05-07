<div class="rastreadors form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Editar Rastreador'); ?></h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div>
            <?php echo $this->Form->create('Rastreador', array('role' => 'form')); ?>
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('modelo', array('class' => 'form-control', 'placeholder' => 'Modelo', 'required' => 'required')); ?>
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
            <div class="col-md-12" style="padding: 0px">
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('senha_rastreador', array('class' => 'form-control', 'placeholder' => 'Senha Rastreador')); ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('senha_acesso_remoto', array('class' => 'form-control', 'placeholder' => 'Senha Acesso Remoto')); ?>
                </div>
                <div class="col-md-5">
                    <?php echo $this->Form->label('Senha Sms') ?>
                </div>
                <div class="form-group col-md-3">
                    <?php echo $this->Form->input('senha_sms', array('class' => 'form-control', 'placeholder' => 'Senha Sms', 'label'=> false)); ?>
                </div>
                <div class="form-group col-md-2">
                    <button type="button" style="padding: 4px" data-toggle="modal" data-target="#modal-rast-chips" class="btn btn-default right">
                        <span class="flaticon-sim2"></span>Chips Vinculados
                    </button>
                </div>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->label('Data Instalação') ?>
                <?php echo $this->Form->date('data_instalacao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->label('Data Remoção') ?>
                <?php echo $this->Form->date('data_remocao', array('class' => 'form-control', 'dateFormat' => 'DMY')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('imei', array('class' => 'form-control', 'placeholder' => 'Imei', 'label' => 'IMEI')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('fiacao_utilizada', array('class' => 'form-control', 'placeholder' => 'Fiação utilizada', 'label' => 'Fiação utilizada')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('local_instalacao_rastreador', array('class' => 'form-control', 'placeholder' => 'Local instalação', 'label' => 'Local instalação')); ?>
            </div>
            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observa&ccedil;&atilde;o') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'rows' => '2', 'cols' => '10')); ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="form-group col-md-offset-10  col-md-1">
                <?php echo $this->Html->link('Cancelar', array('action' => 'index'), array('escape' => false, 'class' => 'btn btn-default')); ?>
            </div>
            <div class="form-group col-md-1 right">
                <?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-success')); ?>
            </div>
            <?php echo $this->Form->end() ?>
        </div>
    </div><!-- end row -->
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-rast-chips" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog bs-example-modal-sm">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Vincular Chips</h4>
            </div>
            <div class="modal-body  ">
                <div class="row">
                    <div>
                        <div>
                            <script>
                                function vincularChip() {
                                    if ($('#chip').val().split(',')[0] && $('#RastreadorId').val()) {
                                        var exist = new Boolean(false);
                                        $('#tb-chips-in-rastreadores tr').each(function () {
                                            if (this.cells[0].innerText.trim() === $('#chip').val().split(',')[0]) {
                                                alert('Chip já vinculado a este Rastreador');
                                                exist = true;
                                            }
                                        });
                                        if (exist === true) {
                                            return false;
                                        }
                                        if ($('#chip').val().split(',')[1] && $('#chip').val().split(',')[1] !== $('#RastreadorId').val()) {
                                            if (!confirm("Este Chip já está vinculado a um Rastreador #" + $('#chip').val().split(',')[1] + ".\nDeseja desfazer o vínculo e vincula-lo a este Rastreador #" + $('#RastreadorId').val() + " ?")) {
                                                return false;
                                            }
                                        }
                                        $.ajax({
                                            type: 'GET',
                                            url: "<?php echo $this->Html->url(array('action' => 'vincularChip', 'controller' => 'Chips')); ?>",
                                            data: {id: $('#chip').val().split(',')[0], rastreador_id: $('#RastreadorId').val()},
                                            success: function (data) {
                                                var json = JSON.parse(data);
                                                $('#tb-chips-in-rastreadores').append(
                                                        "<tr>\n\
                                                                <td>" + json.Chip.id + " &nbsp;</td>\n\
                                                                <td>" + json.Chip.operadora + " &nbsp;</td>\n\
                                                                <td>" + json.Chip.numero_telefone + " &nbsp;</td>\n\
                                                                <td>" + json.Chip.numero_chip + " &nbsp;</td>\n\
                                                                <td>" + json.Chip.apn + " &nbsp;</td>\n\
                                                                <td><a href='#' title='Desvincular Chip' onclick='desvincularChip(" + json.Chip.id + ")'><span class='glyphicon glyphicon-remove'></span></a></td>\n\
                                                            </tr>"
                                                        );
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                alert(errorThrown);
                                            }
                                        });
                                    }
                                }

                                function desvincularChip(id) {
                                    if (confirm('Deseja relamente desvincular este Chip?')) {
                                        if ($('#RastreadorId').val()) {
                                            $.ajax({
                                                type: 'GET',
                                                url: "<?php echo $this->Html->url(array('action' => 'desvincularChip', 'controller' => 'Chips',)); ?>",
                                                data: {id: id},
                                                success: function (data) {
                                                    $('#tb-chips-in-rastreadores tr').each(function () {
                                                        if (this.cells[0].innerText.trim() == id) {
                                                            document.getElementById('tb-chips-in-rastreadores').deleteRow(this.rowIndex - 1);
                                                        }
                                                    });
                                                },
                                                error: function (jqXHR, textStatus, errorThrown) {
                                                    alert(errorThrown);
                                                }
                                            });
                                        }
                                    }
                                }
                            </script>
                            <div class="col-md-12">                                
                                <?php echo $this->Form->label('Chip') ?>
                            </div>
                            <div class="col-md-9">
                                <select id="chip" class="form-control">
                                    <option value="">Selecione um Chip</option>
                                    <?php
                                    foreach ($chips as $chip):
                                        echo '<option value="' . $chip['Chip']['id'] . ',' . $chip['Chip']['rastreador_id'] . '">[' . $chip['Chip']['id'] . '] ' . $chip['Chip']['operadora'] . ' - ' . $chip['Chip']['numero_telefone'] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-default" id="btnVincularChip" onclick="vincularChip()" ><span class="glyphicon glyphicon-link"></span> Vincular</button>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12 scroll-content" style="height: 170px;">
                                <table class="table table-striped">
                                    <thead class="fixedHeader">
                                        <tr>
                                            <th>Id</th>
                                            <th>Operadora</th>
                                            <th>Número Telefone</th>
                                            <th>Número Chip</th>
                                            <th>Apn</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb-chips-in-rastreadores">
                                        <?php foreach ($chipsInRastreador as $chip): ?>
                                            <tr> 
                                                <td><?php echo h($chip['Chip']['id']); ?>&nbsp;</td>
                                                <td><?php echo h($chip['Chip']['operadora']); ?>&nbsp;</td>
                                                <td><?php echo h($chip['Chip']['numero_telefone']); ?>&nbsp;</td>
                                                <td><?php echo h($chip['Chip']['numero_chip']); ?>&nbsp;</td>
                                                <td><?php echo h($chip['Chip']['apn']); ?>&nbsp;</td>
                                                <td class="actions">
                                                    <a href="#" title="Desvincular Chip" onclick="desvincularChip(<?php echo $chip['Chip']['id'] ?>)" ><span class='glyphicon glyphicon-remove'></span></a>
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
            <div class="modal-footer  ">
                <button class="btn btn-warning" data-dismiss="modal">Fechar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

