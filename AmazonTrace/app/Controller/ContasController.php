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
    public function index($filtro = NULL, $pesquisa = NULL) {
        $this->Conta->recursive = 0;
        $this->set('filtros', array('descricao' => 'Descrição'));
        $this->paginate = array('limit' => 20);
        if ($filtro && $pesquisa) {
            $this->paginate = array('limit' => 20, 'conditions' => array('Conta.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
            $contas = $this->Conta->find('all', array('conditions' => array('Conta.' . $filtro . ' LIKE' => '%' . $pesquisa . '%')));
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
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
            throw new NotFoundException(__('Conta inválida.'));
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
                $this->Session->setFlash(__('Conta salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A Conta não pôde ser salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
    }
    
    public function cadastro($id=NULL) {
        if($id){
            $this->edit($id);
        } else {
            $this->add();
        }
        $acessos = $this->Acesso->find('all', array('conditions' => array('conta_id' => $id)));
        $paginas = $this->Pagina->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('paginas', 'acessos'));
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
            throw new NotFoundException(__('Conta inválida.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Conta->save($this->request->data)) {
                $this->Session->setFlash(__('Conta salva com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('A Conta não pôde ser salva. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
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
            throw new NotFoundException(__('Conta inválida.'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Conta->delete()) {
            $this->Session->setFlash(__('Conta excluída com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('A Conta não pôde ser ecluída. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
