<?php

App::uses('AppController', 'Controller');
App::uses('Mensalidade', 'Model');
App::uses('Contrato', 'Model');
App::uses('User', 'Model');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InicioController
 *
 * @author jadson.silva
 */
class InicioController extends AppController {
    //put your code here
    public $uses = array('Mensalidade', 'Contrato', 'User');
    
    public function index() {
        $this->verificarMensalidades();
    }

    public function receber($id = NULL) {
        $this->render(false, false);
        $this->Mensalidade->create();
        if($this->Mensalidade->save(array('id' => $id, 'status' => 1))){
            $this->Session->setFlash(__('Notificação removida.'), 'default', array('class' => 'alert alert-success'));
        }
        $this->redirect(array('controller' => 'Inicio', 'action' => 'index'));
    }

    public function gerarNotificacoes() {
        $notificacoes = $this->Mensalidade->find('all', array('conditions' => array('Mensalidade.status' => 0)));
        $this->set(compact('notificacoes'));
    }

    public function verificarMensalidades() {
        $options = array('Contrato.dia_vencimento' => date('d', strtotime("-5 days")));
        $avencer = $this->Contrato->find('all', array('conditions' => $options));
        $mensalidades = array();
        foreach ($avencer as $key => $value) {
            $mes = date('m');
            $ultimo_dia = date("t", mktime(0, 0, 0, $mes, '01', date('Y')));
            $dataVencimentoMes;
            if ($value['Contrato']['dia_vencimento'] > $ultimo_dia) {
                $dataVencimentoMes = date('Y') . '-' . date('m') . '-' . $ultimo_dia;
            } else {
                $dataVencimentoMes = date('Y') . '-' . date('m') . '-' . $value['Contrato']['dia_vencimento'];
            }
            if (!$this->Mensalidade->find('list', array('conditions' => array('contrato_id' => $value['Contrato']['id'], 'vencimento' => $dataVencimentoMes)))) {
                $mensalidade = array('contrato_id' => $value['Contrato']['id'], 'cliente_id' => $value['Contrato']['cliente_id'], 'vencimento' => $dataVencimentoMes);
                array_push($mensalidades, $mensalidade);
            }
        }
        if ($mensalidades) {
            $this->Mensalidade->saveAll($mensalidades);
        }
        $this->gerarNotificacoes();
        $this->set(compact('mensalidades'));
    }

    public function removerNotificacao() {
        $mensalidade = $_REQUEST['id_mensalidade'];
        if ($this->Mensalidade->save(array('id' => $mensalidade, 'status' => 1))) {
            echo 'sucess';
        } else {
            echo 'erro';
        }
    }
    
}
