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
                SELECT 
                    cli.nome,cli.id, COALESCE(vei.apelido,vei.placa) AS placa_apelido  ,vei.modelo, 
                    vei.id,vei.marca, vei.status,ch.id,ras.id,con.id,
                    COALESCE(ch.numero_telefone,'Sem Chip') AS numero_telefone, 
                    COALESCE(ch.numero_chip,'Sem Chip')AS numero_chip , 
                    COALESCE(ras.marca,'Sem Rastreador') AS marca,
                    COALESCE(ras.modelo ,'Sem Rastreador') AS modelo, 
                    COALESCE(ras.numero_equipamento,'Sem Rastreador') AS numero_equipamento,
                    COALESCE(ras.numero_serie,'Sem Rastreador') AS numero_serie,
                    COALESCE(ras.status_reg,'Sem Rastreador') AS status, hvei.data_inicio,hvei.data_fim,
                    hvei.fiacao_utilizada,hvei.local_instalacao_rastreador, con.numero_contrato,
                    con.status,con.data_vencimento
                FROM 
                        db_am_trace.clientes AS cli
                INNER JOIN 
                        db_am_trace.veiculos AS vei ON vei.cliente_id = cli.id
                LEFT JOIN 
                        db_am_trace.rastreadors AS ras ON ras.veiculo_id = vei.id
                LEFT JOIN 
                        db_am_trace.chips AS ch ON ch.rastreador_id = ras.id
                LEFT JOIN
                        db_am_trace.historico_veiculos AS hvei ON ( hvei.rastreador_id=ras.id AND hvei.veiculo_id=vei.id)
                LEFT JOIN
                        db_am_trace.contratos AS con ON ( con.cliente_id=cli.id AND con.id=vei.contrato_id )
                $whereClause
                ORDER BY 
                        cli.nome ASC , vei.status DESC , hvei.data_inicio ;";
        
        $dados = $this->Cliente->query($sql);
        $this->set("dados", $dados);
        $this->set("filtro",$filtro);
    }

}
