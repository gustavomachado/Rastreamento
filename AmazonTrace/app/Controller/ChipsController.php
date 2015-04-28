<?php

App::uses('AppController', 'Controller');

/**
 * Chips Controller
 *
 * @property Chip $Chip
 * @property PaginatorComponent $Paginator
 */
class ChipsController extends AppController {

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
        $this->Chip->recursive = 0;
        $this->paginate = array('limit' => 10);
        $this->set('chips', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Chip->exists($id)) {
            throw new NotFoundException(__('Invalid chip'));
        }
        $options = array('conditions' => array('Chip.' . $this->Chip->primaryKey => $id));
        $this->set('chip', $this->Chip->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Chip->create();
            if ($this->Chip->save($this->request->data)) {
                $this->Session->setFlash(__('The chip has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chip could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $rastreadors = $this->Chip->Rastreador->find('list');
        $this->set(compact('rastreadors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Chip->exists($id)) {
            throw new NotFoundException(__('Invalid chip'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chip->save($this->request->data)) {
                $this->Session->setFlash(__('The chip has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The chip could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Chip.' . $this->Chip->primaryKey => $id));
            $this->request->data = $this->Chip->find('first', $options);
        }
        $rastreadors = $this->Chip->Rastreador->find('list');
        $this->set(compact('rastreadors'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Chip->id = $id;
        if (!$this->Chip->exists()) {
            throw new NotFoundException(__('Invalid chip'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Chip->delete()) {
            $this->Session->setFlash(__('The chip has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The chip could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
