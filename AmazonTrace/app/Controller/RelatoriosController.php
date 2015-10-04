<?php

App::uses('AppController', 'Controller');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RelatoriosController
 *
 * @author jadson.silva
 */
class RelatoriosController extends AppController {

    //put your code here

    public function beforeFilter() {
        parent::beforeFilter();
        $usuarios = $this->Auth->user();
        $acessos = $this->Acesso->find('list', array('fields' => array('pagina_id'), 'conditions' => array('conta_id' => $usuarios['Conta']['id'], 'visualizar' => 1)));
        $paginas_permitidas = $this->Pagina->find('all', array('fields' => array('nome', 'url', 'class_icon'), 'conditions' => array('id' => $acessos, "url in ('Relatorios/gerencial','Logs', 'HistoricoChips', 'HistoricoVeiculos')")));
        $this->set(compact('paginas_permitidas'));
    }

    public function index() {
        
    }

    public function gerencial_old( $whereClause=NULL ) {
        $filtro = TRUE;      
        if(!$whereClause){
            if(isset($_REQUEST['whereClause'])){
                $whereClause= $_REQUEST['whereClause'];
            }else if(isset ($this->data['whereClause'])){
                $whereClause = $this->data['whereClause'];
            }else{
                $whereClause = '';
                $filtro = FALSE;
            }
        }  
        $this->loadModel("Cliente");
        $sql = "  
                select 
                    substring(nome_cli,1,20) as subNomeCliente ,substring(placa_apelido,1,10) as subPlacaApelido,
                    substring(S.modelo,1,8) as subModeloVeiculo,substring(S.marca,1,8) as subMarcaVeiculo,
                    substring(S.status_vei,1,15) as subStatusVeiculo,substring(S.numero_telefone,1,14) as subLinha,
                    substring(S.marca_ras,1,8) as subMarcaRastreador,substring(S.modelo_ras,1,12) as subModeloRastreador,
                    substring(S.numero_serie,1,12) as subSerieRastreador, substring(S.status_ras,1,10) as subStatusRastreador,
                    substring(S.numero_contrato,1,10) as subNumeroContrato,substring(S.status,1,12) as subStatusContrato,
                    substring(S.fiacao_utilizada,1,100) as subFiacao,substring(S.local_instalacao_rastreador,1,100) as subLocalFiacao,
                    substring(S.numero_equipamento,1,16) as subNumEquipamento,
                    S.*
                from(
                    select 
                        cli.id as cId, cli.nome as nome_cli, 
                        (case when vei.apelido is null or length(vei.apelido) < 1 then vei.placa else vei.apelido end) as placa_apelido ,
                        vei.modelo, vei.id as vId, vei.marca, vei.status as status_vei, ch.id as chId, ras.id as  rId, con.id as conId,
                        coalesce(ch.numero_telefone,'sem chip') as numero_telefone,
                        coalesce(ch.numero_chip,'sem chip')as numero_chip ,
                        coalesce(ras.marca,'sem rastreador') as marca_ras,
                        coalesce(ras.modelo ,'sem rastreador') as modelo_ras, 
                        coalesce(ras.numero_equipamento,'sem rastreador') as numero_equipamento,
                        coalesce(ras.numero_serie,'sem rastreador') as numero_serie,
                        coalesce(ras.status,'sem rastreador') as status_ras , hvei.data_inicio, hvei.data_fim,
                        hvei.fiacao_utilizada, hvei.local_instalacao_rastreador, con.numero_contrato, con.status,
                        con.data_vencimento, (case when vei.status_reg = 1 then 'inativo' else 'ativo' end) as classe 
                    from 
                        amazontrace5.clientes as cli 
                        inner join amazontrace5.veiculos as vei on vei.cliente_id = cli.id 
                        left join amazontrace5.rastreadors as ras on ras.veiculo_id = vei.id 
                        left join amazontrace5.chips as ch on ch.rastreador_id = ras.id 
                        left join amazontrace5.historico_veiculos as hvei on ( hvei.rastreador_id=ras.id and hvei.veiculo_id=vei.id) 
                        left join amazontrace5.contratos as con on ( con.cliente_id=cli.id and con.id=vei.contrato_id )
                        $whereClause
                        order by cli.nome asc , vei.status_reg desc , hvei.data_inicio 
                 ) as S;";
      //  echo $sql;
        $dados = $this->Cliente->query($sql);
     //   var_dump($dados);exit;
        $this->set("dados", $dados);
     //   $this->set("dados", array());
        $this->set("filtro",$filtro);
    }
  
   public function gerencial( $whereClause=NULL ) {
        $filtro = TRUE;      
        if(!$whereClause){
            if(isset($_REQUEST['whereClause'])){
                $whereClause= $_REQUEST['whereClause'];
            }else if(isset ($this->data['whereClause'])){
                $whereClause = $this->data['whereClause'];
            }else{
                $whereClause = '';
                $filtro = FALSE;
            }
        }  
        $this->loadModel("Cliente");
        $sql = "  
                select 
                    substring(nome_cli,1,20) as subNomeCliente ,substring(placa_apelido,1,10) as subPlacaApelido,
                    substring(S.modelo,1,8) as subModeloVeiculo,substring(S.marca,1,8) as subMarcaVeiculo,
                    substring(S.status_vei,1,15) as subStatusVeiculo,substring(S.numero_telefone,1,14) as subLinha,
                    substring(S.marca_ras,1,8) as subMarcaRastreador,substring(S.modelo_ras,1,12) as subModeloRastreador,
                    substring(S.numero_serie,1,12) as subSerieRastreador, substring(S.status_ras,1,10) as subStatusRastreador,
                    substring(S.numero_contrato,1,10) as subNumeroContrato,substring(S.status,1,12) as subStatusContrato,
                    substring(S.fiacao_utilizada,1,100) as subFiacao,substring(S.local_instalacao_rastreador,1,100) as subLocalFiacao,
                    substring(S.numero_equipamento,1,16) as subNumEquipamento,
                    S.*
                from(
                    select 
                        cli.id as cId, cli.nome as nome_cli, 
                        (case when vei.apelido is null or length(vei.apelido) < 1 then vei.placa else vei.apelido end) as placa_apelido ,
                        vei.modelo, vei.id as vId, vei.marca, vei.status as status_vei, ch.id as chId, ras.id as  rId, con.id as conId,
                        coalesce(ch.numero_telefone,'sem chip') as numero_telefone,
                        coalesce(ch.numero_chip,'sem chip')as numero_chip ,
                        coalesce(ras.marca,'sem rastreador') as marca_ras,
                        coalesce(ras.modelo ,'sem rastreador') as modelo_ras, 
                        coalesce(ras.numero_equipamento,'sem rastreador') as numero_equipamento,
                        coalesce(ras.numero_serie,'sem rastreador') as numero_serie,
                        coalesce(ras.status,'sem status ou sem rastreador') as status_ras , hvei.data_inicio, hvei.data_fim,
                        hvei.fiacao_utilizada, hvei.local_instalacao_rastreador, con.numero_contrato, con.status,
                        con.data_vencimento, (case when vei.status_reg = 1 then 'inativo' else 'ativo' end) as classe 
                    from 
                        amazontrace5.clientes as cli 
                        inner join amazontrace5.veiculos as vei on vei.cliente_id = cli.id 
                        left join amazontrace5.historico_veiculos as hvei on hvei.veiculo_id=vei.id 
                        left join amazontrace5.rastreadors as ras on ras.id = hvei .rastreador_id 
                        left join amazontrace5.chips as ch on ch.rastreador_id = ras.id 
                        left join amazontrace5.contratos as con on ( con.cliente_id=cli.id and con.id=vei.contrato_id )
                     
                        $whereClause
                      
                        order by cli.nome asc , vei.status_reg desc , hvei.data_inicio 
                        
                 ) as S;";
     // echo $sql;
        $dados = $this->Cliente->query($sql);
     //   var_dump($dados);exit;
        $this->set("dados", $dados);
     //   $this->set("dados", array());
        $this->set("filtro",$filtro);
    }

}
