<?php

App::uses('AppController', 'Controller');

/**
 * HistoricoVeiculos Controller
 *
 * @property HistoricoVeiculo $HistoricoVeiculo
 * @property PaginatorComponent $Paginator
 */
class HistoricoVeiculosController extends AppController {

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
    public function index($campoVeiculo = NULL, $valCampoVeiculo = NULL, $campoRastreador = NULL, $valCampoRastreador = NULL) {
        $this->HistoricoVeiculo->recursive = 0;
        $this->paginate = array('limit' => 50);
        $this->set('camposVeiculo', array('placa' => 'Placa', 'apelido' => 'Apelido', 'marca' => 'Marca', 'renavan' => 'Renavan'));
        $this->set('camposRastreador', array('numero_serie' => 'Número Série', 'modelo' => 'Modelo', 'marca' => 'Marca', 'numero_equipamento' => 'Número Equipamento'));

        if (strcmp($campoVeiculo, '0') != -1 && strcmp($campoRastreador, '0') != -1) {
            if ($campoVeiculo != '0' && $campoRastreador != '0') {
                $arrayVeiculos = $this->HistoricoVeiculo->Veiculo->find('list', array('conditions' => array('Veiculo.' . $campoVeiculo . ' LIKE ' => '%' . $valCampoVeiculo . '%')));
                $arrayRastreadores = $this->HistoricoVeiculo->Rastreador->find('list', array('conditions' => array('Rastreador.' . $campoRastreador . ' LIKE ' => '%' . $valCampoRastreador . '%')));
                $this->paginate = array('limit' => 50,
                    'conditions' => array(
                        'HistoricoVeiculo.veiculo_id' => $arrayVeiculos,
                        'HistoricoVeiculo.rastreador_id' => $arrayRastreadores),
                    'order' => 'HistoricoVeiculo.data_fim DESC');
            } else if ($campoVeiculo != '0') {
                $arrayVeiculos = $this->HistoricoVeiculo->Veiculo->find('list', array('conditions' => array('Veiculo.' . $campoVeiculo . ' LIKE ' => '%' . $valCampoVeiculo . '%')));
                $this->paginate = array('limit' => 50,
                    'conditions' => array('HistoricoVeiculo.veiculo_id' => $arrayVeiculos),
                    'order' => 'HistoricoVeiculo.data_fim DESC');
            } else if ($campoRastreador != '0') {
                $arrayRastreadores = $this->HistoricoVeiculo->Rastreador->find('list', array('conditions' => array('Rastreador.' . $campoRastreador . ' LIKE ' => '%' . $valCampoRastreador . '%')));
                $this->paginate = array('limit' => 50,
                    'conditions' => array('HistoricoVeiculo.rastreador_id' => $arrayRastreadores),
                    'order' => 'HistoricoVeiculo.data_fim DESC');
            }
        }
        if($valCampoVeiculo == null || $valCampoVeiculo == 'null'){
            $valCampoVeiculo = NULL;
        }
        $this->set('campoVeiculo', $campoVeiculo);
        $this->set('valCampoVeiculo', $valCampoVeiculo);
        $this->set('campoRastreador', $campoRastreador);
        $this->set('valCampoRastreador', $valCampoRastreador);
        $this->set('historicoVeiculos', $this->Paginator->paginate());
    }

    /* public function index($filtro = NULL, $pesquisa = NULL) {
      $this->HistoricoVeiculo->recursive = 0;
      $this->paginate = array('limit' => 50);
      if (strcmp($filtro, '0') != -1 && strcmp($pesquisa, '0') != -1) {
      if ($filtro != '0' && $pesquisa != '0') {
      $this->paginate = array('limit' => 50, 'conditions' => array('HistoricoVeiculo.veiculo_id' => $filtro, 'HistoricoVeiculo.rastreador_id' => $pesquisa), 'order' => 'HistoricoVeiculo.data_fim DESC');
      } else if ($filtro != '0' || $pesquisa != '0') {
      $this->paginate = array('limit' => 50, 'conditions' => 'HistoricoVeiculo.veiculo_id = ' . $filtro . ' OR HistoricoVeiculo.rastreador_id = ' . $pesquisa, 'order' => 'HistoricoVeiculo.data_fim DESC');
      }
      }
      $this->set('veiculos', $this->HistoricoVeiculo->Veiculo->find('list', array('fields' => array('id', 'Veiculo.marca_modelo_placa'), 'order' => array('Veiculo.id ASC'))));
      $this->set('rastreadores', $this->HistoricoVeiculo->Rastreador->find('list', array('fields' => array('id', 'Rastreador.id_modelo'), 'order' => array('Rastreador.id ASC'))));
      $this->set('filtro', $filtro);
      $this->set('pesquisa', $pesquisa);
      $this->set('historicoVeiculos', $this->Paginator->paginate());
      } */

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->HistoricoVeiculo->exists($id)) {
            throw new NotFoundException(__('Invalid historico veiculo'));
        }
        $options = array('conditions' => array('HistoricoVeiculo.' . $this->HistoricoVeiculo->primaryKey => $id));
        $this->set('historicoVeiculo', $this->HistoricoVeiculo->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->HistoricoVeiculo->create();
            if ($this->HistoricoVeiculo->save($this->request->data)) {
                $this->Session->setFlash(__('The historico veiculo has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The historico veiculo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $veiculos = $this->HistoricoVeiculo->Veiculo->find('list');
        $rastreadors = $this->HistoricoVeiculo->Rastreador->find('list');
        $this->set(compact('veiculos', 'rastreadors'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->HistoricoVeiculo->exists($id)) {
            throw new NotFoundException(__('Invalid historico veiculo'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->HistoricoVeiculo->save($this->request->data)) {
                $this->Session->setFlash(__('The historico veiculo has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The historico veiculo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('HistoricoVeiculo.' . $this->HistoricoVeiculo->primaryKey => $id));
            $this->request->data = $this->HistoricoVeiculo->find('first', $options);
        }
        $veiculos = $this->HistoricoVeiculo->Veiculo->find('list');
        $rastreadors = $this->HistoricoVeiculo->Rastreador->find('list');
        $this->set(compact('veiculos', 'rastreadors'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->HistoricoVeiculo->id = $id;
        if (!$this->HistoricoVeiculo->exists()) {
            throw new NotFoundException(__('Invalid historico veiculo'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->HistoricoVeiculo->delete()) {
            $this->Session->setFlash(__('The historico veiculo has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The historico veiculo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
