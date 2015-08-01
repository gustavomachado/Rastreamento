<?php

class CadastrosController extends AppController {
    public $uses = array('Pagina', 'Acesso');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $usuario = $this->Auth->user();
        $acessos = $this->Acesso->find('list', array('fields'=> array('pagina_id'), 'conditions' => array('conta_id'=>$usuario['Conta']['id'], 'visualizar' => 1)));
        $paginas_permitidas = $this->Pagina->find('all', array('fields' => array('nome', 'url', 'class_icon'), 'conditions' => array('id' => $acessos, "url not in ('Acessos','Contratos', 'Paginas', 'Logs', 'Veiculos','Relatorios\\\\gerencial', 'Contatos', 'Mensalidades', 'Relatorios', 'HistoricoChips', 'HistoricoVeiculos')")));
        $this->set(compact('paginas_permitidas'));
    }

    public function index() {
        
    }

}
