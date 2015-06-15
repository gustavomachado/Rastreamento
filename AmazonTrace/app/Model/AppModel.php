<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');
App::uses('SlugRoute', 'Routing/Route');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $uses = array('Controller', 'LogsController');

    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        $appController = new AppController();
        $appController->constructClasses();
        $usuario = $appController->Auth->user();
        $pagina = Router::getParams();
        $acessos = $appController->Acesso->find('all', array('fields' => array('id', 'excluir'), 'conditions' => array('conta_id' => $usuario['Conta']['id'], 'Pagina.url' => $pagina['controller'])));
        if (isset($acessos[0]['Acesso']['excluir'])) {
            if (!$acessos[0]['Acesso']['excluir'] == 1) {
                $appController->Session->setFlash('<span class="flaticon-locked57"></span>Permissão Negada:<br>Você não tem permissão para excluir registros nesta àrea.', 'default', array('class' => 'alert alert-danger'));
                header("location:../");
                exit;
            }
        } else {
            $appController->Session->setFlash('<span class="flaticon-locked57"></span>Permissão Negada<br>Você não tem permissão para excluir registros nesta àrea.', 'default', array('class' => 'alert alert-danger'));
            header("location:../");
            exit;
        }
        $this->gravarLog('Excluir', '[' . $this->id . '] ' . $this->name . ' - ' . Router::getParam('action'));
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $appController = new AppController();
        $appController->constructClasses();
        $usuario = $appController->Auth->user();
        $pagina = Router::getParams();
        $acessos = $appController->Acesso->find('all', array('fields' => array('id', 'editar'), 'conditions' => array('conta_id' => $usuario['Conta']['id'], 'Pagina.url' => $pagina['controller'])));
        if (strtoupper($pagina['controller']) !== 'INICIO') {
            if (isset($acessos[0]['Acesso']['editar'])) {
                if (!$acessos[0]['Acesso']['editar'] == 1) {
                    $appController->Session->setFlash('<span class="flaticon-locked57"></span>Permissão Negada:<br>Você não tem permissão para incluir/editar registros nesta àrea.', 'default', array('class' => 'alert alert-danger'));
                    header("location:" . $_SERVER['REQUEST_URI']);
                    exit;
                }
            } else {
                $appController->Session->setFlash('<span class="flaticon-locked57"></span>Permissão Negada<br>Você não tem permissão para incluir/editar registros nesta àrea.', 'default', array('class' => 'alert alert-danger'));
                header("location:" . $_SERVER['REQUEST_URI']);
                exit;
            }
            if (isset($this->id)) {
                if (!$this->id) {
                    $this->id = 'New';
                }
            } else {
                $this->id = 'New';
            }
        }
        $this->gravarLog('Salvar/Editar', '[' . $this->id . '] ' . $this->name . ' - ' . Router::getParam('action'));
    }

    public function gravarLog($acao, $infoAdd = NULL) {
        $appController = new AppController();
        $appController->constructClasses();
        $appController->Log = ClassRegistry::init('Log');
        $usuario = $appController->Auth->user();
        $log = array(
            'usuario_id' => $usuario['User']['id'],
            'acao' => $acao,
            'tabela' => $this->name, //Router::getParams()['controller'],
            'dispositivo' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
            'dados' => json_encode($this->data),
            'informacao_adicional' => $infoAdd
        );
        $appController->Log->create();
        $appController->Log->set($log);
        if ($appController->Log->save($appController->Log->data, array('callbacks' => false))) {}
    }

}
