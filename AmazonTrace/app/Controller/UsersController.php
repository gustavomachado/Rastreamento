<?php

App::uses('AppController', 'Controller');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
        $this->User->recursive = 0;
        $this->paginate = array('limit' => 20);
        $contas = $this->User->Conta->find('list', array('fields' => array('id', 'descricao')));
        $this->set('usuarios', $this->Paginator->paginate(), 'contas');
    }

    public function login() {
        $this->render('login', false);
        if (isset($this->data['User'])) {
            $user = $this->User->find('first', array('conditions' => array('nome' => $this->data['User']['nome'], 'senha' => AuthComponent::password($this->data['User']['senha']))));
            if ($user) {
                if ($this->Auth->login($user)) {
                    $this->redirect($this->Auth->redirect(array('controller' => 'cadastros')));
                }
            } else {
                echo '<div class="alert alert-danger">Usuário ou senha inválidos.<br>Informe seus dados corretamente.</div>';
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Usuario->exists($id)) {
            throw new NotFoundException(__('Invalid usuario'));
        }
        $options = array('conditions' => array('User.' . $this->Usuario->primaryKey => $id));
        $this->set('usuario', $this->Usuario->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function cadastro($id = null) {
        if ($id) {
            $this->edit($id);
        } else {
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Usuário salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('O Usuário não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
                }
            }
            $contas = $this->User->Conta->find('list', array('fields' => array('id', 'descricao')));
            $this->set(compact('contas'));
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
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário inválido.'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Usuário não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $contas = $this->User->Conta->find('list', array('fields' => array('id', 'descricao')));
        $this->set(compact('contas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('O Usuário não pôde ser excluído. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
