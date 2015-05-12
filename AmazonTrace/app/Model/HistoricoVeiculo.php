<?php
App::uses('AppModel', 'Model');
/**
 * HistoricoVeiculo Model
 *
 * @property Veiculo $Veiculo
 * @property Rastreador $Rastreador
 */
class HistoricoVeiculo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data_inicio' => array(
			'datetime' => array(
				'rule' => array('datetime'),
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
		'Veiculo' => array(
			'className' => 'Veiculo',
			'foreignKey' => 'veiculo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Rastreador' => array(
			'className' => 'Rastreador',
			'foreignKey' => 'rastreador_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
