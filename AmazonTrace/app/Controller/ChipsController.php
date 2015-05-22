<?php

App::uses('AppController', 'Controller');

/**
 * Chips Controller
 *
 * @property Chip $Chip
 * @property PaginatorComponent $Paginator
 */
class ChipsController extends AppController {

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
    public function index($filtro = null, $pesquisa = null) {
        $this->Chip->recursive = 0;
        $this->set('filtros', array('numero_chip' => 'Número Chip', 'numero_telefone' => 'Número Telefone', 'apn' => 'APN'));
        $this->paginate = array('limit' => 10);

        if ($filtro && $pesquisa) {
            $this->paginate = array('limit' => 20, 'conditions' => array('Chip.' . $filtro . ' LIKE' => '%' . $pesquisa . '%'));
            $chips = $this->Chip->find('all', array('conditions' => array('Chip.' . $filtro . ' LIKE' => '%' . $pesquisa . '%')));
        }
        $this->set('pesquisa', $pesquisa);
        $this->set('filtro', $filtro);
        $this->set('chips', $this->Paginator->paginate());
    }

    public function vincularChip() {
        $this->render(false, false);
        $this->request->data['Chip']['rastreador_id'] = $_REQUEST['rastreador_id'];
        $this->request->data['Chip']['id'] = $_REQUEST['id'];

        $chipHist = $this->Chip->find('first', array('conditions' => array('Chip.' . $this->Chip->primaryKey => $_REQUEST['id'])));
        if ($chipHist['Rastreador']['id']) {
            $options = array('HistoricoChip.chip_id' => $_REQUEST['id'], 'HistoricoChip.rastreador_id' => $chipHist['Rastreador']['id'], 'HistoricoChip.data_fim is NULL');
            $historicoChipRast = $this->Chip->HistoricoChip->find('first', array('fields' => 'HistoricoChip.*', 'conditions' => $options));
            $updateHistorico = array('id' => $historicoChipRast['HistoricoChip']['id'], 'data_fim' => date('Y-m-d H:i:s'));
            $this->Chip->HistoricoChip->save($updateHistorico);
        }
        $this->Chip->HistoricoChip->create();
        $historicoChipRast = array('chip_id' => $_REQUEST['id'], 'rastreador_id' => $_REQUEST['rastreador_id'], 'data_inicio' => date('Y-m-d H:i:s'));
        $this->Chip->HistoricoChip->set($historicoChipRast);
        $this->Chip->HistoricoChip->save($this->Chip->Rastreador->HistoricoChip->data);

        if ($this->Chip->save($this->request->data)) {
            $options = array('conditions' => array('Chip.' . $this->Chip->primaryKey => $_REQUEST['id']));
            $chip = $this->Chip->find('first', $options);
            $result = array('status' => 1);
            echo json_encode($result);
        }
    }

    public function desvincularChip() {
        $this->render(false, false);
        $this->request->data['Chip']['rastreador_id'] = null;
        $this->request->data['Chip']['id'] = $_REQUEST['id'];
        $chipHist = $this->Chip->find('first', array('conditions' => array('Chip.' . $this->Chip->primaryKey => $_REQUEST['id'])));
        $options = array('HistoricoChip.chip_id' => $_REQUEST['id'], 'HistoricoChip.rastreador_id' => $chipHist['Rastreador']['id'], 'HistoricoChip.data_fim is NULL');
        $historicoChipRast = $this->Chip->HistoricoChip->find('first', array('fields' => 'HistoricoChip.*', 'conditions' => $options));
        $updateHistorico = array('id' => $historicoChipRast['HistoricoChip']['id'], 'data_fim' => date('Y-m-d H:i:s'));
        $this->Chip->HistoricoChip->save($updateHistorico);
        if ($this->Chip->save($this->request->data)) {
            $result = array('status' => 1);
            echo json_encode($result);
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
        if (!$this->Chip->exists($id)) {
            throw new NotFoundException(__('Invalid chip'));
        }
        $options = array('conditions' => array('Chip.' . $this->Chip->primaryKey => $id));
        $this->set('chip', $this->Chip->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Chip->create();
            if ($this->Chip->save($this->request->data)) {
                $this->Session->setFlash(__('Chip salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Chip não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $rastreadors = $this->Chip->Rastreador->find('list');
        $this->set(compact('rastreadors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Chip->exists($id)) {
            throw new NotFoundException(__('Chip inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Chip->save($this->request->data)) {
                $this->Session->setFlash(__('Chip salvo com sucesso.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('O Chip não pôde ser salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Chip.' . $this->Chip->primaryKey => $id));
            $this->request->data = $this->Chip->find('first', $options);
        }
        $rastreadors = $this->Chip->Rastreador->find('list');
        $this->set(compact('rastreadors'));
    }

    public function cadastro($id = null) {
        if ($id) {
            $this->edit($id);
        } else {
            $this->add();
        }
        $operadoras = $this->Chip->Operadora->find('list', array('fields' => array('id', 'nome')));
        $this->set(compact('operadoras'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Chip->id = $id;
        if (!$this->Chip->exists()) {
            throw new NotFoundException(__('Chip inválido'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Chip->delete()) {
            $this->Session->setFlash(__('Chip excluído com sucesso.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('O Chip não pôde ser excluído. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
