<?php

App::uses('AppModel', 'Model');

/**
 * Rastreador Model
 *
 * @property Veiculo $Veiculo
 * @property Chip $Chip
 * @property HistoricoChip $HistoricoChip
 * @property HistoricoVeiculo $HistoricoVeiculo
 */
class Rastreador extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

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
