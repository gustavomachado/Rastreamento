<?php

App::uses('AppController', 'Controller');

/**
 * Veiculos Controller
 *
 * @property Veiculo $Veiculo
 * @property PaginatorComponent $Paginator
 */
class VeiculosController extends AppController {

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
    public function index($id_cliente) {
        if (!$id_cliente || !$this->Veiculo->Cliente->exists($id_cliente)) {
            throw new NotFoundException(__('Necessário um cliente'));
        }

        $cliente = $this->Veiculo->Cliente->find("first", array('conditions' => array('Cliente.' . $this->Veiculo->Cliente->primaryKey => $id_cliente)));
        //  var_dump($cliente);
        $this->set("id_cliente", $id_cliente);
        $this->set("nome_cliente", $cliente['Cliente']['nome']);
        $this->Veiculo->recursive = 0;


        $this->Paginator->settings = array('conditions' => array('Veiculo.cliente_id' => $id_cliente));
        $this->set('veiculos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Veiculo->exists($id)) {
            throw new NotFoundException(__('Invalid veiculo'));
        }
        $options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
        $this->set('veiculo', $this->Veiculo->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id_cliente = null, $id = null) {

        if (!$id_cliente || !$this->Veiculo->Cliente->exists($id_cliente)) {
            throw new NotFoundException(__('Necessário um cliente'));
        }
        $this->set('id_cliente', $id_cliente);

        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_equipamento'
            , 'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador');
        $disponiveis = $this->Veiculo->Rastreador->find('all', array('conditions' => array('Rastreador.veiculo_id  ' => NULL), 'fields' => $fields));
        $this->set('disponiveis', $disponiveis);
        if ($id) {
            $this->edit($id_cliente, $id);
            $this->set('id', $id);
        } else {
            if ($this->request->is('post')) {
                $this->Veiculo->create();
                $this->request->data['Veiculo']['cliente_id'] = $id_cliente;
                if ($this->Veiculo->save($this->request->data)) {
                    $this->Session->setFlash(__('The veiculo has been saved.'), 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'add', $id_cliente, $this->Veiculo->id));
                } else {
                    $this->Session->setFlash(__('The veiculo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }

            //  $instalados = $this->Veiculo->Rastreador->find('list', array('conditions' => array('veiculo_id' => $id)));

            $motoristas = $this->Veiculo->Motorista->find('list', array('fields' => 'nome'));
            $this->set('motoristas', $motoristas);
            $this->set('instalados', array());
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id_cliente, $id = null) {
        if (!$this->Veiculo->exists($id)) {
            throw new NotFoundException(__('Invalid veiculo'));
        }



        if ($this->request->is(array('post', 'put'))) {
            /*   var_dump($this->request->data);
              echo "ok"; exit; */
            if ($this->Veiculo->save($this->request->data)) {
                $this->Session->setFlash(__('The veiculo has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'add', $id_cliente, $id));
            } else {
                $this->Session->setFlash(__('The veiculo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
            $this->request->data = $this->Veiculo->find('first', $options);
        }
        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_equipamento'
            , 'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador');

        $instalados = $this->Veiculo->Rastreador->find('all', array('conditions' => array('veiculo_id' => $id), 'fields' => $fields));

        $motoristas = $this->Veiculo->Motorista->find('list', array('fields' => 'nome'));
        $this->set('instalados', $instalados);

        $this->set('motoristas', $motoristas);
        //    var_dump($disponiveis);exit;
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id_cliente, $id = null) {
        $this->Veiculo->id = $id;
        if (!$this->Veiculo->exists()) {
            throw new NotFoundException(__('Invalid veiculo'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Veiculo->delete()) {
            $this->Session->setFlash(__('The veiculo has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The veiculo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index', $id_cliente));
    }

   

}
