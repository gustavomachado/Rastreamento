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
        $usuarios= $this->Auth->user();
        $acessos = $this->Acesso->find('list', array('fields'=> array('pagina_id'), 'conditions' => array('conta_id'=>$usuarios['Conta']['id'], 'visualizar' => 1)));
        $paginas_permitidas = $this->Pagina->find('all', array('fields' => array('nome', 'url', 'class_icon'), 'conditions' => array('id' => $acessos, "url in ('Logs', 'HistoricoChips', 'HistoricoVeiculos')")));
        $this->set(compact('paginas_permitidas'));
    }
    
    public function index(){
        
    }
    
}
