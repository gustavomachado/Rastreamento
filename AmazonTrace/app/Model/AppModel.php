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
App::import('Controller', 'App');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $uses = 'Controller';

    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        $appController = new AppController();
        $appController->constructClasses();
        $conta = $appController->Auth->user()['Conta'];
        $pagina = Router::getParams()['controller'];
        $acessos = $appController->Acesso->find('all', array('fields' => array('id', 'excluir'), 'conditions' => array('conta_id' => $conta['id'], 'Pagina.url' => $pagina)));
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
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        $appController = new AppController();
        $appController->constructClasses();
        $conta = $appController->Auth->user()['Conta'];
        $pagina = Router::getParams()['controller'];
        $acessos = $appController->Acesso->find('all', array('fields' => array('id', 'editar'), 'conditions' => array('conta_id' => $conta['id'], 'Pagina.url' => $pagina)));
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
    }

}
