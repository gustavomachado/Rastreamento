<?php

App::uses('AppController', 'Controller');

/**
 * Acessos Controller
 *
 * @property Acesso $Acesso
 * @property PaginatorComponent $Paginator
 */
class AcessosController extends AppController {

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
    public function index($id=null) {
        if($id){
            $this->edit($id);
        }else {
            $this->add();
        }
        $this->Acesso->recursive = 0;
        $this->paginate = array('limit' => 10);
        $this->set('acessos', $this->Paginator->paginate());
        $contas = $this->Acesso->Conta->find('list', array('fields' => array('id', 'descricao')));
        $paginas = $this->Acesso->Pagina->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('contas', 'paginas'));
    }
    
    public function salvarPermissao(){
        $this->render(false, false);
        $this->Acesso->create();
        $this->Acesso->set($_REQUEST);
        if ($this->Acesso->save($this->Acesso->data)){
            $options = array('conditions' => array('Acesso.pagina_id' => $_REQUEST['pagina_id'], 'Acesso.conta_id' => $_REQUEST['conta_id']));
            $acessoSalvo = $this->Acesso->find('first', $options);
            echo json_encode($acessoSalvo);
        }
    }


    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->render(false, false);
        if (!$this->Acesso->exists($id)) {
            throw new NotFoundException(__('Invalid acesso'));
        }
        $options = array('conditions' => array('Acesso.id' => $id));
        $acesso = $this->Acesso->find('first', $options);
        echo json_encode($acesso);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Acesso->create();
            if ($this->Acesso->save($this->request->data)) {
                $this->Session->setFlash(__('The acesso has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The acesso could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $contas = $this->Acesso->Conta->find('list', array('fields' => array('id', 'descricao')));
        $paginas = $this->Acesso->Pagina->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('paginas', 'contas'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Acesso->exists($id)) {
            throw new NotFoundException(__('Invalid acesso'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Acesso->save($this->request->data)) {
                $this->Session->setFlash(__('The acesso has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The acesso could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Acesso.' . $this->Acesso->primaryKey => $id));
            $this->request->data = $this->Acesso->find('first', $options);
        }
        $contas = $this->Acesso->Conta->find('list', array('fields' => array('id', 'descricao')));
        $paginas = $this->Acesso->Pagina->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('paginas', 'contas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Acesso->id = $id;
        if (!$this->Acesso->exists()) {
            throw new NotFoundException(__('Invalid acesso'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Acesso->delete()) {
            $this->Session->setFlash(__('The acesso has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The acesso could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
