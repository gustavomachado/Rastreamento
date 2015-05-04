<?php

App::uses('AppController', 'Controller');

/**
 * Contratos Controller
 *
 * @property Contrato $Contrato
 * @property PaginatorComponent $Paginator
 */
class ContratosController extends AppController {

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
        $this->Contrato->recursive = 0;
        $this->set('contratos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Contrato->exists($id)) {
            throw new NotFoundException(__('Contrato inválido.'));
        }
        $options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
        $this->set('contrato', $this->Contrato->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Contrato->create();
            if ($this->Contrato->save($this->request->data)) {
                $this->Session->setFlash(__('Contrato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Contrato não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
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
        if (!$this->Contrato->exists($id)) {
            throw new NotFoundException(__('Contrato inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contrato->save($this->request->data)) {
                $this->Session->setFlash(__('Contrato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Contrato não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
            $this->request->data = $this->Contrato->find('first', $options);
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
        $this->Contrato->id = $id;
        if (!$this->Contrato->exists()) {
            throw new NotFoundException(__('Contrato inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Contrato->delete()) {
            $this->Session->setFlash(__('Contrato excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('Contrato não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
