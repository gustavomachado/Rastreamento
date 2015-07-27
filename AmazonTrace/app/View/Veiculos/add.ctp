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
                <?php echo $this->Form->input('tipo_veiculo', array('class' => 'form-control', 'placeholder' => 'Tipo Veiculo' ,"options"=> $tipos_veic)); ?>
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
                <?php echo $this->Form->input('combustivel', array('class' => 'form-control', 'placeholder' => 'Combustivel',"options"=>$tipos_comb)); ?>
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
                <?php echo $this->Form->input('sms_notificacao_01', array('class' => 'form-control tel', 'placeholder' => 'Sms Notificacao 1')); ?>
            </div>
            <div class="form-group   col-md-2 ">
                <?php echo $this->Form->input('sms_notificacao_02', array('class' => 'form-control tel', 'placeholder' => 'Sms Notificacao 2')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('plano_notificacao_sms', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Sms')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('email_notificacao_01', array('class' => 'form-control', 'placeholder' => 'Email Notificacao 01')); ?>
            </div>
            <div class="form-group col-md-3">
                <?php echo $this->Form->input('email_notificacao_02', array('class' => 'form-control', 'placeholder' => 'Email Notificacao 02')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('plano_notificacao_email', array('class' => 'form-control', 'placeholder' => 'Plano Notificacao Email')); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status',"options"=>$tipos_status)); ?>
            </div>
            <div class="form-group col-md-2">
                <?php echo $this->Form->input('bloqueio', array('options' => array(0 => 'Não', 1 => 'Sim'), 'class' => 'form-control', 'placeholder' => 'Status')); ?>
            </div>
            <div class="form-group col-md-6">
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
                <?php echo $this->Form->input('senha_panico', array('class' => 'form-control', 'placeholder' => 'Senha panico')); ?>
            </div>
            <div class="form-group col-md-10">
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
    <div class="modal-dialog modal-lg ">
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
                            <p  class="btn btn-default">Série</p> 
                            <p  class="btn btn-default">Data instalação</p> 
                            <p  class="btn btn-default">Data Remoção</p> 
                            <p  class="btn btn-default">Fiação</p>
                            <p  class="btn btn-default">Local Inst.</p>
                        </div> 
                        <div class="panel panel-default ">
                            <div class="panel-heading panel-instalados">
                                <h5>Lista Rastreadores Adicionados 
                                    <span class="loading loading-adicionados">
                                        <?php echo $this->Html->image("ajax_loader.gif", array()); ?> salvando . . .
                                    </span>
                                    <span class="sort-msg">

                                    </span>
                                </h5>
                            </div>
                            <div class="panel-body adicionados  scroll-panel ui-widget-content " >
                                <ul >
                                    <?php foreach ($instalados as $instalado){?>
                                    <?php 
                                        $dataArray = split("-",substr($instalado['Rastreador']['data_install'],0,10));
                                        $dataInstalacao = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
                                        if( isset($instalado['Rastreador']['data_remove'] )){
                                            $dataArray = split("-",substr($instalado['Rastreador']['data_install'],0,10));
                                            $dataFim = $dataArray[2] . "/" . $dataArray[1] . "/" . $dataArray[0];
                                        }else{
                                            $dataFim = date("d/m/Y");
                                        }                                    
                                    ?>
                                    <li class="linha-instalados">
                                        <div id="<?= $instalado['Rastreador']['id'] ?>" class=" btn-group btn-group-justified"
                                             data-target="<?php if (isset($id)) { echo $id; } else { echo NULL; } ?>">                                                
                                            <p class="btn btn-default" ><?= $instalado['Rastreador']['modelo'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['marca'] ?></p>
                                            <p class="btn btn-default"><?= $instalado['Rastreador']['numero_serie'] ?></p>
                                            <div class="btn btn-default"   >
                                                <input  class="form-control data data_intalacao" type="text" disabled="true" 
                                                        value="<?=$dataInstalacao ?>" />
                                            </div>
                                            <div class="btn btn-default"   >
                                                <input class="form-control data data_remocao" type="text"  
                                                       value="<?=$dataFim ?>" />
                                            </div>
                                            <div class="btn btn-default"  >
                                                <input class="form-control fiacao" type="text" disabled="true" 
                                                       value="<?= $instalado['Rastreador']['fiacao_utilizada'] ?>" />
                                            </div>
                                            <div class="btn btn-default" data-toggle="tooltip" data-placement="left" 
                                                 title="<?=  $instalado['Rastreador']['local_instalacao_rastreador'] ?>">
                                                <input class="form-control local" type="text" disabled="true" 
                                                       value="<?= $instalado['Rastreador']['local_instalacao_rastreador'] ?>" />
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>

                            </div>
                        </div>
                        <strong><p>Arraste os rastreadores para a área de reastreadores disponíeis
                                para desvincular e torná-los diponiveis para outros veiculos</p></strong> 
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default  ">
                            <div class="panel-heading panel-disponiveis">
                                <h5>Lista Rastreadores Disponíveis 
                                    <span class="loading loading-disponiveis">
                                        <?php echo $this->Html->image("ajax_loader.gif", array()); ?> removendo . . .
                                    </span>
                                    <span class="sort-msg">

                                    </span>
                                </h5>
                            </div>
                            <div class="panel-body disponiveis  scroll-panel  ui-widget-content  ">
                                <ul>
                                    <?php foreach ($disponiveis as $disponivel):
                                        $dataInstalacao = date("d/m/Y");
                                        ?>
                                    <li class="linha-disponiveis">
                                        <div id="<?= $disponivel['Rastreador']['id'] ?>" class=" btn-group btn-group-justified "
                                             data-target="<?php if (isset($id)) { echo $id; } else { echo NULL; } ?>">
                                            <div class="btn btn-default" ><p ><?= $disponivel['Rastreador']['modelo'] ?></p></div>
                                            <div class="btn btn-default" ><p ><?= $disponivel['Rastreador']['marca'] ?></p></div>
                                            <div class="btn btn-default" > <p ><?= $disponivel['Rastreador']['numero_serie'] ?></p></div>
                                            <div class="btn btn-default"   >
                                                <input class="form-control data data_instalacao" type="text"  value="<?=$dataInstalacao ?>" />
                                            </div>
                                            <div class="btn btn-default   " >
                                                <input class="form-control data data_remocao" type="text" disabled="true"  />
                                            </div>
                                            <div class="btn btn-default " data-toggle="tooltip" data-placement="left" 
                                                 title="<?php echo $disponivel['Rastreador']['fiacao_utilizada'] ?>" >
                                                <input class="form-control fiacao" type="text"  value="<?= $disponivel['Rastreador']['fiacao_utilizada'] ;?>" />
                                            </div>
                                            <div class="btn btn-default " data-toggle="tooltip" data-placement="left" 
                                                 title="<?php echo $disponivel['Rastreador']['local_instalacao_rastreador'] ?>">
                                                <input class="form-control local" type="text" value="<?=  $disponivel['Rastreador']['local_instalacao_rastreador'] ;?>" />
                                            </div>
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
                    $('.disponiveis').remove('scroll-panel');
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
            $(".adicionados ").droppable({
                activeClass: "ui-state-default",
                hoverClass: "ui-state-hover watting-drop",
                accept: ".linha-disponiveis",
                drop: function (event, ui) {

                    $('.loading-adicionados').css("display", 'inline-block');
                    var idRastreador = ui.draggable.find('div').attr('id');
                    var idVeiculo = ui.draggable.find('div').attr('data-target');
                    var dataInstalacao = ui.draggable.find("input.data_instalacao").val();
                    var fiacao = ui.draggable.find("input.fiacao").val();
                    var local = ui.draggable.find("input.local").val();

                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $this->Html->url(array('action' => 'vincularVeiculo', 'controller' => 'rastreadors')); ?>",
                        data: {"id": idRastreador, "veiculo_id": idVeiculo, "data_instalacao": dataInstalacao, "fiacao": fiacao, "local": local},
                        async: true,
                        success: function (dataJson) {
                            var data = $.parseJSON(dataJson);
                            $('.loading-adicionados').css("display", 'none');
                            var msg;
                            var classe = "text-warning ";
                            switch ((data.status)) {
                                case 0:
                                    msg = ("Falha ao Adicionar Rastreador");
                                    break;
                                case 1:
                                    msg = ("Rastreador Adicionado Com Sucesso!");
                                    classe = "text-success";
                                    break;
                                case 2:
                                    msg = ("Falha ao Adicionar Rastreador. Rastreador está vinculado à Outro Veículo!");
                                    break;
                                case 3:
                                    msg = "Falha ao registrar rastreador, impossivel criar histórico em " + data.dataInstalacao;
                                    break;
                                case 4:
                                    msg = data.msg;
                                    break;
                                case 5:
                                    msg = "Informe a data corretamente!";
                                    break;
                            }
                            $('.loading-instalados').css("display", 'none');
                            $('.panel-instalados .sort-msg')
                                    .append($('<strong>')
                                            .addClass(classe)
                                            .addClass("pull-right")
                                            .html(msg.toUpperCase()))
                                    .fadeIn(2000);

                            setTimeout(function () {
                                $('.panel-instalados .sort-msg strong').fadeOut(1000);
                            },
                                    2000);
                            setTimeout(function () {
                                $('.panel-instalados .sort-msg strong').remove();
                            },
                                    3100);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR);
                            alert(textStatus);
                            alert(errorThrown);
                        }
                    });
                    ui.draggable.find("input").prop("disabled", true);
                    ui.draggable.find("input.data_remocao").prop("disabled", false).mask("99/99/9999");
                    ui.draggable.find("input.data_instalacao").prop("disabled", true);
                    var li = $("<li>").addClass('linha-instalados').append(ui.draggable.html()).draggable({
                        revert: "invalid",
                        appendTo: ".droppable"
                    });

                    li.find("input.data_remocao").mask("99/99/9999");
                    li.find("input.fiacao").val(fiacao)
                    li.find("input.local").val(local);

                    $(this).find('ul').append(li).find("input.data_instalacao").val(dataInstalacao)



                    ui.draggable.remove();
                }
            }).sortable();
            $(".disponiveis ").droppable({
                activeClass: "ui-state-default",
                hoverClass: "ui-state-hover watting-drop",
                accept: ".linha-instalados",
                drop: function (event, ui) {
                    $('.loading-disponiveis').css("display", 'inline-block');
                    var idRastreador = ui.draggable.find('div').attr('id');
                    var idVeiculo = ui.draggable.find('div').attr('data-target');
                    var dataRemocao = ui.draggable.find("input.data_remocao").val();

                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $this->Html->url(array('action' => 'desvincularVeiculo', 'controller' => 'rastreadors')); ?>",
                        data: {"id": idRastreador, "veiculo_id": idVeiculo, "data_remocao": dataRemocao},
                        async: true,
                        success: function (dataJson) {
                            var data = $.parseJSON(dataJson);
                            var msg;
                            var classe = "text-warning ";
                            switch ((data.status)) {
                                case 0:
                                    msg = ("Falha ao Remover Rastreador");
                                    break;
                                case 1:
                                    msg = ("Rastreador Removido Com Sucesso!");
                                    classe = "text-success";
                                    break;
                                case 2:
                                    msg = ("Falha ao Remover rastreador");
                                    break;
                                case 3:
                                    msg = "Falha ao remover, impossivel criar historico em " + data.dataRemocao;
                                    break;
                                case 4:
                                    msg = " Excecao, " + data.msg;
                                    break;

                            }
                            $('.loading-disponiveis').css("display", 'none');
                            $('.panel-disponiveis .sort-msg')
                                    .append($('<strong>')
                                            .addClass(classe)
                                            .addClass("pull-right")
                                            .html(msg.toUpperCase()))
                                    .fadeIn(2000);

                            setTimeout(function () {
                                $('.panel-disponiveis .sort-msg strong').fadeOut(1000);
                            },
                                    2000);
                            setTimeout(function () {
                                $('.panel-disponiveis .sort-msg strong').remove();
                            },
                                    3100);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(jqXHR);
                            alert(textStatus);
                            alert(errorThrown);
                        }
                    });

                    ui.draggable.find("input").prop("disabled", false);
                    ui.draggable.find("input.data_instalacao").prop("disabled", false).mask("99/99/9999");
                    ui.draggable.find("input.data_remocao").val(dataRemocao).prop("disabled", true).mask("99/99/9999");
                    $(this).find('ul').append($("<li>").addClass('linha-disponiveis').append(ui.draggable.html()).draggable({
                        revert: "invalid",
                        appendTo: ".droppable"
                    }));
                    ui.draggable.remove();
                }
            }).sortable();
        }
    </script>