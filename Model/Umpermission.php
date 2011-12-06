<?php
App::uses('UserminAppModel', 'Model');
/**
 * Umpermission Model
 *
 * @property Umrole $Umrole
 * @property Umuser $Umuser
 */
class Umpermission extends UserminAppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Umrole' => array(
			'className' => 'Umrole',
			'foreignKey' => 'umrole_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Umuser' => array(
			'className' => 'Umuser',
			'foreignKey' => 'umuser_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
