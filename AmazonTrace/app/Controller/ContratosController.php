<?php

App::uses('AppController', 'Controller');

/**
 * Contratos Controller
 *
 * @property Contrato $Contrato
 * @property PaginatorComponent $Paginator
 */
class ContratosController extends AppController {

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
        $this->Contrato->recursive = 0;
        $this->set('filtros', array('numero_contrato' => 'Nº Contrato', 'nome' => 'Cliente', 'dia_vencimento' => 'Dia Vencimento', 'doc' => 'Doc', 'status' => 'Status'));
        $this->paginate = array('limit' => 20);
        if ($filtro && $pesquisa) {
            if ($filtro == 'nome') {
                $this->paginate = array('limit' => 20, 'conditions' => array('Cliente.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
                $contratos = $this->Contrato->find('all', array('conditions' => array('Cliente.' . $filtro . ' LIKE' => '%' . $pesquisa . '%')));
            } else {
                $this->paginate = array('limit' => 20, 'conditions' => array('Contrato.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
                $contratos = $this->Contrato->find('all', array('conditions' => array('Contrato.' . $filtro . ' LIKE' => '%' . $pesquisa . '%')));
            }
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
        $this->set('contratos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Contrato->exists($id)) {
            throw new NotFoundException(__('Invalid contrato'));
        }
        $options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
        $this->set('contrato', $this->Contrato->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Contrato->create();
            if ($this->Contrato->save($this->request->data)) {
                $contratoSalvo = $this->Contrato->find('first', array('fields' => 'id', 'conditions' => array('numero_contrato' => $this->request->data['Contrato']['numero_contrato'])));
                if ($this->salvarVeiculos($contratoSalvo['Contrato']['id'])) {
                    $this->Session->setFlash(__('Contrato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                } else {
                    $this->Session->setFlash(__('Erro ao salvar lista de veiculos.'), 'default', array('class' => 'alert alert-danger'));
                }
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Contrato não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        unset($_SESSION['veiculosContratoTemp']);
        $clientes = $this->Contrato->Cliente->find('list', array('fields' => array('id', 'nome_cpjCnpj'), 'order' => array('nome')));
        $this->set(compact('clientes'));
        $this->set(compact('veiculos'));
    }

    public function veiculosPorClientes($refresh = NULL) {
        if ($refresh) {
            $_SESSION['veiculosContratoTemp'] = Array();
        }
        $this->render(false, false);
        $id = $_REQUEST['id'];
        $conditions = array('Veiculo.cliente_id' => $id);
        $fields = array('Veiculo.id', 'Veiculo.contrato_id', 'Veiculo.placa', 'Veiculo.tipo_veiculo', 'Veiculo.marca', 'Veiculo.modelo', 'Veiculo.ano_fabricacao', 'Veiculo.ano_modelo', 'Veiculo.status');
        $veiculosByClientes = $this->Contrato->Veiculo->find('all', array('fields' => $fields, 'conditions' => $conditions));
        echo json_encode($veiculosByClientes);
    }

    public function addVeiculo() {
        $this->render(false, false);
        $idVeiculo = $_REQUEST['idVeiculo'];
        if (!isset($_SESSION['veiculosContratoTemp'])) {
            $_SESSION['veiculosContratoTemp'] = Array();
        }
        $fields = array('Veiculo.id', 'Veiculo.placa', 'Veiculo.tipo_veiculo', 'Veiculo.marca', 'Veiculo.modelo', 'Veiculo.ano_fabricacao', 'Veiculo.ano_modelo', 'Veiculo.status');
        $veiculo = $this->Contrato->Veiculo->find('first', array('fields' => $fields, 'conditions' => array('Veiculo.id' => $idVeiculo)));
        if (!in_array($veiculo, $_SESSION['veiculosContratoTemp'])) {
            array_push($_SESSION['veiculosContratoTemp'], $veiculo);
        }
        echo json_encode($_SESSION['veiculosContratoTemp']);
    }

    public function salvarVeiculos($idContrato = NULL) {
        if (isset($_SESSION['veiculosContratoTemp'])) {
            foreach ($_SESSION['veiculosContratoTemp'] as $key => $value) {
                $_SESSION['veiculosContratoTemp'][$key]['Veiculo']['contrato_id'] = $idContrato;
            }
            if ($this->Contrato->Veiculo->saveAll($_SESSION['veiculosContratoTemp']) || count($_SESSION['veiculosContratoTemp']) == 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function removerVeiculo($idVeiculo, $idContrato = NULL) {
        $this->render(false, false);
        if ($idContrato) {
            $this->Contrato->Veiculo->save(array('id' => $idVeiculo, 'contrato_id' => NULL));
        }
        $array = Array();
        foreach ($_SESSION['veiculosContratoTemp'] as $key => $value) {
            if ($_SESSION['veiculosContratoTemp'][$key]['Veiculo']['id'] == $idVeiculo) {
                unset($_SESSION['veiculosContratoTemp'][$key]);
            } else {
                array_push($array, $value);
            }
        }
        $_SESSION['veiculosContratoTemp'] = $array;
        echo json_encode($array);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Contrato->exists($id)) {
            throw new NotFoundException(__('Invalid contrato'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contrato->save($this->request->data)) {
                if ($this->salvarVeiculos($this->request->data['Contrato']['id'])) {
                    $this->Session->setFlash(__('Contrato salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                } else {
                    $this->Session->setFlash(__('Erro ao salvar lista de veiculos.'), 'default', array('class' => 'alert alert-danger'));
                }
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The contrato could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
            $this->request->data = $this->Contrato->find('first', $options);
        }
        $clientes = $this->Contrato->Cliente->find('list', array('fields' => array('id', 'nome_cpjCnpj'), 'order' => array('nome')));
        $fields = array('Veiculo.id', 'Veiculo.placa', 'Veiculo.tipo_veiculo', 'Veiculo.marca', 'Veiculo.modelo', 'Veiculo.ano_fabricacao', 'Veiculo.ano_modelo', 'Veiculo.status');
        $veiculos = $this->Contrato->Veiculo->find('all', array('fields' => $fields, 'conditions' => array('contrato_id' => $id)));
        $veiculosCliente = $this->Contrato->Veiculo->find('all', array('fields' => $fields, 'conditions' => array('Veiculo.cliente_id' => $this->request->data['Contrato']['cliente_id'])));
        $this->set(compact('clientes'));
        $this->set(compact('veiculos'));
        $this->set(compact('veiculosCliente'));
        $_SESSION['veiculosContratoTemp'] = $veiculos;
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Contrato->id = $id;
        if (!$this->Contrato->exists()) {
            throw new NotFoundException(__('Contrato inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Contrato->delete()) {
            $this->Session->setFlash(__('Contrato removido com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('O Contrato não pôde ser removido. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
