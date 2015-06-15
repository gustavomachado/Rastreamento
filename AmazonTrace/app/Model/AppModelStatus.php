<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppModelStatus
 *
 * @author jadson.silva
 */
App::uses('AppModel', 'Model');

class AppModelStatus extends AppModel {

    //put your code here
    public function find($type = 'first', $query = array()) {
        $this->findQueryType = $type;
        $this->id = $this->getID();
        if (isset($query['conditions'])) {
            array_push($query['conditions'], $this->name . '.status_reg not in (1)');
        } else {
            $query['conditions'] = $this->name . '.status_reg not in (1)';
        }
        $query = $this->buildQuery($type, $query);
        if ($query === null) {
            return null;
        }
        return $this->_readDataSource($type, $query);
    }

    public function delete($id = NULL, $cascade = NULL) {
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
        if ($this->save(array('id' => $this->id, 'status_reg' => 1))) {
            return true;
        } else {
            return false;
        }
        
        $this->gravarLog('Excluir', '[' . $this->id . '] ' . $this->name . ' - ' . Router::getParam('action'));
    }

}
