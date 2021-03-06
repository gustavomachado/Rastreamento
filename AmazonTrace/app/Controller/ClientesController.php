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

    public function index( $filtro = null, $pesquisa = null) {

        $this->Cliente->recursive = 0;

        $this->set('filtros', array('nome' => 'Nome', 'cpf_cnpj' => 'CPF/CNPJ', 'razao_social' => 'Razao Social', 'telefone' => 'Telefone'));

        $this->paginate = array('limit' => 50, 'order' => array('Cliente.nome'=> 'asc'));

        if ($filtro && $pesquisa) {

            $this->paginate = array('limit' => 50, 'conditions' => array('Cliente.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'), 'order' => array('Cliente.nome'=> 'asc'));

        } 

        $this->set('pesquisa', $pesquisa);

        $this->set('filtro', $filtro);

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

    public function add($id = null) {



        if ($id) {

            return $this->edit($id);

        }

        if ($this->request->is('post')) {

            $this->Cliente->create();

            $this->Cliente->Contato->create();

            if ($this->Cliente->save($this->request->data)) {

                $contatos = $this->request->data['Cliente']['Contatos'];

                $id = $this->Cliente->id;

                if (count($contatos) > 0) {

                    foreach ($contatos as $key => $contato) {

                        $contato['cliente_id'] = $id;

                        $contatos[$key] = $contato;

                    }

                    $this->Cliente->Contato->saveAll($contatos);

                }

                $this->Session->setFlash(__('The cliente has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'index'));

            } else {

                $this->Session->setFlash(__('The cliente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

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

        if (!$this->Cliente->exists($id)) {

            throw new NotFoundException(__('Invalid cliente'));

        }

        if ($this->request->is(array('post', 'put'))) {

            if ($this->Cliente->save($this->request->data)) {

                $this->Session->setFlash(__('The cliente has been saved.'), 'default', array('class' => 'alert alert-success'));



                $contatos = $this->request->data['Cliente']['Contatos'];

                if (count($contatos) > 0) {

                    foreach ($contatos as $key => $contato) {

                        $contatos[$key]['cliente_id'] = $id;

                    }

                    $this->Cliente->Contato->saveAll($contatos);

                }





                return $this->redirect(array('action' => 'index', $id));

            } else {

                $this->Session->setFlash(__('The cliente could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

            }

        } else {

            $options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));



            $optionsContato = array('conditions' => array('Contato.cliente_id' => $id));

            $contatos = $this->Cliente->Contato->find('all', $optionsContato);

            $this->request->data = $this->Cliente->find('first', $options);

            /*   var_dump( $this->request->data);

              echo "aqui";

              exit; */

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

    public function listar($tipolista='all',$conditions = NULL){
        return $this->Cliente->find($tipolista,$conditions);
    }

}

