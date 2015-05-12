<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $uses = array('Pagina', 'Acesso');
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'loginError' => 'ERRO',
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => '<div class="alert alert-danger"><span class="flaticon-locked57"></span>É necessário realizar Login para acessar o sistema.</div>',
        )
    );

    public function beforeFilter() {
        $this->layout = 'bootstrap';
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('user', $this->Auth->user());
        if ($this->Auth->user()) {
            if (!$this->permitirPagina()) {
                $this->Session->setFlash('<span class="flaticon-locked57"></span>Acesso negado:<br>Você não têm acesso à página '.strtoupper($this->params['controller']), 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('controller' => 'cadastros'));
            }
        }
    }
    
    public function converteArrayParaMauisculo($value) {
        return strtoupper($value);
    }
    public function permitirPagina() {
        $conta = $this->Auth->user()['Conta'];
        $acessos = $this->Acesso->find('list', array('fields' => array('pagina_id'), 'conditions' => array('conta_id' => $conta['id'], 'visualizar' => 1)));
        $paginas_permitidas = $this->Pagina->find('all', array('fields' => array('id','url'), 'conditions' => array('id' => $acessos)));
        $urlPaginas = array();
        foreach ($paginas_permitidas as $page){
            array_push($urlPaginas, strtoupper($page['Pagina']['url']));
        }
        $paginas = array_map($this->converteArrayParaMauisculo, $urlPaginas);
        if (in_array(strtoupper($this->params['controller']), $paginas) || strtoupper($this->params['controller']) == strtoupper('cadastros') || (strtoupper($this->params['controller']) == strtoupper('Users') && $this->action == 'logout' ) || strtoupper($this->params['controller'])  == 'INICIO' || strtoupper($this->params['controller'])  == 'PAGES') {
            return true;
        } else {
            return false;
        }
    }

}
