<?php

App::uses('AppController', 'Controller');

/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
class ContasController extends AppController {

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
    public function index($id = NULL) {
        if($id){
            $this->edit($id);
        }else {
            $this->add();
        }
        $this->Conta->recursive = 0;
        $this->paginate = array('limit' => 10);
        $this->set('contas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Conta->exists($id)) {
            throw new NotFoundException(__('Invalid conta'));
        }
        $options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
        $this->set('conta', $this->Conta->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Conta->create();
            if ($this->Conta->save($this->request->data)) {
                $this->Session->setFlash(__('The conta has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The conta could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
        if (!$this->Conta->exists($id)) {
            throw new NotFoundException(__('Invalid conta'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Conta->save($this->request->data)) {
                $this->Session->setFlash(__('The conta has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The conta could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
            $this->request->data = $this->Conta->find('first', $options);
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
        $this->Conta->id = $id;
        if (!$this->Conta->exists()) {
            throw new NotFoundException(__('Invalid conta'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Conta->delete()) {
            $this->Session->setFlash(__('The conta has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The conta could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
