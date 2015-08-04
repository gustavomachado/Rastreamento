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
                    cli.nome,cli.id, coalesce(vei.apelido,vei.placa) as placa_apelido  ,vei.modelo, 
                    vei.id,vei.marca, vei.status,ch.id,ras.id,con.id,
                    coalesce(ch.numero_telefone,'sem chip') as numero_telefone, 
                    coalesce(ch.numero_chip,'sem chip')as numero_chip , 
                    coalesce(ras.marca,'sem rastreador') as marca,
                    coalesce(ras.modelo ,'sem rastreador') as modelo, 
                    coalesce(ras.numero_equipamento,'sem rastreador') as numero_equipamento,
                    coalesce(ras.numero_serie,'sem rastreador') as numero_serie,
                    coalesce(ras.status,'sem rastreador') as status, hvei.data_inicio,hvei.data_fim,
                    hvei.fiacao_utilizada,hvei.local_instalacao_rastreador, con.numero_contrato,
                    con.status,con.data_vencimento,
                    (case when vei.status_reg = 1 then 'inativo' else 'ativo' end) as classe
                from 
                        db_am_trace.clientes as cli
                inner join 
                        db_am_trace.veiculos as vei on vei.cliente_id = cli.id
                left join 
                        db_am_trace.rastreadors as ras on ras.veiculo_id = vei.id
                left join 
                        db_am_trace.chips as ch on ch.rastreador_id = ras.id
                left join
                        db_am_trace.historico_veiculos as hvei on ( hvei.rastreador_id=ras.id and hvei.veiculo_id=vei.id)
                left join
                        db_am_trace.contratos as con on ( con.cliente_id=cli.id and con.id=vei.contrato_id )
                $whereClause
                order by 
                        cli.nome asc , vei.status_reg desc , hvei.data_inicio ;";
        
        $dados = $this->Cliente->query($sql);
        $this->set("dados", $dados);
        $this->set("filtro",$filtro);
    }

}
