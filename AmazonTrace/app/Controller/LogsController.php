<?php

App::uses('AppController', 'Controller');

/**
 * Logs Controller
 *
 * @property Log $Log
 * @property PaginatorComponent $Paginator
 */
class LogsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index($filtro = NULL, $pesquisa = NULL) {
        $this->Log->recursive = 0;
        $this->set('filtros', array('Usuario.nome' => 'Usuario', 'Log.created' => 'Data', 'Log.tabela' => 'Tabela', 'Log.acao' => 'Ação'));
        $this->paginate = array('limit' => 20, 'order' => 'Log.created DESC');
        if ($filtro && $pesquisa) {            
            $this->paginate = array('limit' => 20, 'conditions' => array($filtro . ' LIKE' => '%' . $pesquisa . '%'), 'order' => 'Log.created DESC');
        }        
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
        $this->set('logs', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Log->exists($id)) {
            throw new NotFoundException(__('Invalid log'));
        }
        $options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
        $this->set('log', $this->Log->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Log->create();
            if ($this->Log->save($this->request->data)) {
                exit;
                $this->Session->setFlash(__('The log has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The log could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $usuarios = $this->Log->Usuario->find('list');
        $this->set(compact('usuarios'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Log->exists($id)) {
            throw new NotFoundException(__('Invalid log'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Log->save($this->request->data)) {
                $this->Session->setFlash(__('The log has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The log could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Log.' . $this->Log->primaryKey => $id));
            $this->request->data = $this->Log->find('first', $options);
        }
        $usuarios = $this->Log->Usuario->find('list');
        $this->set(compact('usuarios'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Log->id = $id;
        if (!$this->Log->exists()) {
            throw new NotFoundException(__('Invalid log'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Log->delete()) {
            $this->Session->setFlash(__('The log has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The log could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
