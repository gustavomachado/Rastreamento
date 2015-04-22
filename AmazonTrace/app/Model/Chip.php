<?php
App::uses('AppModel', 'Model');
/**
 * Chip Model
 *
 * @property Rastreador $Rastreador
 */
class Chip extends AppModel {


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
		)
	);
}
