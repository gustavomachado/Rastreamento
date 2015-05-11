<div class="veiculos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php
                    echo __('Cadastro Veículos');
                    // var_dump($motoristas);
                    //   echo json_encode($motoristas);
                    ?></h1>
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

            <!---   <div class="form-group col-md-4">
            <?php /*  echo $this->Form->input('local_instalacao_rastreador', array('class' => 'form-control', 'placeholder' => 'Local Instalacao Rastreador')); ?>
              </div>
              <div class="form-group col-md-8">
              <label>Fia&ccedil;&atilde;o Utilizada</label>
              <?php echo $this->Form->textArea('fiacao_utilizada', array('class' => 'form-control', 'placeholder' => 'Fiacao Utilizada')); */ ?>
               </div>-->
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
                <label>Motorista</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <a href="/AmazonTrace/Motoristas/add" target="_blank">  
                            <span class="glyphicon glyphicon-plus"></span></a>
                    </span>
                    <?php
                    echo $this->Form->input('motorista_id', array('class' => 'form-control', 'placeholder' =>
                        'Motorista Id', 'label' => FALSE, 'div' => FALSE, 'options' => $motoristas, 'empty' => 'Selecione o motorista'));
                    ?>
                </div>
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
            <div class="  col-md-9">
                <label>Observa&ccedil;&atilde;o</label>
            </div>

            <div class="form-group col-md-9">
                <?php echo $this->Form->textArea('obs', array('class' => 'form-control', 'placeholder' => 'Obs')); ?>
            </div>
            <div class=" col-md-2">
                <?php if (isset($id)): ?>
                <button type="button" data-toggle="modal" data-target="#modal-rastreadores" class="btn btn-default">Rastreador
                    <span class="flaticon-wifi83"></span>
                </button>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class=" col-lg-offset-9 col-md-1">
                        <?php echo $this->Html->link('Novo', array('action' => 'add', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
                    </div>
                    <div class=" col-md-1">
                        <?php echo $this->Html->link('Sair', array('action' => 'index', $id_cliente), array('escape' => false, 'class' => 'btn btn-default')); ?>
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


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-rastreadores">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Rastreadores</h4>
            </div>
            <div class="modal-body modal-body-contato ">
                <?php // echo $this->Form->create("Contato",array('role'=>'form','url'=>$this->Html->url(array('controller'=>'Contatos', 'action'=>'add'))))   ?>

                <?php // echo $this->Form->end( )   ?>
                <div class=" row">
                    <div class="col-md-12">
                        <div class="btn-group btn-group-justified restreadores-header" >
                            <p  class="btn btn-default ">Modelo</p>
                            <p  class="btn btn-default">Marca</p>
                            <p  class="btn btn-default">Núm. Eqp.</p>
                            <p  class="btn btn-default">Local Inst.</p>
                            <p  class="btn btn-default">Fiação</p>
                        </div> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5>Lista Rastreadores Adicionados <span class="loading loading-adicionados"><?php echo $this->Html->image("ajax_loader.gif", array()); ?> salvando . . .</span></h5>
                            </div>
                            <div class="panel-body adicionados   ui-widget-content">
                                <ul  >
                                    <?php foreach ($instalados as $instalado): ?>
                                    <li class="linha-instalados">
                                        <div id="<?= $instalado['Rastreador']['id'] ?>" class=" btn-group btn-group-justified"
                                             data-target="<?php if (isset($id)) { echo $id; } else { echo NULL; } ?>">                                                <p class="btn btn-default"><?= $instalado['Rastreador']['modelo'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['marca'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['numero_equipamento'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['fiacao_utilizada'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['local_instalacao_rastreador'] ?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <strong><p>Arraste os rastreadores para a área de reastreadores disponíeis
                            para desvincular e torná-los diponiveis para outros veiculos</p></strong> 
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5>Lista Rastreadores Disponíveis <span class="loading loading-disponiveis"><?php echo $this->Html->image("ajax_loader.gif", array()); ?> removendo . . .</h5>
                            </div>
                            <div class="panel-body disponiveis   ui-widget-content">
                                <ul>
                                    <?php foreach ($disponiveis as $disponivel): ?>
                                    <li class="linha-disponiveis">
                                        <div id="<?= $disponivel['Rastreador']['id'] ?>" class=" btn-group btn-group-justified "
                                             data-target="<?php if (isset($id)) { echo $id; } else { echo NULL; } ?>">
                                            <p class="btn btn-default"><?= $disponivel['Rastreador']['modelo'] ?></p>
                                            <p class="btn btn-default"><?= $disponivel['Rastreador']['marca'] ?></p>
                                            <p class="btn btn-default"><?= $disponivel['Rastreador']['numero_equipamento'] ?></p>
                                            <p class="btn btn-default"><?= $disponivel['Rastreador']['fiacao_utilizada'] ?></p>
                                            <p class="btn btn-default"><?= $disponivel['Rastreador']['local_instalacao_rastreador'] ?></p>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <strong><p>Arraste os rastreadores para a área de reastreadores instalados
                            para desvincular ao veículo</p></strong>
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
    <script>
        if (typeof ($(".linha-disponiveis")) !== undefined) {
            $(".linha-disponiveis").draggable({
                revert: "invalid",
                appendTo: ".droppable",
                drag: function () {
                    console.log('Dragging');
                }
            });
            $(".linha-instalados").draggable({
                revert: "invalid",
                appendTo: ".droppable",
                drag: function () {
                    console.log('Dragging');
                }
            });
            $(".adicionados ul").droppable({
                activeClass: "ui-state-default",
                hoverClass: "ui-state-hover watting-drop",
                // tolerance: "intersect",
                drop: function (event, ui) {
                    $('.loading-adicionados').css("display", 'inline-block');
                    var idRastreador = ui.draggable.find('div').attr('id');
                    var idVeiculo = ui.draggable.find('div').attr('data-target');
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $this->Html->url(array('action' => 'vincularVeiculo', 'controller' => 'rastreadors')); ?>",
                        data: {"id": idRastreador, "veiculo_id": idVeiculo},
                        async: true,
                        success: function (dataJson) {
                            var data = $.parseJSON(dataJson);
                            if (data.status) {
                                $('.loading-adicionados').css("display", 'none');
                            } else {

                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR);
                            alert(textStatus);
                            alert(errorThrown);
                        }
                    });
                    $(this).append($("<li>").append(ui.draggable.html()).draggable({
                        revert: "invalid",
                        appendTo: ".droppable"
                    }));
                    ui.draggable.remove();
                }
            }).sortable();
            $(".disponiveis ul").droppable({
                activeClass: "ui-state-default",
                hoverClass: "ui-state-hover watting-drop",
                drop: function (event, ui) {
                    $('.loading-disponiveis').css("display", 'inline-block');
                    var idRastreador = ui.draggable.find('div').attr('id');
                    var idVeiculo = ui.draggable.find('div').attr('data-target');
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $this->Html->url(array('action' => 'desvincularVeiculo', 'controller' => 'rastreadors')); ?>",
                        data: {"id": idRastreador},
                        async: true,
                        success: function (dataJson) {
                            var data = $.parseJSON(dataJson);
                            switch ((data.status)) {
                                case 0:
                                    alert("Falha ao desvincular rastreador");
                                    break;
                                case 1:
                                    alert("Desvincular rastreador");
                                    $('.loading-disponiveis').css("display", 'none');
                                    break;
                                case 2:
                                    alert("Falha ao desvincular rastreador");
                                    break;
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR);
                            alert(textStatus);
                            alert(errorThrown);
                        }
                    });
                    $(this).append($("<li>").append(ui.draggable.html()).draggable({
                        revert: "invalid",
                        appendTo: ".droppable"
                    }));
                    ui.draggable.remove();
                }
            }).sortable();
        }
    </script>