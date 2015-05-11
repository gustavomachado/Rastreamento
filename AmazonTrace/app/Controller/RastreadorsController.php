<?php

App::uses('AppController', 'Controller');

/**
 * Rastreadors Controller
 *
 * @property Rastreador $Rastreador
 * @property PaginatorComponent $Paginator
 */
class RastreadorsController extends AppController {

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
        $this->Rastreador->recursive = 0;
        $this->set('filtros', array('modelo' => 'Modelo', 'marca' => 'Marca', 'numero_equipamento' => 'Número Equipamento', 'numero_serie' => 'Número Série'));
        $this->paginate = array('limit' => 20);
        if ($filtro && $pesquisa) {            
            $this->paginate = array('limit' => 20, 'conditions' => array('Rastreador.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
            $rastreadors = $this->Rastreador->find('all', array('conditions' => array('Rastreador.' . $filtro . ' LIKE' => '%' . $pesquisa . '%')));
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
        $this->set(compact('rastreadors'));
        $this->set('rastreadors', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Rastreador->exists($id)) {
            throw new NotFoundException(__('Invalid rastreador'));
        }
        $options = array('conditions' => array('Rastreador.' . $this->Rastreador->primaryKey => $id));
        $this->set('rastreador', $this->Rastreador->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Rastreador->create();
            if ($this->Rastreador->save($this->request->data)) {
                $this->Session->setFlash(__('Rastreador salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Rastreador não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $veiculos = $this->Rastreador->Veiculo->find('list');
        $this->set(compact('veiculos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Rastreador->exists($id)) {
            throw new NotFoundException(__('Rastreador inválido!'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Rastreador->save($this->request->data)) {
                $this->Session->setFlash(__('Rastreador salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Rastreador não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Rastreador.' . $this->Rastreador->primaryKey => $id));
            $this->request->data = $this->Rastreador->find('first', $options);
        }
        $chipsInRastreador = $this->Rastreador->Chip->find('all', array('conditions' => array('rastreador_id' => $id, 'rastreador_id is not null')));
        $chips = $this->Rastreador->Chip->find('all', array('order' => array('Chip.id ASC')));
        $this->set(compact('chips'));
        $this->set(compact('chipsInRastreador'));
        $veiculos = $this->Rastreador->Veiculo->find('list');
        $this->set(compact('veiculos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Rastreador->id = $id;
        if (!$this->Rastreador->exists()) {
            throw new NotFoundException(__('Rastreador inválido.'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Rastreador->delete()) {
            $this->Session->setFlash(__('Rastreador excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('O Rastreador não pôde ser excluído. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
