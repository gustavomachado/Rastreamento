<?php

App::uses('AppModel', 'Model');

/**
 * Mensalidade Model
 *
 * @property Contrato $Contrato
 */
class Mensalidade extends AppModel {

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Contrato' => array(
            'className' => 'Contrato',
            'foreignKey' => 'contrato_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Cliente' => array(
            'className' => 'Cliente',
            'foreignKey' => 'cliente_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
}
