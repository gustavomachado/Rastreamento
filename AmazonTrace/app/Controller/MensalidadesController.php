<?php
App::uses('AppController', 'Controller');
/**
 * Mensalidades Controller
 *
 * @property Mensalidade $Mensalidade
 * @property PaginatorComponent $Paginator
 */
class MensalidadesController extends AppController {

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
		$this->Mensalidade->recursive = 0;
		$this->set('mensalidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('Invalid mensalidade'));
		}
		$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
		$this->set('mensalidade', $this->Mensalidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mensalidade->create();
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The mensalidade has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensalidade could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$contratos = $this->Mensalidade->Contrato->find('list');
		$this->set(compact('contratos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mensalidade->exists($id)) {
			throw new NotFoundException(__('Invalid mensalidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mensalidade->save($this->request->data)) {
				$this->Session->setFlash(__('The mensalidade has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensalidade could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Mensalidade.' . $this->Mensalidade->primaryKey => $id));
			$this->request->data = $this->Mensalidade->find('first', $options);
		}
		$contratos = $this->Mensalidade->Contrato->find('list');
		$this->set(compact('contratos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mensalidade->id = $id;
		if (!$this->Mensalidade->exists()) {
			throw new NotFoundException(__('Invalid mensalidade'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Mensalidade->delete()) {
			$this->Session->setFlash(__('The mensalidade has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The mensalidade could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
