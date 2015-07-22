<?php

App::uses('AppModelStatus', 'Model');

/**
 * Rastreador Model
 *
 * @property Veiculo $Veiculo
 * @property Chip $Chip
 * @property HistoricoChip $HistoricoChip
 * @property HistoricoVeiculo $HistoricoVeiculo
 */
class Rastreador extends AppModelStatus {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

      
    public $virtualFields = array(
        'id_modelo' => 'CONCAT("[", Rastreador.id, "] ", Rastreador.modelo)',
        'data_install' => '(select COALESCE(MAX(data_inicio),now()) from historico_veiculos v WHERE Rastreador.id = v.rastreador_id and Rastreador.veiculo_id = v.veiculo_id limit 1)',
        'data_remove' => '(select MAX(data_fim) from historico_veiculos v WHERE Rastreador.id = v.rastreador_id and Rastreador.veiculo_id = v.veiculo_id limit 1)'
    );
    
    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Veiculo' => array(
            'className' => 'Veiculo',
            'foreignKey' => 'veiculo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Chip' => array(
            'className' => 'Chip',
            'foreignKey' => 'rastreador_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'HistoricoChip' => array(
            'className' => 'HistoricoChip',
            'foreignKey' => 'rastreador_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'HistoricoVeiculo' => array(
            'className' => 'HistoricoVeiculo',
            'foreignKey' => 'rastreador_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

   
}
