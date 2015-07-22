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
        $this->set('filtros', array('numero_serie' => 'Número Série', 'modelo' => 'Modelo', 'marca' => 'Marca', 'numero_equipamento' => 'Número Equipamento'));
        $this->paginate = array('limit' => 50);
        if ($filtro && $pesquisa) {
            $this->paginate = array('limit' => 50, 'conditions' => array('Rastreador.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
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
        $chips = $this->Rastreador->Chip->find('all', array('conditions' => array('rastreador_id is  null'), 'order' => array('Chip.id ASC')));
        $this->set(compact('chips'));
        $this->set(compact('chipsInRastreador'));
        $this->set('id', $id);
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
		$chips = $this->Rastreador->Chip->find('list', array('conditions' => array('rastreador_id' => $id)));
        if ($this->Rastreador->delete()) {
			foreach ($chips as $chip) {
                $_REQUEST['id'] = $chip;
                $this->requestAction(array("controller"=>"Chips","action"=>"desvincularChip"));
            }
            $this->Session->setFlash(__('Rastreador excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('O Rastreador não pôde ser excluído. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function vincularVeiculo() {
        try {
            $this->render(false, false);
            $id = $_REQUEST['id'];
            $dataInstalacao = $_REQUEST['data_instalacao'];
            if (!$dataInstalacao) {
                $dataInstalacao = date("Y-m-d");
            } else {
                $dataArray = split("/", $dataInstalacao);
                $dataInstalacao = $dataArray[2] . "-" . $dataArray[1] . "-" . $dataArray[0];
            }
            $veiculoId = $_REQUEST['veiculo_id'];
            $this->request->data['Rastreador']['veiculo_id'] = $veiculoId;
            $this->request->data['Rastreador']['id'] = $id;
            $this->request->data['Rastreador']['fiacao_utilizada'] = $_REQUEST['fiacao'];
            $this->request->data['Rastreador']['local_instalacao_rastreador'] = $_REQUEST['local'];

            $rastreador = $this->Rastreador->find('first', array('conditions' => array('Rastreador.id' => $id, 'veiculo_id' => NULL)));
            if (count($rastreador) < 1) {
                $result = array('status' => 2);
                echo json_encode($result);
                return;
            } else {
                $this->Rastreador->HistoricoVeiculo->create();
                $options = array('HistoricoVeiculo.rastreador_id' => $id,
                    'HistoricoVeiculo.veiculo_id' => $veiculoId,
                    'HistoricoVeiculo.data_fim IS NULL');
                $historico = $this->Rastreador->HistoricoVeiculo->find('first', array('conditions' => $options));
                if (count($historico) < 1) {
                    $historicoRastVeic = array('veiculo_id' => $veiculoId,
                        'rastreador_id' => $id,
                        'data_inicio' => $dataInstalacao . " " . date("H:i:s"));
                    $this->Rastreador->HistoricoVeiculo->set($historicoRastVeic);
                    if (!$this->Rastreador->HistoricoVeiculo->save($this->Rastreador->HistoricoVeiculo->data)) {
                        echo json_encode(array('status' => 3, 'dataInstalacao' => $dataInstalacao));
                        exit;
                    }
                }
            }
            $this->concluir();
        } catch (Exception $e) {
            echo json_encode(array('status' => 4, 'msg' => $e->getMessage()));
            exit;
        }
    }

    public function desvincularVeiculo($id = null, $veiculoId = null) {
        try {
            $this->render(false, false);
            if ($id) {
                $_REQUEST['id'] = $id;
            } else {
                $id = $_REQUEST['id'];
            }
            if ($veiculoId) {
                $_REQUEST['veiculo_id'] = $veiculoId;
            } else {
                $veiculoId = $_REQUEST['veiculo_id'];
            }

            if (isset($_REQUEST['data_remocao'])) {
                $dataRemocao = $_REQUEST['data_remocao'];
            } else {
                $dataRemocao = date("d/m/Y");
            }
            $dataArray = split("/", $dataRemocao);
            $dataRemocao = $dataArray[2] . "-" . $dataArray[1] . "-" . $dataArray[0];

            $this->request->data['Rastreador']['id'] = $id;
//  $this->request->data['Rastreador']['id'] = 15;
            $this->request->data['Rastreador']['veiculo_id'] = NULL;
            $options = array('HistoricoVeiculo.rastreador_id' => $id,
                'HistoricoVeiculo.veiculo_id' => $veiculoId,
                'HistoricoVeiculo.data_fim IS  NULL');
            $historico = $this->Rastreador->HistoricoVeiculo->find('first', array('conditions' => $options, 'order' => 'HistoricoVeiculo.id desc'));
            if (count($historico) > 0) {
                $historico['HistoricoVeiculo']['data_fim'] = $dataRemocao . " " . date("H:i:s");
                $this->Rastreador->HistoricoVeiculo->set($historico);
                if (!$this->Rastreador->HistoricoVeiculo->save($this->Rastreador->HistoricoVeiculo->data)) {
                    echo json_encode(array('status' => 3, 'dataRemocao' => $dataRemocao));
                    exit;
                }
            }

            $this->concluir();
        } catch (Exception $e) {
            echo json_encode(array('status' => 4, 'msg' => $e->getMessage()));
        }
    }

    private function concluir() {
        if ($this->Rastreador->save($this->request->data)) {
            $options = array('conditions' => array('Rastreador.' . $this->Rastreador->primaryKey => $_REQUEST['id']));
            $rastreador = $this->Rastreador->find('first', $options);
            $result = array('status' => 1);
        } else {
            $result = array('status' => 0);
        }
        echo json_encode($result);
    }

}
