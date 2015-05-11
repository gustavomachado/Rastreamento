<?php
App::uses('AppController', 'Controller');
/**
 * HistoricoChips Controller
 *
 * @property HistoricoChip $HistoricoChip
 * @property PaginatorComponent $Paginator
 */
class HistoricoChipsController extends AppController {

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
		$this->HistoricoChip->recursive = 0;
		$this->set('historicoChips', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HistoricoChip->exists($id)) {
			throw new NotFoundException(__('Invalid historico chip'));
		}
		$options = array('conditions' => array('HistoricoChip.' . $this->HistoricoChip->primaryKey => $id));
		$this->set('historicoChip', $this->HistoricoChip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HistoricoChip->create();
			if ($this->HistoricoChip->save($this->request->data)) {
				$this->Session->setFlash(__('The historico chip has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historico chip could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$chips = $this->HistoricoChip->Chip->find('list');
		$rastreadors = $this->HistoricoChip->Rastreador->find('list');
		$this->set(compact('chips', 'rastreadors'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HistoricoChip->exists($id)) {
			throw new NotFoundException(__('Invalid historico chip'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->HistoricoChip->save($this->request->data)) {
				$this->Session->setFlash(__('The historico chip has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historico chip could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('HistoricoChip.' . $this->HistoricoChip->primaryKey => $id));
			$this->request->data = $this->HistoricoChip->find('first', $options);
		}
		$chips = $this->HistoricoChip->Chip->find('list');
		$rastreadors = $this->HistoricoChip->Rastreador->find('list');
		$this->set(compact('chips', 'rastreadors'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->HistoricoChip->id = $id;
		if (!$this->HistoricoChip->exists()) {
			throw new NotFoundException(__('Invalid historico chip'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HistoricoChip->delete()) {
			$this->Session->setFlash(__('The historico chip has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The historico chip could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
