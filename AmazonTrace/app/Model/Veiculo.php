<?php

App::uses('AppModelStatus', 'Model');

/**
 * Veiculo Model
 *
 * @property Cliente $Cliente
 * @property Motorista $Motorista
 * @property Contrato $Contrato
 * @property Rastreador $Rastreador
 */
class Veiculo extends AppModelStatus {

    public $virtualFields = array(
        'marca_modelo_placa' => 'CONCAT("[", Veiculo.id, "] ", Veiculo.marca, " ", Veiculo.modelo, " - ", Veiculo.placa)'
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'cliente_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Motorista' => array(
            'className' => 'Motorista',
            'foreignKey' => 'motorista_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Contrato' => array(
            'className' => 'Contrato',
            'foreignKey' => 'contrato_id',
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
        'Rastreador' => array(
            'className' => 'Rastreador',
            'foreignKey' => 'veiculo_id',
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
