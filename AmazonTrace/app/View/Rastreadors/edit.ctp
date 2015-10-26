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
                    <?php echo $this->Form->input('senha_sms', array('class' => 'form-control', 'placeholder' => 'Senha Sms', 'label' => false)); ?>
                </div>
                <!-- <div class="form-group col-md-2">
                     <button type="button" style="padding: 4px" data-toggle="modal" data-target="#modal-rast-chips" class="btn btn-default right">
                         <span class="flaticon-sim2"></span>Chips Vinculados
                     </button>
                 </div> -->
            </div>

            <div class="form-group col-md-3">
                <?php echo $this->Form->input('imei', array('class' => 'form-control', 'placeholder' => 'Imei', 'label' => 'IMEI')); ?>
            </div>
            <div class="form-group col-md-4">
                <?php echo $this->Form->input('tipo_instalacao', array('class' => 'form-control', 'placeholder' => 'Tipo instalação', 'label' => 'Tipo instalação')); ?>
            </div>

            <div class="form-group col-md-12">
                <?php echo $this->Form->label('Observa&ccedil;&atilde;o') ?>
                <?php echo $this->Form->textarea('obs', array('class' => 'form-control', 'rows' => '2', 'cols' => '10')); ?>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="modal-body  ">
                <div class=" row">
                    <div class="col-md-12">
                        <div class="btn-group btn-group-justified restreadores-header" >
                            <p  class="btn btn-default ">Operadora</p>
                            <p  class="btn btn-default">Número Telefone</p>
                            <p  class="btn btn-default">Número do Chip</p>
                            <p  class="btn btn-default">Apn</p>
                         <!--   <p  class="btn btn-default">Local Inst.</p>
                            <p  class="btn btn-default">Fiação</p> -->
                        </div> 
                        <div class="panel panel-default ">
                            <div class="panel-heading panel-instalados">
                                <h5>Lista Chips Adicionados 
                                    <span class="loading loading-adicionados">
                                        <?php echo $this->Html->image("ajax_loader.gif", array()); ?> salvando . . .
                                    </span>
                                    <span class="sort-msg">

                                    </span>
                                </h5>
                            </div>
                            <div class="panel-body adicionados  scroll-panel ui-widget-content " >
                                <ul >
                                    <?php foreach ($chipsInRastreador as $instalado): ?>
                                        <li class="linha-instalados">
                                            <div id="<?= $instalado['Chip']['id'] ?>" class=" btn-group btn-group-justified"
                                                 data-target="<?php
                                                 if (isset($id)) {
                                                     echo $id;
                                                 } else {
                                                     echo NULL;
                                                 }
                                                 ?>">                                                
                                                <p class="btn btn-default"><?= $instalado['Operadora']['nome'] ?></p>
                                                <p class="btn btn-default"><?= $instalado['Chip']['numero_telefone'] ?></p>
                                                <p class="btn btn-default"><?= $instalado['Chip']['numero_chip'] ?></p>
                                                <p class="btn btn-default"><?= $instalado['Chip']['apn'] ?></p>

                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div>
                        <strong><p>Arraste os Chips para a área de chips disponíeis
                                para desvincular e torná-los diponiveis para outros Rastreadores</p></strong> 
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default  ">
                            <div class="panel-heading panel-disponiveis">
                                <h5>Lista Chips Disponíveis 
                                    <span class="loading loading-disponiveis">
                                        <?php echo $this->Html->image("ajax_loader.gif", array()); ?> removendo . . .
                                    </span>
                                    <span class="sort-msg">

                                    </span>
                                </h5>
                            </div>
                            <div class="panel-body disponiveis  scroll-panel  ui-widget-content  ">
                                <ul>
                                    <?php foreach ($chips as $disponivel): ?>
                                        <li class="linha-disponiveis">
                                            <div id="<?= $disponivel['Chip']['id'] ?>" class=" btn-group btn-group-justified"
                                                 data-target="<?php
                                                 if (isset($id)) {
                                                     echo $id;
                                                 } else {
                                                     echo NULL;
                                                 }
                                                 ?>">                                                
                                                <p class="btn btn-default"><?= $disponivel['Operadora']['nome'] ?></p>
                                                <p class="btn btn-default"><?= $disponivel['Chip']['numero_telefone'] ?></p>
                                                <p class="btn btn-default"><?= $disponivel['Chip']['numero_chip'] ?></p>
                                                <p class="btn btn-default"><?= $disponivel['Chip']['apn'] ?></p>

                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <strong><p>Arraste os Chips para a área de chips adicionados
                                para desvincular do Rastreador</p></strong>
                    </div>

                </div>
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

<!-- <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" id="modal-rast-chips" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-lg" >
        <div class="modal-content">
            <div class="modal-header  ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Vincular Chips</h4>
            </div> -->
<!-- MODAL ERA AQUI -->



<!-- MODAL ERA AQUI -->
<!--   <div class="modal-footer  ">
       <button class="btn btn-warning" data-dismiss="modal">Fechar</button>
   </div>
</div><!-- /.modal-content - ->
</div><!-- /.modal-dialog - ->
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
        $(".adicionados ul").droppable({
            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover watting-drop",
            accept: ".linha-disponiveis",
            drop: function (event, ui) {

                $('.loading-adicionados').css("display", 'inline-block');
                var idChip = ui.draggable.find('div').attr('id');
                var idRastreador = ui.draggable.find('div').attr('data-target');
                $.ajax({
                    type: 'GET',
                    url: "<?php echo $this->Html->url(array('action' => 'vincularChip', 'controller' => 'chips')); ?>",
                    data: {"id": idChip, "rastreador_id": idRastreador},
                    async: true,
                    success: function (dataJson) {
                        var data = $.parseJSON(dataJson);
                        $('.loading-adicionados').css("display", 'none');
                        var msg = '';
                        var classe = "text-warning ";
                        switch ((data.status)) {
                            case 0:
                                msg = ("Falha ao Adicionar Chip");
                                break;
                            case 1:
                                msg = ("Chip Adicionado Com Sucesso!");
                                classe = "text-success";
                                break;
                            case 2:
                                msg = ("Falha ao Adicionar Chip. Chip está vinculado à Outro Rastreador!");
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
                $(this).append($("<li>").addClass('linha-instalados').append(ui.draggable.html()).draggable({
                    revert: "invalid",
                    appendTo: ".droppable"
                }));
                ui.draggable.remove();
            }
        }).sortable();
        $(".disponiveis ul").droppable({
            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover watting-drop",
            accept: ".linha-instalados",
            drop: function (event, ui) {
                $('.loading-disponiveis').css("display", 'inline-block');
                var idChip = ui.draggable.find('div').attr('id');
                var idRastreador = ui.draggable.find('div').attr('data-target');
                $.ajax({
                    type: 'GET',
                    url: "<?php echo $this->Html->url(array('action' => 'desvincularChip', 'controller' => 'chips')); ?>",
                    data: {"id": idChip, 'rastreador_id': idRastreador},
                    async: true,
                    success: function (dataJson) {
                        var data = $.parseJSON(dataJson);
                        var msg = '';
                        var classe = "text-warning ";
                        switch ((data.status)) {
                            case 0:
                                msg = ("Falha ao Remover Chip");
                                break;
                            case 1:
                                msg = ("Chip Removido Com Sucesso!");
                                classe = "text-success";
                                break;
                            case 2:
                                msg = ("Falha ao Remover chip");
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
                $(this).append($("<li>").addClass('linha-disponiveis').append(ui.draggable.html()).draggable({
                    revert: "invalid",
                    appendTo: ".droppable"
                }));
                ui.draggable.remove();
            }
        }).sortable();
    }
</script>