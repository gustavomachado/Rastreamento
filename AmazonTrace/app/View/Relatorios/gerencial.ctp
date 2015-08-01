<div class="cadastros index">
    <div class="row">
        <div class="page-header col-md-12">
            <div class="col-lg-12" >
                <h1><?php echo __('Relatório Gerencial'); ?></h1>
            </div>
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
        </div><!-- end col md 12 -->
    </div><!-- end row -->
    <?php 
        $colunas=array( "cli.nome"=>"Nome Cliente","vei.placa"=>"Placa","vei.apelido"=>"Apelido","vei.modelo"=>"Modelo Veículo",
                        "vei.marca"=>"Marca Veículo","vei.status"=>"Status Veículo","ch.numero_telefone"=>"Linha Chip",
                        "ch.numero_chip"=>"Número Chip","ras.marca"=>"Marca Rastreador","ras.modelo"=>"Modelo Rastreador",
                        "ras.numero_equipamento"=>"Número Rastreador"
                        );
        $relacoes=array("like"=>"contém","="=>"igual a","!="=>"diferente de","<"=>"menor do que",
                        ">"=>"maior do que","<="=>"menor ou igual a",">="=>"maior ou igual a");
    ?>
    <div class="row"  >
        <div class="col-lg-12" style="overflow: scroll ; height: 450px;">
            <table class="table table-bordered table-striped gerencial ">
                <thead>
                    <tr>
                        <th style="min-width: 250px">Cliente</th>
                        <th  >Placa</th>
                        <th style="min-width: 200px">Modelo</th>
                        <th >Marca</th>
                        <th >Status Veic.</th>
                        <th>Linha</th>
                        <th>Chip</th>
                        <th>Marca Rastr.</th>
                        <th>Modelo Rastr.</th>
                        <th>Nº Eqp. Rastr.</th>
                        <th>Nº Série Rastr.</th>
                        <th>Status Rastr.</th>
                        <th>Data Instalação</th>
                        <th>Data Remoção</th>
                        <th>Fiação Utilizada</th>
                        <th>Local Instalação</th>
                        <th>Nº Contrato</th>
                        <th style="min-width: 200px">Status Contrato</th>
                        <th style="min-width: 200px;">Validade Contrato</th>
                    </tr>
                </thead>
                <tbody >
                    <?php   foreach ($dados as $linha): ?>
                    <tr>
                        <td title="Nome Cliente">
                            <?= 
                                $this->Html->link($linha['cli']['nome'],
                                array('controller'=>'clientes','action'=>'add',$linha['cli']['id']))
                            ?>
                        </td>
                        <td title="Placa/Apelido">
                            <?= 
                                $this->Html->link($linha['0']['placa_apelido'],
                                array('controller'=>'veiculos','action'=>'add',$linha['cli']['id'],$linha['vei']['id']));
                            ?>
                        </td>
                        <td title="Modelo Veículo"><?= $linha['vei']['modelo']?></td>
                        <td title="Marca Veículo"><?= $linha['vei']['marca']?></td>
                        <td title="Status Veículo"><?= $linha['vei']['status']?></td>
                        <td title="Número Linha" ><?= $linha['0']['numero_telefone']?></td>
                        <td title="Número Chip">
                            <?= 
                                $this->Html->link($linha['0']['numero_chip'],
                                array('controller'=>'chips','action'=>'cadastro',$linha['ch']['id']));
                            ?>
                        </td>
                        <td title="Marca Rastreador"><?= $linha['0']['marca']?></td>
                        <td title="Modelo Rastreador"><?= $linha['0']['modelo']?></td>
                        <td title="Número Rastreador">
                            <?= 
                                $this->Html->link($linha['0']['numero_equipamento'],
                                array('controller'=>'rastreadors','action'=>'edit',$linha['ras']['id']))
                            ?>
                        </td>
                        <td title="Série Rastreador"><?= $linha['0']['numero_serie']?></td>
                        <td title="Status Rastreador"><?= $linha['0']['status']?></td>
                        <td title="Data Instalação"><?= $linha['hvei']['data_inicio']?date("d/m/Y",strtotime($linha['hvei']['data_inicio'])):"" ?></td>
                        <td title="Data Remoção"><?= $linha['hvei']['data_fim']?date("d/m/Y",strtotime($linha['hvei']['data_fim'])):"" ?></td>
                        <td title="Fiação Utilizada"><?= $linha['hvei']['fiacao_utilizada']?></td>
                        <td title="Local Instalacao"><?= $linha['hvei']['local_instalacao_rastreador']?></td>
                        <td title="Número Contrato">
                            <?= 
                                $this->Html->link($linha['con']['numero_contrato'],
                                array('controller'=>'contratos','action'=>'edit',$linha['con']['id']))
                            ?>
                        </td>
                        <td title="Status Contrato"><?= $linha['con']['status']?></td>
                        <td title="Vencimento Contrato"><?=  $linha['con']['data_vencimento']?date("d/m/Y",strtotime($linha['con']['data_vencimento'])):"" ?></td>  
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
                .addClass("form-control");
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
</script>