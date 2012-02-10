<?php
/* Umrole Fixture generated on: 2012-02-10 21:52:54 : 1328907174 */

/**
 * UmroleFixture
 *
 */
class UmroleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'rank' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name_UNIQUE' => array('column' => 'name', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '00000000-0000-0000-0000-000000000000',
			'name' => 'role-0',
			'rank' => 0
		),
		array(
			'id' => '11111111-1111-1111-1111-111111111111',
			'name' => 'role-1',
			'rank' => 1
		),
	);
}
