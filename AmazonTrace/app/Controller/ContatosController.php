<?php
App::uses('AppController', 'Controller');
/**
 * Contatos Controller
 *
 * @property Contato $Contato
 * @property PaginatorComponent $Paginator
 */
class ContatosController extends AppController {

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
		$this->Contato->recursive = 0;
		$this->set('contatos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
		$this->set('contato', $this->Contato->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contato->create();
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('The contato has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contato could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$clientes = $this->Contato->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contato->exists($id)) {
			throw new NotFoundException(__('Invalid contato'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contato->save($this->request->data)) {
				$this->Session->setFlash(__('The contato has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contato could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Contato.' . $this->Contato->primaryKey => $id));
			$this->request->data = $this->Contato->find('first', $options);
		}
		$clientes = $this->Contato->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null,$id_cliente=null) {
		$this->Contato->id = $id;
		if (!$this->Contato->exists()) {
			throw new NotFoundException(__('Invalid contato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contato->delete()) {
			$this->Session->setFlash(__('The contato has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The contato could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
                if($id_cliente){
                    return $this->redirect(array('controller'=>'clientes','action' => 'index',$id_cliente));
                }else{
                     return $this->redirect(array( 'action' => 'index'));
                }
	}
}
