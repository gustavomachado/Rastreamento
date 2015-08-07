<div class="cadastros index">
    <div class="row">
        <div class="page-header col-md-12">
            <div class="col-lg-6"  style=" margin-top: 0; padding-top: 0;">
                <h1><?php echo __('Relatório Gerencial'); ?></h1>
            </div>
            <div class="row botoes "  >
                <div class="col-lg-2" >
                    <a href="#modal-filtro" class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-filtro" >
                        <span class="glyphicon glyphicon-filter"></span>Filtrar Relatório
                    </a>
                </div>
            <?php if($filtro):?>
                <div class="col-lg-2" >
                    <a class="btn btn-warning btn-block" href="<?php echo $this->Html->url(array('controller'=>'relatorios','action'=>'gerencial')); ?>">
                        <span class="glyphicon glyphicon-filter"></span>Remover Filtro
                    </a>
                </div>
            <?php endif; ?>
                <div class="col-lg-2">
                    <button data-target="#relatorio" class="table-center btn btn-info btn-block">
                        <span class="glyphicon glyphicon-align-center"></span>
                        Centralizar
                    </button>
                </div>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <?php 
        $colunas=array( "cli.nome"=>"Nome Cliente","vei.placa"=>"Placa","vei.apelido"=>"Apelido","vei.modelo"=>"Modelo Veículo",
                        "vei.marca"=>"Marca Veículo","vei.status"=>"Status Veículo","ch.numero_telefone"=>"Linha Chip",
                        "ch.numero_chip"=>"Número Chip","ras.marca"=>"Marca Rastreador","ras.modelo"=>"Modelo Rastreador",
                        "ras.numero_equipamento"=>"Número Rastreador","ras.numero_serie"=>"Nº Série Rastreador",
                        "ras.status"=>"Status Rastreador","hvei.data_inicio"=>"Data Instalação",
                        "hvei.data_fim"=>"Data remoção","hvei.fiacao_utilizada"=>"Fiação Utilizada",
                        "hvei.local_instalacao_rastreador"=>"Local Instalação","con.numero_contrato"=>"Número Rastreador",
                        "con.status"=>"Status Contrato","con.data_vencimento"=>"Vencimento Contrato"
                        );
        $relacoes=array("like"=>"contém","="=>"igual a","!="=>"diferente de","<"=>"menor do que",
                        ">"=>"maior do que","<="=>"menor ou igual a",">="=>"maior ou igual a");
    ?>
    <div class="row"  >
        <div class="table-container col-lg-12" style="overflow: auto;   ">
            <table id="relatorio" class="table table-bordered  table-hover table-striped gerencial ">
                <thead>
                    <tr>
                        <th style="min-width: 150px">Cliente</th>
                        <th  >Placa</th>
                        <th >Modelo</th>
                        <th >Marca</th>
                        <th >Status Veic.</th>
                        <th>Linha</th>
                        <th>Chip</th>
                        <th>Marca Rastr.</th>
                        <th>Mod. Rastr.</th>
                        <th >Nº Eqp. Rastr.</th>
                        <th>Nº S Rastr.</th>
                        <th>Status Rastr.</th>
                        <th>Data Inst.</th>
                        <th>Data Rem.</th>

                        <th>Nº Contrato</th>
                        <th  >Status Cont.</th>
                        <th >Val. Contrato</th>
                        <th style="min-width: 250px">Fiação Utilizada</th>
                        <th style="min-width: 250px">Local Instalação</th>
                    </tr>
                </thead>
                <tbody >
                    <?php   foreach ($dados as $linha): ?>
                    <?php $classe = $linha['S']['classe']; ?>
                    <tr class="<?= $classe ?>">
                        <td title="Nome Cliente: <?= $linha['S']['nome_cli'] ?> ">
                            <?php
                                if(strcmp($classe  , "ativo" ) === 0){
                                    echo    $this->Html->link( $linha['0']['subNomeCliente'] ,
                                            array('controller'=>'clientes','action'=>'add',$linha['S']['cId']));
                                }else{
                                    echo    $linha['0']['subNomeCliente'];
                                }
                            ?>
                        </td>
                        <td title="Placa/Apelido: <?= $linha['S']['placa_apelido']?>">
                            <?php 
                                if(strcmp($classe, "ativo") === 0 ){
                                    echo    $this->Html->link($linha['0']['subPlacaApelido'],
                                            array('controller'=>'veiculos','action'=>'add',$linha['S']['cId'],$linha['S']['vId']));
                                }else{
                                    echo    $linha['0']['subPlacaApelido'];
                                }
                            ?>
                        </td>
                        <td title="Modelo Veículo: <?= $linha['S']['modelo']?>">
                                    <?= ($linha['0']['subModeloVeiculo']) ?>
                        </td>
                        <td title="Marca Veículo: <?= $linha['S']['marca']?>">
                                    <?= $linha['0']['subMarcaVeiculo']?>
                        </td>
                        <td title="Status Veículo: <?= $linha['S']['status_vei']?> ">
                                    <?= $linha['0']['subStatusVeiculo']?>
                        </td>
                        <td title="Número Linha:  <?= $linha['S']['numero_telefone']?> " >
                                    <?= $linha['0']['subLinha']?>
                        </td>
                        <td title="Número Chip: <?= $linha['S']['numero_chip'] ?>">
                            <?php
                                if( strcmp($classe, "ativo") === 0){
                                    echo    $this->Html->link($linha['S']['numero_chip'],
                                            array('controller'=>'chips','action'=>'cadastro',$linha['S']['chId']));
                                }else{
                                    echo    $linha['S']['numero_chip'];
                                }
                            ?>
                        </td>
                        <td title="Marca Rastreador: <?= $linha['S']['marca_ras']?>">
                                    <?= $linha['0']['subMarcaRastreador']?>
                        </td>
                        <td title="Modelo Rastreador: <?= $linha['S']['modelo_ras']?>">
                                    <?= $linha['0']['subModeloRastreador']?>
                        </td>
                        <td title="Número Rastreador: <?= $linha['S']['numero_equipamento'] ?>">
                            <?php
                                if( strcmp($classe, "ativo") === 0 ){
                                    echo    $this->Html->link($linha['0']['subNumEquipamento'],
                                            array('controller'=>'rastreadors','action'=>'edit',$linha['S']['rId']));
                                }else{
                                    echo    $linha['0']['subNumEquipamento'];
                                }
                            ?>
                        </td>
                        <td title="Série Rastreador: <?= $linha['S']['numero_serie'] ?>">
                            <?= $linha['0']['subSerieRastreador'] ?>
                        </td>
                        <td title="Status Rastreador: <?= $linha['S']['status_ras']?>">
                            <?= $linha['0']['subStatusRastreador']?>
                        </td>
                        <td title="Data Instalação: ">
                            <?= $linha['S']['data_inicio']?date("d/m/Y",strtotime($linha['S']['data_inicio'])):"" ?>
                        </td>
                        <td title="Data Remoção: ">
                                <?= $linha['S']['data_fim']?date("d/m/Y",strtotime($linha['S']['data_fim'])):"" ?>
                        </td>
                        <td title="Número Contrato: <?= $linha['S']['numero_contrato'] ?> ">
                            <?php
                                if(strcmp($classe, "ativo") === 0 ){
                                    echo    $this->Html->link($linha['0']['subNumeroContrato'],
                                            array('controller'=>'contratos','action'=>'edit',$linha['S']['conId']));
                                }else{
                                    echo    $linha['0']['subNumeroContrato'];
                                }
                            ?>
                        </td>
                        <td title="Status Contrato: <?= $linha['S']['status']?>">
                            <?= $linha['0']['subStatusContrato']?>
                        </td>
                        <td title="Vencimento Contrato: ">
                            <?=  $linha['S']['data_vencimento']?date("d/m/Y",strtotime($linha['S']['data_vencimento'])):"" ?>
                        </td>
                        <td title="Fiação Utilizada: <?= $linha['S']['fiacao_utilizada']?>">
                            <?= $linha['0']['subFiacao']?>
                        </td>
                        <td title="Local Instalacao: <?= $linha['S']['local_instalacao_rastreador']?>">
                            <?= $linha['0']['subLocalFiacao']?>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>
</div><!-- end containing of content -->
<div class="modal fade " id="modal-filtro" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal-filtro">Filtrar Relatório Avançado</h4>
            </div>
            <div class="modal-body  " style="min-height: 290px" >
                <div id="filtro" >
                    <div class="col-lg-4">
                            <?= $this->Form->input("Coluna",array("name"=>"coluna", "class"=>"form-control","options"=>$colunas))?>    
                    </div>
                    <div class="col-lg-3">
                                <?= $this->Form->input("Relação",array("name"=>"relacao", "class"=>"form-control","options"=>$relacoes)) ?>
                    </div>
                    <div class="col-lg-5">
                        <label>Valor filtro</label>
                        <div class="input-group">
                            <input type="text" class=" form-control">        
                            <span class="input-group-addon " onclick="addfilter();">
                                <span class="glyphicon glyphicon-plus"></span>
                            </span>
                        </div>
                    </div>

                </div>

                <div class="filter-container row" style="padding-top: 100px " >
                    <div class="col-md-12" style="max-height: 300px; overflow-y: auto; padding:0 40px ;">
                        <ul class="row " style="min-height: 290px; list-style: none;border: 3px #d4d4d4 dashed;">

                        </ul>
                    </div>
                </div>
                <form id="filtra-relatorio" action="<?= $this->Html->url(array('controller'=>'relatorios','action'=>'gerencial'))?>" method="post">
                    <?= $this->Form->input("",array("name"=>"whereClause","type"=>"hidden")) ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" onclick="$('#filtra-relatorio').submit();">
                    <span class="glyphicon glyphicon-filter"></span>
                    Filtrar
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function addfilter() {
        var novaLI = $("<li>");
        var filtroContainer = $(".filter-container ul");
        var campo = $("#filtro select[name='coluna'] option:selected").val();
        var relacao = $("#filtro select[name='relacao'] option:selected").val();
        var campoLabel = $("#filtro select[name='coluna'] option:selected").text();
        var valorFiltro = $("#filtro input[type=text]");
        if (relacao === "like") {
            relacao = "contém";
        }
        var select = $("<select>").append($("<option>").val("AND").html(" E "))
                .append($("<option>").val("OR").html(" OU "))
                .addClass("form-control")
                .change(function(){
                    montaSql();
                });
        novaLI.append($("<div>").attr("id", "campo")
                .attr("data-target", campo)
                .addClass("col-md-3 btn btn-default")
                .html(campoLabel));
        novaLI.append($("<div>")
                .attr("id", "relacao")
                .attr("data-target", relacao === "contém" ? "like" : relacao)
                .addClass("col-md-2 btn btn-default")
                .html("<strong>" + relacao + "</strong>"));
        novaLI.append($("<div>")
                .attr("id", "valorFiltro")
                .attr("data-target", valorFiltro.val())
                .addClass("col-md-4 btn btn-default")
                .html(valorFiltro.val()));
        novaLI.append($("<div>").addClass("col-md-2 ").append(select));
        novaLI.append($("<button>").addClass(" col-md-1 btn btn btn-danger").append($("<span>").addClass("glyphicon glyphicon-trash"))
                .click(function () {
                    novaLI.remove();
                    montaSql();
                }));
        valorFiltro.val("");
        filtroContainer.append(novaLI);
        montaSql();
    }
    function montaSql() {
        var sql = "WHERE";
        var cont = 0;
        $(".filter-container").find("li").each(function () {
            cont++;
            var campo = $(this).find("#campo").attr("data-target");
            var relacao = $(this).find("#relacao").attr("data-target");
            var filtro = $(this).find("#valorFiltro").attr("data-target");
            var conexao = $(this).find("select option:selected").val();
            if (relacao === "like") {
                filtro = "%" + filtro + "%";
            }
            sql += " " + campo + " " + relacao + " '" + filtro + "' " + conexao;
        });
        sql = sql.substring(0, (sql.length - 3));
        if (cont < 1) {
            sql = '';
        }
        $("#filtra-relatorio input[name='whereClause']").val(sql);
        console.log(sql);
    }
    $(document).ready(function () {
        var height = screen.height;
        var PORC = 70;
        var valorAplicado = 0;
        valorAplicado = PORC * height / 100;
        $(".table-container").css("height", valorAplicado);
    });
</script>

