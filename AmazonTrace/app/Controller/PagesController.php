<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('Mensalidade', 'Model');
App::uses('Contrato', 'Model');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Mensalidade', 'Contrato');

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {
        $this->redirect(array('controller' => 'Inicio', 'action' => 'index'));
        exit;
        $path = func_get_args();

        $this->verificarMensalidades();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
    
    public function receber($id = NULL) {
        $this->render(false, false);
        $this->redirect(array('controller' => 'pages'));
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
