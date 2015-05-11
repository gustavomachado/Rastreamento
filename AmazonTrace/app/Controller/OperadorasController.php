<?php

App::uses('AppController', 'Controller');

/**
 * Operadoras Controller
 *
 * @property Operadora $Operadora
 * @property PaginatorComponent $Paginator
 */
class OperadorasController extends AppController {

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
    public function index() {
        $this->Operadora->recursive = 0;
        $this->paginate = array('limit' => 20);
        $this->set('operadoras', $this->Paginator->paginate());
    }

    public function cadastro($id = NULL) {
        if ($id) {
            $this->edit($id);
        } else {
            $this->add();
        }        
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Operadora->exists($id)) {
            throw new NotFoundException(__('Invalid operadora'));
        }
        $options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
        $this->set('operadora', $this->Operadora->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Operadora->create();
            if ($this->Operadora->save($this->request->data)) {
                $this->Session->setFlash(__('Operadora salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Operadora não pôde ser salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Operadora->exists($id)) {
            throw new NotFoundException(__('Operadora inválida'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Operadora->save($this->request->data)) {
                $this->Session->setFlash(__('Operadora salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Operadora não pôde ser salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
            $this->request->data = $this->Operadora->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Operadora->id = $id;
        if (!$this->Operadora->exists()) {
            throw new NotFoundException(__('Invalid operadora'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Operadora->delete()) {
            $this->Session->setFlash(__('The operadora has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The operadora could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
