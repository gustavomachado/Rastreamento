<?php

App::uses('AppController', 'Controller');

/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

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
    public function index($id = null) {
        if ($id) {
            $this->edit($id);
        } else {
            $this->add();
        }
        $this->Cliente->recursive = 0;
        $this->paginate = array('limit' => 10);
        $this->set('clientes', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('Invalid cliente'));
        }
        $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
        $this->set('cliente', $this->Cliente->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Cliente->create();
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('The cliente has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cliente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $this->set(compact('enderecos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Cliente->exists($id)) {
            throw new NotFoundException(__('Invalid cliente'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Cliente->save($this->request->data)) {
                $this->Session->setFlash(__('The cliente has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The cliente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
            $this->request->data = $this->Cliente->find('first', $options);
        }
       
        $this->set(compact('enderecos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Cliente->id = $id;
        if (!$this->Cliente->exists()) {
            throw new NotFoundException(__('Invalid cliente'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Cliente->delete()) {
            $this->Session->setFlash(__('The cliente has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
