<?php


class CadastrosController extends AppController {
    var $uses = array('Pagina', 'Acesso');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $conta = $this->Auth->user()['Conta'];
        $acessos = $this->Acesso->find('list', array('fields'=> array('pagina_id'), 'conditions' => array('conta_id'=>$conta['id'])));
        $paginas_permitidas = $this->Pagina->find('all', array('fields' => array('nome', 'url', 'class_icon'), 'conditions' => array('id' => $acessos, "url not in ('Contratos', 'Paginas', 'Logs', 'Motoristas', 'Veiculos', 'Contatos')")));
        $this->set(compact('paginas_permitidas'));
    }

    public function index() {        
    }

}
