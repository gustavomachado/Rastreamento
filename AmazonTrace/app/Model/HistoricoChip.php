<?php
App::uses('AppModel', 'Model');
/**
 * HistoricoChip Model
 *
 * @property Chip $Chip
 * @property Rastreador $Rastreador
 */
class HistoricoChip extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	/*public $validate = array(
		'data_inicio' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Chip' => array(
			'className' => 'Chip',
			'foreignKey' => 'chip_id',
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
