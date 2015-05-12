<?php

App::uses('AppController', 'Controller');

/**
 * Motoristas Controller
 *
 * @property Motorista $Motorista
 * @property PaginatorComponent $Paginator
 */
class MotoristasController extends AppController {

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
        $this->Motorista->recursive = 0;
        $this->set('filtros', array('nome' => 'Nome', 'telefone' => 'Telefone', 'celular' => 'Celular'));
        $this->paginate = array('limit' => 20);
        if ($filtro && $pesquisa) {
            $this->paginate = array('limit' => 20, 'conditions' => array('Motorista.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
        $this->set('motoristas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Motorista->exists($id)) {
            throw new NotFoundException(__('Invalid motorista'));
        }
        $options = array('conditions' => array('Motorista.' . $this->Motorista->primaryKey => $id));
        $this->set('motorista', $this->Motorista->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id = null) {

        if ($id) {
            return $this->edit($id);
        } else {
            if ($this->request->is('post')) {
                $this->Motorista->create();
                if ($this->Motorista->save($this->request->data)) {
                    $this->Session->setFlash(__('The motorista has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'add', $this->Motorista->id));
                } else {
                    $this->Session->setFlash(__('The motorista could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
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
        if (!$this->Motorista->exists($id)) {
            throw new NotFoundException(__('Invalid motorista'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Motorista->save($this->request->data)) {
                $this->Session->setFlash(__('The motorista has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'add', $id));
            } else {
                $this->Session->setFlash(__('The motorista could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Motorista.' . $this->Motorista->primaryKey => $id));
            $this->request->data = $this->Motorista->find('first', $options);
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
        $this->Motorista->id = $id;
        if (!$this->Motorista->exists()) {
            throw new NotFoundException(__('Invalid motorista'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Motorista->delete()) {
            $this->Session->setFlash(__('The motorista has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The motorista could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
