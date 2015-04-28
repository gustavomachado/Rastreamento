<?php
App::uses('AppModel', 'Model');
/**
 * Pagina Model
 *
 * @property Acesso $Acesso
 * @property Campo $Campo
 */
class Pagina extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Acesso' => array(
			'className' => 'Acesso',
			'foreignKey' => 'pagina_id',
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
		'Campo' => array(
			'className' => 'Campo',
			'foreignKey' => 'pagina_id',
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
