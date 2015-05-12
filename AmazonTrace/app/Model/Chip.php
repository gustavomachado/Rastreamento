<?php

App::uses('AppModelStatus', 'Model');

/**
 * Chip Model
 *
 * @property Rastreador $Rastreador
 */
class Chip extends AppModelStatus {
    
    public $virtualFields = array(
        'id_numero' => 'CONCAT("[", Chip.id, "] ", Chip.numero_telefone)'
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Rastreador' => array(
            'className' => 'Rastreador',
            'foreignKey' => 'rastreador_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Operadora' => array(
            'className' => 'Operadora',
            'foreignKey' => 'operadora_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'HistoricoChip' => array(
            'className' => 'HistoricoChip',
            'foreignKey' => 'chip_id',
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
