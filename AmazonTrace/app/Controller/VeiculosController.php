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
        $this->set("id_cliente", $id_cliente);

        $this->set("nome_cliente", $cliente['Cliente']['nome']);

        $this->Veiculo->recursive = 0;

        $this->Paginator->settings = array('conditions' => array('Veiculo.cliente_id' => $id_cliente));
        $dadosPaginacao = $this->Paginator->paginate();
        for ($i = 0; $i < count($dadosPaginacao); $i++) {
            $idRastreador = $dadosPaginacao[$i]['Rastreador']['id'];
            if ($idRastreador) {
                $options = array('conditions' => array("Chip.rastreador_id" => $idRastreador));
                $result = $this->Veiculo->Rastreador->Chip->find("first", $options);
            } else {
                $dadosPaginacao[$i]['Rastreador']['numero_equipamento'] = "Sem Rastreador";
                $result = "";
            }
            if (isset($result['Chip'])) {
                $dadosPaginacao[$i]['Chip'] = $result['Chip'];
            }
        }
        $this->set('veiculos', $dadosPaginacao);
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

        $options["veiculo"] = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));

        $this->set('veiculo', $this->Veiculo->find('first', $options["veiculo"]));
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

        $historicoVeiculos = $this->Veiculo->Rastreador->HistoricoVeiculo->find("all", array('conditions' => array('HistoricoVeiculo.veiculo_id' => $id), 'order' => 'HistoricoVeiculo.id desc'));

        $this->set('id_cliente', $id_cliente);
        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_serie', 'Rastreador.numero_equipamento', 'Rastreador.data_install',
            'Rastreador.data_remove', 'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador', 'Rastreador.info_add');
        $disponiveis = $this->Veiculo->Rastreador->find('all', array('conditions' => array('Rastreador.veiculo_id  ' => NULL), 'fields' => $fields));

        $this->set("tipos_veic", $this->getLista("tipo_veiculo"));
        $this->set("tipos_comb", $this->getLista("tipo_combustivel"));
        $this->set("tipos_status", $this->getLista("tipo_status"));
        $this->set('disponiveis', $disponiveis);
        $this->set('historicoVeiculos', $historicoVeiculos);

        if ($id) {
            $this->edit($id_cliente, $id);
            $this->set('id', $id);
        } else {
            if ($this->request->is('post')) {
                $this->Veiculo->create();
                $this->request->data['Veiculo']['cliente_id'] = $id_cliente;
                if ($this->Veiculo->save($this->request->data)) {
                    $this->Session->setFlash(__('Veículo salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                    $_SESSION['rastreador_temp']['veiculo_id'] = $this->Veiculo->id;
                    $rastreadorTemp = $_SESSION['rastreador_temp'];
                    $this->requestAction(array('controller' => 'Rastreadors', 'action' => 'vincularVeiculo'), $rastreadorTemp);
                    return $this->redirect(array('action' => 'add', $id_cliente, $this->Veiculo->id));
                } else {
                    $this->Session->setFlash(__('Não foi possível salvar o veículo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
                }
            }

            $motoristas = $this->Veiculo->Motorista->find('list', array('fields' => 'nome'));
            $this->set('motoristas', $motoristas);
            $this->set('instalados', array());
        }
    }

    public function getRastreadoresDisponiveis() {
        $this->render(false, false);
        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_serie', 'Rastreador.numero_equipamento', 'Rastreador.data_install',
            'Rastreador.data_remove', 'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador', 'Rastreador.info_add');
        $disponiveis = $this->Veiculo->Rastreador->find('all', array('conditions' => array('Rastreador.veiculo_id  ' => NULL), 'fields' => $fields));
        echo json_encode($disponiveis);
    }

    public function getRastreadorVinculado($id) {
        $this->render(false, false);
        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_serie', 'Rastreador.numero_equipamento', 'Rastreador.data_install',
            'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador', 'Rastreador.info_add');
        $rastreadorVinculado = $this->Veiculo->Rastreador->find('first', array('conditions' => array('Rastreador.veiculo_id  ' => $id), 'fields' => $fields));
        echo json_encode($rastreadorVinculado);
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
            if ($this->Veiculo->save($this->request->data)) {
                $this->Session->setFlash(__('Veículo salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'add', $id_cliente, $id));
            } else {
                $this->Session->setFlash(__('Não foi possível salvar o veículo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Veiculo.' . $this->Veiculo->primaryKey => $id));
            $this->request->data = $this->Veiculo->find('first', $options);
        }
        $fields = array('Rastreador.id', 'Rastreador.marca', 'Rastreador.modelo', 'Rastreador.numero_serie', 'Rastreador.numero_equipamento', 'Rastreador.data_install',
            'Rastreador.data_remove', 'Rastreador.fiacao_utilizada', 'Rastreador.local_instalacao_rastreador', 'Rastreador.info_add');
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

        $lista = $this->Veiculo->Rastreador->find("list", array("conditions" => array("Rastreador.veiculo_id" => $id)));

        foreach ($lista as $rastreador) {
            $this->requestAction(array("controller" => "Rastreadors", "action" => "desvincularVeiculo", $rastreador, $id));
        }


        if ($this->Veiculo->delete()) {

            $this->Session->setFlash(__('O veículo foi deletado com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {

            $this->Session->setFlash(__('O veículo não foi deletado, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }

        return $this->redirect(array('action' => 'index', $id_cliente));
    }

}
